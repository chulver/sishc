<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>HISTORIA CLINICA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            /*background-image: url(http://1.bp.blogspot.com/-DKFKsZSOsAU/UXjiY_b5FDI/AAAAAAAADS0/tAniC34Sdzg/s1600/pixar-animation-studios.jpg);
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;*/
            font-size:13px;
        }
</style>
</head>
<body>
    <table border="0" style="width: 100%">
        <tr>
            <td align="center" class="font-weight-bold" style="font-size:24px;">HISTORIA CLINICA</td>
        </tr>
    </table>
    <br>
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
            <td class="font-weight-bold">Peso:</td>
            <td>{{ $historiaclinica->peso }} kg.</td>
            <td class="font-weight-bold">Talla:</td>
            <td>{{ $historiaclinica->talla }} cm.</td>
            <td class="font-weight-bold">Temperatura:</td>
            <td>{{ $historiaclinica->temperatura }} °C</td>
        </tr>
        <tr>
            <td class="font-weight-bold">Presion Arterial </td>
            <td>{{ $historiaclinica->pasistolica }}/{{ $historiaclinica->padiastolica }} mm Hg</td>
            <td class="font-weight-bold">Frecuencia Cardiaca:</td>
            <td>{{ $historiaclinica->fcardiaca }} lpm</td>
            <td class="font-weight-bold">Frecuencia Respiratoria:</td>
            <td>{{ $historiaclinica->frespiratoria }} rpm</td>
        </tr>
    </table>
    <br>
    <table border="1" style="width: 100%">
        <tr>
            <td align="center" style="font-size:12px;">De acuerdo al sistema SOAP   S: Subjetivo   O: Objetivo  A: Analisis Diagnostico  P: Plan Terapeutico</td>
        </tr>
    </table>
    <br>
    <table border="0" style="width: 100%">
        <tr>
            <td class="font-weight-bold">MOTIVO DE CONSULTA (síntomas que el paciente refiera)</td>
        </tr>
        <tr>
            <td>{!! html_entity_decode($historiaclinica->motivoconsulta) !!}</td>
        </tr>
        <tr>
            <td class="font-weight-bold">EXAMEN FISICO GENERAL</td>
        </tr>
        <tr>
            <td>{!! html_entity_decode($historiaclinica->examenfisico) !!}</td>
        </tr>
        <tr>
            <td class="font-weight-bold">ANALISIS CLINICO (lista de problemas destacados)</td>
        </tr>
        <tr>
            <td>{!! html_entity_decode($historiaclinica->analisisclinico) !!}</td>
        </tr>
        <tr>
            <td class="font-weight-bold">PLAN DE ACCION (tratamiento, orientaciones, seguimiento)</td>
        </tr>
        <tr>
            <td>{!! html_entity_decode($historiaclinica->planaccion) !!}</td>
        </tr>
    </table>
</body>
</html>