<form class="kt-form" action="{{ route('administracion.asignacion.store') }}" method="post" id="form_asignacion">

    @csrf
    <div class="modal-header">
        <h5 class="modal-title kt-font-brand kt-font-bold" id="exampleModalLabel">
            @if ( $data->type == 'update' ) Editar @else Nuevo @endif
            Registro
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
                &times
            </span>
        </button>
    </div>
    <div class="modal-body">
        <input type="hidden" class="form-control" value="{{ $data->type }}" name="type">
        @if ( $data->type == 'update' )
            <input type="hidden" class="form-control" id="id" name="id" @if ( $data->type == 'update') value="{{ $data->id }}" @endif>
        @endif
            <input type="hidden" class="form-control" id="pid" name="item[id_usuario]" value="{{ $data->pid }}">
        <div class="form-group">
            <label for="message-text" class="form-control-label">
                Ente Gestor
            </label><br>
            <select class="form-control select2_general" id="id_ente_gestor" name="item[id_ente_gestor]" required style="width: 100%">
                <option></option>
                @foreach($data->entes as $ente)
                    <option value="{{ $ente->id }}" @if ($data->type == 'update' && $data->item->id_ente_gestor == $ente->id)selected="selected" @endif> {{ $ente->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
        </button>
        <button type="submit" class="btn btn-primary">
            @if ($data->type == 'update') Actualizar @else Guardar @endif
        </button>
    </div>
</form>

<script src="{{ asset('scripts/administracion/item/asignacion/modal.js') }}" type="text/javascript"></script>
