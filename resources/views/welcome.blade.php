<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket App</title>
    <!-- Bootstrap opcional -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <h1 class="mb-4">Ticket App</h1>

    <!-- 1️⃣ Formulario para crear evento -->
    <h2>Crear Evento</h2>
    <form method="POST" action="/eventos" class="mb-4">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" required class="form-control mb-2">
        <input type="text" name="fecha" placeholder="Fecha" required class="form-control mb-2">
        <input type="text" name="lugar" placeholder="Lugar" required class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Crear Evento</button>
    </form>

    <!-- 2️⃣ Lista de eventos -->
    <h2>Eventos</h2>
    <ul class="list-group">
        @foreach($eventos as $evento)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $evento->nombre }} - {{ $evento->fecha }} - {{ $evento->lugar }}
                <a href="/comprar/{{ $evento->id }}" class="btn btn-success btn-sm">Comprar</a>
            </li>
        @endforeach
    </ul>

</body>
</html>