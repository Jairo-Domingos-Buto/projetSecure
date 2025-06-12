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
        Schema::create('conta_contabilistica', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique()->comment('Código oficial da conta (ex.: 1000)');
            $table->string('descricao', 255)->comment('Nome da conta (ex.: Caixa USD)');
            $table->char('tipo', 1)->comment('A=Analítica, T=Totalizadora, S=Seção');
            $table->unsignedBigInteger('conta_pai_id')->nullable()->comment('Referência à conta pai');
            $table->string('classe', 10)->comment('Categoria: Ativo, Passivo, etc.');
            $table->string('moeda', 3)->default('AKZ')->comment('Moeda ISO 4217');
            $table->boolean('ativa')->default(true)->comment('Indica se a conta está ativa');
            $table->timestamps();

            // Constraints
            $table->foreign('conta_pai_id')->references('id')->on('conta_contabilistica')->nullOnDelete();

            // Índices
            $table->index(['classe', 'moeda', 'ativa']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conta_contabilistica');
    }
};
