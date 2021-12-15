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
                    @include('Administracion.componentes.menu-administracion')
                    <div class="container">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CrearTipo">
                            Crear nuevo tipo de residente
                        </button>
                        @include('Administracion.componentes.crear-tipoR')
                        <br><br>
                        <div class="card">
                            <div class="card-header">
                              CREAR RESIDENTE
                            </div>
                            <div class="card-body">

                            <form method="POST" class="formulario_guardar" action="{{route('crear-administracionR')}}">

                                @csrf

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="input-group mb-3">
                                <input value="{{old ('nombre')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" placeholder="Nombre completo" name="nombre"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                        
                                <div class="input-group mb-3">
                                <input value="{{old ('direccion')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" placeholder="Direccion" name="direccion"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                        
                                <div class="input-group mb-3">
                                <input value="{{old ('telefono')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" placeholder="Telefono" name="telefono"  type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                <input value="{{old ('correo')}}" style="margin: 2px" placeholder="Correo" name="correo"  type="email" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                        
                                <div class="input-group mb-3">
                                <select name="tipo"  style="margin: 2px;" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option selected value="">Escoja el tipo de residente...</option>
                                @foreach ($tipo as $item)
                                <option value="{{ $item['tipo'] }}">{{ $item['tipo'] }}</option>
                                @endforeach 
                                </select>
                                </div>

                                <center><input type="submit" value="GUARDAR" name="guardar" class="btn btn-primary"></center>

                            </form>

                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>