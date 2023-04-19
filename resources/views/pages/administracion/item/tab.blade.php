{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')


    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Gestión de Usuarios</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin::Example-->
            <input type="hidden" value="{{  url('administracion/item') }}" id="menu_active">
            <div class="example">
                <div class="example-preview">
                    <ul class="nav nav-tabs" id="tablist" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" data-target="#tab1"  id="head-tab1"  href="{{ url('/administracion/item/general/' . $data->pid . '/' . $data->tipo) }}" aria-controls="tab1">
																	<span class="nav-icon">
																		<i class="flaticon-home-2"></i>
																	</span>
                                <span class="nav-text">General</span>
                            </a>
                        </li>
                        @if ( $data->tipo == 'update' )
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" data-target="#tab2" id="head-tab2"  href="{{ url('/administracion/item/modulo/' . $data->pid . '/' . $data->tipo) }}" aria-controls="tab2">
																	<span class="nav-icon">

                                                                    <i class="flaticon-layers"></i>
																	</span>
                                    <span class="nav-text">Módulo</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" data-target="#tab3" id="head-tab3"  href="{{ url('/administracion/item/submodulo/' . $data->pid . '/' . $data->tipo) }}" aria-controls="tab3">
																	<span class="nav-icon">
																		<i class="flaticon-layers"></i>
																	</span>
                                    <span class="nav-text">Submódulo</span>
                                </a>
                            </li>

                            <!--<li class="nav-item">
                                <a class="nav-link" data-toggle="tab" data-target="#tab4" id="head-tab4"  href="{{ url('/administracion/item/asignacion/' . $data->pid . '/' . $data->tipo) }}" aria-controls="tab4">
																	<span class="nav-icon">
																		<i class="flaticon-layers"></i>
																	</span>
                                    <span class="nav-text">Asignación de Entes</span>
                                </a>
                            </li>-->


                        @endif
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent">
                        <div class="tab-pane fade" id="tab1" role="tabpanel" aria-labelledby="head-tab1"></div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="head-tab2"></div>
                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="head-tab3"></div>
                        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="head-tab4"></div>
                    </div>
                </div>
            </div>
            <!--end::Example-->
        </div>
    </div>
    <!--end::Card-->

@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    <script src="{{ asset('scripts/administracion/item/tab.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection
