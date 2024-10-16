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

<body>
    <x-client_navbar></x-client_navbar>
    <x-alert />
    <div>
        <header>
            <h1>@yield('header')</h1>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @include('components.client_footer')
        </footer>
    </div>
</body>

@yield('js')

</html>
