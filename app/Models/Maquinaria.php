<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maquinaria extends Model
{
    use HasFactory;

    protected $table = 'maquinaria';

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

    public function getMainImageAttribute(): string
    {
        if (!empty($this->imagenes) && isset($this->imagenes[0])) {
            return asset('storage/maquinaria/' . $this->imagenes[0]);
        }

        return asset('assets/images/maquinaria-placeholder.jpg');
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->estado) {
            'operativo' => 'bg-success',
            'mantenimiento' => 'bg-warning',
            'reparacion' => 'bg-danger',
            'inactivo' => 'bg-secondary',
            default => 'bg-secondary',
        };
    }

    public function getAvailabilityBadgeClassAttribute(): string
    {
        return match ($this->disponibilidad) {
            'disponible' => 'bg-success',
            'alquilado' => 'bg-primary',
            'reservado' => 'bg-info',
            'no_disponible' => 'bg-danger',
            default => 'bg-secondary',
        };
    }

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, null, 'maquinaria_ids', 'proyecto_ids');
    }

    public function isAvailable(): bool
    {
        return $this->disponibilidad === 'disponible' && $this->estado === 'operativo';
    }

    public function needsMaintenance(): bool
    {
        if (!$this->proxima_mantenimiento) {
            return false;
        }

        return $this->proxima_mantenimiento->isPast();
    }

    public function scopeAvailable($query)
    {
        return $query->where('disponibilidad', 'disponible')
            ->where('estado', 'operativo');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('tipo', $type);
    }
}
