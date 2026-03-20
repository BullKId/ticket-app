<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket App</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #121212;
            color: white;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <h1 class="text-center mb-5">🎟️ Ticket App</h1>

    <!-- FORMULARIO -->
    <div class="card bg-dark text-white p-4 mb-5 shadow">
        <h3 class="mb-3">Crear Evento</h3>

        <form method="POST" action="/eventos">
            @csrf
            <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre del evento" required>
            <input type="text" name="fecha" class="form-control mb-3" placeholder="Fecha" required>
            <input type="text" name="lugar" class="form-control mb-3" placeholder="Lugar" required>

            <button class="btn btn-primary w-100">Crear Evento</button>
        </form>
    </div>

    <!-- EVENTOS -->
    <h3 class="mb-4">Eventos disponibles</h3>

    <div class="row">
        @foreach($eventos as $evento)
            <div class="col-md-4 mb-4">
                <div class="card bg-secondary text-white p-3 shadow">
                    
                    <h5>{{ $evento->nombre }}</h5>
                    <p class="mb-1">📅 {{ $evento->fecha }}</p>
                    <p class="mb-3">📍 {{ $evento->lugar }}</p>

                    <a href="/comprar/{{ $evento->id }}" class="btn btn-success">
                        Comprar Ticket
                    </a>

                </div>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>