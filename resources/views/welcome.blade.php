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
        <section class="welcome-section h-100 d-flex flex-column text-center py-5">
            <div class="container d-flex flex-column justify-content-center h-100">
                <h1 class="display-4">Bienvenido a Y2K-Style</h1>
                <div class="d-flex justify-content-center">
                    <img style="height: 366px; width: 366px" src="https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExcHhoZGZuenZmNjV1MW0zNndzYjl6cXN0enJuMGN1Y2xndmgzYTRsOSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9dHM/NHA2uCGBnqPAXO1n0i/giphy.gif" alt="Y2K gif">
                </div>
                <p class="lead">Tu tienda en línea para artículos de temática Y2K</p>
                <a href="{{ url('/categories') }}" class="btn bg-pink text-white btn-lg mt-3">Explorar Tienda</a>
            </div>
        </section>
    
        {{-- <section class="featured-products py-5">
            <div class="container">
                <h2 class="text-center mb-4">Productos Destacados</h2>
                <div class="row">
                    @foreach($featuredProducts as $product)
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
                    @endforeach
                </div>
            </div>
        </section> --}}
    </main>

    <footer id="footer-content">
        <footer-content></footer-content>
    </footer>

</body>
</html>