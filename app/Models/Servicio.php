<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Servicio extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'servicios';

    protected $fillable = [
        'nombre',
        'codigo',
        'tipo',
        'categoria',
        'descripcion_corta',
        'descripcion_completa',
        'caracteristicas',
        'beneficios',
        'incluye',
        'no_incluye',
        'requisitos',
        'precio_base',
        'precio_por_hora',
        'precio_por_dia',
        'precio_por_semana',
        'precio_por_mes',
        'moneda',
        'descuento',
        'estado',
        'disponibilidad',
        'duracion_estimada',
        'tiempo_respuesta',
        'cobertura_geografica',
        'icono',
        'imagen_principal',
        'imagenes',
        'documentos',
        'faqs',
        'testimonios',
        'proyectos_relacionados',
        'maquinaria_incluida',
        'personal_requerido',
        'certificaciones',
        'garantias',
        'terminos_condiciones',
        'popularidad',
        'orden',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected function casts(): array
    {
        return [
            'caracteristicas' => 'array',
            'beneficios' => 'array',
            'incluye' => 'array',
            'no_incluye' => 'array',
            'requisitos' => 'array',
            'cobertura_geografica' => 'array',
            'imagenes' => 'array',
            'documentos' => 'array',
            'faqs' => 'array',
            'testimonios' => 'array',
            'proyectos_relacionados' => 'array',
            'maquinaria_incluida' => 'array',
            'personal_requerido' => 'array',
            'certificaciones' => 'array',
            'garantias' => 'array',
            'seo_keywords' => 'array',
            'precio_base' => 'decimal:2',
            'precio_por_hora' => 'decimal:2',
            'precio_por_dia' => 'decimal:2',
            'precio_por_semana' => 'decimal:2',
            'precio_por_mes' => 'decimal:2',
            'descuento' => 'decimal:2',
            'popularidad' => 'integer',
            'orden' => 'integer',
        ];
    }

    public function getMainImageAttribute(): string
    {
        if ($this->imagen_principal) {
            return asset('storage/servicios/' . $this->imagen_principal);
        }

        if (!empty($this->imagenes) && isset($this->imagenes[0])) {
            return asset('storage/servicios/' . $this->imagenes[0]);
        }

        return asset('assets/images/servicio-placeholder.jpg');
    }

    public function getIconClassAttribute(): string
    {
        return match($this->tipo) {
            'alquiler' => 'fa-truck-monster',
            'mantenimiento' => 'fa-tools',
            'construccion' => 'fa-hard-hat',
            'transporte' => 'fa-shipping-fast',
            default => 'fa-cog',
        };
    }

    public function getTypeBadgeClassAttribute(): string
    {
        return match($this->tipo) {
            'alquiler' => 'bg-primary',
            'mantenimiento' => 'bg-warning',
            'construccion' => 'bg-success',
            'transporte' => 'bg-info',
            default => 'bg-secondary',
        };
    }

    public function getDiscountedPrice(string $priceType = 'precio_base'): float
    {
        $price = $this->{$priceType} ?? 0;

        if ($this->hasDiscount()) {
            return $price - ($price * ($this->descuento / 100));
        }

        return $price;
    }

    public function isAvailable(): bool
    {
        return $this->disponibilidad === 'disponible' && $this->estado === 'activo';
    }

    public function hasDiscount(): bool
    {
        return $this->descuento && $this->descuento > 0;
    }

    public function scopeActive($query)
    {
        return $query->where('estado', 'activo')
                     ->where('disponibilidad', 'disponible');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('tipo', $type);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('categoria', $category);
    }

    public function scopePopular($query, $limit = 6)
    {
        return $query->where('estado', 'activo')
                     ->orderBy('popularidad', 'desc')
                     ->limit($limit);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('orden', 'asc');
    }
}