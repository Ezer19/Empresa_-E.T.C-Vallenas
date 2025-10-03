<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Maquinaria extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'maquinaria';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'codigo',
        'tipo',
        'marca',
        'modelo',
        'año',
        'numero_serie',
        'descripcion',
        'especificaciones',
        'capacidad',
        'peso',
        'dimensiones',
        'combustible',
        'consumo_promedio',
        'estado',
        'disponibilidad',
        'tarifa_hora',
        'tarifa_dia',
        'tarifa_semana',
        'tarifa_mes',
        'ubicacion_actual',
        'imagenes',
        'documentos',
        'mantenimientos',
        'certificaciones',
        'operador_asignado',
        'fecha_adquisicion',
        'fecha_ultimo_mantenimiento',
        'proxima_mantenimiento',
        'horas_uso',
        'kilometraje',
        'observaciones',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'especificaciones' => 'array',
            'dimensiones' => 'array',
            'imagenes' => 'array',
            'documentos' => 'array',
            'mantenimientos' => 'array',
            'certificaciones' => 'array',
            'fecha_adquisicion' => 'date',
            'fecha_ultimo_mantenimiento' => 'date',
            'proxima_mantenimiento' => 'date',
            'tarifa_hora' => 'decimal:2',
            'tarifa_dia' => 'decimal:2',
            'tarifa_semana' => 'decimal:2',
            'tarifa_mes' => 'decimal:2',
            'horas_uso' => 'integer',
            'kilometraje' => 'integer',
        ];
    }

    /**
     * Check if machinery is available
     */
    public function isAvailable(): bool
    {
        return $this->disponibilidad === 'disponible' && $this->estado === 'operativo';
    }

    /**
     * Check if machinery needs maintenance
     */
    public function needsMaintenance(): bool
    {
        if (!$this->proxima_mantenimiento) {
            return false;
        }

        return $this->proxima_mantenimiento->isPast();
    }

    /**
     * Get main image URL
     */
    public function getMainImageAttribute(): string
    {
        if (!empty($this->imagenes) && isset($this->imagenes[0])) {
            return asset('storage/maquinaria/' . $this->imagenes[0]);
        }

        return asset('assets/images/maquinaria-placeholder.jpg');
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->estado) {
            'operativo' => 'bg-success',
            'mantenimiento' => 'bg-warning',
            'reparacion' => 'bg-danger',
            'inactivo' => 'bg-secondary',
            default => 'bg-secondary',
        };
    }

    /**
     * Get availability badge class
     */
    public function getAvailabilityBadgeClassAttribute(): string
    {
        return match($this->disponibilidad) {
            'disponible' => 'bg-success',
            'alquilado' => 'bg-primary',
            'reservado' => 'bg-info',
            'no_disponible' => 'bg-danger',
            default => 'bg-secondary',
        };
    }

    /**
     * Proyectos where this machinery is used
     */
    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, null, 'maquinaria_ids', 'proyecto_ids');
    }

    /**
     * Scope to get available machinery
     */
    public function scopeAvailable($query)
    {
        return $query->where('disponibilidad', 'disponible')
                     ->where('estado', 'operativo');
    }

    /**
     * Scope to filter by type
     */
    public function scopeByType($query, $type)
    {
        return $query->where('tipo', $type);
    }
}
