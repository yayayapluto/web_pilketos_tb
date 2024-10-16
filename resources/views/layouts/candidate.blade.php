<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPilKetos | @yield('title')</title>
    <x-head></x-head>
</head>

<body style="background-color: ">

    <x-alert />
    <div>
        <main>
            @yield('content')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </div>
</body>

</html>
