<?php include 'includes/head.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- Header -->
<section class="gradient-coral py-24 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-4">Loan <span class="text-primary-navy/20">Requirements</span></h1>
        <p class="text-white text-lg max-w-2xl mx-auto font-medium">Compliance-first approach for faster processing. Ensure you have these ready for your application.</p>
    </div>
</section>

<!-- Requirements Section -->
<section class="py-24 max-w-7xl mx-auto px-4">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Mandatory Documents -->
        <div class="p-10 rounded-[3rem] bg-neutral-card border-l-8 border-primary-coral shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 p-8 opacity-5 text-4xl font-black uppercase tracking-widest leading-none rotate-90 translate-x-12">MANDATORY</div>
            <h3 class="text-3xl font-black text-neutral-heading mb-8">1. General (All Applicants)</h3>
            <ul class="space-y-4">
                <li class="p-6 bg-white/5 border border-white/5 rounded-2xl flex items-center gap-4 text-neutral-body">
                    <i class="fas fa-camera text-primary-coral"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">One Passport Photo</span>
                </li>
                <li class="p-6 bg-white/5 border border-white/5 rounded-2xl flex items-center gap-4 text-neutral-body">
                    <i class="fas fa-id-card text-primary-coral"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">Valid National ID or Passport (Copy)</span>
                </li>
                <li class="p-6 bg-white/5 border border-white/5 rounded-2xl flex items-center gap-4 text-neutral-body">
                    <i class="fas fa-file-contract text-primary-coral"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">Marital Status Certificate</span>
                </li>
                <li class="p-6 bg-white/10 border border-primary-coral/20 rounded-2xl flex items-center gap-4 text-primary-coral">
                    <i class="fas fa-ring"></i>
                    <span class="text-sm font-black uppercase tracking-wide">If Married: Spouse ID & Co-Signature</span>
                </li>
            </ul>
        </div>

        <!-- Collateral & Security -->
        <div class="p-10 rounded-[3rem] bg-neutral-card border-l-8 border-accent-gold shadow-2xl relative overflow-hidden">
            <h3 class="text-3xl font-black text-neutral-heading mb-8">2. Collateral (Secured Loans)</h3>
            <p class="text-neutral-body text-sm mb-10 leading-relaxed font-bold italic opacity-70">Physical collateral must be provided and verified at our offices in Imela House.</p>
            <div class="space-y-6">
                <!-- House -->
                <div class="p-6 bg-white/5 rounded-2xl border border-white/5">
                    <h4 class="text-xs font-black text-accent-gold uppercase tracking-[0.25em] mb-4">Land or Property</h4>
                    <p class="text-sm text-neutral-body font-bold"><i class="fas fa-file-pdf text-accent-gold mr-3"></i> Land Title (Original + Copy)</p>
                    <p class="text-[10px] text-neutral-body mt-2 opacity-50 uppercase tracking-widest pl-7">Valuation Report from certified valuer is required</p>
                </div>
                <!-- Assets -->
                <div class="p-6 bg-white/5 rounded-2xl border border-white/5">
                    <h4 class="text-xs font-black text-accent-gold uppercase tracking-[0.25em] mb-4">Equipment & Assets</h4>
                    <p class="text-sm text-neutral-body font-bold"><i class="fas fa-receipt text-accent-gold mr-3"></i> Original Purchase Receipts / Invoices</p>
                </div>
            </div>
        </div>

        <!-- Employment requirements -->
        <div class="p-10 rounded-[3rem] bg-neutral-card border-l-8 border-accent-teal shadow-2xl">
            <h3 class="text-3xl font-black text-neutral-heading mb-8">3. Employment-Based</h3>
            <div class="space-y-4">
                <li class="p-6 bg-accent-teal/5 border border-accent-teal/10 rounded-2xl flex items-center gap-4 text-neutral-body">
                    <i class="fas fa-file-signature text-accent-teal"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">Employment Contract</span>
                </li>
                <li class="p-6 bg-accent-teal/5 border border-accent-teal/10 rounded-2xl flex items-center gap-4 text-neutral-body">
                    <i class="fas fa-university text-accent-teal"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">Bank Statement (Last 3-6 Months)</span>
                </li>
                <li class="p-6 bg-accent-teal/5 border border-accent-teal/10 rounded-2xl flex items-center gap-4 text-neutral-body">
                    <i class="fas fa-money-check-alt text-accent-teal"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">Three (3) Latest Payslips</span>
                </li>
            </div>
        </div>

        <!-- Business requirements -->
        <div class="p-10 rounded-[3rem] bg-neutral-card border-l-8 border-primary-coral shadow-2xl">
            <h3 class="text-3xl font-black text-neutral-heading mb-8">4. Business / Corporate</h3>
            <div class="space-y-4">
                <li class="p-6 bg-primary-coral/5 border border-primary-coral/10 rounded-2xl flex items-center gap-4 text-neutral-body">
                    <i class="fas fa-stamp text-primary-coral"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">Board Resolution Authorizing Loan</span>
                </li>
                <li class="p-6 bg-primary-coral/5 border border-primary-coral/10 rounded-2xl flex items-center gap-4 text-neutral-body">
                    <i class="fas fa-certificate text-primary-coral"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">RDB Registration Certificate & TIN</span>
                </li>
                <li class="p-6 bg-primary-coral/5 border border-primary-coral/10 rounded-2xl flex items-center gap-4 text-neutral-body">
                    <i class="fas fa-history text-primary-coral"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">Business Activity Records / Audit</span>
                </li>
            </div>
        </div>

    </div>
</section>

<?php include 'includes/bottom_nav.php'; ?>
<?php include 'includes/footer.php'; ?>
