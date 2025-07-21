<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'valor',
        'data_pagamento',
        'descricao',
        'status',
    ];

    // 🔁 Relação com Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // 🔁 Relação com Fatura
    public function fatura()
    {
        return $this->belongsTo(Fatura::class);
    }
}
?>