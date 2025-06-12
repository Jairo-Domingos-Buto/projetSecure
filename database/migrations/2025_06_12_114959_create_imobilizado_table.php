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
        Schema::create('imobilizado', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique()->comment('Código do bem (ex.: VEIC001)');
            $table->string('descricao', 255)->comment('Nome do bem');
            $table->decimal('valor_aquisicao', 18, 2)->comment('Custo de compra');
            $table->date('data_aquisicao')->comment('Data de compra');
            $table->integer('vida_util')->unsigned()->comment('Anos de uso');
            $table->string('metodo_depreciacao', 20)->comment('Linear ou degressivo');
            $table->unsignedBigInteger('conta_ativo_id')->comment('Conta do bem');
            $table->unsignedBigInteger('conta_depreciacao_acumulada_id')->comment('Depreciação acumulada');
            $table->unsignedBigInteger('conta_custo_depreciacao_id')->comment('Custo mensal');
            $table->timestamps();

            // Constraints
            $table->foreign('conta_ativo_id')->references('id')->on('conta_contabilistica')->onDelete('restrict');
            $table->foreign('conta_depreciacao_acumulada_id')->references('id')->on('conta_contabilistica')->onDelete('restrict');
            $table->foreign('conta_custo_depreciacao_id')->references('id')->on('conta_contabilistica')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imobilizado');
    }
};
