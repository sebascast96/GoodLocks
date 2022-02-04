      {{-- Modal editar Personal --}}
      <div class="modal fade" id="modal-updateC-{{ $cam->id }}" tabindex="-1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <form method="put" action="{{ route('modificar-cam', $cam->id) }}">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">IP actuales de camaras</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                          @csrf


                          <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Frente de calle</label>
                              <input type="text" name="frente" class="form-control" id="frente"
                                  value="{{ $cam->frente }}">
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Camara Placas</label>
                              <input type="text" name="placa" class="form-control" id="placa"
                                  value="{{ $cam->placa }}">
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Camara Ine</label>
                              <input type="text" name="ine" class="form-control" id="ine" value="{{ $cam->ine }}">
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Camara Salida</label>
                              <input type="text" name="salida" class="form-control" id="salida"
                                  value="{{ $cam->salida }}">
                          </div>


                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
                          <input type="submit" value="GUARDAR CAMBIOS" class="btn btn-primary">
                          {{-- <button type="submit" class="btn btn-primary">Guardar cambios</button> --}}
                      </div>
                  </div>
              </form>
          </div>
      </div>
      {{-- Fin modal editar personal --}}
