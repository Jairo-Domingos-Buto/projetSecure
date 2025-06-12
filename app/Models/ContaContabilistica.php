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

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            //validar o tipo antes de salvar o modelo
            if (!in_array($model->tipo, ['A', 'T', 'S'])) {
                throw new \InvalidArgumentException('Tipo inválido. Deve ser A (Analítica), T (Totalizadora) ou S (Seção).');
            }
        });
    }






}
