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
        Schema::create('atividades_jogadoras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atividade_fisica');
            $table->foreign('atividade_fisica')->references('id')->on('atividades');
            $table->unsignedBigInteger('jogadora');
            $table->foreign('jogadora')->references('id')->on('cadastros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atividades_jogadoras');
    }
};
