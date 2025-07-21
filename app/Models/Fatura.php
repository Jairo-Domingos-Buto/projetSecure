<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    //
    protected $table = 'faturas';

    protected $fillable = [
        'cliente_id',
        'recibo_adiantamento_id',
        'valor_total',
        'data_emissao',
        'data_vencimento',
        'status',
        'descricao',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function reembolsos()
    {
        return $this->hasMany(Reembolso::class);
    }

    public function Recibo()
    {
        return $this->belongsTo(Recibo::class);
    }
}
