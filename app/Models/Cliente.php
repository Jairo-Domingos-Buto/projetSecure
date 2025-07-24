<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'nif',
        'email',
        'telefone',
        'endereco',
        'data_nascimento', //se for conta individual
        'tipo', // 'individual' ou 'empresa'
        'ativo',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Validar se o email é único antes de salvar
            if (self::where('email', $model->email)->exists()) {
                throw new \InvalidArgumentException('O email já está em uso.');
            }
        });
    }

    public function reembolsos()
    {
        return $this->hasMany(Reembolso::class);
    }

    public function apolices()
    {
        return $this->hasMany(Apolice::class);
    }

}
