<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>HISTORIA CLINICA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 4cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 1cm;
            left: 2cm;
            right: 2cm;
            height: 2.5cm;
            color: black;
            text-align: center;
            line-height: 30px;
        }

        img {
            width: 100px;
        }

        main {
            font-size: 13px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>
<body>
    <header>
        <table border="0" style="color:#003874; width: 100%">
            <tr>
                <td><img src="{{ asset('vendor/adminlte/dist/img/LasaludperfectaLogo.png' )}}"></td>
                <td align="left"><p class="font-weight-bold" style="font-size:24px;">HISTORIA CLINICA<p><p class="font-weight-bold" style="font-size:16px;">DATOS DE IDENTIFICACION<</p></td>
            </tr>
        </table>
    </header>
    <main>
        <table border="0" style="color:#003874; width: 100%">
            <tr>
                <td class="text-center">{{ $historiaclinica->nombre }}</td>
                <td class="text-center">{{ $historiaclinica->apaterno }}</td>
                <td class="text-center">{{ $historiaclinica->amaterno }}</td>
                <td class="text-center font-weight-bold">CI:</td>
                <td class="text-left">{{ $historiaclinica->ci }}</td>
            </tr>
            <tr>
                <td class="text-center font-weight-bold">Nombres</td>
                <td class="text-center font-weight-bold">Apellido Paterno</td>
                <td class="text-center font-weight-bold">Apellido Materno</td>
                <td class="text-center font-weight-bold"></td>
                <td class="text-center font-weight-bold"></td>
            </tr>
        </table>
        <br>
        <table border="0" style="width: 60%; color:#003874;">
            <tr>
                <td class="font-weight-bold">Edad:</td>
                <td>{{ $historiaclinica->anios }} AÑOS</td>
                <td class="text-center font-weight-bold">Fecha:</td>
                <td>{{ $historiaclinica->fecha }}</td>
            </tr>
        </table>
        <br>
        <table border="0" style="width: 100%; color:#003874;">
            <tr>
                <td class="font-weight-bold">Signos Vitales:</td>
                <td class="text-center font-weight-bold">Peso:</td>
                <td>{{ $historiaclinica->peso }}</td>
                <td class=" text-center font-weight-bold">Talla:</td>
                <td>{{ $historiaclinica->talla }}</td>
                <td class=" text-center font-weight-bold">T:</td>
                <td>{{ $historiaclinica->temperatura }}</td>
                <td class=" text-center font-weight-bold">PA:</td>
                <td>{{ $historiaclinica->presionarterial }}</td>
                <td class=" text-center font-weight-bold">SpO2:</td>
                <td>{{ $historiaclinica->spo2 }}</td>
                <td class=" text-center font-weight-bold">FC:</td>
                <td>{{ $historiaclinica->fcardiaca }}</td>
                <td class="text-center font-weight-bold">FR:</td>
                <td>{{ $historiaclinica->frespiratoria }}</td>
                <td class="text-center font-weight-bold">Glicemia:</td>
                <td>{{ $historiaclinica->glicemia }}</td>
            </tr>
        </table>
        <br>
        <table border="1" style="width: 100%; color:#003874;">
            <tr>
                <td align="center" style="font-size:12px;">De acuerdo al sistema <strong>SOAP   S:</strong> Subjetivo   <strong>O:</strong> Objetivo  <strong>A:</strong> Analisis Diagnostico  <strong>P:</strong> Plan Terapeutico</td>
            </tr>
        </table>
        <table border="1" style="width: 100%; color:#003874;">
            <tr><td>
            <table border="0" style="width: 637px; color:#003874;">
                <tr>
                    <td colspan="2" class="font-weight-bold">MOTIVO DE CONSULTA (Síntomas que el paciente refiera)</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:25px; word-wrap:break-word;">{!! html_entity_decode($historiaclinica->motivoconsulta) !!}</td>
                </tr>
                <tr>
                    <td colspan="2" class="font-weight-bold">ENFERMEDAD ACTUAL (Anamnesis)</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:75px; word-wrap:break-word;">{!! html_entity_decode($historiaclinica->enfermedadactual) !!}</td>
                </tr>
                <tr>
                    <td colspan="2" class="font-weight-bold">EXAMEN FISICO GENERAL</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:100px; word-wrap:break-word;">{!! html_entity_decode($historiaclinica->examenfisico) !!}</td>
                </tr>
                <tr>
                    <td colspan="2" class="font-weight-bold">ANALISIS CLINICO (Lista de problemas destacados)</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:100px; word-wrap:break-word;">{!! html_entity_decode($historiaclinica->analisisclinico) !!}</td>
                </tr>
                <tr>
                    <td colspan="2" class="font-weight-bold">PLAN DE ACCION (Tratamiento, orientaciones, seguimiento)</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:100px; word-wrap:break-word;">{!! html_entity_decode($historiaclinica->planaccion) !!}</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:60px;"></td>
                </tr>
                <tr>
                    <td align="center">PAMELA LOPEZ LEDEZMA</td>
                    <td align="center"></td>
                </tr>
                <tr>
                    <td align="center">Elaboro la HC</td>
                    <td align="center">Firma y Sello</td>
                </tr>
            </table>
            </td></tr>
        </table>
    </main>
</body>
</html>