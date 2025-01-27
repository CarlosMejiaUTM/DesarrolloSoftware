<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

</head>

<body>
    <style>
        body {
            background: linear-gradient(135deg, #ffccff, #ccffff);
            font-family: 'Press Start 2P', cursive;
            margin: 0;
            padding: 0;
        }

        h1,
        h2 {
            text-shadow: 2px 2px 5px #000000;
        }

        .text-glow {
            color: #ff66ff;
            text-shadow: 0 0 10px #ff66ff, 0 0 20px #ff99ff;
        }

        .product-card {
            background: #ffffff;
            border: 2px solid #ff66ff;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease-in-out;
        }

        .product-card:hover {
            transform: scale(1.05);
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
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background: #ff99ff;
            transform: scale(1.1);
        }

        .section-title {
            font-size: 1.5rem;
            color: #ff66ff;
            text-shadow: 0 0 10px #ff66ff, 0 0 20px #ff99ff;
        }

        .feature-list,
        .question-list {
            padding: 0;
        }

        .feature-item,
        .question-item {
            background: #f9f9f9;
            margin: 10px 0;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .rating {
            color: #ffcc00;
            font-size: 1.3rem;
        }

        .question-item {
            background: #ffffff;
            margin-bottom: 20px;
        }

        .question-item .asker {
            font-weight: bold;
        }

        .question-item .answer {
            color: #ff66ff;
            font-style: italic;
        }

        .product-gallery img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }

        .product-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .sidebar {
            background: #ffffff;
            border: 2px solid #ff66ff;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .sidebar h3 {
            color: #ff66ff;
            text-shadow: 0 0 10px #ff66ff, 0 0 20px #ff99ff;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .product-gallery img {
                width: 100%;
                margin-bottom: 20px;
            }

            .product-info {
                gap: 10px;
            }

            .question-item {
                padding: 10px;
            }
        }
    </style>
    <!-- Navbar -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-glow" href="#">MiTienda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <header id="main-navbar">
        <main-nav-bar></main-nav-bar>
    </header>


    <main style="height:100%">
        <div class="container py-5">
            <!-- Botón Volver -->
            <a href="{{ route('products.index') }}" class="btn btn-custom mb-4">⬅ Volver a la Lista</a>

            <div class="row">
                <!-- Columna de Imagen del Producto -->
                <div class="col-md-6 product-gallery">
                    <img src="{{ $product['image'] }}" class="img-fluid rounded shadow-lg" alt="{{ $product['name'] }}">
                </div>

                <!-- Columna de Detalles del Producto -->
                <div class="col-md-6 product-info">
                    <h1 class="text-primary text-glow">{{ $product['name'] }}</h1>
                    <p class="text-muted">{{ $product['description'] }}</p>
                    <p class="price-text">${{ $product['price'] }}</p>

                    <!-- Botones de Acción -->
                    <form action="{{ route('cart.add', $product['id']) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-custom me-2">Agregar al Carrito 🛒</button>
                    </form>
                    <button class="btn btn-outline-primary">💖 Agregar a Deseos</button>

                    <!-- Valoraciones -->
                    <div class="mt-4">
                        <h3 class="section-title">Valoraciones</h3>
                        <div class="rating">⭐⭐⭐⭐☆ (4.5/5 de 1000 reseñas)</div>
                    </div>
                    <!-- Características del Producto -->
                    <div class="mt-4">
                        <h3 class="section-title">Características</h3>
                        <ul class="feature-list">
                            <li class="feature-item">Marca: {{ $product['brand'] }}</li>
                            <li class="feature-item">Dimensiones: {{ $product['dimensions'] }}</li>
                            <li class="feature-item">Peso: {{ $product['weight'] }}</li>
                            <li class="feature-item">Color: {{ $product['color'] }}</li>
                            <li class="feature-item">Material: {{ $product['material'] }}</li>
                            <li class="feature-item">Garantía: 2 años</li>
                            <li class="feature-item">Modelo: {{ $product['model'] }}</li>
                            <li class="feature-item">Fecha de Lanzamiento: {{ $product['launch_date'] }}</li>
                        </ul>
                    </div>

                    <!-- Especificaciones Técnicas -->
                    <div class="mt-4">
                        <h3 class="section-title">Especificaciones Técnicas</h3>
                        <p><strong>Potencia:</strong> 500W</p>
                        <p><strong>Voltaje:</strong> 220V</p>
                        <p><strong>Conectividad:</strong> Bluetooth 5.0</p>
                        <p><strong>Capacidad:</strong> 1TB</p>
                        <p><strong>Compatibilidad:</strong> Windows, Mac, Linux</p>
                        <p><strong>Duración de la batería:</strong> 10 horas</p>
                        <p><strong>Resistencia al agua:</strong> IP68</p>
                    </div>
                </div>
            </div>

            <!-- Productos Relacionados -->
            <div class="mt-5">
                <h2 class="text-glow">Productos Relacionados</h2>
                <div class="row">
                    @foreach ($relatedProducts as $related)
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="{{ $related['image'] }}" class="card-img-top" alt="{{ $related['name'] }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $related['name'] }}</h5>
                                <p class="price-text">${{ $related['price'] }}</p>
                                <a href="{{ route('products.show', $related['id']) }}" class="btn btn-custom">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Preguntas y Respuestas -->
            <div class="mt-5 question-list">
                <h3 class="section-title">Preguntas y Respuestas</h3>
                <div class="question-item">
                    <p class="asker">Juan Pérez: ¿Este producto es adecuado para exteriores?</p>
                    <p class="answer">Sí, es resistente al agua y al polvo, perfecto para uso exterior.</p>
                </div>
                <div class="question-item">
                    <p class="asker">María Gómez: ¿El envío es gratuito?</p>
                    <p class="answer">Sí, el envío es gratuito para compras superiores a $500.</p>
                </div>
                <div class="question-item">
                    <p class="asker">Carlos López: ¿Este producto tiene soporte para Android?</p>
                    <p class="answer">Sí, es totalmente compatible con dispositivos Android a partir de la versión 9.0.</p>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer-content">
        <footer-content></footer-content>
    </footer>


    @vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>