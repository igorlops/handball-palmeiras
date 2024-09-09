<?php

namespace App\Http\Controllers;

use App\Exports\CadastroExport;
use App\Http\Requests\CadastroRequest;
use App\Models\Cadastro;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CadastroController extends Controller
{

    public function __construct(){}

    public function index()
    {
        $cadastros = DB::table('cadastros as c')
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


        return view('cadastro.index', compact('cadastros'));
    }

    public function create()
    {
        $posicoes = DB::connection('mysql')->table('posicoes')->select('*')->get();
        $atividades = DB::connection('mysql')->table('atividades')->select('*')->get();
        return view('cadastro.create', compact('posicoes','atividades'));
    }

    public function show($id)
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
        ->where('c.id',$id)
        ->get();

        return view('cadastro.show',compact('cadastro'));

    }

    public function store(CadastroRequest $request)
    {
        // Os dados já estão validados e a data de nascimento formatada
        $dataValidated = $request->validated();

        // Criar o cadastro no banco de dados
        $cadastroCreated = Cadastro::create($dataValidated);

        if ($dataValidated['faz_atividade'] === 'Sim') {
            // Salvar as atividades físicas selecionadas na tabela 'atividades_jogadoras'
            if ($request->has('atividade_fisica')) {
                foreach ($request->input('atividade_fisica') as $atividadeId) {
                    DB::table('atividades_jogadoras')->insert([
                        'atividade_fisica' => $atividadeId, // ID da atividade
                        'jogadora' => $cadastroCreated->id // ID da jogadora recém criada
                    ]);
                }
            }
        }
        return redirect()->route('cadastro.create')->with([
            'success' => 'Dados enviados com sucesso!'
        ]);
    }

    public function export()
    {
        return Excel::download(new CadastroExport, 'atletas.xlsx');
    }
}
