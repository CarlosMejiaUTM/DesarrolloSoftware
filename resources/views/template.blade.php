<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    @vite('resources/js/app.js')
    @vite('resources/css/main.css')
</head>
<body>
    <header id="main-navbar">
        <main-nav-bar logo-url="{{ asset('images/logo.webp') }}"></main-nav-bar>
    </header>

    <main>
        
    </main>

    <footer id="footer-content">
        <footer-content></footer-content>
    </footer>

</body>
</html>