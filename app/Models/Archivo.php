<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $table='Archivos';
    protected $guarded = [
            "id",
          "id_proyecto",
          "url"
    ];


}
