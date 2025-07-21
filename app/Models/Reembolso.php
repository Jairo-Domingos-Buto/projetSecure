<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reembolso extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'fatura_id',
        'valor',
        'data_reembolso',
        'observacao',
        'data_aprovacao',
        'status',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function fatura()
    {
        return $this->belongsTo(Fatura::class);
    }
}
?>
