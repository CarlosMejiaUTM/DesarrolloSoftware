<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'El carrito está vacío.');
        }

        $subtotal = $this->calculateSubtotal($cartItems);
        $totalItems = session()->get('totalItems', 0);

        return view('payment.index', compact('cartItems', 'subtotal', 'totalItems'));
    }

    public function comprar(Request $request)
    {
        // Vaciar el carrito
        session()->forget('cart');
        session()->forget('totalItems');

        // Redirigir a la página principal de productos
        return redirect()->route('products.index')->with('success', '¡Compra realizada con éxito!');
    }

    private function calculateSubtotal($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }
}
