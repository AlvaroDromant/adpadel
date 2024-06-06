<?php


namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoItem;
use App\Models\Pala;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $carrito = Carrito::firstOrCreate(['user_id' => $user->id]);
        return view('carrito.index', compact('carrito'));
    }

    public function addToCarrito(Request $request, Pala $pala)
    {
        $user = auth()->user();
        $carrito = Carrito::firstOrCreate(['user_id' => $user->id]);

        $carritoItem = CarritoItem::firstOrCreate(
            ['carrito_id' => $carrito->id, 'pala_id' => $pala->id],
            ['cantidad' => 0]
        );

        $carritoItem->increment('cantidad');

        return redirect()->route('carrito.index')->with('success', 'Pala añadida al carrito.');
    }

    public function destroyItem(Carrito $carrito, CarritoItem $item)
    {
        $item->delete();
        return redirect()->route('carrito.index')->with('success', 'Pala eliminada del carrito.');
    }
}

