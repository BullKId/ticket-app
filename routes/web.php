<?php
use App\Models\Evento;
use App\Models\Ticket;
use Illuminate\Http\Request;

Route::get('/', function () {
    $eventos = Evento::all();
    return view('welcome', compact('eventos'));
});

Route::post('/eventos', function (Request $request) {
    Evento::create($request->all());
    return redirect('/');
});

Route::get('/comprar/{id}', function ($id) {
    Ticket::create(['evento_id' => $id]);
    return redirect('/');
});
