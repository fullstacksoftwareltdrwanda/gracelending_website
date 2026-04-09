<?php
require_once 'includes/db_connect.php';
include 'includes/head.php';
include 'includes/navbar.php';

$success = false;
$error = "";
$track_result = null;
$conn = getWebsiteConnection();

// Handle APPLICATION submission (NEW)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_application'])) {
    if ($conn) {
        $name = $conn->real_escape_string(trim($_POST['customer_name']));
        $email = $conn->real_escape_string(trim($_POST['email']));
        $phone = $conn->real_escape_string(trim($_POST['phone']));
        $nid = $conn->real_escape_string(trim($_POST['nationalId']));
        $loan_type = $conn->real_escape_string($_POST['loan_type']);
        $amount = $conn->real_escape_string($_POST['requested_amount']);
        $duration = $conn->real_escape_string($_POST['loan_duration']);
        $marriage = isset($_POST['marriage_type']) ? $conn->real_escape_string($_POST['marriage_type']) : 'Single';
        $occupation = isset($_POST['occupation']) ? $conn->real_escape_string($_POST['occupation']) : '';
        $province = isset($_POST['province']) ? $conn->real_escape_string($_POST['province']) : '';
        $location = isset($_POST['location']) ? $conn->real_escape_string($_POST['location']) : '';

        // Handle File Uploads
        $upload_dir = 'app.gracelending/uploads/documents/';
        if (!is_dir($upload_dir))
            mkdir($upload_dir, 0777, true);

        $docs = [];
        foreach (['doc_id', 'doc_contract', 'doc_statement', 'doc_payslip', 'doc_marital', 'doc_rdb'] as $field) {
            $docs[$field] = '';
            if (isset($_FILES[$field]) && $_FILES[$field]['error'] == 0) {
                $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
                $filename = $field . "_" . time() . "_" . mt_rand(100, 999) . "." . $ext;
                if (move_uploaded_file($_FILES[$field]['tmp_name'], $upload_dir . $filename)) {
                    $docs[$field] = 'uploads/documents/' . $filename;
                }
            }
        }

        $code = "PEND-" . mt_rand(1000, 9999);
        $sql = "INSERT INTO customers (
            customer_code, customer_name, email, phone, id_number, loan_type, 
            requested_amount, loan_duration, marriage_type, occupation, province, location,
            doc_id, doc_contract, doc_statement, doc_payslip, doc_marital, doc_rdb,
            status, organization, record_date
        ) VALUES (
            '$code','$name','$email','$phone','$nid','$loan_type',
            '$amount','$duration','$marriage','$occupation','$province','$location',
            '{$docs['doc_id']}','{$docs['doc_contract']}','{$docs['doc_statement']}',
            '{$docs['doc_payslip']}','{$docs['doc_marital']}','{$docs['doc_rdb']}',
            'Pending','Grace Lending Services',CURDATE()
        )";
        if ($conn->query($sql)) {
            $success = "created";
        } else {
            $error = "System Error: " . $conn->error;
        }
    }
}

// Handle APPLICATION RESUBMISSION (Update)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['resubmit_application'])) {
    $cust_id = intval($_POST['customer_id']);

    // Get existing data to only update what's changed/requested
    $check = $conn->query("SELECT * FROM customers WHERE customer_id = $cust_id");
    $existing = $check->fetch_assoc();

    if ($existing) {
        $updates = [];
        $resub_fields = [];

        // List of all potential fields
        $fields_map = [
            'customer_name' => 'customer_name',
            'email' => 'email',
            'phone' => 'phone',
            'nationalId' => 'id_number',
            'loan_type' => 'loan_type',
            'requested_amount' => 'requested_amount',
            'marriage_type' => 'marriage_type',
            'occupation' => 'occupation',
            'province' => 'province',
            'location' => 'location'
        ];

        foreach ($fields_map as $post_key => $db_col) {
            if (isset($_POST[$post_key])) {
                $val = $conn->real_escape_string($_POST[$post_key]);
                if ($val != $existing[$db_col]) {
                    $updates[] = "$db_col = '$val'";
                    $resub_fields[] = $db_col;
                }
            }
        }

        // Handle Files
        $upload_dir = 'app.gracelending/uploads/documents/';
        foreach (['doc_id', 'doc_contract', 'doc_statement', 'doc_payslip', 'doc_marital', 'doc_rdb'] as $field) {
            if (isset($_FILES[$field]) && $_FILES[$field]['error'] == 0) {
                $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
                $filename = $field . "_" . time() . "_" . mt_rand(100, 999) . "." . $ext;
                if (move_uploaded_file($_FILES[$field]['tmp_name'], $upload_dir . $filename)) {
                    $path = 'uploads/documents/' . $filename;
                    $updates[] = "$field = '$path'";
                    $resub_fields[] = $field;
                }
            }
        }

        if (!empty($updates)) {
            $resub_str = implode(',', $resub_fields);
            $sql = "UPDATE customers SET " . implode(', ', $updates) . ", status = 'Pending', client_resubmitted = 1, resubmitted_fields = '$resub_str' WHERE customer_id = $cust_id";
            if ($conn->query($sql)) {
                $success = "updated";
            } else {
                $error = "Update Error: " . $conn->error;
            }
        } else {
            // No changes but maybe they just clicked submit? Let's mark it anyway if they were action required.
            $conn->query("UPDATE customers SET status = 'Pending', client_resubmitted = 1 WHERE customer_id = $cust_id");
            $success = "updated";
        }
    }
}

// Handle APPLICATION TRACKING
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['track_code'])) {
    $track_email = $conn->real_escape_string(trim($_POST['track_email']));
    $track_nid = $conn->real_escape_string(trim($_POST['track_nid']));
    if ($track_email && $track_nid) {
        $result = $conn->query(
            "SELECT customer_id, customer_code, customer_name, loan_type, requested_amount, status, 
                    admin_note, correction_fields, record_date, phone, marriage_type, occupation, province, location, email, id_number
             FROM customers 
             WHERE email = '$track_email' AND id_number = '$track_nid' 
             ORDER BY record_date DESC LIMIT 1"
        );
        if ($result && $result->num_rows > 0) {
            $track_result = $result->fetch_assoc();
        } else {
            $track_result = ['error' => 'No application found matching that Email and National ID. Please check and try again.'];
        }
    } else {
        $track_result = ['error' => 'Please enter both your email address and National ID number.'];
    }
}

?>

<main class="min-h-screen pt-4 pb-16 px-4 font-sans bg-primary-dark text-neutral-body">
    <div class="max-w-4xl mx-auto">

        <!-- ==================== TRACKING SECTION ==================== -->
        <div class="mb-12">
            <div class="bg-neutral-card border border-white/5 rounded-[2rem] p-8 shadow-xl">
                <h2
                    class="text-sm font-black uppercase text-neutral-heading tracking-widest mb-1 flex items-center gap-3">
                    <i class="fas fa-search-location text-accent-teal"></i> Track My Application
                </h2>
                <p class="text-[10px] text-neutral-body opacity-50 font-bold uppercase tracking-widest mb-6">Enter the
                    email and National ID you used to apply</p>
                <form method="POST" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="email" name="track_email" placeholder="Email Address" required
                            value="<?php echo isset($_POST['track_email']) ? htmlspecialchars($_POST['track_email']) : ''; ?>"
                            class="w-full p-4 bg-primary-dark border-2 border-white/10 rounded-2xl text-sm font-bold text-white outline-none focus:border-accent-teal transition-all placeholder:opacity-40">
                        <input type="text" name="track_nid" placeholder="National ID Number" required
                            value="<?php echo isset($_POST['track_nid']) ? htmlspecialchars($_POST['track_nid']) : ''; ?>"
                            class="w-full p-4 bg-primary-dark border-2 border-white/10 rounded-2xl text-sm font-bold text-white outline-none focus:border-accent-teal transition-all placeholder:opacity-40">
                    </div>
                    <button type="submit" name="track_code"
                        class="w-full bg-accent-teal text-white py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:opacity-90 transition-all shadow-lg shadow-accent-teal/20">
                        <i class="fas fa-search mr-2"></i> Track My Application
                    </button>
                </form>

                <?php if ($track_result): ?>
                    <?php if (isset($track_result['error'])): ?>
                        <div
                            class="mt-6 p-5 bg-rose-500/10 border border-rose-500/20 rounded-2xl text-rose-400 text-xs font-black text-center uppercase tracking-widest">
                            <i class="fas fa-exclamation-circle mr-2"></i><?php echo $track_result['error']; ?>
                        </div>
                    <?php else:
                        $stat = $track_result['status'] ?? 'Pending';
                        $stat_color = [
                            'Pending' => 'text-yellow-400 bg-yellow-400/10 border-yellow-400/20',
                            'Approved' => 'text-green-400 bg-green-400/10 border-green-400/20',
                            'Action Required' => 'text-sky-400 bg-sky-400/10 border-sky-400/20',
                            'Rejected' => 'text-rose-400 bg-rose-400/10 border-rose-400/20',
                        ][$stat] ?? 'text-white bg-white/5 border-white/10';
                        $stat_icon = [
                            'Pending' => 'fa-clock',
                            'Approved' => 'fa-check-circle',
                            'Action Required' => 'fa-exclamation-triangle',
                            'Rejected' => 'fa-times-circle',
                        ][$stat] ?? 'fa-info-circle';
                        ?>
                        <div class="mt-6 p-6 bg-primary-dark rounded-2xl border border-white/5 space-y-4">
                            <div class="flex items-center justify-between flex-wrap gap-4">
                                <div>
                                    <p class="text-[10px] text-neutral-body opacity-50 font-black uppercase tracking-widest">
                                        Applicant</p>
                                    <p class="text-lg font-black text-neutral-heading">
                                        <?php echo htmlspecialchars($track_result['customer_name']); ?>
                                    </p>
                                </div>
                                <span
                                    class="px-5 py-2 rounded-xl border font-black text-xs uppercase tracking-widest <?php echo $stat_color; ?>">
                                    <i class="fas <?php echo $stat_icon; ?> mr-2"></i><?php echo $stat; ?>
                                </span>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-xs font-bold">
                                <div>
                                    <p class="text-neutral-body opacity-40 uppercase tracking-widest text-[9px] mb-1">Ref Code
                                    </p>
                                    <p class="text-primary-coral font-black">
                                        <?php echo htmlspecialchars($track_result['customer_code']); ?>
                                    </p>
                                </div>
                                <div>
                                    <p class="text-neutral-body opacity-40 uppercase tracking-widest text-[9px] mb-1">Loan Type
                                    </p>
                                    <p class="text-white"><?php echo htmlspecialchars($track_result['loan_type']); ?></p>
                                </div>
                                <div>
                                    <p class="text-neutral-body opacity-40 uppercase tracking-widest text-[9px] mb-1">Amount</p>
                                    <p class="text-primary-coral">
                                        <?php echo number_format($track_result['requested_amount']); ?> RWF
                                    </p>
                                </div>
                                <div>
                                    <p class="text-neutral-body opacity-40 uppercase tracking-widest text-[9px] mb-1">Applied On
                                    </p>
                                    <p class="text-white"><?php echo htmlspecialchars($track_result['record_date']); ?></p>
                                </div>
                            </div>
                            <?php if (!empty($track_result['admin_note'])): ?>
                                <div class="p-4 bg-sky-400/10 border border-sky-400/20 rounded-xl">
                                    <p class="text-[9px] font-black uppercase tracking-widest text-sky-400 mb-2"><i
                                            class="fas fa-comment-alt mr-1"></i> Note from Grace Lending</p>
                                    <p class="text-sm text-sky-300 font-bold">
                                        <?php echo htmlspecialchars($track_result['admin_note']); ?>
                                    </p>
                                    <?php if (!empty($track_result['correction_fields'])): ?>
                                        <p class="text-[10px] mt-2 text-sky-400 opacity-70 font-bold uppercase tracking-widest">Fields
                                            to update:
                                            <?php echo str_replace(',', ', ', htmlspecialchars($track_result['correction_fields'])); ?>
                                        </p>

                                        <button type="button" onclick="showCorrectionForm()"
                                            class="mt-4 px-6 py-3 bg-sky-500 text-white rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-sky-400 transition-all shadow-lg shadow-sky-500/20">
                                            <i class="fas fa-edit mr-2"></i> Update My Information
                                        </button>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <!-- RESUBMISSION FORM (Hidden by default) -->
                            <div id="correctionFormSection"
                                class="hidden mt-8 p-8 bg-neutral-card border border-sky-500/30 rounded-3xl animate-in">
                                <h3
                                    class="text-lg font-black text-neutral-heading uppercase tracking-tighter mb-6 flex items-center gap-3">
                                    <i class="fas fa-file-signature text-sky-400"></i> Resubmit Information
                                </h3>
                                <form method="POST" enctype="multipart/form-data" class="space-y-6">
                                    <input type="hidden" name="resubmit_application" value="1">
                                    <input type="hidden" name="customer_id" value="<?php echo $track_result['customer_id']; ?>">

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label
                                                class="text-[9px] font-black uppercase text-neutral-body opacity-50 pl-2 tracking-widest">Full
                                                Name
                                                <?php if (strpos($track_result['correction_fields'], 'customer_name') !== false)
                                                    echo '<span class="text-sky-400">(Fix Required)</span>'; ?></label>
                                            <input type="text" name="customer_name"
                                                value="<?php echo htmlspecialchars($track_result['customer_name']); ?>"
                                                class="w-full p-4 bg-primary-dark border-2 <?php echo strpos($track_result['correction_fields'], 'customer_name') !== false ? 'border-sky-500/50' : 'border-white/5'; ?> rounded-2xl text-sm font-bold text-white outline-none">
                                        </div>
                                        <div class="space-y-2">
                                            <label
                                                class="text-[9px] font-black uppercase text-neutral-body opacity-50 pl-2 tracking-widest">Phone
                                                <?php if (strpos($track_result['correction_fields'], 'phone') !== false)
                                                    echo '<span class="text-sky-400">(Fix Required)</span>'; ?></label>
                                            <input type="text" name="phone"
                                                value="<?php echo htmlspecialchars($track_result['phone']); ?>"
                                                class="w-full p-4 bg-primary-dark border-2 <?php echo strpos($track_result['correction_fields'], 'phone') !== false ? 'border-sky-500/50' : 'border-white/5'; ?> rounded-2xl text-sm font-bold text-white outline-none">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label
                                                class="text-[9px] font-black uppercase text-neutral-body opacity-50 pl-2 tracking-widest">National
                                                ID
                                                <?php if (strpos($track_result['correction_fields'], 'id_number') !== false)
                                                    echo '<span class="text-sky-400">(Fix Required)</span>'; ?></label>
                                            <input type="text" name="nationalId"
                                                value="<?php echo htmlspecialchars($track_result['id_number']); ?>"
                                                class="w-full p-4 bg-primary-dark border-2 <?php echo strpos($track_result['correction_fields'], 'id_number') !== false ? 'border-sky-500/50' : 'border-white/5'; ?> rounded-2xl text-sm font-bold text-white outline-none">
                                        </div>
                                        <div class="space-y-2">
                                            <label
                                                class="text-[9px] font-black uppercase text-neutral-body opacity-50 pl-2 tracking-widest">Email
                                                <?php if (strpos($track_result['correction_fields'], 'email') !== false)
                                                    echo '<span class="text-sky-400">(Fix Required)</span>'; ?></label>
                                            <input type="email" name="email"
                                                value="<?php echo htmlspecialchars($track_result['email']); ?>"
                                                class="w-full p-4 bg-primary-dark border-2 <?php echo strpos($track_result['correction_fields'], 'email') !== false ? 'border-sky-500/50' : 'border-white/5'; ?> rounded-2xl text-sm font-bold text-white outline-none">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-4 border-b border-white/5">
                                        <div class="space-y-2">
                                            <label
                                                class="text-[9px] font-black uppercase text-neutral-body opacity-50 pl-2 tracking-widest">Loan
                                                Type
                                                <?php if (strpos($track_result['correction_fields'], 'loan_type') !== false)
                                                    echo '<span class="text-sky-400">(Fix Required)</span>'; ?></label>
                                            <select name="loan_type"
                                                class="w-full p-4 bg-primary-dark border-2 <?php echo strpos($track_result['correction_fields'], 'loan_type') !== false ? 'border-sky-500/50' : 'border-white/5'; ?> rounded-2xl text-sm font-bold text-white outline-none">
                                                <option <?php if ($track_result['loan_type'] == 'Personal')
                                                    echo 'selected'; ?>>
                                                    Personal</option>
                                                <option <?php if ($track_result['loan_type'] == 'Business')
                                                    echo 'selected'; ?>>
                                                    Business</option>
                                                <option <?php if ($track_result['loan_type'] == 'Salary')
                                                    echo 'selected'; ?>>
                                                    Salary</option>
                                            </select>
                                        </div>
                                        <div class="space-y-2">
                                            <label
                                                class="text-[9px] font-black uppercase text-neutral-body opacity-50 pl-2 tracking-widest">Amount
                                                <?php if (strpos($track_result['correction_fields'], 'requested_amount') !== false)
                                                    echo '<span class="text-sky-400">(Fix Required)</span>'; ?></label>
                                            <input type="number" name="requested_amount"
                                                value="<?php echo $track_result['requested_amount']; ?>"
                                                class="w-full p-4 bg-primary-dark border-2 <?php echo strpos($track_result['correction_fields'], 'requested_amount') !== false ? 'border-sky-500/50' : 'border-white/5'; ?> rounded-2xl text-sm font-bold text-white outline-none">
                                        </div>
                                    </div>

                                    <div
                                        class="grid grid-cols-1 md:grid-cols-3 gap-4 uppercase tracking-widest font-black text-[8px] text-neutral-body opacity-40 mb-4">
                                        <p>Update Required Documents if requested:</p>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-1">
                                            <label
                                                class="text-[8px] font-black uppercase <?php echo strpos($track_result['correction_fields'], 'doc_id') !== false ? 'text-sky-400' : ''; ?>">National
                                                ID Copy</label>
                                            <input type="file" name="doc_id"
                                                class="w-full p-3 bg-primary-dark border-2 <?php echo strpos($track_result['correction_fields'], 'doc_id') !== false ? 'border-sky-500/40' : 'border-white/5'; ?> rounded-xl text-[10px] text-white">
                                        </div>
                                        <div class="space-y-1">
                                            <label
                                                class="text-[8px] font-black uppercase <?php echo strpos($track_result['correction_fields'], 'doc_contract') !== false ? 'text-sky-400' : ''; ?>">Work
                                                Contract</label>
                                            <input type="file" name="doc_contract"
                                                class="w-full p-3 bg-primary-dark border-2 <?php echo strpos($track_result['correction_fields'], 'doc_contract') !== false ? 'border-sky-500/40' : 'border-white/5'; ?> rounded-xl text-[10px] text-white">
                                        </div>
                                        <div class="space-y-1">
                                            <label
                                                class="text-[8px] font-black uppercase <?php echo strpos($track_result['correction_fields'], 'doc_statement') !== false ? 'text-sky-400' : ''; ?>">Bank
                                                Statement</label>
                                            <input type="file" name="doc_statement"
                                                class="w-full p-3 bg-primary-dark border-2 <?php echo strpos($track_result['correction_fields'], 'doc_statement') !== false ? 'border-sky-500/40' : 'border-white/5'; ?> rounded-xl text-[10px] text-white">
                                        </div>
                                        <div class="space-y-1">
                                            <label
                                                class="text-[8px] font-black uppercase <?php echo strpos($track_result['correction_fields'], 'doc_payslip') !== false ? 'text-sky-400' : ''; ?>">Latest
                                                Payslip</label>
                                            <input type="file" name="doc_payslip"
                                                class="w-full p-3 bg-primary-dark border-2 <?php echo strpos($track_result['correction_fields'], 'doc_payslip') !== false ? 'border-sky-500/40' : 'border-white/5'; ?> rounded-xl text-[10px] text-white">
                                        </div>
                                    </div>

                                    <button type="submit"
                                        class="w-full bg-sky-500 text-white py-5 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-sky-400 transition-all">
                                        <i class="fas fa-paper-plane mr-2"></i> Submit Corrections
                                    </button>
                                </form>
                            </div>
                            <script>function showCorrectionForm() { document.getElementById('correctionFormSection').classList.toggle('hidden'); }</script>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($success === "updated"): ?>
                    <div class="mt-6 p-6 bg-green-500/10 border border-green-500/20 rounded-3xl text-center">
                        <i class="fas fa-check-circle text-green-400 text-3xl mb-4"></i>
                        <h4 class="text-white font-black uppercase tracking-widest text-sm">Updates Submitted!</h4>
                        <p class="text-neutral-body text-[10px] font-bold mt-2 uppercase">Grace Lending will review your
                            changes shortly.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- ==================== END TRACKING ======================== -->

        <?php if ($success === "created"): ?>
            <div class="p-16 text-center shadow-2xl animate-in bg-neutral-card rounded-[3rem] border border-white/5">
                <div
                    class="w-24 h-24 bg-accent-teal text-white rounded-full flex items-center justify-center mx-auto mb-10 shadow-2xl shadow-accent-teal/20">
                    <i class="fas fa-check text-4xl"></i>
                </div>
                <h3 class="text-4xl font-black text-neutral-heading mb-4 tracking-tighter uppercase">Application Sent!</h3>
                <p class="text-neutral-body text-sm font-bold max-w-sm mx-auto mb-12">
                    Grace Lending Services is reviewing your application. You will be contacted via phone or email.
                </p>
                <div class="bg-primary-dark p-8 rounded-2xl mb-12 border border-white/5">
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-50 mb-3">Your Reference Code — Save
                        This!</p>
                    <p class="text-3xl font-black text-primary-coral tracking-widest"><?php echo $code; ?></p>
                    <p class="text-[10px] text-neutral-body opacity-40 mt-3 font-bold">Use this code above to track your
                        application status</p>
                </div>
                <a href="index.php"
                    class="inline-block bg-primary-coral text-white px-10 py-4 rounded-2xl font-black text-xs tracking-widest transition-all">RETURN
                    TO HOME</a>
            </div>
        <?php else: ?>
            <!-- Application Form -->
            <div class="bg-neutral-card rounded-[3rem] shadow-2xl border border-white/5 animate-in overflow-hidden">
                <!-- Progress Header -->
                <div class="bg-primary-navy p-8 border-b border-white/5 flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div id="step-indicator"
                            class="w-10 h-10 rounded-xl bg-primary-coral flex items-center justify-center text-white font-black">
                            1</div>
                        <div>
                            <h2 id="step-title" class="text-xs font-black text-white uppercase tracking-widest">Step 1 of 2
                            </h2>
                            <p id="step-desc" class="text-[10px] text-neutral-body font-bold uppercase opacity-50">Personal
                                Details</p>
                        </div>
                    </div>
                    <!-- Step dots -->
                    <div class="flex gap-2">
                        <div id="dot1" class="w-2 h-2 rounded-full bg-primary-coral"></div>
                        <div id="dot2" class="w-2 h-2 rounded-full bg-white/20"></div>
                    </div>
                </div>

                <div class="p-10 md:p-16">
                    <div class="mb-12">
                        <h1 class="text-4xl font-black text-neutral-heading mb-3 tracking-tighter uppercase">Loan
                            Application</h1>
                        <p class="text-sm font-bold text-neutral-body opacity-60">Complete the form below to start your
                            funding process.</p>
                    </div>

                    <?php if ($error): ?>
                        <div
                            class="bg-rose-500/10 text-rose-500 p-5 rounded-2xl mb-12 text-xs text-center font-black border border-rose-500/20">
                            <i class="fas fa-exclamation-circle mr-2"></i><?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form id="loanForm" method="POST" enctype="multipart/form-data" class="space-y-8">
                        <input type="hidden" name="submit_application" value="1">

                        <!-- STEP 1: Personal Info -->
                        <div id="step1">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Full
                                        Name *</label>
                                    <input type="text" name="customer_name" required
                                        class="w-full p-5 bg-primary-dark border-2 border-white/5 rounded-2xl text-sm font-bold text-white outline-none focus:border-primary-coral transition-all"
                                        placeholder="John Doe">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Phone
                                        Number *</label>
                                    <input type="tel" name="phone" required
                                        class="w-full p-5 bg-primary-dark border-2 border-white/5 rounded-2xl text-sm font-bold text-white outline-none focus:border-primary-coral transition-all"
                                        placeholder="07XXXXXXXX">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">National
                                        ID No. *</label>
                                    <input type="text" name="nationalId" required
                                        class="w-full p-5 bg-primary-dark border-2 border-white/5 rounded-2xl text-sm font-bold text-white outline-none focus:border-primary-coral transition-all"
                                        placeholder="119XXXXXXXXXXXXX">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Email
                                        Address *</label>
                                    <input type="email" name="email" required
                                        class="w-full p-5 bg-primary-dark border-2 border-white/5 rounded-2xl text-sm font-bold text-white outline-none focus:border-primary-coral transition-all"
                                        placeholder="name@mail.com">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Loan
                                        Product *</label>
                                    <select name="loan_type" required
                                        class="w-full p-5 bg-primary-dark border-2 border-white/5 rounded-2xl text-sm font-bold text-white outline-none focus:border-primary-coral transition-all cursor-pointer">
                                        <option value="Personal">Personal Loan</option>
                                        <option value="Business">Business (SME)</option>
                                        <option value="Salary">Salary Loan</option>
                                        <option value="Microfinance">Microfinance</option>
                                        <option value="Agriculture">Agricultural Loan</option>
                                        <option value="Asset Financing">Asset Financing</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Amount
                                        (RWF) *</label>
                                    <input type="number" name="requested_amount" required
                                        class="w-full p-5 bg-primary-dark border-2 border-white/5 rounded-2xl text-sm font-bold text-white outline-none focus:border-primary-coral transition-all"
                                        placeholder="e.g. 500000">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Marital
                                        Status</label>
                                    <select name="marriage_type"
                                        class="w-full p-5 bg-primary-dark border-2 border-white/5 rounded-2xl text-sm font-bold text-white outline-none focus:border-primary-coral transition-all">
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Occupation</label>
                                    <input type="text" name="occupation"
                                        class="w-full p-5 bg-primary-dark border-2 border-white/5 rounded-2xl text-sm font-bold text-white outline-none focus:border-primary-coral transition-all"
                                        placeholder="e.g. Teacher">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Province</label>
                                    <input type="text" name="province"
                                        class="w-full p-5 bg-primary-dark border-2 border-white/5 rounded-2xl text-sm font-bold text-white outline-none focus:border-primary-coral transition-all"
                                        placeholder="e.g. Kigali">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">District
                                        / City</label>
                                    <input type="text" name="location"
                                        class="w-full p-5 bg-primary-dark border-2 border-white/5 rounded-2xl text-sm font-bold text-white outline-none focus:border-primary-coral transition-all"
                                        placeholder="e.g. Gasabo">
                                </div>
                                <input type="hidden" name="loan_duration" value="12">
                            </div>
                            <button type="button" onclick="goToStep2()"
                                class="w-full bg-primary-coral text-white py-6 rounded-2xl font-black text-xs shadow-2xl hover:opacity-95 transition-all tracking-[0.3em] uppercase">
                                Next Step: Upload Documents <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>

                        <!-- STEP 2: Document Uploads -->
                        <div id="step2" class="hidden space-y-8 animate-in">
                            <div
                                class="p-6 bg-accent-teal/5 border border-accent-teal/20 rounded-2xl text-xs text-accent-teal font-black uppercase tracking-widest">
                                <i class="fas fa-info-circle mr-2"></i>Upload clear copies of your documents. PDF or image
                                files accepted.
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">National
                                        ID Copy</label>
                                    <input type="file" name="doc_id" accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full p-4 bg-primary-navy border-2 border-dashed border-white/20 rounded-2xl text-xs font-bold text-white cursor-pointer hover:border-primary-coral/50 transition-all">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Work
                                        Contract</label>
                                    <input type="file" name="doc_contract" accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full p-4 bg-primary-navy border-2 border-dashed border-white/20 rounded-2xl text-xs font-bold text-white cursor-pointer hover:border-primary-coral/50 transition-all">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Bank
                                        Statement</label>
                                    <input type="file" name="doc_statement" accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full p-4 bg-primary-navy border-2 border-dashed border-white/20 rounded-2xl text-xs font-bold text-white cursor-pointer hover:border-primary-coral/50 transition-all">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Latest
                                        Payslip</label>
                                    <input type="file" name="doc_payslip" accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full p-4 bg-primary-navy border-2 border-dashed border-white/20 rounded-2xl text-xs font-bold text-white cursor-pointer hover:border-primary-coral/50 transition-all">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">Marital
                                        Certificate</label>
                                    <input type="file" name="doc_marital" accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full p-4 bg-primary-navy border-2 border-dashed border-white/20 rounded-2xl text-xs font-bold text-white cursor-pointer hover:border-primary-coral/50 transition-all">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4 tracking-widest">RDB
                                        Certificate</label>
                                    <input type="file" name="doc_rdb" accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full p-4 bg-primary-navy border-2 border-dashed border-white/20 rounded-2xl text-xs font-bold text-white cursor-pointer hover:border-primary-coral/50 transition-all">
                                </div>
                            </div>
                            <div class="flex gap-4 pt-4">
                                <button type="button" onclick="goToStep1()"
                                    class="flex-1 bg-primary-navy text-white py-6 rounded-2xl font-black text-xs hover:opacity-90 transition-all uppercase tracking-widest">
                                    <i class="fas fa-arrow-left mr-2"></i> Go Back
                                </button>
                                <button type="submit" name="submit_application"
                                    class="flex-[2] bg-primary-coral text-white py-6 rounded-2xl font-black text-xs shadow-2xl hover:opacity-95 transition-all tracking-[0.3em] uppercase">
                                    <i class="fas fa-paper-plane mr-2"></i> Submit Application
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<script>
    function goToStep2() {
        // Basic validation
        const required = document.querySelectorAll('#step1 [required]');
        let valid = true;
        required.forEach(el => {
            if (!el.value.trim()) { el.classList.add('border-rose-500'); valid = false; }
            else el.classList.remove('border-rose-500');
        });
        if (!valid) { alert('Please fill in all required fields before continuing.'); return; }

        document.getElementById('step1').classList.add('hidden');
        document.getElementById('step2').classList.remove('hidden');
        document.getElementById('step-indicator').textContent = '2';
        document.getElementById('step-title').textContent = 'Step 2 of 2';
        document.getElementById('step-desc').textContent = 'Upload Documents';
        document.getElementById('dot1').classList.replace('bg-primary-coral', 'bg-white/30');
        document.getElementById('dot2').classList.replace('bg-white/20', 'bg-primary-coral');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    function goToStep1() {
        document.getElementById('step2').classList.add('hidden');
        document.getElementById('step1').classList.remove('hidden');
        document.getElementById('step-indicator').textContent = '1';
        document.getElementById('step-title').textContent = 'Step 1 of 2';
        document.getElementById('step-desc').textContent = 'Personal Details';
        document.getElementById('dot1').classList.replace('bg-white/30', 'bg-primary-coral');
        document.getElementById('dot2').classList.replace('bg-primary-coral', 'bg-white/20');
    }
</script>

<style>
    @keyframes fi {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-in {
        animation: fi 0.5s ease-out forwards;
    }

    .hidden {
        display: none;
    }

    select {
        background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns='http://www.w3.org/2000/svg' width='292.4' height='292.4'%3E%3Cpath fill='%23FF6B4A' d='M287 69.4a17.6 17.6 0 0 0-13-5.4H18.4c-5 0-9.3 1.8-12.9 5.4A17.6 17.6 0 0 0 0 82.2c0 5 1.8 9.3 5.4 12.9l128 127.9c3.6 3.6 7.8 5.4 12.8 5.4s9.2-1.8 12.8-5.4L287 95c3.5-3.5 5.4-7.8 5.4-12.8 0-5-1.9-9.2-5.5-12.8z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1.5rem top 50%;
        background-size: 0.65rem auto;
    }
</style>

<?php
include 'includes/bottom_nav.php';
include 'includes/footer.php';
?>