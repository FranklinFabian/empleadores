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
            background-color: #FFF2CC;
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
            <td align="center" width="15%"><img src="{{ asset('storage/logoatux.jpeg') }}" alt="Logo" height="60px"></td>
            <td align="center" width="15%"><img src="{{ asset('storage/logoatux.jpeg') }}" alt="Logo" height="60px"></td>
            <td align="center" width="70%"> <div class="letratipo1">Resumen de Datos</div></td>
        </tr>

    </table>
</header>
<main>

    <table id="table-no-margin">
        <tr>
            <td class="negrilla centro">CURRICULUM VITAE</td>
        </tr>
    </table>

    <table id="table-margin">
        <tr>
            <td width="20%" class="negrilla fondo"><br>&nbsp;DATOS PERSONALES <br>&nbsp;</td>
            <td width="15%">
            </td>
            <td width="22%" class="negrilla fondo">
                <table>
                    <tr>
                        <td>Nombre y Apellido:</td>
                    </tr>
                    <tr>
                        <td>Direccion:</td>
                    </tr>
                    <tr>
                        <td>Telefonos de Contacto:</td>
                    </tr>
                    <tr>
                        <td>Correo Electronico:</td>
                    </tr>
                    <tr>
                        <td>Edad:</td>
                    </tr>
                </table>
            </td>
            <td class="negrilla fondo">
                <table>
                    <tr>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>21</td>
                    </tr>
                </table>

            </td>
        </tr>
    </table >


    <table id="table-margin">
        <tr>
            <td width="30%" class="negrilla fondo"><br>&nbsp;BREVE DESCRIPCION <br>&nbsp;</td>
            <td>@isset($principal->descripcion) {{ $principal->descripcion }}@endisset</td>
        </tr>
    </table >

    <table id="table-margin">
        <tr>
            <td width="30%" class="negrilla fondo"><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;FORMACIÓN <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
            <td>
                @if($formaciones == '[]')
                    No hay datos registrados
                @else
                    @foreach($formaciones as $formacion)
                        {{$formacion->descripcion}} <br>
                    @endforeach
                @endif</td>
        </tr>
    </table >

    <table id="table-margin">
        <tr>
            <td width="30%" class="negrilla fondo"><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;FORMACIÓN COMPLEMENTARIA<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
            <td>
                @if($formacioncomplementarias == '[]')
                    No hay datos registrados
                @else
                    @foreach($formacioncomplementarias as $formacioncomplementaria)
                        {{$formacioncomplementaria->descripcion}} <br>
                    @endforeach
                @endif</td>
        </tr>
    </table >

    <table id="table-margin">
        <tr>
            <td width="30%" class="negrilla fondo"><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;EXPERIENCIA LABORAL<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
            <td>
                @if($experiencias == '[]')
                    No hay datos registrados
                @else
                    @foreach($experiencias as $experiencia)
                        {{$experiencia->descripcion}} <br>
                    @endforeach
                @endif</td>
        </tr>
    </table >

    <table id="table-margin">
        <tr>
            <td width="30%" class="negrilla fondo"><br>&nbsp;<br>&nbsp;IDIOMAS<br>&nbsp;<br>&nbsp;</td>
            <td>
                @if($idiomas == '[]')
                    No hay datos registrados
                @else
                    @foreach($idiomas as $idioma)
                        {{$idioma->descripcion}} <br>
                    @endforeach
                @endif</td>
        </tr>
    </table >

    <table id="table-margin">
        <tr>
            <td width="30%" class="negrilla fondo"><br>&nbsp;<br>&nbsp;COMPETENCIAS INFORMATICAS<br>&nbsp;<br>&nbsp;</td>
            <td>
                @if($competencias == '[]')
                    No hay datos registrados
                @else
                    @foreach($competencias as $competencia)
                        {{$competencia->descripcion}} <br>
                    @endforeach
                @endif</td>
        </tr>
    </table >

    <table id="table-margin">
        <tr>
            <td width="30%" class="negrilla fondo"><br>&nbsp;<br>&nbsp;REFERENCIAS<br>&nbsp;<br>&nbsp;</td>
            <td>
                @if($referencias == '[]')
                    No hay datos registrados
                @else
                    @foreach($referencias as $referencia)
                            {{$referencia->descripcion}} <br>
                    @endforeach
                @endif</td>
        </tr>
    </table >




</main>
</body>
</html>


