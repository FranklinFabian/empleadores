<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Asignación de Módulos</h3>
        </div>
        <div class="card-toolbar">
            <a href="javascript:loadWindow(0, 'new');" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-lg">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
                    </g>
                </svg>
			</span>
                Nuevo Registro</a>
        </div>
    </div>
    <div class="card-body">
        <input type="hidden" value="{{ $data->pid }}" id="modulo_pid">
        <table class="table table-bordered table-hover table-checkable" id="module_datatable" style="margin-top: 13px !important">
            <thead>

            </thead>
        </table>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="form_modal_modulo" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="modal-content-modulo"></div>
        </div>
    </div>
    <!--end::Modal-->

</div>
{{-- Styles Section --}}
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>

{{-- page scripts --}}
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/features/miscellaneous/sweetalert2.js') }}" type="text/javascript"></script>
<script src="{{ asset('scripts/administracion/item/modulo/index.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>



