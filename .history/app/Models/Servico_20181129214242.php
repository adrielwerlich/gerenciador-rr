<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [	'valor',	'id_tipo_de_servico',	'id_endereco',	'data_prevista_inicio'	];
}
