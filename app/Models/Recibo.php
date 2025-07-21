<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'data_emissao',
        'descricao',
        'fatura_id',
        'cliente_id',
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