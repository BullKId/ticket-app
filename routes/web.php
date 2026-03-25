<?php

use App\Models\Evento;
use App\Models\Ticket;
use Illuminate\Http\Request;

Route::get('/', function () {
    $eventos = Evento::all();
    $tickets = Ticket::with('evento')->get();

    return view('welcome', compact('eventos', 'tickets'));
});

// CREAR EVENTO (CON VALIDACIÓN)
Route::post('/eventos', function (Request $request) {

    $request->validate([
        'nombre' => 'required|string|max:50',
        'fecha' => 'required|date',
        'lugar' => 'required|string|max:50',
    ], [
        'nombre.required' => 'El nombre del evento es obligatorio.',
        'nombre.max' => 'El nombre no puede tener más de 50 caracteres.',

        'fecha.required' => 'La fecha es obligatoria.',
        'fecha.date' => 'La fecha debe ser válida.',

        'lugar.required' => 'El lugar es obligatorio.',
        'lugar.max' => 'El lugar no puede tener más de 50 caracteres.',
    ]);

    Evento::create([
        'nombre' => $request->nombre,
        'fecha' => $request->fecha,
        'lugar' => $request->lugar,
    ]);

    return redirect('/')->with('success', 'Evento creado correctamente 🎉');
});

// COMPRAR TICKET
Route::get('/comprar/{id}', function ($id) {
    Ticket::create(['evento_id' => $id]);
    return redirect('/')->with('success', 'Ticket comprado 🎟️');
});

// ELIMINAR EVENTO
Route::delete('/eventos/{id}', function ($id) {
    Evento::findOrFail($id)->delete();
    return redirect('/')->with('success', 'Evento eliminado 🗑️');
});

// ELIMINAR TICKET
Route::delete('/tickets/{id}', function ($id) {
    Ticket::findOrFail($id)->delete();
    return redirect('/')->with('success', 'Ticket eliminado 🗑️');
});