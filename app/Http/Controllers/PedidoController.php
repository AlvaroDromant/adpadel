<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\PedidoItem;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function store()
    {
        $user = auth()->user();
        $carrito = Carrito::where('user_id', $user->id)->firstOrFail();

        $total = $carrito->items->sum(function ($item) {
            return $item->cantidad * $item->pala->precio;
        });

        $pedido = Pedido::create([
            'user_id' => $user->id,
            'total' => $total,
        ]);

        foreach ($carrito->items as $item) {
            PedidoItem::create([
                'pedido_id' => $pedido->id,
                'pala_id' => $item->pala_id,
                'cantidad' => $item->cantidad,
                'precio' => $item->pala->precio,
            ]);
        }

        $carrito->items()->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido realizado correctamente.');
    }

    public function index()
    {
        $user = auth()->user();
        $pedidos = Pedido::where('user_id', $user->id)->with('items.pala')->get();

        return view('pedidos.index', compact('pedidos'));
    }

    public function admin()
    {
        $pedidos = Pedido::all();
        return view('pedidos.adminpedidos', compact('pedidos'));
    }

    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedidos.adminpedidos')->with('success', 'Pedido eliminado correctamente.');
    }

    public function update(Request $request, Pedido $pedido)
    {
        $pedido->update([
            'estado' => $request->estado,
        ]);

        return redirect()->route('pedidos.adminpedidos')->with('success', 'Estado del pedido actualizado correctamente.');
    }

 
}
