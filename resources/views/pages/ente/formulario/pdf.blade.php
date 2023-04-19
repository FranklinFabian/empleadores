<html>
<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial, Helvetica, sans-serif, normal;
            font-size: 11px;
        }

        body {
            margin: 2.7cm 1cm 1cm;
            border: 1px solid #6D6E70;
        }



        .letratipo1{
            font-weight: bold;
            font-size: 20px;
        }

        .letratipo2{
            font-size: 12px;
        }

        .letratipo3{
            font-size: 9px;
        }

        .letratipo4{
            font-size: 8px;
        }

        .fondo{
            background-color: #D1D2D4;
            font-weight: bold;
        }

        .negrilla{
            font-weight: bold;
        }

        .centro{
            text-align: center;
        }

        .izquierda{
            text-align: left;
        }

        .derecha{
            text-align: right;
        }

        #table-margin{
            width: 100%;
        }

        #table-margin td{
            border: 1px solid #6D6E70;
            padding: 5px;
        }

        #table-no-margin {
            width: 100%;
        }

        #table-no-margin td{
            padding: 5px;
        }

        .margin{
            border: 1px solid #6D6E70;
        }



        header {
            position: fixed;
            top: 0.6cm;
            left: 1cm;
            right: 1cm;
            height: 2cm;
            text-align: center;
            line-height: 15px;
            border: 1px solid #6D6E70;

        }

    </style>
</head>
<body>

<header>
    <table id="table-no-margin">
        <tr>
            <td align="center" width="30%"><img src="{{ asset('storage/logoatux.png') }}" alt="Logo" height="70px"></td>
            <td align="center" width="70%"> <div class="letratipo1">SISTEMA DE SEGUIMIENTO DE SERVICIOS Y PROYECTOS</div></td>
        </tr>

    </table>
</header>
<main>


    <table id="table-no-margin">
        <tr>
            <td class="negrilla centro">FICHA DE REGISTRO</td>
        </tr>
    </table>


    <table id="table-margin">

        <!--end::Card<tr>
            <td class="negrilla" width="50%">
                Ente Gestor
            </td>
            <td>
                @isset($data->ente_gestor) {{ $data->ente_gestor }}@endisset
            </td>
        </tr> -->

        <tr>
            <td class="negrilla">
                Razón Social
            </td>
            <td>
                @isset($data->razon_social) {{ $data->razon_social }}@endisset
            </td>
        </tr>

        <tr>
            <td class="negrilla">
                Número Patronal
            </td>
            <td>
                @isset($data->numero_patronal) {{ $data->numero_patronal }}@endisset
            </td>
        </tr>

        <tr>
            <td class="negrilla">
                Departamento
            </td>
            <td>
                @isset($data->departamento) {{ $data->departamento }}@endisset
            </td>
        </tr>

        <tr>
            <td class="negrilla">
                Localidad
            </td>
            <td>
                @isset($data->localidad) {{ $data->localidad }}@endisset
            </td>
        </tr>

        <tr>
            <td class="negrilla">
                Zona
            </td>
            <td>
                @isset($data->zona) {{ $data->zona }}@endisset
            </td>
        </tr>

        <tr>
            <td class="negrilla">
                Calle
            </td>
            <td>
                @isset($data->calle) {{ $data->calle }}@endisset
            </td>
        </tr>

        <tr>
            <td class="negrilla">
                Número
            </td>
            <td>
                @isset($data->numero) {{ $data->numero }}@endisset
            </td>
        </tr>

        <tr>
            <td class="negrilla">
                Teléfono
            </td>
            <td>
                @isset($data->telefono) {{ $data->telefono }}@endisset
            </td>
        </tr>

        <tr>
            <td class="negrilla">
                Representante Legal
            </td>
            <td>
                @isset($data->representante_legal) {{ $data->representante_legal }}@endisset
            </td>
        </tr>

            <!--<tr>
            <td class="negrilla">
                Fecha de Inicio de Actividades
            </td>
            <td>
                @isset($data->fecha_inicio_actividades) {{ $data->fecha_inicio_actividades }}@endisset
            </td>
        </tr> -->

        <tr>
            <td class="negrilla">
                Actividad Económica
            </td>
            <td>
                @isset($data->actividad_economica) {{ $data->actividad_economica }}@endisset
            </td>
        </tr>

            <!--<tr>
            <td class="negrilla">
                Numero de Trabajadores
            </td>
            <td>
                @isset($data->numero_trabajadores) {{ $data->numero_trabajadores }}@endisset
            </td>
        </tr> -->

        <tr>
            <td class="negrilla">
                NIT
            </td>
            <td>
                @isset($data->nit) {{ $data->nit }}@endisset
            </td>
        </tr>

        <tr>
            <td class="negrilla">
                Fecha de Afiliación
            </td>
            <td>
                @isset($data->fecha_afiliacion) {{ $data->fecha_afiliacion }}@endisset
            </td>
        </tr>

        <tr>
            <td class="negrilla">
                Estado
            </td>
            <td>
                @isset($data->estado) {{ $data->estado }}@endisset
            </td>
        </tr>

    </table>
    <br><br>

    <table id="table-no-margin">
        <tr>
            <td class="negrilla centro">MOVIMIENTOS</td>
        </tr>
    </table>
    @if(count($movimientos) > 0)
        <table id="table-margin">
            <tr>
                <td class="negrilla">
                    Fecha
                </td>
                <td class="negrilla" width="50%">
                    Estado
                </td>
            </tr>

            @foreach($movimientos as $movimiento)
                <tr>
                    <td>
                        @isset($movimiento->fecha) {{ $movimiento->fecha }}@endisset
                    </td>
                    <td>
                        @isset($movimiento->estado) {{ $movimiento->estado }}@endisset
                    </td>
                </tr>
            @endforeach
        </table>

    @else
        <table id="table-margin">
            <tr>
                <td>No hay movimientos registrados</td>
            </tr>
        </table>

    @endif

</main>
</body>
</html>
