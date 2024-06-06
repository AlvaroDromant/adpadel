<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    use HasFactory;

    protected $fillable = ['pedido_id', 'pala_id', 'cantidad', 'precio'];

    public function pala()
    {
        return $this->belongsTo(Pala::class);
    }
}

