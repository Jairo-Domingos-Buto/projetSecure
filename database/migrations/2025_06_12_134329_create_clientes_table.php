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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255)->comment('Nome completo ou razão social');
            $table->string('nif', 20)->unique()->comment('Número de Identificação Fiscal');
            $table->string('email', 100)->nullable()->comment('E-mail de contato');
            $table->string('telefone', 20)->nullable()->comment('Telefone de contato');
            $table->text('endereco')->nullable()->comment('Endereço completo');
            $table->date('data_nascimento')->nullable()->comment('Data de nascimento (se individual)');
            $table->enum('tipo', ['individual', 'empresa'])->default('individual')->comment('individual ou empresa');
            $table->boolean('ativo')->default(true)->comment('Cliente ativo?');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
