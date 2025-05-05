<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

{{-- App name --}}
<meta name="application-name" content="Rekam-Medis">
<meta name="apple-mobile-web-app-title" content="Rekam-Medis">

{{-- SEO --}}
<meta name="description" content="@yield('description', 'Rekam Medis adalah aplikasi untuk mengelola data rekam medis pasien di rumah sakit.')">

{{-- Title --}}
<title>@yield('title') | Rekam Medis</title>

{{-- Vite --}}
@vite(['resources/js/app.js', 'resources/css/app.css'])

{{-- Favicon --}}
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon/favicon.png') }}">
