 <!--Css Datatables-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">

 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Busqueda') }}
         </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 bg-white border-b border-gray-200">
                     @include('Busqueda.componentes.menu-busqueda')
                     <div class="container">
                         <main class="form-signin">
                             <p class="fs-2">Buscar Residente</p>
                             <a href="{{ route('excel-residente') }}" class="btn btn-primary">Exportar Excel</a>
                             <br>
                             <br>
                             {{ \Carbon\Carbon::now()->submonth(2) }}
                             <table id="example" class="table table-striped">
                                 <thead>
                                     <tr>
                                         <th>Nombre</th>
                                         <th>Direccion</th>
                                         <th>Tipo</th>
                                         <th>Status</th>
                                         <th>Detalle</th>
                                         <th>Asignar corresidentes</th>
                                         <th>Eliminar</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($BR as $itemR)
                                         <tr>
                                             <td>{{ $itemR->nombre }}</td>
                                             <td>{{ $itemR->direccion }}</td>
                                             <td>{{ $itemR->tipo }}</td>

                                             @if (\Carbon\Carbon::parse($itemR->fecha_pago)->between(\Carbon\Carbon::now()->submonth(), \Carbon\Carbon::now()))
                                                 <td><span
                                                         class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Pagado</span>
                                                 </td>
                                             @elseif (\Carbon\Carbon::parse($itemR->fecha_pago)->between(\Carbon\Carbon::now()->submonth(), \Carbon\Carbon::now()->submonth(2)))
                                                 <td><span
                                                         class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">Moroso
                                                         1 mes</span></td>
                                             @elseif (\Carbon\Carbon::parse($itemR->fecha_pago)->lessThan(\Carbon\Carbon::now()->submonth(2)))
                                                 <td><span
                                                         class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Moroso
                                                         1+ meses</span></td>
                                             @endif
                                             <td>
                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                     data-bs-target="#modal-updateR-{{ $itemR->id }}">
                                                     Detalle
                                                 </button>
                                             </td>
                                             <td>
                                                 <a href="{{ route('index-coresidente', $itemR) }}"
                                                     class="btn btn-primary">
                                                     Coresidentes
                                                 </a>
                                             </td>
                                             <td>
                                                 <form method="post"
                                                     action="{{ route('eliminar-residente', $itemR) }}">
                                                     @csrf
                                                     @method('delete')
                                                     <button type="submit" class="btn btn-danger"
                                                         onclick="return confirm('Estas seguro de querer borrar el registro')">Eliminar</button>
                                                 </form>
                                             </td>
                                         </tr>
                                         @include('Busqueda.componentes.modalR')
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

 <!--Js Datatables-->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
 <script>
     function payment(id) {
         fetch('residentes/payment/' + id, {
                 method: "PUT",
             })
             .then(response => response)
             .then(json => console.log(json))
             .catch(err => console.log(err));
     }

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
