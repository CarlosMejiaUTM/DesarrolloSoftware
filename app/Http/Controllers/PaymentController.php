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

    private function calculateSubtotal($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }
}
