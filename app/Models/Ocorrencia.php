<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    protected $table = 'ocorrencias';
    
    protected $fillable = [
        'numero_conta',           
        'tipo_ocorrencia',       
        'data_ocorrencia',
        'local_ocorrencia',       
        'descricao',              
        'status',                 
        'anexos',                 
    ];
}
