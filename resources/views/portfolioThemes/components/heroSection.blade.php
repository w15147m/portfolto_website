<!-- Hero Section -->
<section id="home" class="min-h-screen pt-16 custom-shape bg-gradient-to-br from-primary/10 to-secondary/10 dark:from-primary/20 dark:to-secondary/20 relative overflow-hidden">
    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden" id="parallaxContainer">
        <div class="circle w-64 h-64 bg-primary/10 dark:bg-primary/20 rounded-full absolute -top-20 -left-20" data-speed="0.04" data-float-delay="0"></div>
        <div class="circle w-48 h-48 bg-secondary/10 dark:bg-secondary/20 rounded-full absolute top-1/3 -right-10" data-speed="0.06" data-float-delay="1"></div>
        <div class="circle w-32 h-32 bg-primary/10 dark:bg-primary/20 rounded-full absolute bottom-20 left-1/4" data-speed="0.08" data-float-delay="2"></div>
        <div class="circle w-24 h-24 bg-secondary/10 dark:bg-secondary/20 rounded-full absolute bottom-40 right-1/3" data-speed="0.05" data-float-delay="3"></div>
        <div class="circle w-16 h-16 bg-primary/15 dark:bg-primary/25 rounded-full absolute top-40 left-1/3" data-speed="0.07" data-float-delay="1.5"></div>
        <div class="circle w-20 h-20 bg-secondary/15 dark:bg-secondary/25 rounded-full absolute top-60 right-1/4" data-speed="0.09" data-float-delay="0.5"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left">
                <div class="relative inline-block scroll-animate fade-in-down">
                    <span class="absolute inset-0 bg-gradient-to-r from-primary to-secondary blur-2xl opacity-30 dark:opacity-40 animate-pulse"></span>
                    <h1 class="relative text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                        {{ $profile->name}}
                    </h1>
                </div>
                <p class="text-xl text-gray-600 dark:text-gray-400 mb-8 scroll-animate fade-in-up" style="transition-delay: 0.1s">
                    {{ $profile->desc}}
                </p>
                <div class="flex flex-wrap justify-center lg:justify-start gap-4 scroll-animate fade-in-up" style="transition-delay: 0.2s">
                    <a href="#contact" class="px-8 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-lg hover:shadow-lg hover:shadow-primary/50 dark:hover:shadow-primary/40 transition-all duration-300 transform hover:-translate-y-1">
                        Start a Project
                    </a>
                    <a href="#projects" class="px-8 py-3 border-2 border-gray-800 dark:border-white text-gray-800 dark:text-white rounded-lg hover:bg-gray-800 hover:text-white dark:hover:bg-white dark:hover:text-gray-800 transition-all duration-300 transform hover:-translate-y-1">
                        View Work
                    </a>
                </div>
            </div>
            <div class="relative scroll-animate fade-in-up" style="transition-delay: 0.3s">
                <div class="absolute inset-0 bg-gradient-to-r from-primary rounded-full blur-3xl opacity-20 animate-pulse"></div>
                <img src="{{ 'storage/'.$profile->image }}" alt="Profile Picture" class="relative transform transition-all duration-500 hover:scale-105 hover:shadow-primary/50 dark:hover:shadow-primary/40">
            </div>
        </div>
    </div>
</section>

<style>
    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 15s ease infinite;
    }
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .custom-shape {
        clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
    }

    /* Scroll animation styles */
    .scroll-animate {
        opacity: 0;
        transition: all 0.4s ease-out;
    }
    
    .fade-in-down {
        transform: translateY(150px);
    }
    
    .fade-in-up {
        transform: translateY(150px);
    }
    
    .scroll-animate.visible {
        opacity: 1;
        transform: translate(0, 0);
    }

    /* Circle animations */
    .circle {
        transition: transform 0.8s cubic-bezier(0.25, 0.1, 0.25, 1);
        will-change: transform;
        position: absolute;
    }

    /* Scroll Progress */
    .scroll-progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(to right, #8B5CF6, #6D28D9);
        transform-origin: 0%;
        z-index: 1000;
    }

    /* Back to Top Button */
    .back-to-top {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background: #8B5CF6;
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1000;
    }
    .back-to-top.visible {
        opacity: 1;
    }
    .back-to-top:hover {
        background: #6D28D9;
    }
    
    /* New animations */
    .animate-spin-slow {
        animation: spin 8s linear infinite;
    }
    
    .animate-float-slow {
        animation: float 8s ease-in-out infinite;
    }
    
    .animate-float-medium {
        animation: float 6s ease-in-out infinite;
    }
    
    .animate-float-fast {
        animation: float 4s ease-in-out infinite;
    }
    
    @keyframes float {
        0% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0); }
    }
    
    .floating-circle {
        transition: all 0.5s ease;
    }
    
    /* Parallax effect for the circles */
    .parallax-circle {
        will-change: transform;
        transition: transform 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        position: absolute;
    }
    
    #parallaxContainer {
        position: absolute;
        inset: 0;
        overflow: hidden;
        pointer-events: none;
    }
    
    /* Remove float animations since we'll use JS for random movement */
    .animate-float-slow,
    .animate-float-medium,
    .animate-float-fast {
        animation: none;
    }

    /* Enhanced animations for the circles */
    .circle {
        transition: transform 0.6s cubic-bezier(0.25, 0.1, 0.25, 1);
        will-change: transform;
        position: absolute;
    }
    
    #parallaxContainer {
        position: absolute;
        inset: 0;
        overflow: hidden;
        pointer-events: none;
    }
    
    @keyframes float-up-down {
        0% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0); }
    }
    
    @keyframes float-left-right {
        0% { transform: translateX(0); }
        50% { transform: translateX(20px); }
        100% { transform: translateX(0); }
    }
    
    @keyframes float-diagonal {
        0% { transform: translate(0, 0); }
        25% { transform: translate(15px, -15px); }
        50% { transform: translate(0, -20px); }
        75% { transform: translate(-15px, -5px); }
        100% { transform: translate(0, 0); }
    }

    /* Enhanced animations for the circles with larger movement */
    .circle {
        transition: transform 0.8s cubic-bezier(0.25, 0.1, 0.25, 1);
        will-change: transform;
        position: absolute;
    }
    
    #parallaxContainer {
        position: absolute;
        inset: 0;
        overflow: hidden;
        pointer-events: none;
    }
    
    @keyframes float-up-down {
        0% { transform: translateY(0); }
        50% { transform: translateY(-60px); }
        100% { transform: translateY(0); }
    }
    
    @keyframes float-left-right {
        0% { transform: translateX(0); }
        50% { transform: translateX(60px); }
        100% { transform: translateX(0); }
    }
    
    @keyframes float-diagonal {
        0% { transform: translate(0, 0); }
        25% { transform: translate(45px, -45px); }
        50% { transform: translate(0, -60px); }
        75% { transform: translate(-45px, -15px); }
        100% { transform: translate(0, 0); }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Parallax effect for circles
    const parallaxContainer = document.getElementById('parallaxContainer');
    const circles = document.querySelectorAll('.circle');
    
    // Mouse move parallax effect
    document.addEventListener('mousemove', function(e) {
        const mouseX = e.clientX / window.innerWidth - 0.5;
        const mouseY = e.clientY / window.innerHeight - 0.5;
        
        circles.forEach(circle => {
            const speed = parseFloat(circle.getAttribute('data-speed'));
            const moveX = mouseX * speed * 100;
            const moveY = mouseY * speed * 100;
            
            circle.style.transform = `translate(${moveX}px, ${moveY}px)`;
        });
    });

    // Scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            } else {
                entry.target.classList.remove('visible');
            }
        });
    }, {
        threshold: 0.2,
        rootMargin: '0px 0px -50px 0px'
    });

    const animatedElements = document.querySelectorAll('.scroll-animate');
    animatedElements.forEach(el => {
        observer.observe(el);
    });

    // Scroll progress indicator
    const scrollProgress = document.createElement('div');
    scrollProgress.className = 'scroll-progress';
    document.body.appendChild(scrollProgress);
    
    window.addEventListener('scroll', function() {
        const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.scrollY / windowHeight) * 100;
        scrollProgress.style.transform = `scaleX(${scrolled / 100})`;
    });
    
    // Back to top button
    const backToTop = document.createElement('div');
    backToTop.className = 'back-to-top';
    backToTop.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>';
    document.body.appendChild(backToTop);
    
    backToTop.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Show/hide back to top button
    window.addEventListener('scroll', function() {
        if (window.scrollY > 500) {
            backToTop.classList.add('visible');
        } else {
            backToTop.classList.remove('visible');
        }
    });
});
</script>