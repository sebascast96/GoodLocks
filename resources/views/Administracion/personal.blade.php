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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CrearServicio">
                            Crear nuevo servicio
                        </button>
                        @include('Administracion.componentes.crear-servicio')
                        <br><br>
                        <div class="card">
                            <div class="card-header">
                              CREAR PERSONAL
                            </div>
                            <div class="card-body">
                        
                            <form method="POST" class="formulario_guardar" action="{{route('crear-administracionP')}}">

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
                                <input value="{{old ('nombre')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px"  placeholder="Nombre completo" name="nombre"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>

                                <div class="input-group mb-3">
                                <input value="{{old ('direccion')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px"  placeholder="Direccion" name="direccion"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>

                                <div class="input-group mb-3">
                                <input value="{{old ('ine')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px"  placeholder="Ine" name="ine"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>

                                <div class="input-group mb-3">
                                <input value="{{old ('telefono')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px"  placeholder="Telefono" name="telefono"  type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                <input value="{{old ('tipo')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px"  placeholder="Tipo" name="tipo"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>

                                <div class="input-group mb-3">
                                <select  name="servicio"  style="margin: 2px;" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option selected >Servicio...</option>
                                    @foreach ($servicio as $item)
                                    <option value="{{ $item['servicio'] }}">{{ $item['servicio'] }}</option>
                                    @endforeach
                                </select>
                                </div>

                                <p class="text-uppercase fw-bolder">En caso de que el trabajador trabaje para un residente, favor de seleccionar para quien.</p>

                                <div class="input-group mb-3">
                                <select name="idr"  style="margin: 2px;" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option selected value="">Lista de residentes</option>
                                   
                                @foreach ($idr as $item)
                                <option value="{{ $item['id'] }}">{{ $item['nombre'] }} vive en {{ $item['direccion'] }}</option>
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