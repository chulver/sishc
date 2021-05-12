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
        <table border="0" style="width: 100%">
            <tr>
                <td><img src="{{ asset('vendor/adminlte/dist/img/LasaludperfectaLogo.png' )}}"></td>
                <td align="left" class="font-weight-bold" style="font-size:24px;">HISTORIA CLINICA</td>
                <td></td>
            </tr>
        </table>
    </header>
    <main>
        <table border="0" style="width: 100%">
            <tr>
                <td class="font-weight-bold">PACIENTE:</td>
                <td>{{ $historiaclinica->apaterno }} {{ $historiaclinica->amaterno }} {{ $historiaclinica->nombre }}</td>
                <td class="font-weight-bold">FECHA:</td>
                <td>{{ $historiaclinica->fecha }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">SEXO:</td>
                <td>{{ $historiaclinica->sexo }}</td>
                <td class="font-weight-bold" style="font-size:12px;">EDAD:</td>
                <td>{{ $historiaclinica->edad }} AÑOS</td>
            </tr>
        </table>
        <br>
        <table border="0" style="width: 100%">
            <tr>
                <td class="font-weight-bold">PESO:</td>
                <td>{{ $historiaclinica->peso }} kg.</td>
                <td class="font-weight-bold">TALLA:</td>
                <td>{{ $historiaclinica->talla }} cm.</td>
                <td class="font-weight-bold">TEMPERATURA:</td>
                <td>{{ $historiaclinica->temperatura }} °C</td>
            </tr>
            <tr>
                <td class="font-weight-bold">PRESION ARTERIAL:</td>
                <td>{{ $historiaclinica->pasistolica }}/{{ $historiaclinica->padiastolica }} mm Hg</td>
                <td class="font-weight-bold">F. CARDIACA:</td>
                <td>{{ $historiaclinica->fcardiaca }} lpm</td>
                <td class="font-weight-bold">F. RESPIRATORIA:</td>
                <td>{{ $historiaclinica->frespiratoria }} rpm</td>
            </tr>
        </table>
        <br>
        <table border="1" style="width: 100%">
            <tr>
                <td align="center" style="font-size:12px;">De acuerdo al sistema <strong>SOAP   S:</strong> Subjetivo   <strong>O:</strong> Objetivo  <strong>A:</strong> Analisis Diagnostico  <strong>P:</strong> Plan Terapeutico</td>
            </tr>
        </table>
        <br>
        <table border="0" style="width: 100%">
            <tr>
                <td class="font-weight-bold">MOTIVO DE CONSULTA (Síntomas que el paciente refiera)</td>
            </tr>
            <tr>
                <td>{!! html_entity_decode($historiaclinica->motivoconsulta) !!}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">ENFERMEDAD ACTUAL (Anamnesis)</td>
            </tr>
            <tr>
                <td>{!! html_entity_decode($historiaclinica->enfermedadactual) !!}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">EXAMEN FISICO GENERAL</td>
            </tr>
            <tr>
                <td>{!! html_entity_decode($historiaclinica->examenfisico) !!}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">ANALISIS CLINICO (Lista de problemas destacados)</td>
            </tr>
            <tr>
                <td>{!! html_entity_decode($historiaclinica->analisisclinico) !!}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">PLAN DE ACCION (Tratamiento, orientaciones, seguimiento)</td>
            </tr>
            <tr>
                <td>{!! html_entity_decode($historiaclinica->planaccion) !!}</td>
            </tr>
        </table>
    </main>
</body>
</html>