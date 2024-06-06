<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Palas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('palas.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Añadir Nueva Pala</a>
                </div>

                <form method="GET" action="{{ route('palas.index') }}" class="mb-6 p-6 bg-gray-100 rounded-lg">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        
                        <div>
                            <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
                            <input type="text" name="marca" id="marca" value="{{ request('marca') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div>
                            <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
                            <input type="text" name="modelo" id="modelo" value="{{ request('modelo') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buscar</button>
                    </div>
                </form>

                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-800 text-white">
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Marca</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Modelo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nivel de Juego</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Precio</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Stock</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($palas as $pala)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pala->marca }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pala->modelo }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ \Illuminate\Support\Str::limit($pala->descripcion, 50) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pala->nivel_juego }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pala->precio }} €</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pala->stock }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('palas.edit', $pala->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Editar</a>
                                        <form action="{{ route('palas.destroy', $pala->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta pala?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 whitespace-nowrap text-center">No hay palas disponibles.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
