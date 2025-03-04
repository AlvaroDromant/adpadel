<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pala extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'modelo',
        'nivel_juego',
        'descripcion',
        'precio',
        'stock',
        'imagen'
    ];
}

