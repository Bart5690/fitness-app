<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Workout Tracker')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script src="https://cdn.tiny.cloud/1/jqz5npvbipvssakskn8olc74ijfdnynzcw1co4k9uogxin9f/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea.wysiwyg-editor',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | fontselect fontsizeselect | forecolor backcolor',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
            font_formats: 'Andale Mono=andale mono, monospace; Arial=arial, helvetica, sans-serif; Courier New=courier new, courier, monospace; Georgia=georgia, serif; Times New Roman=times new roman, times, serif; Verdana=verdana, geneva, sans-serif',
            content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
        });
    </script>


    @stack('styles') <!-- For additional styles if needed -->
</head>
<body class="font-sans antialiased bg-gray-100">

<!-- Header Section -->
<!-- resources/views/layouts/app.blade.php -->
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('workouts.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Workout Tracker</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @guest
                <!-- Links voor gasten -->
                <a href="{{ route('login') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 px-3 py-2 rounded">Login</a>
                <a href="{{ route('register') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 px-3 py-2 rounded">Register</a>
            @else
                <!-- Ingelogde gebruikers -->
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : 'https://via.placeholder.com/150' }}" alt="User photo">
                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2">
                        <li>
                            <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-200 dark:hover:text-white"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest

            <!-- Burger menu knop voor kleine schermen -->
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>

        <!-- Menu voor grote schermen -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('workouts.index') }}" class="block py-2 px-3 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Workouts</a>
                </li>
                <li>
                    <a href="{{ route('musclegroups.index') }}" class="block py-2 px-3 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Muscle Groups</a>
                </li>
                <li>
                    <a href="{{ route('workouts.create') }}" class="block py-2 px-3 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Add Workout</a>
                </li>
                <li>
                    <a href="{{ route('musclegroups.create') }}" class="block py-2 px-3 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Add Muscle Group</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




<!-- Main Content -->
<main class="py-6">
    <div class="container mx-auto px-4">
        @yield('content')
    </div>
</main>

<!-- Footer Section -->
<footer class="bg-gray-800 text-white text-center py-4 mt-6">
    <div class="container mx-auto px-4">
        <p>&copy; {{ date('Y') }} Workout Tracker. All rights reserved.</p>
    </div>
</footer>

<!-- Optional JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
@stack('scripts') <!-- For additional scripts if needed -->
</body>
</html>
