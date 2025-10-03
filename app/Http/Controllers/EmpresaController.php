<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Página principal de la empresa
     */
    public function index()
    {
        return view('empresa.index');
    }

    /**
     * Historia de la empresa
     */
    public function historia()
    {
        return view('empresa.historia');
    }

    /**
     * Misión, visión y valores
     */
    public function valores()
    {
        return view('empresa.valores');
    }

    /**
     * Certificaciones y reconocimientos
     */
    public function certificaciones()
    {
        return view('empresa.certificaciones');
    }

    /**
     * Sobre nosotros
     */
    public function sobreNosotros()
    {
        return view('empresa.sobre-nosotros');
    }
}
