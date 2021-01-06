<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title', 'Admin') &mdash; {{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('css/admin/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('css/admin/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    
    @stack('style')

</head>

<body>
    <div id="app">
        <!-- <div class="loading">
            <div class="loading__loader"></div>
        </div> -->
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                @include('partials.topnav')
            </nav>
            <div class="main-sidebar">
                @include('partials.sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>

            <footer class="main-footer d-none">
                @include('partials.footer')
            </footer>
        </div>
    </div>

    <script src="{{ url('js/admin/app.js') }}"></script>
    <script src="{{ url('js/admin/custom.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('js/admin/admin.js') }}"></script>
    
    @stack('footer-scripts')

</body>
</html>
