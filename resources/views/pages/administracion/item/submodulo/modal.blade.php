<form class="kt-form" action="{{ route('administracion.submodulo.store') }}" method="post" id="form_submodulo">

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

        <input type="hidden" class="form-control" name="item[model_id]" value="{{ $data->pid }}" id="model_id">
        <div class="form-group">
            <label for="message-text" class="form-control-label">
                Módulo
            </label><br>
            <select class=" form-control select2_general" id="id_mod" style="width: 100%" required>
                <option></option>
                @foreach($data->modulos as $modulo)
                    <option value="{{ $modulo->id }}" @if ($data->type == 'update' && $data->item->role_id == $modulo->id)selected="selected" @endif> {{ $modulo->modulo }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="message-text" class="form-control-label">
                Submódulo
            </label><br>
            <select class=" form-control select2_general" id="id_submodulo" name="item[role_id]" style="width: 100%" required disabled>
                <option></option>
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

<script src="{{ asset('scripts/administracion/item/submodulo/modal.js') }}" type="text/javascript"></script>


