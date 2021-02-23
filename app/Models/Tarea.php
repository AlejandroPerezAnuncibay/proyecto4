<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table='Tareas';

    protected $guarded = [
        'id_tarea',
        'id_proyecto',
        'fecha_vencimiento',
        'usuario_asignado',
        'descripcion',
        'realizado'
    ];
}
