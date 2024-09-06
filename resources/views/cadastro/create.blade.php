@extends('layout.app')

@section('title','Cadastro de atletas')

@section('content')
    <section id="cadastro">
        <div class="container">
            <div class="text-success text-center py-5">
                <h2 class="fs-1">Cadastro de atletas</h2>
                <h3>Palmeiras academy</h3>
            </div>

            <form action="{{route('cadastro.store')}}" class="form mb-5">
                <div class="mb-3 col-sm-12 col-xl-12">
                    <label for="nome" class="form-label">Nome completo</label>
                    <input type="text" class="form-control" id="nome" aria-describedby="nome" required>
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="apelido" class="form-label">Como gosta de ser chamada</label>
                    <input type="text" class="form-control" id="apelido" aria-describedby="apelido" required>
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="email" required>
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="endereco" class="form-label">Digite seu endereço</label>
                    <input type="text" class="form-control" id="endereco" aria-describedby="endereco" required>
                </div>
                <div class="row">
                    <div class="mb-3 col-sm-12  col-md-6 col-lg-4">
                        <label for="identidade" class="form-label">Data de nascimento</label>
                        <input type="date" class="form-control" id="identidade" aria-describedby="identidade" required>
                    </div>
                    <div class="mb-3 col-sm-12  col-md-6 col-lg-4">
                        <label for="identidade" class="form-label">Identidade</label>
                        <input type="text" class="form-control" id="identidade" aria-describedby="identidade" required>
                    </div>
                    <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" aria-describedby="cpf" required>
                    </div>
                    <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                        <label for="nome" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="nome" aria-describedby="nome" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-sm-12  col-md-6 col-lg-4">
                        <label for="estado_civil" class="form-label">Estado Civil</label>
                        <select class="form-select" aria-label="Estado civil" required>
                            <option selected>Escolha uma opção</option>
                            <option value="Solteira">Solteira</option>
                            <option value="Casada">Casada</option>
                            <option value="Divorciada">Divorciada</option>
                            <option value="Viúva">Viúva</option>
                            <option value="Separada">Separada</option>
                        </select>
                    </div>
                    <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                        <label for="filhos" class="form-label">Tem filhos?</label>
                        <select class="form-select" onchange="qtd_filhos(this)" aria-label="Tem filhos" required>
                            <option selected>Escolha uma opção</option>
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>
                        <div class="qtd_filhos"></div>
                    </div>
                    <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                        <label for="profissao" class="form-label">Profissão</label>
                        <input type="text" class="form-control" id="profissao" aria-describedby="profissao" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                        <label for="numero_camisa" class="form-label">Número da camisa</label>
                        <input type="number" class="form-control" id="numero_camisa" aria-describedby="numero_camisa" required>
                    </div>
                    <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                        <label for="posicao" class="form-label">Posição que joga</label>
                        <select class="form-select" aria-label="Posição que joga" required>
                            <option selected>Escolha uma opção</option>
                            @foreach ($posicoes as $posicao)
                                <option value="{{$posicao->id}}">{{$posicao->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-sm-12  col-md-6 col-lg-4">
                        <label for="nutricionista" class="form-label">Faz acompanhamento com nutricionista?</label>
                        <select class="form-select" aria-label="Faz acompanhamento com nutricionista" required>
                            <option selected>Escolha uma opção</option>
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>
                    </div>
                    <div class="mb-3 col-sm-12  col-md-6 col-lg-4">
                        <label for="terapia" class="form-label">Faz terapia?</label>
                        <select class="form-select" aria-label="Faz terapia" required>
                            <option selected>Escolha uma opção</option>
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>
                    </div>
                    <div class="mb-3 col-sm-12  col-md-6 col-lg-4">
                        <label for="faz_atividade" class="form-label">Faz atividade física?</label>
                        <select class="form-select" onchange="atividade_fisica(this)" aria-label="Faz física" required>
                            <option selected>Escolha uma opção</option>
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>
                        <div class="atividade_fisica"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-sm-12  col-md-6 col-lg-4">
                        <label for="tem_plano" class="form-label">Tem plano de saúde?</label>
                        <select class="form-select" aria-label="Tem plano de saúde" required>
                            <option selected>Escolha uma opção</option>
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>
                        <div class="plano_saude"></div>
                    </div>
                    <div class="mb-3 col-sm-12  col-md-6 col-lg-4">
                        <label for="tem_alergia" class="form-label">Tem alergia?</label>
                        <select class="form-select" aria-label="Faz terapia" required>
                            <option selected>Escolha uma opção</option>
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>
                        <div class="alergia"></div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
