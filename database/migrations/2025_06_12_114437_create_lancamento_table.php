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
        Schema::create('lancamento', function (Blueprint $table) {
            $table->id();
            $table->date('data')->comment('Data do lançamento');
            $table->string('descricao', 255)->comment('Descrição do lançamento');
            $table->string('origem_modulo', 50)->nullable()->comment('Módulo que gerou (ex.: Apólices)');
            $table->string('origem_referencia', 100)->nullable()->comment('ID do recibo/sinistro');
            $table->unsignedBigInteger('utilizador_id')->comment('Usuário que criou/validou');
            $table->string('estado', 20)->default('pendente')->comment('rascunho, pendente, confirmado');
            $table->timestamps();

            // Constraints
            $table->foreign('utilizador_id')->references('id')->on('users')->onDelete('restrict');

            // Índices
            $table->index(['data', 'origem_modulo', 'estado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lancamento');
    }
};
