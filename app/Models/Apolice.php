<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apolice extends Model
{

    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'numero',
        'data_inicio',
        'data_fim',
        'valor',
        'tipo'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function apoliceOriginal()
    {
        return $this->belongsTo(Apolice::class, 'renovada_de');
    }

    public function renovacoes()
    {
        return $this->hasMany(Apolice::class, 'renovada_de');
    }

}
