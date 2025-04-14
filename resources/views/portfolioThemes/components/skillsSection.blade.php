<!-- Skills Section -->
<section id="skills" class="py-20 bg-light-card dark:bg-dark-card">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-900 dark:text-white">Skills & Expertise</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($skills as $skill)
            <div class="group">
                <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-4 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <img src="{{ asset('storage/' . $skill['image']) }}" alt="{{ $skill['name'] }}" class="w-8 h-8 object-contain">
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $skill['name'] }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">{{ $skill['desc'] }}</p>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="bg-primary h-2 rounded-full" style="width: 90%"></div> {{-- Replace 90% with dynamic value if available --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
