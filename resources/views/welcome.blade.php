<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Y2K-Style</title>
    @vite('resources/js/app.js')
    @vite('resources/css/main.css')
</head>
<body>
    <header id="main-navbar">
        <main-nav-bar logo-url="{{ asset('images/logo.webp') }}"></main-nav-bar>
    </header>

    <main>
        <section class="welcome-section text-center py-5">
            <div class="container">
                <h1 class="display-4">Bienvenido a Y2K-Style</h1>
                <p class="lead">Tu tienda en línea para artículos de temática Y2K</p>
                <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg mt-3">Explorar Tienda</a>
            </div>
        </section>
    
        <section class="featured-products py-5">
            <div class="container">
                <h2 class="text-center mb-4">Productos Destacados</h2>
                <div class="row">
                    {{-- @foreach($featuredProducts as $product) --}}
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Audifonos</h5>
                                    <p class="card-text">XM-5</p>
                                    <a href="" class="btn btn-primary">Ver Producto</a>
                                </div>
                            </div>
                        </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </section>
    </main>

    <footer id="footer-content">
        <footer-content></footer-content>
    </footer>

</body>
</html>