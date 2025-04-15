<!-- Education Section -->
<section id="education" class="py-20 bg-light-card dark:bg-dark-card">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-900 dark:text-white scroll-animate fade-in-down">Education</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($portfolios->education as $education)
            <div class="group scroll-animate fade-in-up" style="transition-delay: {{ $loop->index * 0.1 }}s">
                <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 hover:z-10 relative">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-graduation-cap text-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $education->institution }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $education->degree }} in {{ $education->field_of_study }}</p>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400 mb-4">
                        <i class="far fa-calendar-alt mr-2"></i>
                        <span>{{ \Carbon\Carbon::parse($education->start_date)->format('M Y') }} - {{ \Carbon\Carbon::parse($education->end_date)->format('M Y') }}</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400">{{ $education->desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    /* Scroll animation styles for education section */
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