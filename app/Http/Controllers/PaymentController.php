<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Método para mostrar la vista de pago con los productos del carrito
    public function index()
    {
        // Obtener los productos del carrito desde la sesión
        $cartItems = session()->get('cart', []);
        
        // Si el carrito está vacío, redirigir a la página del carrito
        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'El carrito está vacío.');
        }

        // Calcular el subtotal de los productos del carrito
        $subtotal = $this->calculateSubtotal($cartItems);

        // Calcular el total de los items en el carrito
        $totalItems = session()->get('totalItems', 0);

        // Pasar los productos a la vista de pago
        return view('payment.index', compact('cartItems', 'subtotal', 'totalItems'));
    }

    // Método privado para calcular el subtotal del carrito
    private function calculateSubtotal($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }
}
