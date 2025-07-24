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
        Schema::table('apolices', function (Blueprint $table) {
            $table->unsignedBigInteger('renovada_de')->nullable()->after('cliente_id');
            $table->foreign('renovada_de')->references('id')->on('apolices')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apolices', function (Blueprint $table) {
            //
        });
    }
};
