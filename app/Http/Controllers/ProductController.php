<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Muestra la lista de productos.
     */
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'Producto 1', 'price' => 299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg'],
            ['id' => 2, 'name' => 'Producto 2', 'price' => 199.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg'],
            ['id' => 3, 'name' => 'Producto 3', 'price' => 149.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg'],
            ['id' => 4, 'name' => 'Producto 4', 'price' => 399.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg'],
        ];

        return view('products.index', compact('products'));
    }

    /**
     * Muestra el detalle de un producto específico.
     */
    public function show($id)
    {
        $product = [
            'id' => $id,
            'name' => 'Producto Ejemplo',
            'description' => 'Descripción detallada del producto.',
            'price' => 299.99,
            'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg',
            'brand' => 'Marca Ejemplo',
            'dimensions' => '30x20x10 cm',
            'weight' => '1 kg',
            'color' => 'Negro',
            'material' => 'Plástico',
            'model' => 'Modelo Ejemplo',
            'launch_date' => '2025-01-01',  // Agregado el campo launch_date
        ];

        $relatedProducts = [
            ['id' => 2, 'name' => 'Producto Relacionado 1', 'price' => 199.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg'],
            ['id' => 3, 'name' => 'Producto Relacionado 2', 'price' => 249.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg'],
            ['id' => 4, 'name' => 'Producto Relacionado 3', 'price' => 99.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg'],
        ];

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
