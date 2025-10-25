<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $articulos = [];
        
        return view('blog.index', compact('articulos'));
    }

    public function show($slug)
    {
        $articulo = null;
        $relacionados = [];
        
        return view('blog.articulo', compact('articulo', 'relacionados'));
    }
}