<!--Css-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <main class="form-signin">
                            <p class="fs-2">Buscar Usuario</p>

                            <a type="submit" href="{{route('index-register')}}" class="btn btn-dark">Crear nuevo usuario</a>
                            
                            <br>
                            <br>
                            <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Nivel</th>
                                <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $itemR)
                                <tr>
                                <td>{{$itemR->id}}</td>
                                <td>{{$itemR->name}}</td>
                                <td>{{$itemR->email}}</td>
                                <td>{{$itemR->nivel}}</td>
                                <td>
                                    <form method="post" action="{{route('eliminar-usuario', $itemR)}}">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de querer borrar el registro')">Eliminar</button>
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>        
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 

<!--Js-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script>
    $('#example').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontro el resultado",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro el resultado",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            'search': "Buscar:"
        }
    });  
</script>
