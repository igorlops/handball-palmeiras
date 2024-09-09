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
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('apelido');
            $table->string('email');
            $table->text('endereco');
            $table->date('data_nascimento');
            $table->string('identidade');
            $table->string('cpf');
            $table->string('telefone');
            $table->string('estado_civil');
            $table->string('filhos');
            $table->string('qtd_filhos')->nullable();
            $table->string('profissao');
            $table->string('numero_camisa');
            $table->unsignedBigInteger('posicao');
            $table->foreign('posicao')->references('id')->on('posicoes');
            $table->enum('nutricionista', ['Sim', 'Não']);
            $table->enum('terapia', ['Sim', 'Não']);
            $table->enum('faz_atividade', ['Sim', 'Não']);
            $table->integer('qtd_atividade_semana')->nullable();
            $table->enum('tem_plano',['Sim','Não']);
            $table->string('plano_saude')->nullable();
            $table->enum('tem_alergia',['Sim','Não']);
            $table->string('alergia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastro_atletas');
    }
};
