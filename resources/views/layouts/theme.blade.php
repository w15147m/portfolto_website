<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    @vite('resources/assets/css/app.css')
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

<body class="flex flex-col min-h-screen bg-light-bg dark:bg-dark-bg transition-colors duration-300">
    <div class="flex-none">
        @include('portfolioThemes.layouts.mobileSidebar')
        @include('portfolioThemes.layouts.navbar')
    </div>
    
    <div class="flex-grow">
        @include('portfolioThemes.components.heroSection', ['profile' => $portfolios] )
        @include('portfolioThemes.components.aboutSection', ['profile' => $portfolios])
        @include('portfolioThemes.components.projectsSection', ['projects' => $portfolios->projects])
        @include('portfolioThemes.components.skillsSection', ['skills' => $portfolios->skills])
        @include('portfolioThemes.components.educationSection', ['portfolios' => $portfolios])
        @include('portfolioThemes.components.experienceSection', ['portfolios' => $portfolios])
        @include('portfolioThemes.components.servicesSection', ['portfolios' => $portfolios])
        @include('portfolioThemes.components.contactSection')
    </div>
    
    <div class="flex-none">
        @include('portfolioThemes.layouts.footer')
    </div>
    
    @vite('resources/js/app.js')

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
