<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable implements JWTSubject
{
    // public $transformer = UsuarioTransformer::class;

    use Notifiable;

    protected $fillable = [
        "nombre", "email", "password",
    ];

    public function libros() {
        return $this->belongsToMany(Libro::class)->withTimestamps();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
