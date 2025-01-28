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

    private function getProductos()
    {

        $products = [
            ['id' => 1, 'name' => 'Auriculares Sony', 'price' => 299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares'],
            ['id' => 2, 'name' => 'Camara Hp', 'price' => 199.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras'],
            ['id' => 3, 'name' => 'Sony Ericson', 'price' => 149.99, 'image' => 'https://www.esato.com/gfx/news/img/W580i_Front_Open_Angle_E65_Style_White_1174985283.jpg', 'category' => 'Celulares'],
            ['id' => 4, 'name' => 'Laptop', 'price' => 399.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops'],
            ['id' => 5, 'name' => 'Auriculares Bose', 'price' => 349.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares'],
            ['id' => 6, 'name' => 'Camara Canon', 'price' => 299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras'],
            ['id' => 7, 'name' => 'iPhone', 'price' => 999.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Celulares'],
            ['id' => 8, 'name' => 'MacBook Pro', 'price' => 1299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops'],
            ['id' => 9, 'name' => 'Auriculares Panasonic', 'price' => 199.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares', 'launch_date' => '2000-05-15'],
            ['id' => 10, 'name' => 'Camara Nikon', 'price' => 299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras', 'launch_date' => '2000-07-20'],
            ['id' => 11, 'name' => 'Nokia 3310', 'price' => 99.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Celulares', 'launch_date' => '2000-09-01'],
            ['id' => 12, 'name' => 'Laptop Dell', 'price' => 499.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops', 'launch_date' => '2000-11-10'],
            ['id' => 13, 'name' => 'Auriculares Philips', 'price' => 179.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares', 'launch_date' => '2000-03-10'],
            ['id' => 14, 'name' => 'Camara Olympus', 'price' => 259.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras', 'launch_date' => '2000-06-25'],
            ['id' => 15, 'name' => 'Motorola Razr', 'price' => 199.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Celulares', 'launch_date' => '2000-08-15'],
            ['id' => 16, 'name' => 'Laptop HP', 'price' => 599.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops', 'launch_date' => '2000-10-05'],
            ['id' => 17, 'name' => 'Auriculares JBL', 'price' => 189.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares', 'launch_date' => '2000-02-20'],
            ['id' => 18, 'name' => 'Camara Fujifilm', 'price' => 279.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras', 'launch_date' => '2000-04-30'],
            ['id' => 19, 'name' => 'Samsung Galaxy', 'price' => 899.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Celulares', 'launch_date' => '2000-01-15'],
            ['id' => 20, 'name' => 'Laptop Lenovo', 'price' => 699.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops', 'launch_date' => '2000-03-25'],
            ['id' => 21, 'name' => 'Auriculares Sennheiser', 'price' => 219.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares', 'launch_date' => '2000-05-05'],
            ['id' => 22, 'name' => 'Camara Sony', 'price' => 329.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras', 'launch_date' => '2000-07-10'],
            ['id' => 23, 'name' => 'Huawei P30', 'price' => 799.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Celulares', 'launch_date' => '2000-09-20'],
            ['id' => 24, 'name' => 'Laptop Acer', 'price' => 549.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Laptops', 'launch_date' => '2000-11-30'],
            ['id' => 25, 'name' => 'Auriculares Beats', 'price' => 249.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Auriculares', 'launch_date' => '2000-06-15'],
            ['id' => 26, 'name' => 'Camara Panasonic', 'price' => 299.99, 'image' => 'https://www.lavanguardia.com/uploads/2018/12/12/5fa450a262fdd.jpeg', 'category' => 'Camaras', 'launch_date' => '2000-08-25'],
        ];
        return $products;
    }
    /**
     * Muestra el detalle de un producto específico.
     */
    public function show($id)
    {

        $products = $this->getProductos();
        $product = array_filter($products, function ($product) use ($id) {
            return $product['id'] == $id;
        });
        $product = reset($product);

        // COMBINA EL ARREGLO DEL PRODUCTO BUSCADO Y LO UNE AL RESTO DEL ARREGLO
        $product = array_merge($product, [
            'description' => 'Descripción detallada del producto.',
            'brand' => 'Marca Ejemplo',
            'dimensions' => '30x20x10 cm',
            'weight' => '1 kg',
            'color' => 'Negro',
            'material' => 'Plástico',
            'model' => 'Modelo Ejemplo',
            'launch_date' => '2025-01-01',  // Agregado el campo launch_date
        ]);

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
    private function FilterByCategoryName($categoryName)
    {
        $productos = $this->getProductos();

        $productosFiltrados = array_filter($productos, function ($producto) use ($categoryName) {
            return $producto['category'] === $categoryName;
        });

        return $productosFiltrados;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = $this->getProductos();
        $filteredProducts = array_filter($products, function ($product) use ($query) {
            return stripos($product['name'], $query) !== false;
        });

        return view('products.index', ['products' => $filteredProducts]);
    }
}
