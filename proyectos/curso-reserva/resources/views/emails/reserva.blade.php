<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Reserva | Curso Reserva</title>
</head>
<body>
    <h2>Hola {{ $userName }},</h2>
    <p>Tu reserva ha sido confirmada.</p>
    <p><strong>Detalles de la Reserva:</strong></p>
    <ul>
        <li><strong>Consultor:</strong> {{ $consultantName }}</li>
        <li><strong>Fecha:</strong> {{ $reservationDate }}</li>
        <li><strong>Hora de Inicio:</strong> {{ $startTime }}</li>
        <li><strong>Hora de Fin:</strong> {{ $endTime }}</li>
        <li><strong>Total a pagar:</strong> ${{ $totalAmount }}</li>
    </ul>
    <p>Gracias por confiar en nosotros.</p>
    <p>Curso Reserva.</p>
</body>
</html>
