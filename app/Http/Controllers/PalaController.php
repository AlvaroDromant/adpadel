<?php

namespace App\Http\Controllers;

use App\Models\Pala;
use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PalaController extends Controller
{
    public function index(Request $request)
    {

        $query = Pala::query();

        if ($request->filled('marca')) {
            $query->where('marca', $request->marca);
        }

        if ($request->filled('modelo')) {
            $query->where('modelo', $request->modelo);
        }
    
    
        $palas = $query->get();
    
        return view('palas.index', compact('palas'));
    }

    public function create()
    {
        return view('palas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'nivel_juego' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/photos');
            $validated['imagen'] = $path;
        }

        Pala::create($validated);

        return redirect()->route('palas.index');
    }

    public function show(Pala $pala)
    {
        return view('palas.show', compact('pala'));
    }

    public function edit(Pala $pala)
    {
        return view('palas.edit', compact('pala'));
    }

    public function update(Request $request, Pala $pala)
    {
        $validated = $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'nivel_juego' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/photos');
            Storage::delete($pala->imagen);
            $validated['imagen'] = $path;
        }

        $pala->update($validated);

        return redirect()->route('palas.index');
    }

    public function destroy(Pala $pala)
    {
        if ($pala->imagen) {
            Storage::delete($pala->imagen);
        }

        $pala->delete();

        return redirect()->route('palas.index')->with('success', 'Pala eliminada correctamente.');
    }

    public function misPalas()
    {
        $user = auth()->user();

        $palas = Pala::where('marca', 'AD')->get();
        return view('palas.mispalas', compact('palas'));
    }

    public function userPalas(Request $request)
{
    $query = Pala::query();

    if ($request->filled('marca')) {
        $query->where('marca', $request->marca);
    }

    if ($request->filled('nivel_juego')) {
        $query->where('nivel_juego', $request->nivel_juego);
    }

    if ($request->filled('precio_min')) {
        $query->where('precio', '>=', $request->precio_min);
    }

    if ($request->filled('precio_max')) {
        $query->where('precio', '<=', $request->precio_max);
    }

    $palas = $query->get();

    return view('user.userpalas', compact('palas'));
}

}
