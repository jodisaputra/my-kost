<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light scroll-smooth" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Share Home Properties' }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico"/>

    <!-- Css -->
    <link href="{{ asset('') }}assets/libs/tiny-slider/tiny-slider.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/libs/tobii/css/tobii.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet">
    <!-- Main Css -->
    <link href="{{ asset('') }}assets/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('') }}assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/tailwind.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet">
{{--    <script src="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/scripts/verify.min.js"></script>--}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-100 dark:bg-slate-900">
<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container relative">
        <!-- Logo container-->
        <a class="logo" href="/">
            <img src="assets/images/logo-dark.png" class="inline-block dark:hidden" alt="">
            <img src="assets/images/logo-light.png" class="hidden dark:inline-block" alt="">
        </a>
        <!-- End Logo container-->

        <!-- Start Mobile Toggle -->
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        <!-- End Mobile Toggle -->

        <!--Login button Start-->
        @guest
            <ul class="buy-button list-none mb-0">
                <li class="inline mb-0">
                    <a href="/login"
                       class="btn btn-icon bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full"><i
                            data-feather="user" class="size-4 stroke-[3]"></i></a>
                </li>
                <li class="sm:inline ps-1 mb-0 hidden">
                    <a href="/register"
                       class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">Signup</a>
                </li>
            </ul>
        @endguest
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu justify-end">

                <li><a href="/" class="sub-menu-item">Home</a></li>

                <li><a href="/rents" class="sub-menu-item">Rent House</a></li>

                @auth
                    <li class="has-submenu parent-menu-item"><a
                            href="javascript:void(0)">Hi, {{ Auth::user()->name  }} </a><span
                            class="submenu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="/my-transactions" class="sub-menu-item">My Order</a></li>
                            <li><a href="/logout" class="sub-menu-item">Logout</a></li>
                        </ul>
                    </li>
                @endauth
                {{--                <li><a href="contact.html" class="sub-menu-item">Contact</a></li>--}}
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->

{{ $slot }}

<!-- Start Footer -->
<footer class="relative bg-slate-900 dark:bg-slate-800 mt-24">
    <div class="py-[30px] px-0 border-t border-gray-800 dark:border-gray-700">
        <div class="container relative text-center">
            <div class="grid md:grid-cols-2 items-center gap-6">
                <div class="md:text-start text-center">
                    <p class="mb-0 text-gray-300">©
                        <script>document.write(new Date().getFullYear())</script>
                        Hously. Design with <i class="mdi mdi-heart text-red-600"></i> by <a href="/"
                                                                                             class="text-reset">Share
                            Home Properties</a>.
                    </p>
                </div>

                <ul class="list-none md:text-end text-center">
                    <li class="inline"><a href="https://1.envato.market/hously" target="_blank"
                                          class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="shopping-cart" class="size-4"></i></a></li>
                    <li class="inline"><a href="https://dribbble.com/shreethemes" target="_blank"
                                          class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="dribbble" class="size-4"></i></a></li>
                    <li class="inline"><a href="https://www.behance.net/shreethemes" target="_blank"
                                          class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                class="uil uil-behance align-baseline"></i></a></li>
                    <li class="inline"><a href="http://linkedin.com/company/shreethemes" target="_blank"
                                          class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="linkedin" class="size-4"></i></a></li>
                    <li class="inline"><a href="https://www.facebook.com/shreethemes" target="_blank"
                                          class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="facebook" class="size-4"></i></a></li>
                    <li class="inline"><a href="https://www.instagram.com/shreethemes/" target="_blank"
                                          class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="instagram" class="size-4"></i></a></li>
                    <li class="inline"><a href="https://twitter.com/shreethemes" target="_blank"
                                          class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="twitter" class="size-4"></i></a></li>
                    <li class="inline"><a href="mailto:support@shreethemes.in"
                                          class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="mail" class="size-4"></i></a></li>
                    <li class="inline"><a href="https://forms.gle/QkTueCikDGqJnbky9" target="_blank"
                                          class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="file-text" class="size-4"></i></a></li>
                </ul><!--end icon-->
            </div><!--end grid-->
        </div><!--end container-->
    </div>
</footer><!--end footer-->
<!-- End Footer -->
<!-- Switcher -->
<div class="fixed top-1/4 -left-2 z-3">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk"/>
                <label
                    class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-700 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8"
                    for="chk">
                    <i class="uil uil-moon text-[20px] text-yellow-500 mt-1"></i>
                    <i class="uil uil-sun text-[20px] text-yellow-500 mt-1"></i>
                    <span
                        class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] start-[2px] size-7"></span>
                </label>
            </span>
</div>
<!-- Switcher -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top"
   class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-green-600 text-white justify-center items-center"><i
        class="uil uil-arrow-up"></i></a>
<!-- Back to top -->

@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts/>

<!-- JAVASCRIPTS -->
<script src="{{ asset('') }}assets/libs/tiny-slider/min/tiny-slider.js"></script>
<script src="{{ asset('') }}assets/libs/tobii/js/tobii.min.js"></script>
{{--<script src="{{ asset('') }}assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>--}}
<script src="{{ asset('') }}assets/libs/feather-icons/feather.min.js"></script>
<script src="{{ asset('') }}assets/js/plugins.init.js"></script>
<script src="{{ asset('') }}assets/js/app.js"></script>
<!-- JAVASCRIPTS -->
@stack('scripts')
</body>
</html>
