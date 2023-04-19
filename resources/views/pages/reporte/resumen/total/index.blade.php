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
                                <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5 text-center">Cantidad de Empleadores por Ente Gestor y Departamento</div>
                            </div>
                            <!--end::Body-->
                        </a>
                    </div>

                    <div class="col-xl-12">
                        <a class="card card-custom card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="text-inverse-primary font-weight-bolder mb-2 mt-5 text-center">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Ente Gestor</th>
                                            <th>Chuquisaca</th>
                                            <th>La Paz</th>
                                            <th>Cochabamba</th>
                                            <th>Oruro</th>
                                            <th>Potosí</th>
                                            <th>Tarija</th>
                                            <th>Santa Cruz</th>
                                            <th>Beni</th>
                                            <th>Pando</th>
                                        </tr>
                                        <?php
                                            $totala = 0;
                                            $totalb = 0;
                                            $totalc = 0;
                                            $totald = 0;
                                            $totale = 0;
                                            $totalf = 0;
                                            $totalg = 0;
                                            $totalh = 0;
                                            $totali = 0;
                                            $contador = 1;
                                        ?>
                                        @foreach($data['entes_departamentos'] as $entesd)
                                            <tr>
                                                <td> {{ $contador}}</td>
                                                <td align="left">{{ $entesd->ente_gestor }}</td>
                                                <td>{{ $entesd->chuquisaca }}</td>
                                                <td>{{ $entesd->la_paz }}</td>
                                                <td>{{ $entesd->cochabamba }}</td>
                                                <td>{{ $entesd->oruro }}</td>
                                                <td>{{ $entesd->potosi }}</td>
                                                <td>{{ $entesd->tarija }}</td>
                                                <td>{{ $entesd->santa_cruz }}</td>
                                                <td>{{ $entesd->beni }}</td>
                                                <td>{{ $entesd->pando }}</td>

                                                <?php
                                                    $totala = $totala + $entesd->chuquisaca; $totala++;
                                                    $totalb = $totalb + $entesd->la_paz; $totalb++;
                                                    $totalc = $totalc + $entesd->cochabamba; $totalc++;
                                                    $totald = $totald + $entesd->oruro; $totald++;
                                                    $totale = $totale + $entesd->potosi; $totale++;
                                                    $totalf = $totalf + $entesd->tarija; $totalf++;
                                                    $totalg = $totalg + $entesd->tarija; $totalg++;
                                                    $totalf = $totalh + $entesd->santa_cruz; $totalh++;
                                                    $totalf = $totali + $entesd->beni; $totali++;
                                                    $contador++;
                                                ?>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="2">Subtotal</th>
                                            <th>{{ $totala }}</th>
                                            <th>{{ $totalb }}</th>
                                            <th>{{ $totalc }}</th>
                                            <th>{{ $totald }}</th>
                                            <th>{{ $totale }}</th>
                                            <th>{{ $totalf }}</th>
                                            <th>{{ $totalg }}</th>
                                            <th>{{ $totalh }}</th>
                                            <th>{{ $totali }}</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Total</th>
                                            <th colspan="9">{{ $totala + $totalb + $totalc + $totald + $totale + $totalf + $totalg + $totalh + $totali }}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="font-weight-bold text-muted font-size-xs">Fuente: Entes Gestores de la Seguridad Social de Corto Plazo</div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!--end:: Body-->
        </div>
        <!--end: Stats:Widget 19-->
    </div>
</div>


{{-- Scripts Section --}}
<script src="{{ asset('scripts/reporte/resumen/total/index.js') }}" type="text/javascript"></script>






