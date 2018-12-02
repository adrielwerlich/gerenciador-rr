<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\JobRequire;


class Endereco extends Model
{

    protected $fillable = [	
        'numero',
        'logradouro',
        'cep',
        'bairro',
        'cidade',
        'estado',
        'created_at',
        'updated_at',
        'user_id',
        'tipo-de-endereço',
        'detalhes-ou-descriçoes'];	


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
