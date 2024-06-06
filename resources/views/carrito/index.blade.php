<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carrito') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
            <div class="shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Marca
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Modelo
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precio
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
                            $totalPagar = 0; 
                        @endphp

                        @foreach ($carrito->items as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->pala->marca }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->pala->modelo }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->cantidad }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->pala->precio * $item->cantidad }} €</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <form action="{{ route('carrito.items.destroy', [$carrito->id, $item->id]) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto del carrito?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $totalPagar += $item->pala->precio * $item->cantidad; 
                        @endphp
                        @endforeach

                        @if ($carrito->items->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                No hay productos en el carrito.
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

      
        <div class="mt-8 text-lg font-bold text-gray-800">
            Total a Pagar: {{ $totalPagar }} €
        </div>
        
        <div class="mt-8">
            <a href="{{ route('carrito.advertencia') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Advertencia: Leer las condiciones de pago antes de realizar el pedido</a>
        </div>
        
        <div class="mt-4">
            <form id="pedidoForm" action="{{ route('pedidos.store') }}" method="POST">
                @csrf
                <div class="flex items-center mb-4">
                    <input id="condiciones" type="checkbox" class="mr-2 leading-tight">
                    <label for="condiciones" class="text-sm text-gray-600">Acepto las condiciones de pago</label>
                </div>
               
                <button type="submit" 
                        class="font-bold py-2 px-4 rounded 
                               {{ $carrito->items->isEmpty() ? 'bg-gray-500 cursor-not-allowed' : 'bg-green-500 hover:bg-green-700 text-white' }}" 
                        {{ $carrito->items->isEmpty() ? 'disabled' : '' }} id="realizarPedido">
                    Realizar Pedido
                </button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('pedidoForm').addEventListener('submit', function(event) {
            var condicionesCheckbox = document.getElementById('condiciones');
            if (!condicionesCheckbox.checked) {
                event.preventDefault();
                alert('Tienes que aceptar las condiciones de pago.');
            }
        });
    </script>
</x-app-layout>

<footer class="bg-black py-4">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <img src="{{ asset('images/logopie.png') }}" alt="Logo" class="h-48 mx-auto">
        <div class="text-white ml-8 text-center">
            <ul class="mt-2">
                <li class="flex items-center">
                    <!-- Icono de Instagram -->
                    <svg class="h-9 w-5 fill-current text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 1.8.3 2.2.5.5.2.8.5 1.1.9.3.3.6.6.9 1.1.2.4.4 1 .5 2.2.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.3 1.8-.5 2.2-.2.5-.5.8-.9 1.1-.3.3-.6.6-1.1.9-.4.2-1 .4-2.2.5-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-1.8-.3-2.2-.5-.5-.2-.8-.5-1.1-.9-.3-.3-.6-.6-.9-1.1-.2-.4-.4-1-.5-2.2-.1-1.3-.1-1.7-.1-4.9s0-3.6.1-4.9c.1-1.2.3-1.8.5-2.2.2-.5.5-.8.9-1.1.3-.3.6-.6 1.1-.9.4-.2 1-.4 2.2-.5 1.3-.1 1.7-.1 4.9-.1m0-2.2c-3.3 0-3.7 0-5.1.1-1.4.1-2.3.3-3.1.6-.8.3-1.4.7-2 1.3-.6.6-1 1.2-1.3 2-.3.8-.5 1.7-.6 3.1C2 8.3 2 8.7 2 12s0 3.7.1 5.1c.1 1.4.3 2.3.6 3.1.3.8.7 1.4 1.3 2 .6.6 1.2 1 2 1.3.8.3 1.7.5 3.1.6 1.4.1 1.8.1 5.1.1s3.7 0 5.1-.1c1.4-.1 2.3-.3 3.1-.6.8-.3 1.4-.7 2-1.3.6-.6 1-1.2 1.3-2 .3-.8.5-1.7.6-3.1.1-1.4.1-1.8.1-5.1s0-3.7-.1-5.1c-.1-1.4-.3-2.3-.6-3.1-.3-.8-.7-1.4-1.3-2-.6-.6-1.2-1-2-1.3-.8-.3-1.7-.5-3.1-.6C15.7.2 15.3.2 12 .2zm0 5.8c-3.4 0-6.2 2.8-6.2 6.2s2.8 6.2 6.2 6.2 6.2-2.8 6.2-6.2-2.8-6.2-6.2-6.2zm0 10.2c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm6.4-11.8c-.8 0-1.5.7-1.5 1.5s.7 1.5 1.5 1.5 1.5-.7 1.5-1.5-.7-1.5-1.5-1.5z"/>
                    </svg>

                    <span class="text-sm">Instagram: adpadel10</span>
                </li>
                <li class="flex items-center mt-1">
                    <!-- Icono de Teléfono -->
                    <svg class="h-9 w-5 fill-current text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.27 1.12.28 2.33.43 3.57.43.55 0 1 .45 1 1v3.5c0 .55-.45 1-1 1C10.29 21 3 13.71 3 4.5c0-.55.45-1 1-1H7.5c.55 0 1 .45 1 1 0 1.24.15 2.45.43 3.57.09.35 0 .74-.27 1.02l-2.2 2.2z"/>
                    </svg>

                    <span class="text-sm">Teléfono: xxx xxx xxx</span>
                </li>
                <li class="flex items-center mt-1">
                    <!-- Icono de Email -->
                    <svg class="h-9 w-5 fill-current text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path d="M20.25 0h-16.5C2.01 0 0 2.01 0 4.5v15C0 21.99 2.01 24 4.5 24h16.5C22.99 24 24 21.99 24 19.5v-15C24 2.01 21.99 0 19.5 0zM17 18H7v-1.5h10V18zM17 15.75H7V13h10v2.75zM17 11H7V9.25h10V11zM5.25 18V4.5c0-.83.67-1.5 1.5-1.5h12c.83 0 1.5.67 1.5 1.5v13.5c0 .83-.67 1.5-1.5 1.5h-12c-.83 0-1.5-.67-1.5-1.5zm1.5-12.75c0-.41.34-.75.75-.75h12c.41 0 .75.34.75.75v2.25H6.75V5.25zM6.75 15h12v2.25h-12V15z"/>
                    </svg>

                    <span class="text-sm">Email: adpadel10@gmail.com</span>
                </li>
            </ul>
        </div>
    </div>
</footer>
