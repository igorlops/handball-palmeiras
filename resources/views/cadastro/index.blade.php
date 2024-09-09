@extends('layout.app')

@section('title', 'Atletas')

@section('content')

    <section class="cadastros container my-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Relação de atletas do Palmeiras</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Ações</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nome Completo</th>
                                <th scope="col">Apelido</th>
                                <th scope="col">Data de Nascimento</th>
                                <th scope="col">Identidade</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">Estado Civil</th>
                                <th scope="col">Filhos</th>
                                <th scope="col">Quantidade de Filhos</th>
                                <th scope="col">Profissão</th>
                                <th scope="col">Número da Camisa</th>
                                <th scope="col">Posição no Jogo</th>
                                <th scope="col">Acompanhamento com Nutricionista</th>
                                <th scope="col">Faz Terapia</th>
                                <th scope="col">Faz Atividade Física</th>
                                <th scope="col">Quantidade de Atividades por Semana</th>
                                <th scope="col">Atividades</th>
                                <th scope="col">Tem Plano de Saúde</th>
                                <th scope="col">Nome do Plano de Saúde</th>
                                <th scope="col">Tem Alergia</th>
                                <th scope="col">Detalhes da Alergia</th>
                                <th scope="col">Data de Criação do Cadastro</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cadastros as $cadastro)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('cadastro.show',$cadastro->id)}}" class="btn btn-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </th>
                                    <th scope="row">{{$cadastro->id}}</th>
                                    <th>{{$cadastro->nome}}</th>
                                    <td>{{$cadastro->apelido}}</td>
                                    <td>{{convertDateBr($cadastro->data_nascimento)}}</td>
                                    <td>{{$cadastro->identidade}}</td>
                                    <td>{{$cadastro->cpf}}</td>
                                    <td>{{$cadastro->telefone}}</td>
                                    <td>{{$cadastro->email}}</td>
                                    <td>{{$cadastro->endereco}}</td>
                                    <td>{{$cadastro->estado_civil}}</td>
                                    <td>{{$cadastro->filhos}}</td>
                                    <td>{{$cadastro->qtd_filhos ?? 0}}</td>
                                    <td>{{$cadastro->profissao}}</td>
                                    <td>{{$cadastro->numero_camisa}}</td>
                                    <td>{{$cadastro->desc_posicao}}</td>
                                    <td>{{$cadastro->nutricionista}}</td>
                                    <td>{{$cadastro->terapia}}</td>
                                    <td>{{$cadastro->faz_atividade}}</td>
                                    <td>{{$cadastro->qtd_atividade_semana ?? 0}}</td>
                                    <td>{{$cadastro->desc_atividade}}</td>
                                    <td>{{$cadastro->tem_plano}}</td>
                                    <td>{{$cadastro->plano_saude}}</td>
                                    <td>{{$cadastro->tem_alergia}}</td>
                                    <td>{{$cadastro->alergia}}</td>
                                    <td>{{convertDateHourBr($cadastro->created_at)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <form action="{{ route('cadastro.export') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <button type="submit" class="btn btn-success">Exportar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
