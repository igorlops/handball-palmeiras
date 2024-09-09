<?php

namespace App\Exports;

use App\Models\Cadastro;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CadastroExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('cadastros as c')
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
            DB::raw('GROUP_CONCAT(DISTINCT a.descricao ORDER BY a.descricao ASC SEPARATOR ", ") as desc_atividade')
        )
        ->leftJoin('atividades_jogadoras as aj', 'aj.jogadora', '=', 'c.id')
        ->leftJoin('atividades as a', 'a.id', '=', 'aj.atividade_fisica')
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
        )
        ->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nome Completo',
            'Apelido',
            'Data de Nascimento',
            'Identidade',
            'CPF',
            'Telefone',
            'Email',
            'Endereço',
            'Estado Civil',
            'Filhos',
            'Quantidade de Filhos',
            'Profissão',
            'Número da Camisa',
            'Posição no Jogo',
            'Acompanhamento com Nutricionista',
            'Faz Terapia',
            'Faz Atividade Física',
            'Quantidade de Atividades por Semana',
            'Tem Plano de Saúde',
            'Nome do Plano de Saúde',
            'Tem Alergia',
            'Detalhes da Alergia',
            'Data de Criação do Cadastro',
        ];
    }
}
