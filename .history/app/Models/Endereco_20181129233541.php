<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public function user ()
    {
        // return $this->hasOne(Location::class);
        return $this->HasOne(User::class);
    }
}
