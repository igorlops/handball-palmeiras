<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    use HasFactory;
    protected $table = 'cadastros';
    protected $fillable = [
        'data_nascimento',
        'identidade',
        'cpf',
        'telefone',
        'email',
        'endereco',
        'estado_civil',
        'filhos',
        'qtd_filhos',
        'profissao',
        'numero_camisa',
        'posicao',
        'acomp_nutricionista',
        'terapia',
        'faz_atividade_fisica',
        'tem_plano_saude',
        'plano_saude',
        'tem_alergia',
        'alergia',
    ];
}
