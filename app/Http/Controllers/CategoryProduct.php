<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryProduct extends Controller
{

    public function index()
    {
        $categories =  $this->getCategoryProducts();
        $breadcrumbItems = [
            ['text' => 'Home', 'href' => '/'],
            ['text' => 'Categories', 'href' => '/categories'],
            ['text' => 'Products', 'Products' => '/products']
            // ['text' => 'Products', 'Products' => '/products'],

        ];
        return view('categoryProduct.index', compact('categories', 'breadcrumbItems'));
    }

    //LLAMAR LAS CATEGORIAS
    public function getCategoryProducts()
    {
        $categorias = [
            [
            'id' => 1,  
            'nombre' => 'Celulares',
            'productos' => [101, 102, 103],
            'imagen' => 'https://image1.gamme.com.tw/news2/2013/81/54/p6CTnaKcl6eW.jpg',
            'descripcion' => 'Revive la era Y2K con celulares icónicos de diseño retro, llenos de color y vibras futuristas. Perfectos para selfies con estilo y comunicación sin límites.'

            ],
            [
            'id' => 2,
            'nombre' => 'Auriculares',
            'productos' => [104, 105, 106],
            'imagen' => 'https://i.ebayimg.com/images/g/IIcAAOSwKx5lP0jH/s-l1200.jpg',
            'descripcion' => 'Sumérgete en un mundo de música al estilo Y2K con audífonos funky, colores neón y una calidad de sonido que te hará sentir como en una rave de los 2000.'
            ],
            [
            'id' => 3,
            'nombre' => 'Camaras',
            'productos' => [107, 108, 109],
            'imagen' => 'https://preview.redd.it/y2k-far-east-edition-v0-9uu84qonxr1c1.jpg?width=640&crop=smart&auto=webp&s=4e2547c4e6f7994399d9205c18fc2e926885037e',
            'descripcion' => 'Captura la esencia Y2K con cámaras de diseño retrofuturista, ideales para fotografías vibrantes llenas de estilo y creatividad única'
            ]
            ,
            [
            'id' => 4,
            'nombre' => 'Laptops',
            'productos' => [110, 111, 112],
            'imagen' => 'https://i.pinimg.com/736x/f2/58/48/f2584870ee6a14009238990317bcb917.jpg',
            'descripcion' => 'Sin descripcion'
            ],
            [
            'id' => 5,
            'nombre' => 'Walkmans',
            'productos' => [113, 114, 115],
            'imagen' => 'https://i.pinimg.com/736x/39/d7/72/39d772db5cd10e6e0a4f96cdc3397790.jpg',
             'descripcion' => 'Sin descripcion'
            ]
        ];

        //return response()->json($categorias);

        return $categorias;
    }
    
}
