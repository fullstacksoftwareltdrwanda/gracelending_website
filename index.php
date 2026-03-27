<?php include 'includes/head.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- Hero Section -->
<section class="min-h-screen flex items-center relative overflow-hidden pt-20">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-primary-dark/95 z-10"></div>
        <img src="images/banner.jpg" class="w-full h-full object-cover" alt="Grace Lending Banner">
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
        <div class="max-w-3xl">
            <h1 class="text-6xl md:text-8xl font-black text-neutral-heading mb-8 tracking-tighter leading-none animate-in">
                Smart Lending <br> <span class="text-primary-coral">Fast Capital</span>
            </h1>
            <p class="text-lg md:text-xl text-neutral-body mb-12 max-w-xl font-medium leading-relaxed">
                Empowering your financial future with tailored loan solutions. From personal needs to business expansion, we are your trusted partner.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="apply.php" class="bg-primary-coral hover:bg-opacity-90 text-white px-10 py-5 rounded-2xl font-black text-xs tracking-widest transition-all shadow-2xl shadow-primary-coral/20">APPLY NOW</a>
                <a href="services.php" class="bg-white/5 hover:bg-white/10 backdrop-blur-md text-white px-10 py-5 rounded-2xl font-black text-xs tracking-widest transition-all border border-white/10">OUR SERVICES</a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-neutral-card shadow-2xl relative z-20 -mt-10 mx-4 rounded-[2.5rem] max-w-6xl md:mx-auto border border-white/5">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 px-8">
        <div class="text-center group hover:scale-105 transition-transform duration-300">
            <div class="text-3xl font-black text-primary-coral mb-1 uppercase tracking-tighter">98%</div>
            <p class="text-neutral-body text-[10px] font-black uppercase tracking-widest">Approval Rate</p>
        </div>
        <div class="text-center group hover:scale-105 transition-transform duration-300 md:border-l border-white/10">
            <div class="text-3xl font-black text-accent-teal mb-1 uppercase tracking-tighter">24h</div>
            <p class="text-neutral-body text-[10px] font-black uppercase tracking-widest">Processing Time</p>
        </div>
        <div class="text-center group hover:scale-105 transition-transform duration-300 md:border-l border-white/10">
            <div class="text-3xl font-black text-accent-gold mb-1 uppercase tracking-tighter">5000+</div>
            <p class="text-neutral-body text-[10px] font-black uppercase tracking-widest">Happy Clients</p>
        </div>
        <div class="text-center group hover:scale-105 transition-transform duration-300 md:border-l border-white/10">
            <div class="text-3xl font-black text-primary-coral mb-1 uppercase tracking-tighter">5.5%</div>
            <p class="text-neutral-body text-[10px] font-black uppercase tracking-widest">Monthly Interest</p>
        </div>
    </div>
</section>

<!-- Loan categories -->
<section class="py-32 bg-primary-dark relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 text-neutral-heading">
            <h2 class="text-4xl font-black uppercase tracking-tight">Financial Solutions</h2>
            <p class="text-neutral-body mt-4">Tailored loan products for every stage of your journey</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Personal Loans -->
            <div class="group p-8 rounded-[2.5rem] bg-neutral-card border border-white/5 hover:border-primary-coral/30 transition-all duration-500">
                <div class="w-16 h-16 bg-primary-coral/10 rounded-2xl flex items-center justify-center mb-8 text-primary-coral group-hover:scale-110 transition-transform">
                    <i class="fas fa-user-circle text-2xl"></i>
                </div>
                <h3 class="text-xl font-black text-neutral-heading mb-4">Personal Loans</h3>
                <p class="text-neutral-body text-sm leading-relaxed mb-8">Quick financial assistance for your everyday personal needs and emergencies.</p>
                <div class="h-1 w-12 bg-primary-coral opacity-20"></div>
            </div>

            <!-- Business Loans -->
            <div class="group p-8 rounded-[2.5rem] bg-neutral-card border border-white/5 hover:border-accent-teal/30 transition-all duration-500">
                <div class="w-16 h-16 bg-accent-teal/10 rounded-2xl flex items-center justify-center mb-8 text-accent-teal group-hover:scale-110 transition-transform">
                    <i class="fas fa-building text-2xl"></i>
                </div>
                <h3 class="text-xl font-black text-neutral-heading mb-4">Business (SME)</h3>
                <p class="text-neutral-body text-sm leading-relaxed mb-8">Supporting small and medium enterprises with capital for expansion and operations.</p>
                <div class="h-1 w-12 bg-accent-teal opacity-20"></div>
            </div>

            <!-- Salary Loans -->
            <div class="group p-8 rounded-[2.5rem] bg-neutral-card border border-white/5 hover:border-accent-gold/30 transition-all duration-500">
                <div class="w-16 h-16 bg-accent-gold/10 rounded-2xl flex items-center justify-center mb-8 text-accent-gold group-hover:scale-110 transition-transform">
                    <i class="fas fa-wallet text-2xl"></i>
                </div>
                <h3 class="text-xl font-black text-neutral-heading mb-4">Salary Loans</h3>
                <p class="text-neutral-body text-sm leading-relaxed mb-8">Access funds against your salary with convenient monthly repayments.</p>
                <div class="h-1 w-12 bg-accent-gold opacity-20"></div>
            </div>
        </div>
        
        <div class="flex justify-center mt-16">
            <a href="services.php" class="text-sm font-black text-primary-coral uppercase tracking-widest hover:tracking-[0.2em] transition-all">Explore All Services <i class="fas fa-arrow-right ml-2"></i></a>
        </div>
    </div>
</section>

<!-- Why Choose Us / Accounting Image Section -->
<section class="py-24 bg-primary-navy border-y border-white/5 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 20% 50%, #FF6B4A 0%, transparent 60%), radial-gradient(circle at 80% 50%, #006D77 0%, transparent 60%);"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Image side -->
            <div class="relative">
                <div class="rounded-[3rem] overflow-hidden shadow-2xl border border-white/5 aspect-[4/3]">
                    <img
                        src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&auto=format&fit=crop&q=80"
                        alt="Professional accounting and finance"
                        class="w-full h-full object-cover"
                        loading="lazy"
                        onerror="this.src='https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=800&auto=format&fit=crop&q=80'"
                    >
                </div>
                <!-- Floating badge -->
                <div class="absolute -bottom-6 -right-6 bg-primary-coral text-white px-8 py-6 rounded-3xl shadow-2xl shadow-primary-coral/30 text-center">
                    <div class="text-3xl font-black">5.5%</div>
                    <div class="text-[9px] font-black uppercase tracking-widest opacity-80 mt-1">Monthly Rate</div>
                </div>
            </div>

            <!-- Content side -->
            <div class="space-y-8">
                <div>
                    <p class="text-[10px] font-black text-primary-coral uppercase tracking-[0.3em] mb-4">Why Grace Lending?</p>
                    <h2 class="text-4xl md:text-5xl font-black text-neutral-heading tracking-tighter leading-tight">
                        Professional <span class="text-primary-coral">Financial</span> Services You Can Trust
                    </h2>
                </div>
                <p class="text-neutral-body leading-relaxed">
                    We combine modern financial technology with personalized service to deliver loan solutions that match your unique needs. Our team of experts ensures a smooth, transparent process from application to disbursement.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-5 bg-white/5 rounded-2xl border border-white/5">
                        <div class="w-10 h-10 rounded-xl bg-accent-teal/10 flex items-center justify-center text-accent-teal flex-shrink-0">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div>
                            <h4 class="font-black text-neutral-heading text-sm mb-1">Fast Processing</h4>
                            <p class="text-xs text-neutral-body opacity-70">Applications reviewed within 24 hours with next-day disbursement for qualified clients.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-5 bg-white/5 rounded-2xl border border-white/5">
                        <div class="w-10 h-10 rounded-xl bg-primary-coral/10 flex items-center justify-center text-primary-coral flex-shrink-0">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-black text-neutral-heading text-sm mb-1">Secure & Transparent</h4>
                            <p class="text-xs text-neutral-body opacity-70">No hidden fees. Every term is clearly explained before you sign.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-5 bg-white/5 rounded-2xl border border-white/5">
                        <div class="w-10 h-10 rounded-xl bg-accent-gold/10 flex items-center justify-center text-accent-gold flex-shrink-0">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div>
                            <h4 class="font-black text-neutral-heading text-sm mb-1">Dedicated Support</h4>
                            <p class="text-xs text-neutral-body opacity-70">Our team is available to guide you through every step of your loan journey.</p>
                        </div>
                    </div>
                </div>
                <a href="apply.php" class="inline-flex items-center gap-3 bg-primary-coral text-white px-10 py-5 rounded-2xl font-black text-[10px] uppercase tracking-widest shadow-2xl shadow-primary-coral/20 hover:opacity-90 transition-all">
                    Apply Now <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-32 bg-primary-navy relative overflow-hidden border-t border-white/5">
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary-coral opacity-5 rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-accent-teal opacity-5 rounded-full -translate-x-1/2 translate-y-1/2 blur-3xl"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-5xl md:text-6xl font-black text-neutral-heading mb-8 tracking-tighter">Ready for liftoff?</h2>
        <p class="text-lg text-neutral-body mb-12 max-w-2xl mx-auto leading-relaxed">Join thousands who have scaled their dreams with Grace Lending Services' optimized capital solutions.</p>
        <a href="apply.php" class="inline-block bg-primary-coral hover:bg-opacity-90 text-white px-12 py-6 rounded-2xl font-black text-xs tracking-[0.25em] transition-all shadow-2xl shadow-primary-coral/20">GET STARTED NOW</a>
    </div>
</section>

<?php include 'includes/bottom_nav.php'; ?>
<?php include 'includes/footer.php'; ?>
