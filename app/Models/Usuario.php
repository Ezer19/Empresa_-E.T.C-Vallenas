<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model implements AuthenticatableContract
{
    use Authenticatable, Notifiable;

    protected $connection = 'mongodb';
    protected $collection = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'telefono',
        'empresa',
        'cargo',
        'rol',
        'avatar',
        'estado',
        'email_verified_at',
        'last_login_at',
        'preferencias',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'password' => 'hashed',
            'preferencias' => 'array',
        ];
    }

    /**
     * Get full name attribute
     */
    public function getNombreCompletoAttribute(): string
    {
        return "{$this->nombre} {$this->apellido}";
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return in_array($this->rol, ['admin', 'superadmin']);
    }

    /**
     * Check if user is super admin
     */
    public function isSuperAdmin(): bool
    {
        return $this->rol === 'superadmin';
    }

    /**
     * Check if user is active
     */
    public function isActive(): bool
    {
        return $this->estado === 'activo';
    }

    /**
     * Proyectos assigned to this user
     */
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'responsable_id');
    }

    /**
     * Get avatar URL
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return asset('storage/avatars/' . $this->avatar);
        }
        
        // Generate Gravatar URL
        $hash = md5(strtolower(trim($this->email)));
        return "https://www.gravatar.com/avatar/{$hash}?d=mp&s=200";
    }
}
