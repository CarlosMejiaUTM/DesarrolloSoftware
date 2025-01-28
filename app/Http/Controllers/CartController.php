<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private $products = [
        1 => ['id' => 1, 'name' => 'Producto 1', 'price' => 299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg'],
        2 => ['id' => 2, 'name' => 'Producto 2', 'price' => 199.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg'],
        3 => ['id' => 3, 'name' => 'Producto 3', 'price' => 149.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg'],
        4 => ['id' => 4, 'name' => 'Producto 4', 'price' => 399.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg'],
    ];

public function index()
{
    $cartItems = session()->get('cart', []);
    
    $totalItems = session()->get('totalItems', 0);  
    
    $subtotal = $this->calculateSubtotal($cartItems);
    
    return view('cart.index', compact('cartItems', 'subtotal', 'totalItems'));
}

    public function add($id)
{
    $product = $this->products[$id];  
    $cart = session()->get('cart', []); 

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product['name'],
            "quantity" => 1,
            "price" => $product['price'],
            "image" => $product['image']
        ];
    }

    $totalItems = 0;
    foreach ($cart as $item) {
        $totalItems += $item['quantity'];
    }

    session()->put('cart', $cart);
    session()->put('totalItems', $totalItems);

    return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito!');
}

public function updateQuantity(Request $request, $id)
{
    $cart = session()->get('cart', []);
    
    if (isset($cart[$id])) {
        $cart[$id]['quantity'] = $request->input('quantity');
    }
    
    session()->put('cart', $cart);

    $subtotal = $this->calculateSubtotal($cart);

    $totalItems = 0;
    foreach ($cart as $item) {
        $totalItems += $item['quantity'];
    }

    session()->put('totalItems', $totalItems);

    return response()->json([
        'quantity' => $cart[$id]['quantity'],
        'subtotal' => $subtotal,
        'totalItems' => $totalItems,
    ]);
}


public function removeItem(Request $request, $id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
    }

    session()->put('cart', $cart);

    $totalItems = 0;
    foreach ($cart as $item) {
        $totalItems += $item['quantity'];
    }

    session()->put('totalItems', $totalItems);

    $subtotal = $this->calculateSubtotal($cart);

    if ($totalItems == 0) {
        $subtotal = 0;
    }

    return response()->json([
        'subtotal' => $subtotal,
        'totalItems' => $totalItems, 
    ]);
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