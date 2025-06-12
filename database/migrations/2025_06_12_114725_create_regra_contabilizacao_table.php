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
        Schema::create('regra_contabilizacao', function (Blueprint $table) {
            $table->id();
            $table->string('evento', 50)->comment('Evento que dispara (ex.: EMISSAO_RECIBO)');
            $table->string('produto_ramo', 50)->nullable()->comment('Tipo de seguro (ex.: Automóvel)');
            $table->unsignedBigInteger('debito_conta_id')->comment('Conta a debitar');
            $table->unsignedBigInteger('credito_conta_id')->comment('Conta a creditar');
            $table->string('formula_valor', 100)->nullable()->comment('Cálculo do valor');
            $table->string('descricao_padrao', 255)->comment('Texto padrão do lançamento');
            $table->timestamps();

            // Constraints
            $table->foreign('debito_conta_id')->references('id')->on('conta_contabilistica')->onDelete('restrict');
            $table->foreign('credito_conta_id')->references('id')->on('conta_contabilistica')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regra_contabilizacao');
    }
};
