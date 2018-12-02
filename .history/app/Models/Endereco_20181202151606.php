<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\JobRequire;


class Endereco extends Model
{
    public function user()
    {
        // return $this->hasOne(Location::class);
        return $this->belongsTo(User::class);
    }

    public function jobRequires()
    {
        return $this->hasMany(JobRequire::class);
    }

}
