<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContaContabilistica extends Model
{
    protected $table = 'conta_contabilistica';

    protected $fillable = [
        'codigo',
        'descricao',
        'tipo',
        'conta_pai_id',
        'classe',
        'moeda',
        'ativa',
    ];

    



}
