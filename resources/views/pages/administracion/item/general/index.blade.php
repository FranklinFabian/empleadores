<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header justify-content-left">
        <h3 class="card-title">Datos Generales</h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <!-- <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span> -->
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form action="{{ route('administracion.general.store') }}" method="post" id="form">
        @if ( $data->tipo == 'update' )
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $data->pid }}">
        @endif
            <input type="hidden" class="form-control" id="type" name="type" value="{{ $data->tipo }}">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Ingrese un nombre" name="item[name]" @if ( $data->tipo == 'update') value="{{ $data->item->name }}" @endif required/>
                            <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Estado:<span class="text-danger">*</span></label><br>
                            <select class=" form-control select2_general" id="id_estado" name="item[id_estado]" required >
                                <option></option>
                                @foreach($data->estados as $estado)
                                    <option value="{{ $estado->id }}" @if ($data->tipo == 'update' && $data->item->id_estado == $estado->id) selected="selected" @endif> {{ $estado->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Correo<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Ingrese un nombre" name="item[email]" @if ( $data->tipo == 'update') value="{{ $data->item->email }}" @endif required/>
                            <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password @if($data->tipo == 'new') <span class="text-danger">*</span> @endif</label>
                            <input type="password" class="form-control" @if($data->tipo == 'new') placeholder="Ingrese un password" @else placeholder="************" @endif  name="item[password]" @if ( $data->tipo == 'new') required @endif />
                            @if($data->tipo == 'update')
                                <span class="form-text text-danger">Si no desea cambiar el password deje el campo en blanco</span>
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Guardar</button>
            <!-- <button type="reset" class="btn btn-secondary float-right mr-2">Cancelar</button> -->
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->

{{-- Scripts Section --}}
<script src="{{ asset('scripts/administracion/item/general/index.js') }}" type="text/javascript"></script>






