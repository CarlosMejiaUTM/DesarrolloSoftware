<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="h-100">
    <header id="main-navbar">
        <main-nav-bar></main-nav-bar>
    </header>

    <main style="height:100%">
    </main>

    <footer id="footer-content">
        <footer-content></footer-content>
    </footer>

    @vite('resources/js/app.js')
</body>
</html>