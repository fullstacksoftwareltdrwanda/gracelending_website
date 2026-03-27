<?php
$currentPage = getCurrentPage();
?>
<div class="md:hidden fixed bottom-0 left-0 w-full bg-primary-dark/95 backdrop-blur-lg border-t border-white/5 z-50 flex justify-around items-center py-4 shadow-2xl">
    <a href="index.php" class="flex flex-col items-center <?php echo $currentPage == 'index.php' ? 'text-primary-coral' : 'text-neutral-body/40'; ?> group transition-all">
        <i class="fas fa-home text-lg"></i>
    </a>
    <a href="services.php" class="flex flex-col items-center <?php echo $currentPage == 'services.php' ? 'text-primary-coral' : 'text-neutral-body/40'; ?> group transition-all">
        <i class="fas fa-briefcase text-lg"></i>
    </a>
    <a href="apply.php" class="flex items-center justify-center -translate-y-6">
        <div class="bg-primary-coral text-white p-5 rounded-full shadow-2xl shadow-primary-coral/40 border-8 border-primary-dark">
            <i class="fas fa-plus text-xl"></i>
        </div>
    </a>
    <a href="team.php" class="flex flex-col items-center <?php echo $currentPage == 'team.php' ? 'text-primary-coral' : 'text-neutral-body/40'; ?> group transition-all">
        <i class="fas fa-users text-lg"></i>
    </a>
    <a href="contact.php" class="flex flex-col items-center <?php echo $currentPage == 'contact.php' ? 'text-primary-coral' : 'text-neutral-body/40'; ?> group transition-all">
        <i class="fas fa-envelope text-lg"></i>
    </a>
</div>
