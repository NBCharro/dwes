<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $table = 'articulos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'envio',
        'stock',
        'observaciones',
        "imagen"
    ];
    protected $hidden = [];
}
