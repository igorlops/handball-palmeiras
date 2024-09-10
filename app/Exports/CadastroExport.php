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
        return Cadastro::getCadastro();
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
            'Atividade fisica',
        ];
    }
}
