
    <!-- About Section -->
    <section id="about" class="py-20 bg-light-card dark:bg-dark-card">
       {{$profile->experience}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900 dark:text-white">About Me</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary rounded-2xl blur-xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                    <img src="https://via.placeholder.com/600" alt="About Me" class="relative rounded-2xl shadow-lg">
                </div>
                <div class="space-y-6">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Who am I?</h3>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        I'm a passionate Full Stack Developer with over 5 years of experience in creating beautiful and functional web applications. I specialize in modern web technologies and have a keen eye for design.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-4 shadow-lg">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Experience</h4>
                            <p class="text-gray-600 dark:text-gray-400">5+ Years</p>
                        </div>
                        <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-4 shadow-lg">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Projects</h4>
                            <p class="text-gray-600 dark:text-gray-400">50+ Completed</p>
                        </div>
                        <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-4 shadow-lg">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Clients</h4>
                            <p class="text-gray-600 dark:text-gray-400">30+ Happy Clients</p>
                        </div>
                        <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-4 shadow-lg">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Location</h4>
                            <p class="text-gray-600 dark:text-gray-400">Remote, Worldwide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>