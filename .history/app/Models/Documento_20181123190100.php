<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{

    $table = 'documentos';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}
