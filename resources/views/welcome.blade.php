<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket App</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <!-- MENSAJE DE ÉXITO -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- FORMULARIO -->
    <div class="card bg-dark text-white p-4 mb-5 shadow">
        <h3 class="mb-3">Crear Evento</h3>

        <form method="POST" action="/eventos">
            @csrf

            <!-- NOMBRE -->
            <input type="text" name="nombre" maxlength="50"
                class="form-control mb-1 @error('nombre') is-invalid @enderror"
                placeholder="Nombre del evento"
                value="{{ old('nombre') }}" required>

            @error('nombre')
                <div class="text-danger mb-2">⚠️ {{ $message }}</div>
            @enderror

            <!-- FECHA -->
            <input type="date" name="fecha"
                class="form-control mb-1 @error('fecha') is-invalid @enderror"
                value="{{ old('fecha') }}" required>

            @error('fecha')
                <div class="text-danger mb-2">⚠️ {{ $message }}</div>
            @enderror

            <!-- LUGAR -->
            <input type="text" name="lugar" maxlength="50"
                class="form-control mb-1 @error('lugar') is-invalid @enderror"
                placeholder="Lugar"
                value="{{ old('lugar') }}" required>

            @error('lugar')
                <div class="text-danger mb-2">⚠️ {{ $message }}</div>
            @enderror

            <button class="btn btn-primary w-100 mt-2">Crear Evento</button>
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

                    <div class="d-flex gap-2">
                        <a href="/comprar/{{ $evento->id }}" class="btn btn-success">
                            Comprar
                        </a>

                        <form method="POST" action="/eventos/{{ $evento->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"
                                onclick="return confirm('¿Eliminar este evento?')">
                                Eliminar
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <!-- TICKETS -->
    <h3 class="mt-5 mb-4">🎫 Tickets Comprados</h3>

    <div class="row">
        @foreach($tickets as $ticket)
            <div class="col-md-4 mb-4">
                <div class="card bg-dark text-white p-3 shadow">
                    
                    <h6>🎟️ Ticket</h6>
                    <p class="mb-2">
                        Evento: {{ $ticket->evento->nombre }}
                    </p>

                    <small class="text-muted d-block mb-3">
                        Comprado recientemente
                    </small>

                    <form method="POST" action="/tickets/{{ $ticket->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm w-100"
                            onclick="return confirm('¿Eliminar este ticket?')">
                            Eliminar Ticket
                        </button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>