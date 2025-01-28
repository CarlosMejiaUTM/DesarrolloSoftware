<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        .main-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
        }

        .cart-items {
            flex: 2;
            margin-right: 20px;
        }

        .summary {
            flex: 1;
            background: #fff;
            padding: 20px;
            border: 2px solid #ff66ff;
            border-radius: 10px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);
        }

        .cart-item {
            display: flex;
            align-items: center;
            background: #ffffff;
            border: 2px solid #ff66ff;
            border-radius: 10px;
            margin-bottom: 15px;
            padding: 10px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);
        }

        .cart-item img {
            width: 100px;
            height: auto;
            border-radius: 10px;
        }

        .item-details {
            flex: 2;
            margin-left: 20px;
        }

        .item-details h5 {
            margin: 0;
        }

        .price {
            color: #ff6600;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .item-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .item-actions button {
            background: #ff66ff;
            color: white;
            border: none;
            padding: 5px 10px;
            margin: 5px 0;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .item-actions button:hover {
            background: #ff99ff;
            transform: scale(1.1);
        }

        .cart-subtotal {
            font-size: 1.5rem;
            color: #ff6600;
        }

        .shipping-info {
            margin-top: 20px;
        }

        .shipping-bar-container {
            background: #ddd;
            height: 10px;
            position: relative;
            border-radius: 5px;
            overflow: hidden;
        }

        .shipping-bar {
            background: #ff66ff;
            width: 50%;
            height: 100%;
        }

        .free-shipping-message {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .check-icon {
            margin-right: 10px;
            color: green;
        }
    </style>

    <header id="main-navbar">
        <main-nav-bar logo-url="{{ asset('images/logo.webp') }}"></main-nav-bar>
    </header>

    <main style="height:100%">
        <div class="container py-5">
            <h1 class="text-glow">Carrito de Compras</h1>
            <div class="main-container">
                <div class="cart-items">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(count($cartItems) > 0)
                    @foreach($cartItems as $id => $item)
                    <div id="cart-item-{{ $id }}" class="cart-item">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                        <div class="item-details">
                            <h5>{{ $item['name'] }}</h5>
                            <p class="price">${{ $item['price'] }}</p>
                            <div class="item-actions">
                                <span id="save-item-{{ $id }}" class="save-for-later" onclick="toggleSave({{ $id }})">Guardar para más tarde</span>
                                <span id="delete-item-{{ $id }}" class="delete-item" onclick="removeItem({{ $id }})">Eliminar</span>
                            </div>
                        </div>
                        <div class="item-actions">
                            <button onclick="updateQuantity({{ $id }}, 'decrement')">-</button>
                            <span id="quantity-{{ $id }}">{{ $item['quantity'] }}</span>
                            <button onclick="updateQuantity({{ $id }}, 'increment')">+</button>
                        </div>
                    </div>
                    @endforeach

                    <p class="cart-subtotal">Subtotal (<span id="total-items">{{ $totalItems }}</span> productos): $<span id="cart-subtotal">{{ $subtotal }}</span></p>
                    @else
                    <p>No hay productos en el carrito.</p>
                    @endif
                </div>
                
                <div class="summary">
                    <h3>Resumen</h3>
                    <p>Subtotal (<span id="total-items-summary">{{ $totalItems }}</span> productos): $<span id="summary-subtotal">{{ $subtotal }}</span></p>

                    <div class="shipping-info">                   
                         <button onclick="window.location.href='/payment'">Proceder al Pago</button><br><br>
                        <div class="shipping-bar-container">
                            <div class="shipping-bar"></div>
                            <p class="shipping-amount">$299</p>
                        </div>
                    </div>
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
    <script>
    function updateSubtotal(data) {
        document.getElementById('cart-subtotal').innerText = data.subtotal;
        document.getElementById('total-items').innerText = data.totalItems;
        document.getElementById('summary-subtotal').innerText = data.subtotal;
        document.getElementById('total-items-summary').innerText = data.totalItems;
    
        if (data.subtotal >= 500) {
            document.querySelector('.free-shipping-message').style.display = 'flex';
        } else {
            document.querySelector('.free-shipping-message').style.display = 'none';
        }
    
        console.log("Total de productos actualizado:", data.totalItems);
        console.log("Subtotal actualizado:", data.subtotal);
    }


    function updateQuantity(id, action) {
        let quantity = parseInt(document.getElementById('quantity-' + id).innerText);

        if (action === 'increment') {
            quantity++;
        } else if (action === 'decrement' && quantity > 1) {
            quantity--;
        }

        fetch(`/cart/update/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('quantity-' + id).innerText = data.quantity;
            updateSubtotal(data); 
        })
        .catch(error => {
            console.error('Error al actualizar la cantidad:', error);
        });
    }

    function removeItem(id) {
        fetch(`/cart/remove/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            updateSubtotal(data); 

            document.getElementById('cart-item-' + id).remove();
        })
        .catch(error => {
            console.error('Error al eliminar el artículo:', error);
        });
    }

    function toggleSave(id) {
        const saveElement = document.getElementById('save-item-' + id);
        saveElement.style.display = saveElement.style.display === 'none' ? 'block' : 'none';
    }

    </script>
</body>

</html>
