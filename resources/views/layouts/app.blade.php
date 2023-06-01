<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.pages.head')
	@include('layouts.pages.css')
</head>
<body class="tg-home tg-homeone">

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <header id="tg-header" class="tg-header tg-haslayout">
        @include('layouts.pages.header')
        </header>
        <main >
            @yield('content')
        </main>
        @include('layouts.pages.footer')
    </div>
    @include('layouts.pages.js')
</body>
</html>
