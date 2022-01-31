{{-- Modal editar Personal --}}
<div class="modal fade" id="modal-updateR-{{ $itemR->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de {{ $itemR->nombre }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('update-residente', $itemR->id) }}">
                    @csrf @method('put')


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
                        Nombre
                        <input value="{{ $itemR->nombre }}" onkeyup="javascript:this.value=this.value.toUpperCase();"
                            style="margin: 2px" required placeholder="Nombre completo" name="nombre" type="text"
                            class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>

                    <div class="input-group mb-3">
                        Dirección
                        <input value="{{ $itemR->direccion }}"
                            onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required
                            placeholder="Direccion" name="direccion" type="text" class="form-control" id="basic-url"
                            aria-describedby="basic-addon3">
                    </div>

                    <div class="input-group mb-3">
                        Telefono
                        <input value="{{ $itemR->telefono }}"
                            onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required
                            placeholder="Telefono" name="telefono" type="number" class="form-control" id="basic-url"
                            aria-describedby="basic-addon3">
                        Correo
                        <input value="{{ $itemR->correo }}" style="margin: 2px" required placeholder="Correo"
                            name="correo" type="email" class="form-control" id="basic-url"
                            aria-describedby="basic-addon3">
                    </div>

                    <div class="input-group mb-3">
                        Tipo
                        <select name="tipo" style="margin: 2px;" class="form-select" id="inputGroupSelect04"
                            aria-label="Example select with button addon">
                            <option value="{{ $itemR->tipo }}">{{ $itemR->tipo }}</option>
                            @foreach ($tipo as $item)
                                <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        TAG
                        <input type="text" class="form-control" value="{{ $itemR->tag }}">
                    </div>
                    <div class="input-group mb-3">
                        Fecha del ultimo pago
                        <input type="text" class="form-control" value="{{ $itemR->fecha_pago }}">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                    onclick="payment({{ $itemR->id }})">Registrar
                    pago</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
                <input type="submit" value="GUARDAR CAMBIOS" class="btn btn-primary">
                {{-- <button type="submit" class="btn btn-primary">Guardar cambios</button> --}}
            </div>
        </div>
    </div>
</div>
</form>
{{-- Fin modal editar personal --}}
