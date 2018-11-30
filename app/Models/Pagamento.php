<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    public function tipoDePagamento()
    {
        // return $this->hasOne(Location::class);
        return $this->belongsTo(TipoDePagamento::class);
    }
}
