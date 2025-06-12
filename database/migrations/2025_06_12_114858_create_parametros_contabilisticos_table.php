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
        Schema::create('parametros_contabilisticos', function (Blueprint $table) {
            $table->id();
            $table->string('chave', 50)->unique()->comment('Nome do parâmetro (ex.: ano_fiscal)');
            $table->string('valor', 255)->comment('Valor do parâmetro');
            $table->string('descricao', 255)->nullable()->comment('Explicação do parâmetro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametros_contabilisticos');
    }
};
