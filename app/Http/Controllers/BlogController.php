<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Mostrar listado de artículos del blog
     */
    public function index(Request $request)
    {
        // TODO: Implementar cuando se cree el modelo Blog/Articulo
        $articulos = [];
        
        return view('blog.index', compact('articulos'));
    }

    /**
     * Mostrar detalle de un artículo
     */
    public function show($slug)
    {
        // TODO: Implementar cuando se cree el modelo Blog/Articulo
        $articulo = null;
        $relacionados = [];
        
        return view('blog.articulo', compact('articulo', 'relacionados'));
    }
}
