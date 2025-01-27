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
        return view('cart.index', compact('cartItems'));
    }

    public function add($id)
    {
        $product = $this->products[$id];
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product['name'],
                "quantity" => 1,
                "price" => $product['price'],
                "image" => $product['image']
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito!');
    }
}