<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['evento_id'];
    public function evento() {
    return $this->belongsTo(Evento::class);
}
}
