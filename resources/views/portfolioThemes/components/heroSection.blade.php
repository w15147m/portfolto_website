<!-- Hero Section -->
<section id="home" class="min-h-screen pt-16 custom-shape bg-gradient-to-br from-primary/10 to-secondary/10 dark:from-primary/20 dark:to-secondary/20">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left">
                <div class="relative inline-block">
                    <span class="absolute inset-0 bg-gradient-to-r from-primary to-secondary blur-2xl opacity-30 dark:opacity-40"></span>
                    <h1 class="relative text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                        {{ $profile->name}}
                    </h1>
                </div>
                <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">
                    {{ $profile->desc}}
                </p>
                <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                    <a href="#contact" class="px-8 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-lg hover:opacity-90 transition-opacity">
                        Start a Project
                    </a>
                    <a href="#projects" class="px-8 py-3 border-2 border-gray-800 dark:border-white text-gray-800 dark:text-white rounded-lg hover:bg-gray-800 hover:text-white dark:hover:bg-white dark:hover:text-gray-800 transition-colors">
                        View Work
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class=""></div>
                <img src="{{ 'storage/'.$profile->image }}" alt="Profile Picture" > </div>
        </div>
    </div>
</section>