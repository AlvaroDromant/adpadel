<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="py-10 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <a href="{{ route('palas.index') }}" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">Palas</a>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <a href="{{ route('palas.create') }}" class="block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-center">Añadir Pala</a>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <a href="{{ route('pedidos.adminpedidos') }}" class="block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded text-center">Gestionar Pedidos</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

