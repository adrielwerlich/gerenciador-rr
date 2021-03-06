<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Endereco;
use App\User;
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

    public function address()
    {
        return $this->hasOne(Endereco::class);
    }
    
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
