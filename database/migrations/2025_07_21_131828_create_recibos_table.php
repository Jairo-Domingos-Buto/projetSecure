<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('recibos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->onDelete('set null');
            $table->decimal('valor', 12, 2);
            $table->date('data_pagamento');
            $table->text('descricao')->nullable();
            $table->enum('status', ['pendente', 'utilizado'])->default('pendente'); // se já foi usado numa fatura
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recibos');
    }
};
