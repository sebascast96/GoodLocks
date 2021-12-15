<div class="modal fade" id="CrearServicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear nuevo Servicio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="container">
          <div class="modal-body">
     
            <form method="POST" action="{{route('craer-servicio')}}">
              @csrf 

              <p class="text-uppercase fw-bolder">Crear Servicio</p>
              <div class="input-group mb-3">
                <input required name="servicio" id="servicio" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" placeholder="Nombre del servicio">
                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Guardar Servicio</button>
              </div>

            </form>
            <br>
            <p class="text-uppercase fw-bolder">Servicios activos</p>
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Accion</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach ($servicio as $item)
                    <td>{{$item->servicio}}</td>
                    <td>
                      <form method="POST" action="{{route('eliminar-servicio', $item->id )}}">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                      </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>