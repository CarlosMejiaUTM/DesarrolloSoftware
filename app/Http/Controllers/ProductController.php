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
       $products = $this->getProductos();

        return view('products.index', compact('products'));
    }

    private function getProductos(){
        
        $products = [
            ['id' => 1, 'name' => 'Producto 1', 'price' => 299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares'],
            ['id' => 2, 'name' => 'Producto 2', 'price' => 199.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras'],
            ['id' => 3, 'name' => 'Producto 3', 'price' => 149.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Celulares'],
            ['id' => 4, 'name' => 'Producto 4', 'price' => 399.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops'],
        ];
        return $products;
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

    //CARGAR VISTA DE PRODUCTOS por categoria
    public function showProductsByCategory($categoria)
    {
        // Ejemplo: datos simulados como arreglos
        // Filtrar productos por la categoría proporcionada
        $productosFiltrados = $this->FilterByCategoryName($categoria);
        // Pasar los productos filtrados a la vista
        return view('products.index', ['products' => $productosFiltrados]);
    }

    //Metodo para filtrar por categoria los productos
    private function FilterByCategoryName($categoryName){
        $productos = $this->getProductos();

        $productosFiltrados = array_filter($productos, function ($producto) use ($categoryName) {
            return $producto['category'] === $categoryName;
        });

        return $productosFiltrados;

    }
}
