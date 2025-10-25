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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'password' => 'hashed',
            'preferencias' => 'array',
        ];
    }

    public function getNombreCompletoAttribute(): string
    {
        return "{$this->nombre} {$this->apellido}";
    }

    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return asset('storage/avatars/' . $this->avatar);
        }
        
        $hash = md5(strtolower(trim($this->email)));
        return "https://www.gravatar.com/avatar/{$hash}?d=mp&s=200";
    }

    public function isAdmin(): bool
    {
        return in_array($this->rol, ['admin', 'superadmin']);
    }

    public function isSuperAdmin(): bool
    {
        return $this->rol === 'superadmin';
    }

    public function isActive(): bool
    {
        return $this->estado === 'activo';
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'responsable_id');
    }
}