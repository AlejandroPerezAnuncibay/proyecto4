<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table='Usuarios';

    protected $guarded=[
        'id',
        'nombre',
        'apellido',
        'contrasena',
        'email',
        'fecha_nac'
    ];
}
