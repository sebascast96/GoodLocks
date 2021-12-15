<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administracion') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('Busqueda.componentes.menu-busqueda')
                    <div class="container text-center">
                        <main class="form-signin">
                            <form>
                                <center><img src="{{asset('img/logo.png')}}" style="width: 140px; height: 140px;"></center>
                                <br>
                              <h1 class="h3 mb-3 fw-normal">PANEL BUSQUEDA</h1>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>