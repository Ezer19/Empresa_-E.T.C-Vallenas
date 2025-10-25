<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        return view('empresa.index');
    }

    public function historia()
    {
        return view('empresa.historia');
    }

    public function valores()
    {
        return view('empresa.valores');
    }

    public function certificaciones()
    {
        return view('empresa.certificaciones');
    }

    public function sobreNosotros()
    {
        return view('empresa.sobre-nosotros');
    }
}