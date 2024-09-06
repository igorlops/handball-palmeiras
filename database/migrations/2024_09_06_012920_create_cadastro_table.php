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
            $table->date('data_nascimento');
            $table->string('identidade');
            $table->string('cpf');
            $table->string('telefone');
            $table->string('email');
            $table->text('endereco');
            $table->string('estado_civil');
            $table->string('filhos');
            $table->string('qtd_filhos')->nullable();
            $table->string('profissao');
            $table->string('numero_camisa');
            $table->unsignedBigInteger('posicao');
            $table->foreign('posicao')->references('id')->on('posicoes');
            $table->enum('acomp_nutricionista', ['Sim', 'Não']);
            $table->enum('terapia', ['Sim', 'Não']);
            $table->enum('faz_atividade_fisica', ['Sim', 'Não']);
            $table->enum('tem_plano_saude',['Sim','Não']);
            $table->string('plano_saude');
            $table->enum('tem_alergia',['Sim','Não']);
            $table->string('alergia');
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
