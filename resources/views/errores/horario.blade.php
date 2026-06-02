<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso restringido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-lg border-0 text-center p-5" style="max-width: 600px;">
        <h1 class="text-danger mb-4">Acceso restringido</h1>
        <p class="lead">El sistema solo está disponible entre las <strong>08:00</strong> y las <strong>20:00</strong>.</p>
        <p class="text-muted">Por favor, inténtalo nuevamente dentro del horario laboral.</p>
        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Volver al inicio</a>
    </div>

</body>
</html>
