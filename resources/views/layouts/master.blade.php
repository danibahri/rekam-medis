<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="bg-gray-100">
    <main>
        <div class="sidebar">
            @include('partials.sidebar')
        </div>
        <div class="content">
            @yield('content')
        </div>
        <footer>
            @include('partials.footer')
        </footer>
    </main>
    @include('sweetalert2::index')
    @stack('scripts')
</body>

</html>
