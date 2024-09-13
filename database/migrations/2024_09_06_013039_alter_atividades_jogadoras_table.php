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
        Schema::table('atividades_jogadoras', function (Blueprint $table) {
            $table->dropForeign(['atividade_fisica']);
            $table->foreign('atividade_fisica')->references('id')->on('atividades')->onDelete('cascade');
            $table->dropForeign(['jogadora']);
            $table->foreign('jogadora')->references('id')->on('cadastros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('atividades_jogadoras', function (Blueprint $table) {
            $table->dropForeign(['atividade_fisica']);
            $table->foreign('atividade_fisica')->references('id')->on('atividades');
            $table->dropForeign(['jogadora']);
            $table->foreign('jogadora')->references('id')->on('cadastros');
        });

    }
};
