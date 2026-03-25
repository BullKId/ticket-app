<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['nombre', 'fecha', 'lugar'];
    public function tickets() {
    return $this->hasMany(Ticket::class);
}
}
