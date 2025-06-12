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
        Schema::create('linha_lancamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lancamento_id')->comment('Lançamento associado');
            $table->unsignedBigInteger('conta_id')->comment('Conta movimentada');
            $table->string('descricao', 255)->nullable()->comment('Detalhe da linha');
            $table->decimal('valor_debito', 18, 2)->default(0.00)->comment('Valor a debitar');
            $table->decimal('valor_credito', 18, 2)->default(0.00)->comment('Valor a creditar');
            $table->string('terceiro_tipo', 50)->nullable()->comment('Tipo de entidade (ex.: Cliente)');
            $table->integer('terceiro_id')->nullable()->comment('ID da entidade');
            $table->timestamp('criado_em')->useCurrent()->comment('Data de criação');

            // Constraints
            $table->foreign('lancamento_id')->references('id')->on('lancamento')->onDelete('cascade');
            $table->foreign('conta_id')->references('id')->on('conta_contabilistica')->onDelete('restrict');

            // Índices
            $table->index(['terceiro_tipo', 'terceiro_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linha_lancamento');
    }
};
