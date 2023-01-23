<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disco extends Model
{
    use HasFactory;
    protected $table = 'discos';
    protected $fillable = [
        'titulo',
        'autor',
        'genero',
        'temporada',
        'caratula',
        'descripcion',
        'precio',
    ];
    protected $hidden = [];
}
