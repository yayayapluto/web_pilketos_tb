<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPilKetos | @yield('title')</title>
</head>
<body>
    <x-alert />
    <div>
        <header>
            <h1>@yield('header')</h1>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
