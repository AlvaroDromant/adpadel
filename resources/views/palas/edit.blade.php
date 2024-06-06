<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Editar Pala: {{ $pala->marca }} - {{ $pala->modelo }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="w-full overflow-hidden rounded-lg shadow-lg bg-white p-8">
                <form action="{{ route('palas.update', $pala->id) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg mx-auto">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="marca" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">Marca</label>
                        <input type="text" name="marca" id="marca" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" value="{{ $pala->marca }}">
                    </div>
                    <div class="mb-6">
                        <label for="modelo" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" value="{{ $pala->modelo }}">
                    </div>
                    <div class="mb-6">
                        <label for="nivel_juego" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">Nivel de Juego</label>
                        <select name="nivel_juego" id="nivel_juego" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white">
                            <option value="Principiante" {{ $pala->nivel_juego == 'Principiante' ? 'selected' : '' }}>Principiante</option>
                            <option value="Intermedio" {{ $pala->nivel_juego == 'Intermedio' ? 'selected' : '' }}>Intermedio</option>
                            <option value="Avanzado" {{ $pala->nivel_juego == 'Avanzado' ? 'selected' : '' }}>Avanzado</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="descripcion" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="4" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white">{{ $pala->descripcion }}</textarea>
                    </div>
                    <div class="mb-6">
                        <label for="precio" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">Precio</label>
                        <input type="number" step="0.01" name="precio" id="precio" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" value="{{ $pala->precio }}">
                    </div>
                    <div class="mb-6">
                        <label for="stock" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">Stock</label>
                        <input type="number" name="stock" id="stock" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" value="{{ $pala->stock }}">
                    </div>
                    <div class="mb-6">
                        <label for="imagen" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white">
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">Actualizar Pala</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
