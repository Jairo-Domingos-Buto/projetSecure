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
        Schema::create('contaContabilistica', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20);
            $table->string('descricao', 255);
            $table->enum('tipo', ['A', 'T', 'S']);
            $table->integer('pai_id'); // Corrected method
            $table->string('classe', 10);
            $table->string('moeda', 3); // "AKZ", "USD"
            $table->boolean('ativa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contaContabilistica');
    }
};
