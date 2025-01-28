<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    @vite('resources/js/app.js')
    @vite('resources/css/main.css')
</head>

<body>
    <style>
        body {
            background: linear-gradient(135deg, #ffccff, #ccffff);
            font-family: 'Press Start 2P', cursive;
        }

        h1,
        h2 {
            text-shadow: 2px 2px 5px #000000;
        }

        .text-glow {
            color: rgb(66, 45, 66);
            text-shadow: 0 0 10px #ff66ff, 0 0 20px #ff99ff;
        }

        .product-card {
            background: #ffffff;
            border: 2px solid #ff66ff;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        /* para que el contenedor sea clickqueable */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            z-index: 2;
        }

        /* Mostrar el overlay al hacer hover */
        .product-card:hover .overlay {
            opacity: 1;
        }

        .overlay p {
            font-size: 0.875rem;
            /* Ajusta el tamaño, 0.875rem es equivalente a 14px */
            font-weight: bold;
            line-height: 1.2;
            /* Opcional: mejora el espaciado entre líneas si es multilinea */
            margin: 0;
            /* Asegúrate de eliminar márgenes innecesarios */
        }

        .product-card:hover {
            transform: scale(1.1);
        }

        .price-text {
            color: #ff6600;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-custom {
            background: #ff66ff;
            color: white;
            border: none;
            transition: background 0.3s, transform 0.3s;
        }

        .btn-custom:hover {
            background: #ff99ff;
            transform: scale(1.1);
        }

        .y2k-banner {
            background: #ff99ff;
            color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px #ff66ff, 0 0 30px #ff99ff;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }

        .card-img-top {
            height: 200px;
            /* Altura fija */
            object-fit: cover;
            /* Asegura que la imagen se recorte proporcionalmente para llenar el espacio */
            width: 100%;
            /* Se ajusta al ancho del contenedor */
        }
    </style>
    <header id="main-navbar">
        <main-nav-bar></main-nav-bar>
    </header>

    <main style="height:100%">
        <div class="container py-5">
            <!-- Banner sobre la tendencia Y2K -->
            <div class="y2k-banner">
                <h2 class="text-glow">Explora la tendencia Y2K</h2>
                <p>Revive los años 2000 con nuestras categorías inspiradas en la estética retrofuturista y vibrante de la era Y2K. Descubre la moda, los colores y los estilos que están marcando tendencia.</p>
            </div>

            <!-- Título de categorías -->
            <div class="container py-5">
                <h1 class="text-center text-glow">Categorías</h1>
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                        <!-- Hacemos el contenedor clicable -->
                        <a href="{{ route('products.showProductsByCategory', ['categoria' => $category['nombre']]) }}" class="text-decoration-none">
                            {{ $category['nombre'] }}
                            <div class="card product-card position-relative">
                                <img src="{{ $category['imagen'] }}" class="card-img-top" alt="{{ $category['nombre'] }}">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $category['nombre'] }}</h5>
                                </div>
                                <!-- Descripción con efecto hover -->
                                <div class="overlay d-flex align-items-center justify-content-center">
                                    <p class="text-white text-center px-2">{{ $category['descripcion'] }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>  
    </main>


    <footer id="footer-content">
        <footer-content></footer-content>
    </footer>
</body>
</html>