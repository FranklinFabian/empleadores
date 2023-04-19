<div class="row">
    <div class="col-xl-12">
        <!--begin: Stats Widget 19-->
        <div class="card card-custom bg-light-success card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body my-3">
                <div class="row">
                    <div class="col-xl-12">
                        <a href="#" class="card card-custom bg-dark bg-hover-state-primary card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5 text-center">Cantidad de Empleadores por Departamento</div>
                            </div>
                            <!--end::Body-->
                        </a>
                    </div>
                    <div class="col-xl-12">
                        <a href="#" class="card card-custom card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="text-inverse-primary font-weight-bolder mb-2 mt-5 text-center">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Departamento</th>
                                            <th>Cantidad</th>
                                        </tr>
                                        <?php $total = 0; $contador = 1 ?>
                                        @foreach($data['departamentos'] as $departamento)
                                            <tr>
                                                <td>{{ $contador }}</td>
                                                <td align="left">{{ $departamento->nombre }}</td>
                                                <td>{{ $departamento->cantidad }}</td>
                                                <?php $total = $total + $departamento->cantidad;
                                                $total++;
                                                $contador++
                                                ?>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="2">Total</th>
                                            <th>{{ $total }}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!--end::Body-->
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="font-weight-bold text-muted font-size-xs">Fuente: Entes Gestores de la Seguridad Social de Corto Plazo</div>
                    </div>
                </div>
            </div>
            <!--end:: Body-->
        </div>
        <!--end: Stats:Widget 19-->
    </div>
</div>


{{-- Scripts Section --}}
<script src="{{ asset('scripts/reporte/resumen/departamento/index.js') }}" type="text/javascript"></script>






