<!-- Services Section -->
<section id="services" class="py-20 bg-light-bg dark:bg-dark-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-900 dark:text-white scroll-animate fade-in-down">Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portfolios->services as $service)
            <div class="group scroll-animate fade-in-up" style="transition-delay: {{ $loop->index * 0.1 }}s">
                <div class="bg-light-card dark:bg-dark-card rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 hover:z-10 relative h-full">
                    <div class="w-16 h-16 mx-auto mb-4 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center">
                        <img src="{{ $service->image }}" alt="{{ $service->name }}" class="w-8 h-8 object-contain">
                    </div>
                    <h3 class="text-xl font-semibold text-center text-gray-900 dark:text-white mb-3">{{ $service->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center">{{ $service->desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    /* Scroll animation styles for services section */
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