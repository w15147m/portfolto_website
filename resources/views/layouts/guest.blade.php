<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <link rel="icon" type="image/png" href="images/favicon.png"> --}}

    <!-- CSS Assets -->
    {{-- <link rel="stylesheet" href="css/app.css"> --}}
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">

    <!-- Javascript Assets -->
    <script src="js/app.js" defer=""></script>
    <script src="{{ asset('admin/js/app.js') }}" defer=""></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
        <script>
            /**
             * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
             */
            localStorage.getItem("_x_darkMode_on") === "true" &&
              document.documentElement.classList.add("dark");
          </script>
        </head>
        
        <body x-data="" class="is-header-blur" x-bind="$store.global.documentBody">
        
           
            <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
                <div class="app-preloader-inner relative inline-block size-48"></div>
              </div>
          
              <!-- Page Wrapper -->
              <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">
                <div class="fixed top-0 hidden p-6 lg:block lg:px-12">
                  <a href="#" class="flex items-center space-x-2">
                    <img class="size-12" src="{{ asset('admin/images/app-logo.png') }}" alt="logo">
                    <p class="text-xl font-semibold uppercase text-slate-700 dark:text-navy-100">
                      JassaRich
                    </p>
                  </a>
                </div>
                <div class="hidden w-full place-items-center lg:grid">
                  <div class="w-full max-w-lg p-6">
                    <img class="w-full" x-show="!$store.global.isDarkModeEnabled" src="{{ asset('admin/images/illustrations/dashboard-meet.svg') }}" alt="image">
                    <img class="w-full" x-show="$store.global.isDarkModeEnabled" src="{{ asset('admin/images/illustrations/dashboard-meet-dark.svg') }}" alt="image">
                  </div>
                </div>
                <main class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md">
                  <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
                        {{ $slot }}
                  </div>
                </main>
        
        <script>
            window.addEventListener("DOMContentLoaded", () => Alpine.start());
          </script>
        </body>
        
        </html>
