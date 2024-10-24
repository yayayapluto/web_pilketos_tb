<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPilKetos | @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <x-head />
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
