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
            1 => ['id' => 1, 'name' => 'Auriculares Sony', 'price' => 299.99, 'image' => 'https://preview.redd.it/09d32gngtcw61.jpg?auto=webp&s=93a441dcd87c7934d9e29a3dfc3c42820662ae18', 'category' => 'Auriculares'],
            2 => ['id' => 2, 'name' => 'Camara Hp', 'price' => 199.99, 'image' => 'https://i.etsystatic.com/24718541/r/il/96fd34/4998687372/il_fullxfull.4998687372_anhh.jpg', 'category' => 'Camaras'],
            3 => ['id' => 3, 'name' => 'Sony Ericson', 'price' => 149.99, 'image' => 'https://www.esato.com/gfx/news/img/W580i_Front_Open_Angle_E65_Style_White_1174985283.jpg', 'category' => 'Celulares'],
            4 => ['id' => 4, 'name' => 'Laptop', 'price' => 399.99, 'image' => 'https://i.pinimg.com/736x/36/5d/20/365d207ab942ec857284f8c5faff1a3c.jpg', 'category' => 'Laptops'],
            5 => ['id' => 5, 'name' => 'Auriculares Bose', 'price' => 349.99, 'image' => 'https://ss630.liverpool.com.mx/xl/1042050683.jpg', 'category' => 'Auriculares'],
            6 => ['id' => 6, 'name' => 'Camara Canon', 'price' => 299.99, 'image' => 'https://i.etsystatic.com/5561172/r/il/44f761/6000840136/il_fullxfull.6000840136_7uqj.jpg', 'category' => 'Camaras'],
            7 => ['id' => 7, 'name' => 'iPhone', 'price' => 999.99, 'image' => 'https://ep00.epimg.net/elpais/imagenes/2017/09/11/album/1505131070_460765_1505132803_album_normal.jpg', 'category' => 'Celulares'],
            8 => ['id' => 8, 'name' => 'MacBook Pro', 'price' => 1299.99, 'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/63/MacBook_white.png', 'category' => 'Laptops'],
            9 => ['id' => 9, 'name' => 'Auriculares Panasonic', 'price' => 199.99, 'image' => 'https://i.pinimg.com/736x/b4/c7/7f/b4c77f716331bb0aeb7f8510e81a21d5.jpg', 'category' => 'Auriculares', 'launch_date' => '2000-05-15'],
            10 => ['id' => 10, 'name' => 'Camara Nikon', 'price' => 299.99, 'image' => 'https://i.etsystatic.com/35357417/r/il/79be51/5742729086/il_570xN.5742729086_69af.jpg', 'category' => 'Camaras', 'launch_date' => '2000-07-20'],
            11 => ['id' => 11, 'name' => 'Nokia 3310', 'price' => 99.99, 'image' => 'https://images-cdn.ubuy.co.id/66282213bd22580aa10c6799-nokia-3310-unlocked-gsm-retro-stylish.jpg', 'category' => 'Celulares', 'launch_date' => '2000-09-01'],
            12 => ['id' => 12, 'name' => 'Laptop Dell', 'price' => 499.99, 'image' => 'https://i.ytimg.com/vi/XvwTTjtBrmw/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDA_LPudAS5QWo7-VcG6S3VrPl_Wg', 'category' => 'Laptops', 'launch_date' => '2000-11-10'],
            13 => ['id' => 13, 'name' => 'Auriculares Philips', 'price' => 179.99, 'image' => 'https://i.ebayimg.com/thumbs/images/g/X7AAAOSwarpnejUG/s-l1200.jpg', 'category' => 'Auriculares', 'launch_date' => '2000-03-10'],
            14 => ['id' => 14, 'name' => 'Camara Olympus', 'price' => 259.99, 'image' => 'https://vyorsa.com.mx/media/catalog/product/cache/5c9671fc3539eb4576835b6f9295a2cf/1/5/1581294892_2.jpeg', 'category' => 'Camaras', 'launch_date' => '2000-06-25'],
            15 => ['id' => 15, 'name' => 'Motorola Razr', 'price' => 199.99, 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Razrv3t.jpg/640px-Razrv3t.jpg', 'category' => 'Celulares', 'launch_date' => '2000-08-15'],
            16 => ['id' => 16, 'name' => 'Laptop HP', 'price' => 599.99, 'image' => 'https://media.karousell.com/media/photos/products/2022/4/9/laptop_notebook_hp_pink_magent_1649476718_45c58972_progressive.jpg', 'category' => 'Laptops', 'launch_date' => '2000-10-05'],
            17 => ['id' => 17, 'name' => 'Auriculares JBL', 'price' => 189.99, 'image' => 'https://i.ebayimg.com/images/g/IIcAAOSwKx5lP0jH/s-l1200.jpg', 'category' => 'Auriculares', 'launch_date' => '2000-02-20'],
            18 => ['id' => 18, 'name' => 'Camara Fujifilm', 'price' => 279.99, 'image' => 'https://i.etsystatic.com/24718541/r/il/5eae5c/4834411640/il_fullxfull.4834411640_jjh9.jpg', 'category' => 'Camaras', 'launch_date' => '2000-04-30'],
            19 => ['id' => 19, 'name' => 'Samsung Galaxy', 'price' => 899.99, 'image' => 'https://y2kphones.com/cdn/shop/files/samsung-galaxy-folder-2-g1650-unlocked-flip-smartphone-131422.jpg?v=1727734112&width=1445', 'category' => 'Celulares', 'launch_date' => '2000-01-15'],
            20 => ['id' => 20, 'name' => 'Laptop Lenovo', 'price' => 699.99, 'image' => 'https://www.cnet.com/a/img/resize/8f25ef1e2886080da7d107684675a702b0a8c986/hub/2010/08/03/6576bb35-bb7a-11e2-8a8e-0291187978f3/32150160-2-440-overview-1.gif?frame=1&width=768', 'category' => 'Laptops', 'launch_date' => '2000-03-25'],
            21 => ['id' => 21, 'name' => 'Auriculares Sennheiser', 'price' => 219.99, 'image' => 'https://m.media-amazon.com/images/I/51ttA3-4+NL._AC_UF894,1000_QL80_.jpg', 'category' => 'Auriculares', 'launch_date' => '2000-05-05'],
            22 => ['id' => 22, 'name' => 'Camara Sony', 'price' => 329.99, 'image' => 'https://i.etsystatic.com/24718541/r/il/4e8444/4826508218/il_570xN.4826508218_2o3b.jpg', 'category' => 'Camaras', 'launch_date' => '2000-07-10'],
            23 => ['id' => 23, 'name' => 'Huawei P30', 'price' => 799.99, 'image' => 'https://i.pinimg.com/736x/58/d9/fb/58d9fbffdc26e10881185643f393c49e.jpg', 'category' => 'Celulares', 'launch_date' => '2000-09-20'],
            24 => ['id' => 24, 'name' => 'Laptop Acer', 'price' => 549.99, 'image' => 'https://images.pcel.com/mp/Computadoras-Laptops-Acer-4520-3121-59761-4cea6996ea55e.jpg', 'category' => 'Laptops', 'launch_date' => '2000-11-30'],
            25 => ['id' => 25, 'name' => 'Auriculares Beats', 'price' => 249.99, 'image' => 'https://www.picclickimg.com/T~YAAOSwXLRmWBcH/Millennium-Wind-Y2K-Headphone-Personality-Wired-Headphone.webp', 'category' => 'Auriculares', 'launch_date' => '2000-06-15'],
            26 => ['id' => 26, 'name' => 'Camara Panasonic', 'price' => 299.99, 'image' => 'https://64.media.tumblr.com/08618a5168ff31063cd383ee97e0386f/tumblr_p2o0u1SqZ01r9aj0wo1_1280.png', 'category' => 'Camaras', 'launch_date' => '2000-08-25']
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
