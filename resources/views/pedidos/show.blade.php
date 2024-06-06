<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('Detalles del Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg p-8">
                <div class="mb-6">
                    <a href="{{ route('pedidos.adminpedidos') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest shadow-lg hover:from-blue-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                        Volver 
                    </a>
                </div>
                <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-6">Detalles del pedido #{{ $pedido->id }}</h3>
                    <div class="space-y-4">
                        <p><span class="font-bold">Usuario:</span> {{ $pedido->user->name }}</p>
                        <p><span class="font-bold">Total:</span> {{ $pedido->total }} €</p>
                        <p><span class="font-bold">Fecha de Pedido:</span> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    
                    <h4 class="text-xl font-semibold mt-8 mb-4">Items del Pedido</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full border rounded-lg shadow-sm overflow-hidden">
                            <thead>
                                <tr class="bg-gradient-to-r from-gray-800 to-gray-700 text-white">
                                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">ID Item</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Marca</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Modelo</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Cantidad</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Precio</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($pedido->items as $item)
                                    <tr class="hover:bg-gray-100 transition ease-in-out duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->pala->marca }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->pala->modelo }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->cantidad }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->precio }} €</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->cantidad * $item->precio }} €</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
