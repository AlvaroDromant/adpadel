<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <img class="w-full mx-auto border-4 border-gray-300 shadow-lg rounded-lg" src="{{ asset('images/inicio2.png') }}" alt="Imagen de inicio">
    </div>

    <!-- Contenido -->
    <div class="py-12 bg-gray-100 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg p-8">
                <div class="flex flex-col lg:flex-row items-center mb-6 justify-center text-center lg:text-left">
                    <img src="{{ asset('images/ADlogo.png') }}" alt="Logo de AD Padel" class="h-24 w-24 lg:h-48 lg:w-48 mr-0 lg:mr-6 shadow-md rounded-full">
                    <h1 class="text-4xl font-bold text-gray-800 mt-4 lg:mt-0">¡Bienvenido a AD Padel!</h1>
                </div>
                <p class="text-lg text-gray-700 leading-relaxed text-center">
                    En nuestra página web, encontrarás una amplia selección de palas de pádel de alta calidad, diseñadas para satisfacer las necesidades de jugadores de todos los niveles.<br><br>
                    ¡Explora nuestra colección y descubre el equilibrio perfecto entre potencia, control y confort!
                </p>
            </div>
        </div>
    </div>
</x-app-layout>

<footer class="bg-black py-4">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
        <img src="{{ asset('images/logopie.png') }}" alt="Logo" class="h-24 w-24 md:h-48 md:w-48 mx-auto">
        <div class="text-white mt-4 md:mt-0 ml-0 md:ml-8 text-center md:text-left">
            <ul class="mt-2 space-y-2">
                <li class="flex items-center justify-center md:justify-start">
                    <!-- Icono de Instagram -->
                    <svg class="h-6 w-6 md:h-9 md:w-5 fill-current text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 1.8.3 2.2.5.5.2.8.5 1.1.9.3.3.6.6.9 1.1.2.4.4 1 .5 2.2.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.3 1.8-.5 2.2-.2.5-.5.8-.9 1.1-.3.3-.6.6-1.1.9-.4.2-1 .4-2.2.5-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-1.8-.3-2.2-.5-.5-.2-.8-.5-1.1-.9-.3-.3-.6-.6-.9-1.1-.2-.4-.4-1-.5-2.2-.1-1.3-.1-1.7-.1-4.9s0-3.6.1-4.9c.1-1.2.3-1.8.5-2.2.2-.5.5-.8.9-1.1.3-.3.6-.6 1.1-.9.4-.2 1-.4 2.2-.5 1.3-.1 1.7-.1 4.9-.1m0-2.2c-3.3 0-3.7 0-5.1.1-1.4.1-2.3.3-3.1.6-.8.3-1.4.7-2 1.3-.6.6-1 1.2-1.3 2-.3.8-.5 1.7-.6 3.1C2 8.3 2 8.7 2 12s0 3.7.1 5.1c.1 1.4.3 2.3.6 3.1.3.8.7 1.4 1.3 2 .6.6 1.2 1 2 1.3.8.3 1.7.5 3.1.6 1.4.1 1.8.1 5.1.1s3.7 0 5.1-.1c1.4-.1 2.3-.3 3.1-.6.8-.3 1.4-.7 2-1.3.6-.6 1.2-1 2-1.3.8-.3 1.7-.5 3.1-.6C15.7.2 15.3.2 12 .2zm0 5.8c-3.4 0-6.2 2.8-6.2 6.2s2.8 6.2 6.2 6.2 6.2-2.8 6.2-6.2-2.8-6.2-6.2-6.2zm0 10.2c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm6.4-11.8c-.8 0-1.5.7-1.5 1.5s.7 1.5 1.5 1.5 1.5-.7 1.5-1.5-.7-1.5-1.5-1.5z"/>
                    </svg>
                    <span class="text-sm md:text-base">Instagram: adpadel10</span>
                </li>
                <li class="flex items-center mt-1 justify-center md:justify-start">
                    <!-- Icono de Teléfono -->
                    <svg class="h-6 w-6 md:h-9 md:w-5 fill-current text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.27 1.12.28 2.33.43 3.57.43.55 0 1 .45 1 1v3.5c0 .55-.45 1-1 1C10.29 21 3 13.71 3 4.5c0-.55.45-1 1-1H7.5c.55 0 1 .45 1 1 0 1.24.15 2.45.43 3.57.09.35 0 .74-.27 1.02l-2.2 2.2z"/>
                    </svg>
                    <span class="text-sm md:text-base">Teléfono: xxx xxx xxx</span>
                </li>
                <li class="flex items-center mt-1 justify-center md:justify-start">
                    <!-- Icono de Email -->
                    <svg class="h-6 w-6 md:h-9 md:w-5 fill-current text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20.25 0h-16.5C2.01 0 0 2.01 0 4.5v15C0 21.99 2.01 24 4.5 24h16.5C22.99 24 24 21.99 24 19.5v-15C24 2.01 21.99 0 19.5 0zM17 18H7v-1.5h10V18zM17 15.75H7V13h10v2.75zM17 11H7V9.25h10V11zM5.25 18V4.5c0-.83.67-1.5 1.5-1.5h12c.83 0 1.5.67 1.5 1.5v13.5c0 .83-.67 1.5-1.5 1.5h-12c-.83 0-1.5-.67-1.5-1.5zm1.5-12.75c0-.41.34-.75.75-.75h12c.41 0 .75.34.75.75v2.25H6.75V5.25zM6.75 15h12v2.25h-12V15z"/>
                    </svg>
                    <span class="text-sm md:text-base">Email: adpadel10@gmail.com</span>
                </li>
            </ul>
        </div>
    </div>
</footer>
