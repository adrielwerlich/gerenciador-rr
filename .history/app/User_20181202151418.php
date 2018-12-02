<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Documento;
use App\Models\Endereco;
use App\Models;
use App\JobRequire;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone','cpf','financeiro','comercial','documentos'
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

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }
    
    public function Endereco()
    {
        return $this->hasMany(Endereco::class);
    }
 
    public function JobRequires()
    {
        return $this->hasMany(JobRequire::class);
    }
}
