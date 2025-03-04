<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoItem extends Model
{
    use HasFactory;

    protected $fillable = ['carrito_id', 'pala_id', 'cantidad'];

    public function pala()
    {
        return $this->belongsTo(Pala::class);
    }
}

