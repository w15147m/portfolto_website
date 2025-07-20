    <!-- About Section -->
    <section id="about" class="py-20 bg-light-card dark:bg-dark-card">
       {{-- {{$profile->experience}} --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900 dark:text-white scroll-animate fade-in-down">About Me</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative group scroll-animate fade-in-left">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary rounded-2xl blur-xl opacity-20 group-hover:opacity-30 transition-all duration-500 ease-in-out transform group-hover:scale-105"></div>
                    <div class="w-1oo flex justify-center">
                        <img src="{{ 'storage/'.$profile->image }}" alt="About Me" class="relative  duration-500 hover:scale-105">
                    </div>
                </div>
                <div class="space-y-6 scroll-animate fade-in-right">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white hover:text-primary transition-colors duration-300">Who am I?</h3>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ $profile->desc}}
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-4 shadow-lg transform transition-all duration-300 hover:scale-110 hover:shadow-xl hover:bg-primary/5 hover:z-10 relative">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Experience</h4>
                            <p class="text-gray-600 dark:text-gray-400">5+ Years</p>
                        </div>
                        <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-4 shadow-lg transform transition-all duration-300 hover:scale-110 hover:shadow-xl hover:bg-primary/5 hover:z-10 relative">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Projects</h4>
                            <p class="text-gray-600 dark:text-gray-400">50+ Completed</p>
                        </div>
                        <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-4 shadow-lg transform transition-all duration-300 hover:scale-110 hover:shadow-xl hover:bg-primary/5 hover:z-10 relative">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Clients</h4>
                            <p class="text-gray-600 dark:text-gray-400">30+ Happy Clients</p>
                        </div>
                        <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-4 shadow-lg transform transition-all duration-300 hover:scale-110 hover:shadow-xl hover:bg-primary/5 hover:z-10 relative">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Location</h4>
                            <p class="text-gray-600 dark:text-gray-400">{{ $profile->address}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<style>
    /* Scroll animation styles */
    .scroll-animate {
        opacity: 0;
        transition: all 0.4s ease-out;
    }
    
    .fade-in-down {
        transform: translateY(150px);
    }
    
    .fade-in-left {
        transform: translateX(-150px);
    }
    
    .fade-in-right {
        transform: translateX(150px);
    }
    
    .scroll-animate.visible {
        opacity: 1;
        transform: translate(0, 0);
    }
    
    /* Add a slight delay to each element for a staggered effect */
    .scroll-animate:nth-child(2) {
        transition-delay: 0.1s;
    }
    
    .scroll-animate:nth-child(3) {
        transition-delay: 0.2s;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Create the Intersection Observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                // Add the 'visible' class when the element is in view
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                } else {
                    // Remove the 'visible' class when the element is out of view
                    // This will reset the animation for the next time it comes into view
                    entry.target.classList.remove('visible');
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        });

        // Select all elements with the scroll-animate class
        const animatedElements = document.querySelectorAll('.scroll-animate');
        
        // Observe each element
        animatedElements.forEach(el => {
            observer.observe(el);
        });
    });
</script>