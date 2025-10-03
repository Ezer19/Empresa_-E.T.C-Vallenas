<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Proyecto extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'proyectos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'codigo',
        'tipo',
        'descripcion',
        'cliente',
        'contacto_cliente',
        'email_cliente',
        'telefono_cliente',
        'ubicacion',
        'direccion',
        'coordenadas',
        'fecha_inicio',
        'fecha_fin',
        'fecha_estimada_fin',
        'duracion_dias',
        'estado',
        'prioridad',
        'presupuesto',
        'costo_actual',
        'moneda',
        'responsable_id',
        'responsable_nombre',
        'equipo',
        'maquinaria_ids',
        'maquinaria_detalles',
        'servicios_incluidos',
        'hitos',
        'avance_porcentaje',
        'imagenes',
        'documentos',
        'notas',
        'riesgos',
        'certificaciones_requeridas',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'coordenadas' => 'array',
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date',
            'fecha_estimada_fin' => 'date',
            'presupuesto' => 'decimal:2',
            'costo_actual' => 'decimal:2',
            'equipo' => 'array',
            'maquinaria_ids' => 'array',
            'maquinaria_detalles' => 'array',
            'servicios_incluidos' => 'array',
            'hitos' => 'array',
            'imagenes' => 'array',
            'documentos' => 'array',
            'notas' => 'array',
            'riesgos' => 'array',
            'certificaciones_requeridas' => 'array',
            'avance_porcentaje' => 'integer',
            'duracion_dias' => 'integer',
        ];
    }

    /**
     * Get responsable user
     */
    public function responsable()
    {
        return $this->belongsTo(Usuario::class, 'responsable_id');
    }

    /**
     * Get maquinaria used in this project
     */
    public function maquinaria()
    {
        return $this->belongsToMany(Maquinaria::class, null, 'proyecto_ids', 'maquinaria_ids');
    }

    /**
     * Check if project is active
     */
    public function isActive(): bool
    {
        return $this->estado === 'en_progreso';
    }

    /**
     * Check if project is completed
     */
    public function isCompleted(): bool
    {
        return $this->estado === 'completado';
    }

    /**
     * Check if project is delayed
     */
    public function isDelayed(): bool
    {
        if (!$this->fecha_estimada_fin) {
            return false;
        }

        return now()->greaterThan($this->fecha_estimada_fin) && !$this->isCompleted();
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->estado) {
            'planificacion' => 'bg-info',
            'en_progreso' => 'bg-primary',
            'pausado' => 'bg-warning',
            'completado' => 'bg-success',
            'cancelado' => 'bg-danger',
            default => 'bg-secondary',
        };
    }

    /**
     * Get priority badge class
     */
    public function getPriorityBadgeClassAttribute(): string
    {
        return match($this->prioridad) {
            'alta' => 'bg-danger',
            'media' => 'bg-warning',
            'baja' => 'bg-info',
            default => 'bg-secondary',
        };
    }

    /**
     * Get main image URL
     */
    public function getMainImageAttribute(): string
    {
        if (!empty($this->imagenes) && isset($this->imagenes[0])) {
            return asset('storage/proyectos/' . $this->imagenes[0]);
        }

        return asset('assets/images/proyecto-placeholder.jpg');
    }

    /**
     * Get budget status
     */
    public function getBudgetStatusAttribute(): string
    {
        if (!$this->presupuesto || !$this->costo_actual) {
            return 'sin_datos';
        }

        $percentage = ($this->costo_actual / $this->presupuesto) * 100;

        if ($percentage <= 75) {
            return 'en_presupuesto';
        } elseif ($percentage <= 90) {
            return 'proximo_limite';
        } else {
            return 'sobre_presupuesto';
        }
    }

    /**
     * Get days remaining
     */
    public function getDaysRemainingAttribute(): ?int
    {
        if (!$this->fecha_estimada_fin) {
            return null;
        }

        return now()->diffInDays($this->fecha_estimada_fin, false);
    }

    /**
     * Scope to get active projects
     */
    public function scopeActive($query)
    {
        return $query->where('estado', 'en_progreso');
    }

    /**
     * Scope to filter by type
     */
    public function scopeByType($query, $type)
    {
        return $query->where('tipo', $type);
    }

    /**
     * Scope to filter by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('estado', $status);
    }
}
