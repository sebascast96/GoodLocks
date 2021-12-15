<div class="modal fade" id="CrearTipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear nuevo Servicio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="container">
          <div class="modal-body">
     
            <form method="POST" action="{{route('craer-tipo')}}">
              @csrf 

              <p class="text-uppercase fw-bolder">Crear Tipo de residente</p>
              <div class="input-group mb-3">
                <input required name="tipo" id="tipo" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" placeholder="Nombre del servicio">
                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Guardar Servicio</button>
              </div>

            </form>
            <br>
            <p class="text-uppercase fw-bolder">Tipo de residentes activos</p>
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Accion</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach ($tipo as $item)
                    <td>{{$item->tipo}}</td>
                    <td>
                      <form method="POST" action="{{route('eliminar-tipo', $item->id )}}">
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