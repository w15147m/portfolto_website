<!-- Projects Section -->
<section id="projects" class="py-20 bg-light-bg dark:bg-dark-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-900 dark:text-white scroll-animate fade-in-down">Featured Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($projects as $project)
                <div
                    class="group bg-light-card dark:bg-dark-card rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 hover:z-10 relative scroll-animate fade-in-up"
                    style="transition-delay: {{ $loop->index * 0.1 }}s">
                    <div class="relative overflow-hidden">
                        @php
                            $firstImage = $project['images'][0]['image'] ?? null;
                        @endphp

                        @if ($firstImage)
                            <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $project['name'] }}"
                                class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                                No image available
                            </div>
                        @endif
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-0 group-hover:opacity-75 transition-opacity flex items-end justify-start p-6">
                            <div class="text-white">
                                <h3 class="text-xl font-semibold">{{ $project['name'] }}</h3>
                                <p class="text-sm">{{ $project['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($project['skills'] as $skill)
                                <span
                                    class="px-3 py-1 bg-primary/10 dark:bg-primary/20 text-primary rounded-full text-sm">
                                    {{ $skill['name'] }}
                                </span>
                            @endforeach
                        </div>
                        @if ($project['link'])
                            <a href="{{ $project['link'] }}"
                                class="inline-flex items-center text-primary hover:text-secondary transition-colors">
                                View Project <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        @else
                            <span class="inline-flex items-center text-gray-500">
                                <a href="#" class="inline-flex items-center text-primary hover:text-secondary transition-colors">
                                    View Project <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    /* Scroll animation styles for projects section */
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
