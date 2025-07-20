<!-- Experience Section -->
<section id="experience" class="py-20 bg-light-bg dark:bg-dark-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-900 dark:text-white scroll-animate fade-in-down">Work Experience</h2>
        
        @if(isset($portfolios->experience) && count($portfolios->experience) > 0)
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-0.5 bg-gradient-to-b from-primary to-secondary"></div>
                
                <!-- Experience Items -->
                <div class="space-y-16">
                    @foreach($portfolios->experience as $experience)
                        <div class="relative group scroll-animate fade-in-up" style="transition-delay: {{ $loop->index * 0.1 }}s">
                            <!-- Timeline Dot -->
                            <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-4 h-4 bg-primary rounded-full shadow-lg border-2 border-white dark:border-dark-bg z-20"></div>
                            
                            <!-- Experience Card -->
                            <div class="relative {{ $loop->iteration % 2 == 0 ? 'ml-auto pl-8' : 'mr-auto pr-8' }} w-full md:w-[calc(50%-2rem)]">
                                <div class="bg-light-card dark:bg-dark-card rounded-xl p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                                    <!-- Company Logo/Icon -->
                                    <div class="w-12 h-12 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-briefcase text-xl text-primary"></i>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="space-y-3">
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                            {{ $experience->position ?? 'Position' }}
                                        </h3>
                                        <div class="text-primary font-medium">
                                            {{ $experience->company ?? 'Company Name' }}
                                        </div>
                                        
                                        <!-- Date Range -->
                                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                            <i class="far fa-calendar-alt mr-2"></i>
                                            <span>{{ $experience->start_date ?? 'Start Date' }} - {{ $experience->end_date ?? 'Present' }}</span>
                                        </div>
                                        
                                        <!-- Description -->
                                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                            {{ $experience->description ?? 'Description of responsibilities and achievements.' }}
                                        </p>
                                        
                                        <!-- Skills/Technologies Used -->
                                        @if(isset($experience->skills) && count($experience->skills) > 0)
                                            <div class="flex flex-wrap gap-2 mt-4">
                                                @foreach($experience->skills as $skill)
                                                    <span class="px-3 py-1 bg-primary/10 dark:bg-primary/20 text-primary rounded-full text-sm">
                                                        {{ $skill }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center text-gray-600 dark:text-gray-400 scroll-animate fade-in-up">
                <div class="w-20 h-20 mx-auto mb-4 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-briefcase text-3xl text-primary"></i>
                </div>
                <p>No experience data available.</p>
            </div>
        @endif
    </div>
</section>

<style>
    /* Scroll animation styles for experience section */
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