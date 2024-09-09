<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'cadastros';
    protected $fillable = [
        'nome',
        'apelido',
        'email',
        'endereco',
        'data_nascimento',
        'identidade',
        'cpf',
        'telefone',
        'estado_civil',
        'filhos',
        'qtd_filhos',
        'profissao',
        'numero_camisa',
        'posicao',
        'nutricionista',
        'terapia',
        'faz_atividade',
        'qtd_atividade_semana',
        'tem_plano',
        'plano_saude',
        'tem_alergia',
        'alergia',
    ];

}
