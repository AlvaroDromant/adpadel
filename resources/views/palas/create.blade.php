<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('Agregar Pala') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('palas.index') }}" class="inline-block bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded shadow">Volver a Palas</a>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <form action="{{ route('palas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                            <strong class="font-bold">¡Ups! Algo salió mal.</strong>
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                        <label for="marca" class="block text-sm font-medium text-gray-700 mb-1">Marca</label>
                        <input type="text" name="marca" id="marca" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div>
                        <label for="modelo" class="block text-sm font-medium text-gray-700 mb-1">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div>
                        <label for="nivel_juego" class="block text-sm font-medium text-gray-700 mb-1">Nivel de Juego</label>
                        <select name="nivel_juego" id="nivel_juego" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                            <option value="principiante">Principiante</option>
                            <option value="intermedio">Intermedio</option>
                            <option value="avanzado">Avanzado</option>
                        </select>
                    </div>
                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"></textarea>
                    </div>
                    <div>
                        <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                        <input type="decimal" name="precio" id="precio" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                        <input type="number" name="stock" id="stock" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div>
                        <label for="imagen" class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow-lg transition duration-300">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
