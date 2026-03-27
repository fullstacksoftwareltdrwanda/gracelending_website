<?php include 'includes/head.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- Header -->
<section class="gradient-blue py-24 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-7xl font-black text-neutral-heading tracking-tight mb-4 uppercase">Contact <span class="text-primary-coral">Us</span></h1>
        <p class="text-neutral-body text-lg max-w-2xl mx-auto font-medium">We're here to help you achieve your financial goals. Get in touch with our experts.</p>
    </div>
</section>

<!-- Contact Info Grid -->
<section class="py-12 -mt-10 relative z-20 max-w-7xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Phone -->
        <div class="bg-neutral-card p-6 rounded-3xl shadow-2xl border border-white/5 flex items-center space-x-4">
            <div class="w-12 h-12 rounded-2xl bg-primary-coral/10 flex items-center justify-center text-primary-coral">
                <i class="fas fa-phone-alt text-xl"></i>
            </div>
            <div>
                <p class="text-[9px] text-neutral-body font-black uppercase tracking-widest opacity-50 mb-1">Phone</p>
                <p class="text-sm font-bold text-neutral-heading tracking-tight">0788854767</p>
            </div>
        </div>
        <!-- Email -->
        <div class="bg-neutral-card p-6 rounded-3xl shadow-2xl border border-white/5 flex items-center space-x-4">
            <div class="w-12 h-12 rounded-2xl bg-accent-teal/10 flex items-center justify-center text-accent-teal">
                <i class="fas fa-envelope text-xl"></i>
            </div>
            <div>
                <p class="text-[9px] text-neutral-body font-black uppercase tracking-widest opacity-50 mb-1">Email</p>
                <p class="text-xs font-bold text-neutral-heading tracking-tighter lowercase">gracelendingrw@gmail.com</p>
            </div>
        </div>
        <!-- Address -->
        <div class="bg-neutral-card p-6 rounded-3xl shadow-2xl border border-white/5 flex items-center space-x-4">
            <div class="w-12 h-12 rounded-2xl bg-accent-gold/10 flex items-center justify-center text-accent-gold">
                <i class="fas fa-map-marker-alt text-xl"></i>
            </div>
            <div>
                <p class="text-[9px] text-neutral-body font-black uppercase tracking-widest opacity-50 mb-1">Address</p>
                <p class="text-sm font-bold text-neutral-heading tracking-tight">KK 10 Ave, Imela house</p>
            </div>
        </div>
        <!-- Hours -->
        <div class="bg-neutral-card p-6 rounded-3xl shadow-2xl border border-white/5 flex items-center space-x-4">
            <div class="w-12 h-12 rounded-2xl bg-primary-navy flex items-center justify-center text-white/50">
                <i class="fas fa-clock text-xl"></i>
            </div>
            <div>
                <p class="text-[9px] text-neutral-body font-black uppercase tracking-widest opacity-50 mb-1">Hours</p>
                <p class="text-sm font-bold text-neutral-heading tracking-tight">Mon-Fri: 9am - 5pm</p>
            </div>
        </div>
    </div>
</section>

<!-- Form Section -->
<section class="py-24 max-w-7xl mx-auto px-4">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
        <!-- Message Card -->
        <div class="bg-neutral-card rounded-[3rem] p-12 shadow-2xl border border-white/5">
            <h3 class="text-3xl font-black text-neutral-heading mb-8 uppercase tracking-tighter">Send Us a Message</h3>
            <form action="#" class="space-y-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4">Your Name</label>
                    <input type="text" placeholder="John Doe" class="w-full bg-primary-dark border border-white/5 rounded-2xl px-6 py-4 font-bold text-sm text-white outline-none focus:border-primary-coral transition-all">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4">Email</label>
                        <input type="email" placeholder="name@email.com" class="w-full bg-primary-dark border border-white/5 rounded-2xl px-6 py-4 font-bold text-sm text-white outline-none focus:border-primary-coral transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4">Phone</label>
                        <input type="tel" placeholder="07XXXXXXXX" class="w-full bg-primary-dark border border-white/5 rounded-2xl px-6 py-4 font-bold text-sm text-white outline-none focus:border-primary-coral transition-all">
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4">Subject</label>
                    <input type="text" placeholder="Loan Inquiry" class="w-full bg-primary-dark border border-white/5 rounded-2xl px-6 py-4 font-bold text-sm text-white outline-none focus:border-primary-coral transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-neutral-body opacity-50 pl-4">Message</label>
                    <textarea rows="5" placeholder="How can we help you?" class="w-full bg-primary-dark border border-white/5 rounded-2xl px-6 py-4 font-bold text-sm text-white outline-none focus:border-primary-coral transition-all resize-none"></textarea>
                </div>
                <button type="submit" class="w-full bg-primary-coral text-white py-6 rounded-2xl font-black text-[10px] uppercase tracking-[0.3em] shadow-2xl shadow-primary-coral/20 hover:opacity-90 active:scale-95 transition-all">Send Message</button>
            </form>
        </div>

        <!-- Location Card -->
        <div class="flex flex-col space-y-8">
            <div class="bg-neutral-card rounded-[3rem] p-10 shadow-2xl border border-white/5 flex-grow relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary-coral/5 rounded-full translate-x-1/2 -translate-y-1/2"></div>
                
                <h3 class="text-3xl font-black text-neutral-heading mb-8 uppercase tracking-tighter">Visit Headquarters</h3>
                <p class="text-neutral-body text-sm font-bold leading-relaxed mb-12">
                    We are located in the heart of Kigali at Imela House, ensuring accessibility for all our clients. Visit us for professional financial advice.
                </p>

                <div class="space-y-8">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-primary-navy flex items-center justify-center text-primary-coral flex-shrink-0"><i class="fas fa-map-marked-alt"></i></div>
                        <div>
                            <h4 class="text-xs font-black uppercase tracking-widest text-neutral-heading mb-1">Address</h4>
                            <p class="text-sm text-neutral-body">KK 10 Ave, Imela house, 5th floor, Kigali, Rwanda</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-primary-navy flex items-center justify-center text-accent-teal flex-shrink-0"><i class="fas fa-clock"></i></div>
                        <div>
                            <h4 class="text-xs font-black uppercase tracking-widest text-neutral-heading mb-1">Business Hours</h4>
                            <p class="text-sm text-neutral-body">Monday - Friday: 9:00 AM - 5:00 PM</p>
                            <p class="text-sm text-neutral-body">Weekend: Closed</p>
                        </div>
                    </div>
                </div>

                <div class="mt-16 pt-10 border-t border-white/5">
                    <p class="text-[10px] font-black text-primary-coral uppercase tracking-widest flex items-center gap-2 italic">
                        <i class="fas fa-info-circle"></i>
                        Next day disbursement available for verified applications.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/bottom_nav.php'; ?>
<?php include 'includes/footer.php'; ?>
