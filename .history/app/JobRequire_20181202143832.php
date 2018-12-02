<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JobRequirePhotos;

class JobRequire extends Model
{
    protected $fillable = [
        'tipos_de_servico_id', 'enderecos_id', 'users_id'
    ];


    public function photos()
    {
        return $this->hasMany(JobRequirePhotos::class);
    }

}
