<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Dynamic Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#8B5CF6',
                        secondary: '#6D28D9',
                        'dark-bg': '#0F172A',
                        'dark-card': '#1E293B',
                        'light-bg': '#F8FAFC',
                        'light-card': '#FFFFFF'
                    }
                }
            }
        }
    </script>
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
    </style>
</head>
<body class="bg-light-bg dark:bg-dark-bg transition-colors duration-300">
    <!-- Mobile Sidebar -->
    <div id="mobileSidebar" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="fixed right-0 top-0 h-full w-64 bg-light-bg dark:bg-dark-bg shadow-lg transform transition-transform duration-300 translate-x-full">
            <div class="p-6">
                <div class="flex justify-between items-center mb-8">
                    <span class="text-xl font-bold text-gray-800 dark:text-white">Menu</span>
                    <button id="closeSidebar" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <nav class="space-y-4">
                    <a href="#home" class="block text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Home</a>
                    <a href="#about" class="block text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary">About</a>
                    <a href="#projects" class="block text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Projects</a>
                    <a href="#skills" class="block text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Skills</a>
                    <a href="#contact" class="block text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Contact</a>
                </nav>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="fixed w-full bg-light-bg/80 dark:bg-dark-bg/80 backdrop-blur-lg z-40 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="#" class="text-2xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                    Portfolio
                </a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors">Home</a>
                    <a href="#about" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors">About</a>
                    <a href="#projects" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors">Projects</a>
                    <a href="#skills" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors">Skills</a>
                    <a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors">Contact</a>
                    <button id="themeToggle" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                        <i class="fas fa-sun text-yellow-500 dark:hidden"></i>
                        <i class="fas fa-moon text-blue-400 hidden dark:block"></i>
                    </button>
                </div>
                <button id="openSidebar" class="md:hidden text-gray-700 dark:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen pt-16 custom-shape bg-gradient-to-br from-primary/10 to-secondary/10 dark:from-primary/20 dark:to-secondary/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left">
                    <div class="relative inline-block">
                        <span class="absolute inset-0 bg-gradient-to-r from-primary to-secondary blur-2xl opacity-30 dark:opacity-40"></span>
                        <h1 class="relative text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                            Creative<br>Developer
                        </h1>
                    </div>
                    <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">
                        Transforming ideas into elegant digital solutions
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
                    <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary rounded-full blur-3xl opacity-20 animate-pulse"></div>
                    <img src="https://via.placeholder.com/600" alt="Profile" class="relative rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-light-card dark:bg-dark-card">
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

    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-light-bg dark:bg-dark-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900 dark:text-white">Featured Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project Card 1 -->
                <div class="group bg-light-card dark:bg-dark-card rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/600x400" alt="Project 1" class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-0 group-hover:opacity-75 transition-opacity flex items-end justify-start p-6">
                            <div class="text-white">
                                <h3 class="text-xl font-semibold">E-Commerce Platform</h3>
                                <p class="text-sm">Full-stack web application</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-primary/10 dark:bg-primary/20 text-primary rounded-full text-sm">React</span>
                            <span class="px-3 py-1 bg-primary/10 dark:bg-primary/20 text-primary rounded-full text-sm">Node.js</span>
                            <span class="px-3 py-1 bg-primary/10 dark:bg-primary/20 text-primary rounded-full text-sm">MongoDB</span>
                        </div>
                        <a href="#" class="inline-flex items-center text-primary hover:text-secondary transition-colors">
                            View Project <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Project Card 2 -->
                <div class="group bg-light-card dark:bg-dark-card rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/600x400" alt="Project 2" class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-0 group-hover:opacity-75 transition-opacity flex items-end justify-start p-6">
                            <div class="text-white">
                                <h3 class="text-xl font-semibold">Social Media App</h3>
                                <p class="text-sm">Mobile application</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-primary/10 dark:bg-primary/20 text-primary rounded-full text-sm">React Native</span>
                            <span class="px-3 py-1 bg-primary/10 dark:bg-primary/20 text-primary rounded-full text-sm">Firebase</span>
                        </div>
                        <a href="#" class="inline-flex items-center text-primary hover:text-secondary transition-colors">
                            View Project <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Project Card 3 -->
                <div class="group bg-light-card dark:bg-dark-card rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/600x400" alt="Project 3" class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-0 group-hover:opacity-75 transition-opacity flex items-end justify-start p-6">
                            <div class="text-white">
                                <h3 class="text-xl font-semibold">AI Dashboard</h3>
                                <p class="text-sm">Web application</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-primary/10 dark:bg-primary/20 text-primary rounded-full text-sm">Vue.js</span>
                            <span class="px-3 py-1 bg-primary/10 dark:bg-primary/20 text-primary rounded-full text-sm">Python</span>
                            <span class="px-3 py-1 bg-primary/10 dark:bg-primary/20 text-primary rounded-full text-sm">TensorFlow</span>
                        </div>
                        <a href="#" class="inline-flex items-center text-primary hover:text-secondary transition-colors">
                            View Project <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-light-card dark:bg-dark-card">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900 dark:text-white">Skills & Expertise</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Skill Item 1 -->
                <div class="group">
                    <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 mx-auto mb-4 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fab fa-react text-3xl text-primary"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">React</h3>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full" style="width: 90%"></div>
                        </div>
                    </div>
                </div>

                <!-- Skill Item 2 -->
                <div class="group">
                    <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 mx-auto mb-4 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fab fa-node-js text-3xl text-primary"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Node.js</h3>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                </div>

                <!-- Skill Item 3 -->
                <div class="group">
                    <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 mx-auto mb-4 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fab fa-python text-3xl text-primary"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Python</h3>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full" style="width: 80%"></div>
                        </div>
                    </div>
                </div>

                <!-- Skill Item 4 -->
                <div class="group">
                    <div class="bg-light-bg dark:bg-dark-bg rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 mx-auto mb-4 bg-primary/10 dark:bg-primary/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-database text-3xl text-primary"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">SQL</h3>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section with Enhanced Features -->
    <section id="contact" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-light-card dark:bg-dark-card rounded-2xl shadow-xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Contact Information -->
                    <div class="p-8 lg:p-12 bg-gradient-to-br from-primary to-secondary text-white">
                        <h2 class="text-3xl font-bold mb-8">Let's Connect</h2>
                        <p class="mb-8 text-gray-100">
                            Ready to start your next project? I'm here to help turn your vision into reality.
                        </p>
                        
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <div class="bg-white/20 p-3 rounded-lg">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Location</h3>
                                    <p class="text-sm text-gray-100">Remote, Worldwide</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-4">
                                <div class="bg-white/20 p-3 rounded-lg">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Email</h3>
                                    <p class="text-sm text-gray-100">hello@example.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-4">
                                <div class="bg-white/20 p-3 rounded-lg">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Phone</h3>
                                    <p class="text-sm text-gray-100">+1 (555) 123-4567</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12">
                            <h3 class="font-semibold mb-4">Follow Me</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="bg-white/20 p-3 rounded-lg hover:bg-white/30 transition-colors">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="#" class="bg-white/20 p-3 rounded-lg hover:bg-white/30 transition-colors">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="#" class="bg-white/20 p-3 rounded-lg hover:bg-white/30 transition-colors">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="bg-white/20 p-3 rounded-lg hover:bg-white/30 transition-colors">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="p-8 lg:p-12 bg-light-card dark:bg-dark-card">
                        <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">Send a Message</h2>
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                                    <input type="text" class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-dark-bg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary focus:border-transparent dark:text-white" placeholder="John Doe">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                                    <input type="email" class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-dark-bg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary focus:border-transparent dark:text-white" placeholder="john@example.com">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subject</label>
                                <input type="text" class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-dark-bg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary focus:border-transparent dark:text-white" placeholder="Project Inquiry">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
                                <textarea rows="6" class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-dark-bg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary focus:border-transparent dark:text-white" placeholder="Tell me about your project..."></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Budget Range</label>
                                <select class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-dark-bg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary focus:border-transparent dark:text-white">
                                    <option>Less than $5,000</option>
                                    <option>$5,000 - $10,000</option>
                                    <option>$10,000 - $20,000</option>
                                    <option>$20,000+</option>
                                </select>
                            </div>
                            <button type="submit" class="w-full py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-lg hover:opacity-90 transition-opacity">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light-card dark:bg-dark-card py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <h3 class="text-xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">Portfolio</h3>
                    <p class="text-gray-600 dark:text-gray-400">Creating digital experiences with passion and purpose.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Home</a></li>
                        <li><a href="#about" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">About</a></li>
                        <li><a href="#projects" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Projects</a></li>
                        <li><a href="#contact" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Connect</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">GitHub</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">LinkedIn</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Twitter</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Instagram</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Contact Info</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-600 dark:text-gray-400">hello@example.com</li>
                        <li class="text-gray-600 dark:text-gray-400">+1 (555) 123-4567</li>
                        <li class="text-gray-600 dark:text-gray-400">Remote, Worldwide</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-600 dark:text-gray-400">&copy; 2024 Your Name. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Theme toggle functionality
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;

        // Check for saved theme preference or use system preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }

        // Toggle theme
        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
        });

        // Mobile sidebar functionality
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const sidebarContent = mobileSidebar.querySelector('div.fixed');

        openSidebar.addEventListener('click', () => {
            mobileSidebar.classList.remove('hidden');
            setTimeout(() => {
                sidebarContent.classList.remove('translate-x-full');
            }, 0);
        });

        closeSidebar.addEventListener('click', () => {
            sidebarContent.classList.add('translate-x-full');
            setTimeout(() => {
                mobileSidebar.classList.add('hidden');
            }, 300);
        });

        // Close sidebar when clicking outside
        mobileSidebar.addEventListener('click', (e) => {
            if (e.target === mobileSidebar) {
                closeSidebar.click();
            }
        });

        // Close sidebar when clicking on a link
        const sidebarLinks = mobileSidebar.querySelectorAll('a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                closeSidebar.click();
            });
        });
    </script>
</body>
</html> 