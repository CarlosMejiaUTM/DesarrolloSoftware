<!-- resources/views/cart/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
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

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .cart-item img {
            width: 100px;
            height: auto;
            border-radius: 10px;
        }

        .cart-item-details {
            flex: 1;
            margin-left: 20px;
        }

        .cart-item-price {
            font-size: 1.2rem;
            color: #ff6600;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
        }

        .cart-item-quantity input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
        }

        .cart-total {
            text-align: right;
            font-size: 1.5rem;
            color: #ff6600;
            margin-top: 20px;
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
        <main-nav-bar logo-url="{{ asset('images/logo.webp') }}"></main-nav-bar>
    </header>

    <main style="height:100%">
        <div class="container py-5">
            <h1 class="text-glow">Carrito de Compras</h1>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(count($cartItems) > 0)
            @foreach($cartItems as $id => $item)
            <div class="cart-item">
                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                <div class="cart-item-details">
                    <h5>{{ $item['name'] }}</h5>
                    <div class="cart-item-price">${{ $item['price'] }}</div>
                </div>
                <div class="cart-item-quantity">
                    <input type="number" value="{{ $item['quantity'] }}" min="1">
                </div>
            </div>
            @endforeach

            <div class="cart-total">
                Total: ${{ array_sum(array_column($cartItems, 'price')) }}
            </div>
            @else
            <p>No hay productos en el carrito.</p>
            @endif
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