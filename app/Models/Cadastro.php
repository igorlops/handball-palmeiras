<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    static public function getCadastro($id = null)
    {
        $cadastro = DB::table('cadastros as c')
        ->join('posicoes as p', 'p.id', '=', 'c.posicao')
        ->select(
            'c.id',
            'c.nome',
            'c.apelido',
            'c.data_nascimento',
            'c.identidade',
            'c.cpf',
            'c.telefone',
            'c.email',
            'c.endereco',
            'c.estado_civil',
            'c.filhos',
            'c.qtd_filhos',
            'c.profissao',
            'c.numero_camisa',
            'p.descricao as desc_posicao',
            'c.nutricionista',
            'c.terapia',
            'c.faz_atividade',
            'c.qtd_atividade_semana',
            'c.tem_plano',
            'c.plano_saude',
            'c.tem_alergia',
            'c.alergia',
            'c.created_at',
        )
        ->orderBy(
            'c.nome',
        )
        ->groupBy(
            'c.id',
            'c.nome',
            'c.apelido',
            'c.data_nascimento',
            'c.identidade',
            'c.cpf',
            'c.telefone',
            'c.email',
            'c.endereco',
            'c.estado_civil',
            'c.filhos',
            'c.qtd_filhos',
            'c.profissao',
            'c.numero_camisa',
            'p.descricao',
            'c.nutricionista',
            'c.terapia',
            'c.faz_atividade',
            'c.qtd_atividade_semana',
            'c.tem_plano',
            'c.plano_saude',
            'c.tem_alergia',
            'c.alergia',
            'c.created_at'
        );

        if($id) {
            $cadastro->where('c.id',$id);
        }

        $cadastro = $cadastro->get();

        $cadastro->map(function($cadastroSingle) {

            // Obter as atividades relacionadas ao jogador
            $atividades = DB::table('atividades as a')
                ->join('atividades_jogadoras as aj', 'aj.atividade_fisica', '=', 'a.id')
                ->where('aj.jogadora', $cadastroSingle->id)
                ->select('a.descricao')
                ->get();

            $cadastroSingle->faz_atividade;
            // Criar um array para armazenar as descrições das atividades
            $atividadeArr = [];

            // Iterar pelas atividades e adicionar a descrição ao array
            $atividades->map(function($atividade) use (&$atividadeArr) {
                $atividadeArr[] = $atividade->descricao;
            });

            // Transformar o array em uma string separada por vírgulas
            $cadastroSingle->desc_atividade = implode(', ', $atividadeArr);

            return $cadastroSingle;
        });
        return $cadastro;
    }


}
