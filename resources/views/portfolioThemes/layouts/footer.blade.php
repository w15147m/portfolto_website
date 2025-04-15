<footer class="bg-light-card dark:bg-dark-card py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-4 scroll-animate fade-in-up">
                <h3 class="text-xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">Portfolio</h3>
                <p class="text-gray-600 dark:text-gray-400">Creating digital experiences with passion and purpose.</p>
            </div>
            <div class="scroll-animate fade-in-up" style="transition-delay: 0.1s">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#home" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Home</a></li>
                    <li><a href="#about" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">About</a></li>
                    <li><a href="#projects" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Projects</a></li>
                    <li><a href="#contact" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Contact</a></li>
                </ul>
            </div>
            <div class="scroll-animate fade-in-up" style="transition-delay: 0.2s">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Connect</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">GitHub</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">LinkedIn</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Twitter</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Instagram</a></li>
                </ul>
            </div>
            <div class="scroll-animate fade-in-up" style="transition-delay: 0.3s">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Contact Info</h4>
                <ul class="space-y-2">
                    <li class="text-gray-600 dark:text-gray-400">hello@example.com</li>
                    <li class="text-gray-600 dark:text-gray-400">+1 (555) 123-4567</li>
                    <li class="text-gray-600 dark:text-gray-400">Remote, Worldwide</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-200 dark:border-gray-700 mt-8 pt-8 text-center scroll-animate fade-in-up" style="transition-delay: 0.4s">
            <p class="text-gray-600 dark:text-gray-400">&copy; 2024 Your Name. All rights reserved.</p>
        </div>
    </div>
</footer>

<style>
    /* Scroll animation styles for footer section */
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
