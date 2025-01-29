<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private $products = [
        1 => ['id' => 1, 'name' => 'Auriculares Sony', 'price' => 299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares'],
        2 => ['id' => 2, 'name' => 'Camara Hp', 'price' => 199.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras'],
        3 => ['id' => 3, 'name' => 'Sony Ericson', 'price' => 149.99, 'image' => 'https://www.esato.com/gfx/news/img/W580i_Front_Open_Angle_E65_Style_White_1174985283.jpg', 'category' => 'Celulares'],
        4 => ['id' => 4, 'name' => 'Laptop', 'price' => 399.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops'],
        5 => ['id' => 5, 'name' => 'Auriculares Bose', 'price' => 349.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares'],
        6 => ['id' => 6, 'name' => 'Camara Canon', 'price' => 299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras'],
        7 => ['id' => 7, 'name' => 'iPhone', 'price' => 999.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Celulares'],
        8 => ['id' => 8, 'name' => 'MacBook Pro', 'price' => 1299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops'],
        9 => ['id' => 9, 'name' => 'Auriculares Panasonic', 'price' => 199.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares', 'launch_date' => '2000-05-15'],
        10 => ['id' => 10, 'name' => 'Camara Nikon', 'price' => 299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras', 'launch_date' => '2000-07-20'],
        11 => ['id' => 11, 'name' => 'Nokia 3310', 'price' => 99.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Celulares', 'launch_date' => '2000-09-01'],
        12 => ['id' => 12, 'name' => 'Laptop Dell', 'price' => 499.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops', 'launch_date' => '2000-11-10'],
        13 => ['id' => 13, 'name' => 'Auriculares Philips', 'price' => 179.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares', 'launch_date' => '2000-03-10'],
        14 => ['id' => 14, 'name' => 'Camara Olympus', 'price' => 259.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras', 'launch_date' => '2000-06-25'],
        15 => ['id' => 15, 'name' => 'Motorola Razr', 'price' => 199.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Celulares', 'launch_date' => '2000-08-15'],
        16 => ['id' => 16, 'name' => 'Laptop HP', 'price' => 599.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops', 'launch_date' => '2000-10-05'],
        17 => ['id' => 17, 'name' => 'Auriculares JBL', 'price' => 189.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares', 'launch_date' => '2000-02-20'],
        18 => ['id' => 18, 'name' => 'Camara Fujifilm', 'price' => 279.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras', 'launch_date' => '2000-04-30'],
        19 => ['id' => 19, 'name' => 'Samsung Galaxy', 'price' => 899.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Celulares', 'launch_date' => '2000-01-15'],
        20 => ['id' => 20, 'name' => 'Laptop Lenovo', 'price' => 699.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops', 'launch_date' => '2000-03-25'],
        21 => ['id' => 21, 'name' => 'Auriculares Sennheiser', 'price' => 219.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares', 'launch_date' => '2000-05-05'],
        22 => ['id' => 22, 'name' => 'Camara Sony', 'price' => 329.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras', 'launch_date' => '2000-07-10'],
        23 => ['id' => 23, 'name' => 'Huawei P30', 'price' => 799.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Celulares', 'launch_date' => '2000-09-20'],
        24 => ['id' => 24, 'name' => 'Laptop Acer', 'price' => 549.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops', 'launch_date' => '2000-11-30'],
        25 => ['id' => 25, 'name' => 'Auriculares Beats', 'price' => 249.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares', 'launch_date' => '2000-06-15'],
        26 => ['id' => 26, 'name' => 'Camara Panasonic', 'price' => 299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras', 'launch_date' => '2000-08-25']
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