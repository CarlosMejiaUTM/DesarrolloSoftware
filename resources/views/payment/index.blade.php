<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
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

        .card-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #ff66ff;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);
        }

        .card-title {
            font-size: 1.5rem;
            color: #ff66ff;
            margin-bottom: 20px;
        }

        .card button {
            background-color: #ff66ff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            font-size: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .card button:hover {
            background-color: #ff99ff;
        }

        .separator {
            border-top: 2px solid #ff66ff;
            margin-top: 20px;
        }

        .right-panel {
            flex: 1;
            background: #fff;
            padding: 20px;
            border: 2px solid #ff66ff;
            border-radius: 10px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);
        }

        .right-panel button {
            background-color: #ff66ff;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            font-size: 1.2rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .right-panel button:hover {
            background-color: #ff99ff;
        }

        .product-summary {
            margin-top: 20px;
            font-size: 1.2rem;
        }

        .product-summary span {
            font-weight: bold;
        }

        .modal-content {
            background-color: #f8f9fa;
            border: 2px solid #ff66ff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);
        }

        .modal-header {
            border-bottom: 2px solid #ff66ff;
        }

        .modal-footer {
            border-top: 2px solid #ff66ff;
        }

        .payment-options {
            display: none;
            margin-top: 20px;
        }

        .payment-options ul {
            list-style-type: none;
            padding: 0;
        }

        .payment-options li {
            margin-bottom: 10px;
        }

        .payment-options input {
            margin-right: 10px;
        }

        .payment-options .card-info,
        .payment-options .other-method {
            margin-top: 10px;
        }

        .payment-options input[type="text"],
        .payment-options input[type="number"],
        .payment-options select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 2px solid #ff66ff;
        }
/* Fondo oscuro para la modal */
.modalpayment {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
        display: none; /* Inicialmente oculto */
        justify-content: center; /* Centrado horizontal */
        align-items: center; /* Centrado vertical */
        z-index: 9999; /* Asegura que la modal esté sobre otros elementos */
    }

    /* Estilo de la caja modal */
    .modal-contentpayment {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 100%;
        max-width: 400px; /* Máximo tamaño para la modal */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 0 auto; /* Asegura que se centre en el contenedor */
    }

    .modal-contentpayment h4 {
        text-align: center;
        margin-bottom: 15px;
    }

    .modal-contentpayment input {
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .modal-contentpayment button {
        width: 48%;
        margin: 5px 1%;
        padding: 10px;
        border-radius: 5px;
        border: none;
    }

    .modal-contentpayment .btn-success {
        background-color: #28a745;
        color: #fff;
    }

    .modal-contentpayment .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }
    </style>

    <header id="main-navbar">
        <main-nav-bar></main-nav-bar>
    </header>

    <main style="height:100%">
        <div class="container py-5">
            <h1 class="text-glow">Proceso de pago</h1>
            
            <div class="main-container">
                <div class="cart-items">
                    <div class="card-container">
                        <div class="card">
    <div class="card-title">Agregar Dirección de Entrega</div>
    <h5>Direcciones Guardadas:</h5>
    <div id="addressListContainer"></div>
    <button data-bs-toggle="modal" data-bs-target="#addAddressModal">Agregar una nueva dirección de entrega</button>
</div>



<div class="card">
    <div class="card-title">Método de Pago</div>
    <button id="selectPaymentMethod" onclick="togglePaymentOptions()">Seleccionar método de pago</button>
    <div class="payment-options" id="paymentOptions" style="display:none;">
        <form>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentCash" value="cash" onclick="togglePaymentMethod()">
                <label class="form-check-label" for="paymentCash">Pagar en efectivo</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentCard" value="card" onclick="togglePaymentMethod()">
                <label class="form-check-label" for="paymentCard">Pagar con tarjeta</label>
                <div id="cardSavedMessage" style="display: none; color: green; text-align: center; padding: 10px; background-color: #d4edda; border-radius: 5px;">
    Tarjeta Guardada Exitosamente
</div>

<!-- Contenedor para mostrar las tarjetas guardadas -->
<div id="savedCardsContainer" style="display:none;">
    <h4>Tarjetas Guardadas</h4>
    <div id="savedCardsList"></div> 
    <div id="addCardButtonContainer">
    <button type="button" id="addCardBtn" class="btn btn-secondary mt-3" onclick="showCardForm()">Agregar Tarjeta</button>
</div>
</div>

            </div>
            
            <div class="other-method">
                <label for="otherMethod">Seleccionar otro método de pago</label>
                <select id="otherMethod">
                    <option value="paypal">PayPal</option>
                    <option value="bank">Transferencia bancaria</option>
                </select>
            </div>
        </form>

       
    </div>
</div>
  <!-- Sección para mostrar tarjetas agregadas -->
  <div id="savedCardsContainer" style="display:none;">
    <h4>Tarjetas Guardadas</h4>
    <div id="savedCardsList"></div>
</div>



                        <div class="modalpayment" id="cardModal">
    <div class="modal-contentpayment">
        <h4>Agregar Tarjeta</h4>
        <form id="cardForm">
            <label for="cardNumberModal">Número de tarjeta</label>
            <input type="number" id="cardNumberModal" placeholder="1234 5678 9012 3456">
            
            <label for="cardExpiryModal">Fecha de vencimiento</label>
            <input type="text" id="cardExpiryModal" placeholder="MM/AA">
            
            <label for="cardCVVModal">CVV</label>
            <input type="number" id="cardCVVModal" placeholder="123">
            
            <button type="button" class="btn btn-success" onclick="saveCard()">Guardar Tarjeta</button>
            <button type="button" class="btn btn-danger" onclick="closeModal()">Cerrar</button>
        </form>
    </div>
</div>


                        <div class="card">
                            <div class="card-title">Revisar Artículos y Envío</div>
                        </div>
                    </div>
                </div>

                <div class="right-panel">
                    <div class="card">
                        <button>Enviar a esta dirección</button>
                        <div class="separator"></div>

                        <!-- Resumen de productos -->
                        <div class="product-summary">
                            <div>Productos: <span>$200</span></div>
                            <div>Subtotal: <span>$200</span></div>
                            <div>Total: <span>$220</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!-- Modal de Agregar Dirección de Entrega -->
<div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAddressModalLabel">Ingresa una nueva dirección de envío</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="country" class="form-label">País o región</label>
                        <input type="text" class="form-control" id="country" value="México" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Nombre completo (nombre y apellido)</label>
                        <input type="text" class="form-control" id="fullName">
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Calle y número</label>
                        <input type="text" class="form-control" id="street">
                    </div>
                    <div class="mb-3">
                        <label for="zipCode" class="form-label">Código postal</label>
                        <input type="text" class="form-control" id="zipCode">
                        <button type="button" class="btn btn-link">Validar código postal</button>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">Estado/Provincia/Región</label>
                        <input type="text" class="form-control" id="state">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" id="city">
                    </div>
                    <div class="mb-3">
                        <label for="colony" class="form-label">Colonia</label>
                        <input type="text" class="form-control" id="colony">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Número de teléfono</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                    <div class="mb-3">
                        <label for="instructions" class="form-label">Agregar instrucciones de entrega</label>
                        <input type="text" class="form-control" id="instructions">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="defaultAddress">
                        <label class="form-check-label" for="defaultAddress">Usar como mi dirección predeterminada.</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="saveAddressBtn">Guardar Dirección</button>
            </div>
        </div>
    </div>
</div>

<script>
 
// Al guardar una tarjeta, debes actualizar el estado de la interfaz
function saveCard() {
    const cardNumber = document.getElementById('cardNumberModal').value;
    const cardExpiry = document.getElementById('cardExpiryModal').value;
    const cardCVV = document.getElementById('cardCVVModal').value;

    const cardData = { number: cardNumber, expiry: cardExpiry, cvv: cardCVV };

    let savedCards = JSON.parse(localStorage.getItem('savedCards')) || [];
    savedCards.push(cardData);
    localStorage.setItem('savedCards', JSON.stringify(savedCards));

    // Mostrar mensaje de éxito
    const cardSavedMessage = document.getElementById('cardSavedMessage');
    cardSavedMessage.style.display = 'block';

    // Ocultar mensaje después de 4 segundos
    setTimeout(() => {
        cardSavedMessage.style.display = 'none';
    }, 4000);

    // Actualizar lista de tarjetas guardadas y visualizar el botón de agregar tarjeta si es necesario
    togglePaymentMethod(); // Actualizar la visualización de las tarjetas
    closeModal();
}

    function showCardForm() {
        const modal = document.getElementById('cardModal');
        modal.style.display = 'block';
    }

    function closeModal() {
        const modal = document.getElementById('cardModal');
        modal.style.display = 'none';
    }
    function togglePaymentOptions() {
        const paymentOptions = document.getElementById('paymentOptions');
        paymentOptions.style.display = (paymentOptions.style.display === 'none') ? 'block' : 'none';
    }


    function togglePaymentMethod() {
    const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
    const savedCardsContainer = document.getElementById('savedCardsContainer');
    const addCardButtonContainer = document.getElementById('addCardButtonContainer');

    // Guardar el método de pago en localStorage
    localStorage.setItem('selectedPaymentMethod', paymentMethod);

    if (paymentMethod === 'card') {
        // Mostrar tarjetas guardadas si hay
        const savedCards = JSON.parse(localStorage.getItem('savedCards')) || [];

        if (savedCards.length > 0) {
            savedCardsContainer.style.display = 'block'; // Mostrar tarjetas guardadas
            displaySavedCards(savedCards);
        } else {
            savedCardsContainer.style.display = 'none'; // No mostrar tarjetas guardadas
        }
    } else if (paymentMethod === 'cash') {
        // Ocultar tarjetas guardadas cuando se selecciona pagar en efectivo
        savedCardsContainer.style.display = 'none';
    }
}



    function displaySavedCards(cards) {
        const savedCardsList = document.getElementById('savedCardsList');
        savedCardsList.innerHTML = cards.map((card, index) => {
            return `
                <div>
                    <input type="radio" name="savedCard" id="card-${index}" value="${index}" onclick="selectCard(${index})">
                    <label for="card-${index}">Tarjeta: ${card.number} (expira: ${card.expiry})</label>
                </div>
            `;
        }).join('');
    }

    // Cuando una tarjeta es seleccionada, guardar su índice en el localStorage
    function selectCard(index) {
        const savedCards = JSON.parse(localStorage.getItem('savedCards')) || [];
        const selectedCard = savedCards[index];

        // Guardar el índice de la tarjeta seleccionada
        localStorage.setItem('selectedCardIndex', index);

        // También puedes mostrar un mensaje de confirmación o almacenar la tarjeta seleccionada
        alert(`Seleccionaste la tarjeta terminada en ${selectedCard.number.slice(-4)}`);
    }

    // Al cargar la página, marcar la última tarjeta seleccionada
    document.addEventListener('DOMContentLoaded', function () {
        const selectedPaymentMethod = localStorage.getItem('selectedPaymentMethod');
    if (selectedPaymentMethod) {
        const paymentRadioButton = document.querySelector(`input[name="paymentMethod"][value="${selectedPaymentMethod}"]`);
        if (paymentRadioButton) {
            paymentRadioButton.checked = true;
            togglePaymentMethod(); // Actualiza la vista de acuerdo al método seleccionado
        }
    }

    // Resto de las inicializaciones
    const selectedCardIndex = localStorage.getItem('selectedCardIndex');
    if (selectedCardIndex !== null) {
        const savedCards = JSON.parse(localStorage.getItem('savedCards')) || [];
        const selectedCard = savedCards[selectedCardIndex];
        const radioButton = document.getElementById(`card-${selectedCardIndex}`);
        if (radioButton) {
            radioButton.checked = true;
        }
    }
        
    });
    document.getElementById('saveAddressBtn').addEventListener('click', function () {
        const fullName = document.getElementById('fullName').value;
        const street = document.getElementById('street').value;
        const zipCode = document.getElementById('zipCode').value;
        const state = document.getElementById('state').value;
        const city = document.getElementById('city').value;
        const colony = document.getElementById('colony').value;
        const phone = document.getElementById('phone').value;
        const instructions = document.getElementById('instructions').value;
        const defaultAddress = document.getElementById('defaultAddress').checked;

        const newAddress = {
            fullName,
            street,
            zipCode,
            state,
            city,
            colony,
            phone,
            instructions,
            defaultAddress
        };
    var myModal = bootstrap.Modal.getInstance(document.getElementById('addAddressModal'));
            myModal.hide();
       
        saveAddressToLocalStorage(newAddress);

        addAddressToCard(newAddress);

        $('#addAddressModal').modal('hide');
        
    });

    function saveAddressToLocalStorage(address) {
        const savedAddresses = JSON.parse(localStorage.getItem('addresses')) || [];
        savedAddresses.push(address);
        localStorage.setItem('addresses', JSON.stringify(savedAddresses));
    }

    function addAddressToCard(address) {
        const addressListContainer = document.getElementById('addressListContainer');

        const addressBox = document.createElement('div');
        addressBox.classList.add('address-box', 'mb-3', 'p-3', 'border');

        const addressText = `
            <div>
                <strong>${address.fullName}</strong><br>
                ${address.street}, ${address.city}, ${address.state}, ${address.zipCode}<br>
                ${address.colony}<br>
                Teléfono: ${address.phone}<br>
                Instrucciones: ${address.instructions}<br>
                ${address.defaultAddress ? '<span class="badge bg-success">Dirección predeterminada</span>' : ''}
            </div>
            <div class="mt-2">
                <button class="btn btn-secondary btn-sm" onclick="setAsDefault('${address.fullName}')">Seleccionar como predeterminada</button>
            </div>
        `;

        addressBox.innerHTML = addressText;
        addressListContainer.appendChild(addressBox);
    }

    function setAsDefault(addressFullName) {
        const savedAddresses = JSON.parse(localStorage.getItem('addresses')) || [];
        const updatedAddresses = savedAddresses.map(address => {
            if (address.fullName === addressFullName) {
                address.defaultAddress = true;
            } else {
                address.defaultAddress = false;
            }
            return address;
        });

        localStorage.setItem('addresses', JSON.stringify(updatedAddresses));

        updateAddressList();
    }

    function updateAddressList() {
        const savedAddresses = JSON.parse(localStorage.getItem('addresses')) || [];
        const addressListContainer = document.getElementById('addressListContainer');
        addressListContainer.innerHTML = ''; 
        // Mostrar todas las direcciones
        savedAddresses.forEach(address => {
            addAddressToCard(address);
        });
    }

    window.onload = function() {
        updateAddressList();
    };
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>