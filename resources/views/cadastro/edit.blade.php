@extends('layout.app')

@section('title', 'Editar atleta')

@section('content')

    <section id="cadastro">
        <div class="container">
            <div class="text-success text-center py-5">
                <h2 class="fs-1">Editar atleta {{$cadastro->nome}}</h2>
                <h3>Palmeiras academy</h3>
            </div>

            <form action="{{ route('cadastro.update',$cadastro->id) }}" method="POST"
                class="form mb-5 d-flex flex-wrap justify-content-between gap-1">
                @method('PATCH')
                @csrf
                <div class="mb-3 col-sm-12">
                    <label for="nome" class="form-label">Nome completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome',$cadastro->nome)}}" aria-describedby="nome"
                        required>
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="apelido" class="form-label">Como gosta de ser chamada</label>
                    <input type="text" class="form-control" id="apelido" name="apelido" value="{{old('apelido',$cadastro->apelido)}}" aria-describedby="apelido"
                        required>
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email',$cadastro->email)}}" aria-describedby="email"
                        required>
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="endereco" class="form-label">Digite seu endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="{{old('endereco',$cadastro->endereco)}}" aria-describedby="endereco"
                        required>
                </div>
                <div class="mb-3 col-sm-12  col-md-4 col-lg-3">
                    <label for="data_nascimento" class="form-label">Data de nascimento</label>
                    <input type="text" class="form-control date" id="data_nascimento" name="data_nascimento" value="{{old('data_nascimento',$cadastro->data_nascimento)}}"
                        aria-describedby="data_nascimento" required>
                </div>
                <div class="mb-3 col-sm-12  col-md-4 col-lg-3">
                    <label for="identidade" class="form-label">Identidade</label>
                    <input type="text" class="form-control" id="identidade" name="identidade" value="{{old('identidade',$cadastro->identidade)}}"
                        aria-describedby="identidade" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control cpf" id="cpf" name="cpf" value="{{old('cpf',$cadastro->cpf)}}" aria-describedby="cpf"
                        required>
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control phone_with_ddd" id="telefone" name="telefone" value="{{old('telefone',$cadastro->telefone)}}"
                        aria-describedby="telefone" required>
                </div>
                <div class="mb-3 col-sm-12  col-md-4 col-lg-3">
                    <label for="estado_civil" class="form-label">Estado Civil</label>
                    <select name="estado_civil" class="form-select" aria-label="Estado civil" required>
                        <option value="Solteira" {{ old('estado_civil', $cadastro->estado_civil) == 'Solteira' ? 'selected' : '' }}>Solteira</option>
                        <option value="Casada" {{ old('estado_civil', $cadastro->estado_civil) == 'Casada' ? 'selected' : '' }}>Casada</option>
                        <option value="Divorciada" {{ old('estado_civil', $cadastro->estado_civil) == 'Divorciada' ? 'selected' : '' }}>Divorciada</option>
                        <option value="Viúva" {{ old('estado_civil', $cadastro->estado_civil) == 'Viúva' ? 'selected' : '' }}>Viúva</option>
                        <option value="Separada" {{ old('estado_civil', $cadastro->estado_civil) == 'Separada' ? 'selected' : '' }}>Separada</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-3">
                    <label for="filhos" class="form-label">Tem filhos?</label>
                    <select name="filhos" class="form-select" onchange="onChangeOption(this,['qtd_filhos'])" aria-label="Tem filhos" required>
                        <option value="" selected>Escolha uma opção</option>
                        <option value="Sim" {{old('filhos', $cadastro->filhos) == 'Sim' ? 'selected' : ''}}>Sim</option>
                        <option value="Não" {{old('filhos', $cadastro->filhos) == 'Não' ? 'selected' : ''}}>Não</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-12  col-md-4 col-lg-3">
                    <label for="qtd_filhos" class="form-label">Quantidade de filhos</label>
                    <input type="text" class="form-control" id="qtd_filhos" name="qtd_filhos" value="{{old('qtd_filhos',$cadastro->qtd_filhos)}}"
                        aria-describedby="qtd_filhos">
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-3">
                    <label for="profissao" class="form-label">Profissão</label>
                    <input type="text" class="form-control" id="profissao" name="profissao" value="{{old('profissao',$cadastro->profissao)}}"
                        aria-describedby="profissao" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-3">
                    <label for="numero_camisa" class="form-label">Número da camisa</label>
                    <input type="number" class="form-control" id="numero_camisa" name="numero_camisa" value="{{old('numero_camisa',$cadastro->numero_camisa)}}"
                        aria-describedby="numero_camisa" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-3">
                    <label for="posicao" class="form-label">Posição que joga</label>
                    <select name="posicao" class="form-select" aria-label="Posição que joga" required>
                        <option value="" selected>Escolha uma opção</option>
                        @foreach ($posicoes as $posicao)
                            <option value="{{ $posicao->id }}" {{old('posicao', $cadastro->posicao) == $posicao->id ? 'selected' : ''}}>{{ $posicao->descricao }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-sm-12  col-md-4 col-lg-3">
                    <label for="nutricionista" class="form-label">Faz acompanhamento com nutricionista?</label>
                    <select name="nutricionista" value="{{$cadastro->nutricionista}}" class="form-select" aria-label="Faz acompanhamento com nutricionista"
                        required>
                        <option value="" selected>Escolha uma opção</option>
                        <option value="Sim" {{old('nutricionista', $cadastro->nutricionista) == 'Sim' ? 'selected' : ''}}>Sim</option>
                        <option value="Não" {{old('nutricionista', $cadastro->nutricionista) == 'Não' ? 'selected' : ''}}>Não</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-12  col-md-4 col-lg-3">
                    <label for="terapia" class="form-label">Faz terapia?</label>
                    <select name="terapia" value="{{$cadastro->terapia}}" class="form-select" aria-label="Faz terapia" required>
                        <option value="" selected>Escolha uma opção</option>
                        <option value="Sim" {{old('terapia', $cadastro->terapia) == 'Sim' ? 'selected' : ''}}>Sim</option>
                        <option value="Não" {{old('terapia', $cadastro->terapia) == 'Não' ? 'selected' : ''}}>Não</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-12  col-md-4 col-lg-3">
                    <label for="faz_atividade" class="form-label">Faz atividade física?</label>
                    <select name="faz_atividade" value="{{$cadastro->faz_atividade}}" onchange="onChangeOption(this,['qtd_atividade_semana','atividade_fisica'])" class="form-select" aria-label="Faz atividade física" required>
                        <option value="" selected>Escolha uma opção</option>
                        <option value="Sim" {{old('faz_atividade', $cadastro->faz_atividade) == 'Sim' ? 'selected' : ''}}>Sim</option>
                        <option value="Não">{{old('faz_atividade', $cadastro->faz_atividade) == 'Não' ? 'selected' : ''}}>Não</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-12  col-md-4 col-lg-3 d-none">
                    <label for="qtd_atividade_semana" class="form-label">Quantas vezes por semana?</label>
                    <input type="text" class="form-control" id="qtd_atividade_semana" name="qtd_atividade_semana" value="{{old('qtd_atividade_semana',$cadastro->qtd_atividade_semana)}}"
                        aria-describedby="qtd_atividade_semana">
                </div>
                <div class="mb-3 col-sm-12  col-md-4 col-lg-3 d-none">
                    <label for="atividade_fisica" class="form-label">Quais atividades?</label>
                    <select name="atividade_fisica[]" id="atividade_fisica" multiple class="form-select" aria-label="Quais atividades você pratiica">
                        <option value="" selected>Escolha uma opção</option>
                        @foreach ($atividades as $atividade)
                            <option value="{{$atividade->id}}" {{ in_array($atividade->id,$atividadeJogadora) ? 'selected' : ''}}>{{$atividade->descricao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-sm-12  col-md-4 col-lg-3">
                    <label for="tem_plano" class="form-label">Tem plano de saúde?</label>
                    <select name="tem_plano" value="{{$cadastro->tem_plano}}" onchange="onChangeOption(this,['plano_saude'])" class="form-select" aria-label="Tem plano de saúde" required>
                        <option value="" selected>Escolha uma opção</option>
                        <option value="Sim" {{old('tem_plano', $cadastro->tem_plano) == 'Sim' ? 'selected' : ''}}>Sim</option>
                        <option value="Não" {{old('tem_plano', $cadastro->tem_plano) == 'Não' ? 'selected' : ''}}>Não</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-12  col-md-4 col-lg-3 d-none">
                    <label for="plano_saude" class="form-label">Qual plano de saúde?</label>
                    <input type="text" class="form-control" id="plano_saude" name="plano_saude" value="{{old('plano_saude',$cadastro->plano_saude)}}"
                        aria-describedby="plano_saude">
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-3">
                    <label for="tem_alergia" class="form-label">Tem alergia?</label>
                    <select name="tem_alergia" value="{{$cadastro->tem_alergia}}" onchange="onChangeOption(this,['alergia'])" onload="onChangeOption(this,['alergia'])" class="form-select" aria-label="Faz terapia" required>
                        <option value="" selected>Escolha uma opção</option>
                        <option value="Sim" {{old('tem_alergia', $cadastro->tem_alergia) == 'Sim' ? 'selected' : ''}}>Sim</option>
                        <option value="Não" {{old('tem_alergia', $cadastro->tem_alergia) == 'Não' ? 'selected' : ''}}>Não</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-12  col-md-4 col-lg-3 d-none">
                    <label for="alergia" class="form-label">Qual alergia?</label>
                    <input type="text" class="form-control" id="alergia" name="alergia" value="{{old('alergia',$cadastro->alergia)}}" aria-describedby="alergia">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </form>

        </div>
    </section>
@endsection
