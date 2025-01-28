<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    @vite('resources/js/app.js')
    @vite('resources/css/main.css')
</head>

<body>
    <style>

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
            transition: transform 0.3s;
            height: 400px; /* Set a fixed height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
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
    </style>
    <header id="main-navbar">
        <main-nav-bar logo-url="{{ asset('images/logo.webp') }}"></main-nav-bar>
    </header>

    <main>
        <div class="container py-5">
            <h1 class="text-center text-glow">Catálogo de Productos</h1>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="card product-card">
                        <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}" style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="price-text">${{ $product['price'] }}</p>
                            <a href="{{ route('products.show', $product['id']) }}" class="btn btn-custom">Ver Detalles</a>
                        </div>
                    </div>
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