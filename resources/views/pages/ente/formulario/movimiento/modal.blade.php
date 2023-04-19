<form class="kt-form" action="{{ route('ente_formulario.movimiento.store') }}" method="post" id="form_ente_formulario_movimiento">

    @csrf
    <div class="modal-header">
        <h5 class="modal-title kt-font-brand kt-font-bold" id="exampleModalLabel">
            @if ( $data->tipo == 'update' ) Editar @else Nuevo @endif
            Registro
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
                &times
            </span>
        </button>
    </div>
    <div class="modal-body">
        <input type="hidden" class="form-control" value="{{ $data->tipo }}" name="type">
        @if ( $data->tipo == 'update' )
            <input type="hidden" class="form-control" id="id" name="id" @if ( $data->tipo == 'update') value="{{ $data->id }}" @endif>
        @endif

        <input type="hidden" class="form-control" id="pid" name="item[id_empleador]" value="{{ $data->pid }}">

        <div class="form-group">
            <label>Estado:</label>
            <select style="width: 100%" class=" form-control m-select2 select2_general" id="id_estado" name="item[id_estado]" required>
                <option></option>
                @foreach($data->estados as $estado)
                    <option value="{{ $estado->id }}" @if ($data->tipo == 'update' && $data->item->id_estado == $estado->id) selected="selected" @endif> {{ $estado->nombre }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
        </button>
        <button type="submit" class="btn btn-primary">
            @if ($data->tipo == 'update') Actualizar @else Guardar @endif
        </button>
    </div>
</form>

<script src="{{ asset('scripts/ente/formulario/movimiento/modal.js') }}" type="text/javascript"></script>
