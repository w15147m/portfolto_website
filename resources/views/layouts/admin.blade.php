<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>admin</title>
    <link rel="icon" type="image/png" href="{{ asset('admin/images/favicon.png') }}">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">

    <!-- Javascript Assets -->
    <script src="{{ asset('admin/js/app.js') }}" defer=""></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css'])

    <script>
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
    </script>

</head>

<body x-data="" class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
        <div class="app-preloader-inner relative inline-block size-48"></div>
    </div>

    <!-- Page Wrapper -->
    {{-- @include('layouts.partials.navbar') --}}
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="" >

        {{-- @include('layouts.partials.sidebar') --}}
      

    </div>

    <div id="x-teleport-target"></div>
    @vite(['resources/js/app.js'])


    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
</body>

</html>
