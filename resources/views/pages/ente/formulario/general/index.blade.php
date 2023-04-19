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
    <form method="post" action="{{ route('ente_formulario.general.store') }}" id="form_ente_formulario_general">
        <input type="hidden" class="form-control" value="{{ $data->tipo }}" name="tipo">
        @if ( $data->tipo == 'update' )
            <input type="hidden" class="form-control" id="id" name="id" @if ( $data->tipo == 'update') value="{{ $data->pid }}" @endif>
        @endif

        <div class="card-body">

            <div class="row">
                <div class="col-lg-6">
                <!--<div class="form-group">
                        <label>Ente Gestor:</label>
                        <select style="width: 100%" class=" form-control m-select2 select2_general" id="id_ente_gestor" name="item[id_ente_gestor]" required>
                            <option></option>
                            @foreach($data->entes as $ente)
                                <option value="{{ $ente->id }}" @if ($data->tipo == 'update' && $data->item->id_ente_gestor == $ente->id) selected="selected" @endif> {{ $ente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>-->

                        <div class="form-group">
                            <label>Representante Legal:</label>
                            <input type="text" name="item[representante_legal]" class="form-control"  @if ( $data->tipo == 'update') value="{{ $data->item->representante_legal }}" @endif/>
                        </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Razón Social:</label>
                        <input type="text" name="item[razon_social]" class="form-control"  @if ( $data->tipo == 'update') value="{{ $data->item->razon_social }}" @endif/>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Tipo Prestación:</label>
                        <select style="width: 100%" class=" form-control m-select2 select2_general" id="id_servicio" name="item[id_servicio]" required>
                            <option></option>
                            @foreach($data->servicios as $servicio)
                                <option value="{{ $servicio->id }}" @if ($data->tipo == 'update' && $data->item->id_servicio == $servicio->id) selected="selected" @endif> {{ $servicio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>
        </div>

        <div class="separator separator-dashed"></div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Numero Patronal:</label>
                        <input type="text" name="item[numero_patronal]" class="form-control"  @if ( $data->tipo == 'update') value="{{ $data->item->numero_patronal }}" @endif/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Departamento:</label>
                        <select style="width: 100%" class=" form-control m-select2 select2_general" id="id_departamento" name="item[id_departamento]" required>
                            <option></option>
                            @foreach($data->departamentos as $departamento)
                                <option value="{{ $departamento->id }}" @if ($data->tipo == 'update' && $data->item->id_departamento == $departamento->id) selected="selected" @endif> {{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="separator separator-dashed"></div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Localidad:</label>
                        <input type="text" name="item[localidad]" class="form-control"  @if ( $data->tipo == 'update') value="{{ $data->item->localidad }}" @endif/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Zona:</label>
                        <input type="text" name="item[zona]" class="form-control"  @if ( $data->tipo == 'update') value="{{ $data->item->zona }}" @endif/>
                    </div>
                </div>
            </div>
        </div>

        <div class="separator separator-dashed"></div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Calle:</label>
                        <input type="text" name="item[calle]" class="form-control"  @if ( $data->tipo == 'update') value="{{ $data->item->calle }}" @endif/>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Número:</label>
                        <input type="text" name="item[numero]" class="form-control"  @if ( $data->tipo == 'update') value="{{ $data->item->numero }}" @endif/>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Teléfono/Celular:</label>
                        <input type="text" name="item[telefono]" class="form-control"  @if ( $data->tipo == 'update') value="{{ $data->item->telefono }}" @endif/>
                    </div>
                </div>
            </div>
        </div>

        <div class="separator separator-dashed"></div>

    <!--<div class="card-body">
            <div class="row">

                <div class="col-lg-6">
                <div class="form-group">
                        <label>Fecha Inicio Actividades:</label>
                        <input type="text" id="fecha_inicio_actividades" name="item[fecha_inicio_actividades]" class="form-control"  @if ( $data->tipo == 'update' && $data->item->fecha_inicio_actividades != "") value="{{ date('d-m-Y', strtotime($data->item->fecha_inicio_actividades)) }}" @endif />
                    </div>
                </div>
            </div>
        </div>-->



        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <label>Actividad Económica:</label>
                </div>
                <div class="form-group col-lg-12">
                    <textarea class="form-control" rows="3" name="item[actividad_economica]">@if ($data->tipo == 'update') {{ $data->item->actividad_economica }} @endif</textarea>
                </div>
            </div>

        </div>

        <div class="separator separator-dashed"></div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>NIT:</label>
                        <input type="text" name="item[nit]" class="form-control"  @if ( $data->tipo == 'update') value="{{ $data->item->nit }}" @endif />
                    </div>
                </div>
            <!--<div class="col-lg-6">
                <div class="form-group">
                        <label>Número Trabajadores:</label>
                        <input type="text" name="item[numero_trabajadores]" class="form-control"  @if ( $data->tipo == 'update') value="{{ $data->item->numero_trabajadores }}" @endif/>
                    </div>
                </div>-->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Fecha Inicio:</label>
                        <input type="text" id="fecha_afiliacion" name="item[fecha_afiliacion]" class="form-control"  @if ( $data->tipo == 'update' && $data->item->fecha_afiliacion != "") value="{{ date('d-m-Y', strtotime($data->item->fecha_afiliacion)) }}" @endif />
                    </div>
                </div>

            </div>
        </div>

        <div class="separator separator-dashed"></div>

        <div class="card-body">

            <div class="row">
                <div class="col-lg-4">
                    <!-- <div class="form-group">
                        <label>Lugar Afiliación:</label>
                        <select style="width: 100%" class=" form-control m-select2 select2_general" id="id_lugar_afiliacion" name="item[id_lugar_afiliacion]" >
                            <option></option>
                            @foreach($data->departamentos as $departamento)
                                <option value="{{ $departamento->id }}" @if ($data->tipo == 'update' && $data->item->id_lugar_afiliacion == $departamento->id) selected="selected" @endif> {{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </div> -->
                </div>

                <!--<div class="col-lg-4">
                    <div class="form-group">
                        <label>ROE:</label>
                        <input type="text" name="item[roe]" class="form-control"  @if ( $data->tipo == 'update') value="{{ $data->item->roe }}" @endif />
                    </div>
                </div> -->
            </div>
        </div>









        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Guardar</button>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->

{{-- Scripts Section --}}
<script src="{{ asset('scripts/ente/formulario/general/index.js') }}" type="text/javascript"></script>






