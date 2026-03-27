<?php
$currentPage = getCurrentPage();
?>
<nav class="fixed top-0 left-0 w-full z-50 nav-transition">
    <!-- Top Contact Pop Bar -->
    <div class="bg-primary-navy text-white/70 py-2 shadow-lg border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between items-center text-[9px] font-black tracking-[0.2em] uppercase">
                <!-- Location -->
                <div class="flex items-center space-x-6">
                    <div class="flex items-center gap-2 group cursor-pointer">
                        <i class="fas fa-map-marker-alt text-primary-coral"></i>
                        <span style="display:inline;">KK 10 Ave, Imela house, 5th floor</span>
                    </div>
                </div>

                <!-- Phone & Email -->
                <div class="flex items-center space-x-6 ml-auto sm:ml-0">
                    <a href="tel:+250788854767" class="flex items-center gap-2 hover:text-white transition-colors">
                        <i class="fas fa-phone-alt text-primary-coral"></i>
                        <span>0788854767</span>
                    </a>
                    <a href="mailto:gracelendingrw@gmail.com" style="display:flex;" class="items-center gap-2 hover:text-white transition-colors lowercase tracking-normal font-bold">
                        <i class="fas fa-envelope text-primary-coral"></i>
                        <span>gracelendingrw@gmail.com</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <div class="bg-primary-dark/90 backdrop-blur-xl border-b border-white/5 h-20 transition-all duration-300" id="main-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between items-center h-full">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="index.php" class="flex items-center space-x-3">
                        <img src="images/gracelandinglogo.png" alt="Grace Lending" class="h-10 w-auto">
                        <div class="flex flex-col">
                            <span class="text-neutral-heading font-black text-lg leading-none tracking-tighter uppercase">Grace Lending</span>
                            <span class="text-[7px] text-primary-coral font-black tracking-[0.3em] uppercase mt-1 opacity-80">Capital optimized</span>
                        </div>
                    </a>
                </div>

                <!-- Nav Links -->
                <div class="desktop-nav" style="display:flex; align-items:center; gap:0.5rem;">
                    <a href="index.php" class="px-5 py-2 rounded-xl <?php echo $currentPage == 'index.php' ? 'text-primary-coral bg-primary-coral/5' : 'text-neutral-body hover:text-white hover:bg-white/5'; ?> font-black text-[10px] uppercase tracking-widest transition-all">Home</a>
                    <a href="services.php" class="px-5 py-2 rounded-xl <?php echo $currentPage == 'services.php' ? 'text-primary-coral bg-primary-coral/5' : 'text-neutral-body hover:text-white hover:bg-white/5'; ?> font-black text-[10px] uppercase tracking-widest transition-all">Services</a>
                    <a href="requirements.php" class="px-5 py-2 rounded-xl <?php echo $currentPage == 'requirements.php' ? 'text-primary-coral bg-primary-coral/5' : 'text-neutral-body hover:text-white hover:bg-white/5'; ?> font-black text-[10px] uppercase tracking-widest transition-all">Requirements</a>
                    <a href="team.php" class="px-5 py-2 rounded-xl <?php echo $currentPage == 'team.php' ? 'text-primary-coral bg-primary-coral/5' : 'text-neutral-body hover:text-white hover:bg-white/5'; ?> font-black text-[10px] uppercase tracking-widest transition-all">Leadership</a>
                    <a href="contact.php" class="px-5 py-2 rounded-xl <?php echo $currentPage == 'contact.php' ? 'text-primary-coral bg-primary-coral/5' : 'text-neutral-body hover:text-white hover:bg-white/5'; ?> font-black text-[10px] uppercase tracking-widest transition-all">Contact</a>
                    
                    <div class="h-6 w-[1px] bg-white/10 mx-6"></div>

                    <a href="apply.php" class="bg-primary-coral text-white px-8 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:opacity-90 shadow-2xl shadow-primary-coral/20 transition-all">Apply Now</a>
                    <a href="app.gracelending/login.php" target="_blank" class="p-3 text-neutral-body hover:text-white transition-colors" title="System Portal">
                        <i class="fas fa-lock text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="h-[116px]"></div>

<script>
    window.addEventListener('scroll', function() {
        const mainNav = document.getElementById('main-nav');
        if (window.scrollY > 40) {
            mainNav.classList.add('h-16', 'bg-primary-dark/95');
            mainNav.classList.remove('h-20', 'bg-primary-dark/90');
        } else {
            mainNav.classList.add('h-20', 'bg-primary-dark/90');
            mainNav.classList.remove('h-16', 'bg-primary-dark/95');
        }
    });
</script>
