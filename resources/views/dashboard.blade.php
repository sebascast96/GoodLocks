<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container text-center">
                        <form>
                            <center><img src="{{asset('img/logo.png')}}" style="width: 140px; height: 140px;"></center>
                            <br>
                        <h1 class="h3 mb-3 fw-normal">GOODLOCK</h1>
                            <p>Bienvenido {{Auth::user()->name}} al software de control de acceso de la familia
                            GoodLoock</p>
                        <p class="mt-5 mb-3 text-muted">GOODLOCK</p>
                        </form>
                    </div>
                    <div class="container">
                        @if (Auth::user()->nivel == 'adminT')
                            <center><h4>PERFIL MASTER DE GOODLOCK</h4>
                            <h5>Crera nuevo fraccionamiento</h5>
                        </center>

                        <div class="row">
                            <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Dar de alta fraccionamiento</h5>
                                  <p class="card-text">Presiona el boton para abrir el menu de alta de fraccionamiento</p>
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CrearFraccionamiento">
                                    Alta de fraccionamiento
                                  </button>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Ver fraccionamientos dados de alta</h5>
                                  <p class="card-text">Presiona el boton para ver el listado de fraccionamientos</p>
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#VerFraccionamiento">
                                    Alta de fraccionamiento
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Crear usuario administrador</h5>
                                  <p class="card-text">Crea un usuario administrador para que el fraccionamiento empiece a utilizar el software</p>
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Usuarios">
                                    Crear usuario administrador
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- MODALES --}}
{{-- MODAL CREAR FRACCIONAMIENTO --}}
<div class="modal fade" id="CrearFraccionamiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear fraccionamiento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{-- MODAL VER FRACCIONAMIENTOS --}}
  <div class="modal fade" id="VerFraccionamiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ver fraccionamiento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{-- MODAL CRAER USUARIOS ADMINISTRADORES--}}
  <div class="modal fade" id="Usuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear usuario administrador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
