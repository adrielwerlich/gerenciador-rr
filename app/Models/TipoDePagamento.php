<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDePagamento extends Model
{
    

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }
}
