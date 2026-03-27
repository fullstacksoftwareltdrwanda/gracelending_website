<!-- Marquee Section -->
<div class="bg-primary-navy border-b border-white/5 py-3 relative overflow-hidden">
    <div class="flex whitespace-nowrap animate-marquee">
        <div class="flex items-center space-x-12 px-12">
            <span class="text-[10px] font-black text-white/40 uppercase tracking-[0.2em] flex items-center gap-2">
                <i class="fas fa-bolt text-primary-coral"></i> Fast Approval
            </span>
            <span class="text-[10px] font-black text-white/40 uppercase tracking-[0.2em] flex items-center gap-2">
                <i class="fas fa-shield-alt text-accent-teal"></i> Secure Lending
            </span>
            <span class="text-[10px] font-black text-white/40 uppercase tracking-[0.2em] flex items-center gap-2">
                <i class="fas fa-percentage text-accent-gold"></i> Competitive Rates
            </span>
            <span class="text-[10px] font-black text-white/40 uppercase tracking-[0.2em] flex items-center gap-2">
                <i class="fas fa-clock text-primary-coral"></i> 24h Processing
            </span>
            <span class="text-[10px] font-black text-white/40 uppercase tracking-[0.2em] flex items-center gap-2">
                <i class="fas fa-user-check text-accent-teal"></i> Personalized Service
            </span>
        </div>
        <!-- Duplicate for seamless loop -->
        <div class="flex items-center space-x-12 px-12">
            <span class="text-[10px] font-black text-white/40 uppercase tracking-[0.2em] flex items-center gap-2">
                <i class="fas fa-bolt text-primary-coral"></i> Fast Approval
            </span>
            <span class="text-[10px] font-black text-white/40 uppercase tracking-[0.2em] flex items-center gap-2">
                <i class="fas fa-shield-alt text-accent-teal"></i> Secure Lending
            </span>
            <span class="text-[10px] font-black text-white/40 uppercase tracking-[0.2em] flex items-center gap-2">
                <i class="fas fa-percentage text-accent-gold"></i> Competitive Rates
            </span>
            <span class="text-[10px] font-black text-white/40 uppercase tracking-[0.2em] flex items-center gap-2">
                <i class="fas fa-clock text-primary-coral"></i> 24h Processing
            </span>
            <span class="text-[10px] font-black text-white/40 uppercase tracking-[0.2em] flex items-center gap-2">
                <i class="fas fa-user-check text-accent-teal"></i> Personalized Service
            </span>
        </div>
    </div>
</div>

<style>
@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    display: inline-flex;
    animation: marquee 30s linear infinite;
}
</style>
