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
        $cadastros = Cadastro::getCadastro();
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
        $cadastro = Cadastro::getCadastro($id);
        return view('cadastro.show',with(['cadastro' => $cadastro->first()]));
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
