<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\JobRequire;

class TiposDeServicos extends Model
{
    protected $fillable = [	
        'tipo-do-servico',
        'descricao_detalhes',
        'created_at',
        'updated_at',
        'valor_por_metro²',
        'valor_por_hora'];


    public function jobRequires()
    {
        return $this->hasMany(JobRequire::class);
    }

}
