<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    protected $table='Mensajes';

    protected $guarded=[
        "id_mensaje",
        "id_proyecto",
        "descripcion"
        ,"creador",
        "fecha"
    ];
}
