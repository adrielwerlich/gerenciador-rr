<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdemDeServico extends Model
{

    

    protected $fillable = [ 'os-num',	'user_id',	'estagio',	'categoria' ];

    
}
