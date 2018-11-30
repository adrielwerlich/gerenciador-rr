<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{

    protected $table = 'documentos';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type','foto-frente', 'foto-verso',	'numero-do-documento', 'comentario_descricao', 'usuario-id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    // public function endereco()
    // {
    //     return $this->hasOne(Endereco::class);
    // }
}
