<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
<header>
    <nav>

        <a href="">Home</a>
        <a href="{{ route('workouts.index') }}">Workouts</a>
    </nav>
</header>

<div class="content">
    @yield('content')
</div>

<footer>
    <p>&copy; {{ date('Y') }} My Laravel App</p>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
