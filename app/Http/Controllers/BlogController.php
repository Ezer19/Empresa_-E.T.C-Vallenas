<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Datos de ejemplo (mientras no exista tabla/artículos reales)
        $items = collect(range(1, 12))->map(function ($i) {
            $titulo = "Consejos de operación segura #$i";
            $categoria = collect(['noticias', 'consejos', 'proyectos', 'maquinaria', 'seguridad'])->random();
            return (object) [
                'slug' => Str::slug($titulo . '-' . $i),
                'titulo' => $titulo,
                'resumen' => 'Buenas prácticas y recomendaciones para operar maquinaria pesada con seguridad y eficiencia.',
                'categoria' => $categoria,
                'fecha_publicacion' => date('Y-m-d', strtotime("-{$i} days")),
                'autor' => 'ETC Vallenas',
                'imagen_principal' => 'placeholder.jpg',
            ];
        });

        // Filtros simples por búsqueda/categoría
        if ($buscar = $request->input('buscar')) {
            $items = $items->filter(fn($a) => Str::contains(Str::lower($a->titulo), Str::lower($buscar)));
        }
        if ($cat = $request->input('categoria')) {
            $items = $items->where('categoria', $cat);
        }

        // Paginación manual para Collections
        $perPage = 6;
        $currentPage = max((int) $request->input('page', 1), 1);
        $paged = $items->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $articulos = new LengthAwarePaginator(
            $paged,
            $items->count(),
            $perPage,
            $currentPage,
            ['path' => url()->current(), 'query' => $request->query()]
        );

        $categoriaColors = [
            'noticias' => 'warning',
            'consejos' => 'success',
            'proyectos' => 'info',
            'maquinaria' => 'purple',
            'seguridad' => 'danger',
        ];

        return view('blog.index', compact('articulos', 'categoriaColors'));
    }

    public function show($slug)
    {
        // Artículo de ejemplo
        $articulo = (object) [
            'slug' => $slug,
            'titulo' => Str::title(str_replace('-', ' ', $slug)),
            'categoria' => 'consejos',
            'autor' => 'ETC Vallenas',
            'fecha_publicacion' => date('Y-m-d'),
            'tiempo_lectura' => 5,
            'imagen_principal' => 'placeholder.jpg',
            'contenido' => '<p>Contenido de ejemplo del artículo. Próximamente se conectará a la base de datos.</p>',
            'comentarios_count' => 0,
            'comentarios' => [],
        ];

        $relacionados = collect(range(1, 3))->map(function ($i) {
            $titulo = "Tips de mantenimiento #$i";
            return (object) [
                'slug' => Str::slug($titulo . '-' . $i),
                'titulo' => $titulo,
                'fecha_publicacion' => date('Y-m-d', strtotime("-{$i} days")),
                'imagen_miniatura' => 'placeholder.jpg',
            ];
        })->all();

        return view('blog.articulo', compact('articulo', 'relacionados'));
    }
}
