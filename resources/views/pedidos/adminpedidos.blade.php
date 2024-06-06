<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos los Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Todos los pedidos</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gray-800 text-white">
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID Pedido</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Usuario</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($pedidos as $pedido)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pedido->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pedido->user ? $pedido->user->name : 'Usuario Eliminado' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pedido->total }} €</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pedido->created_at->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('pedidos.update', ['pedido' => $pedido->id]) }}" method="POST" id="pedido-form-{{ $pedido->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <select name="estado" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md" onchange="submitForm('{{ $pedido->id }}')">
                                                    <option value="Esperando Confirmación de Pago" {{ $pedido->estado === "Esperando Confirmación de Pago" ? 'selected' : '' }}>Esperando Confirmación de Pago</option>
                                                    <option value="En Proceso de Envío" {{ $pedido->estado === "En Proceso de Envío" ? 'selected' : '' }}>En Proceso de Envío</option>
                                                    <option value="En Ruta de Entrega" {{ $pedido->estado === "En Ruta de Entrega" ? 'selected' : '' }}>En Ruta de Entrega</option>
                                                    <option value="Entregado" {{ $pedido->estado === "Entregado" ? 'selected' : '' }}>Entregado</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('pedidos.show', ['pedido' => $pedido->id]) }}" class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>
                                            <form action="{{ route('pedidos.destroy', ['pedido' => $pedido->id]) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Eliminar</button>
                                            </form>
                                        </td>
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

<script>
    function submitForm(pedidoId) {
        document.getElementById('pedido-form-' + pedidoId).submit();
    }
</script>
