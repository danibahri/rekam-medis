<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    @stack('styles')
</head>

<body>
    <main>
        @yield('content')
    </main>
    @include('sweetalert2::index')
    @stack('scripts')
</body>

</html>
