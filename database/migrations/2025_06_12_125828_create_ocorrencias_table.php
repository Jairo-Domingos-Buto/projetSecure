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
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->id();
            $table->string('numero_conta'); // Número da Conta do Cliente
            $table->string('tipo_ocorrencia'); // Tipo de Ocorrência Bancária
            $table->dateTime('data_ocorrencia');
            $table->string('local_ocorrencia')->nullable(); // Local (ou Agência/Canal)
            $table->text('descricao')->nullable(); // Descrição da Ocorrência
            $table->string('status')->default('aberta'); // Status da Ocorrência
            $table->json('anexos')->nullable(); // Anexar Documentos/Comprovantes (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocorrencias');
    }
};
