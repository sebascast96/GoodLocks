<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuracion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <main class="form-signin">
                            <p class="fs-2">Configuracion</p>
                            <form>
                                <p class="fs-4">Cambio de camaras</p>
                                <br>
                                <table id="example" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Frente de calle</th>
                                            <th>Camara de placas</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($camara as $cam)
                                            <tr>
                                                <td>{{ $cam->frente }}</td>
                                                <td>{{ $cam->placa }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modal-updateC-{{ $cam->id }}">
                                                        Modificar
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('components.modalcamaras')
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <p class="fs-4">Puertos arduino abiertos</p>
                                <br>

                                <table>
                                    <thead>
                                        <tr>
                                            <th>Puerto</th>
                                            <th>Abierto</th>
                                            <th>Cerrado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-success">Guardar</button>

                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
