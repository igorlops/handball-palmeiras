@extends('layout.app')

@section('title', 'Atletas')

@section('content')

    <section class="container my-5">
        <a href="{{route('cadastro.index')}}" class="btn btn-warning my-5">
            <i class="bi bi-arrow-left"></i>
            Voltar
        </a>

        <div class="card">
            <div class="card-header">
                <h4>{{ $cadastro->nome }}</h4>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $cadastro->id }}</p>
                <p><strong>Nome:</strong> {{ $cadastro->nome }}</p>
                <p><strong>Apelido:</strong> {{ $cadastro->apelido }}</p>
                <p><strong>Data de Nascimento:</strong> {{ convertDateBr($cadastro->data_nascimento) }}</p>
                <p><strong>Identidade:</strong> {{ $cadastro->identidade }}</p>
                <p><strong>CPF:</strong> {{ $cadastro->cpf }}</p>
                <p><strong>Telefone:</strong> {{ $cadastro->telefone }}</p>
                <p><strong>Email:</strong> {{ $cadastro->email }}</p>
                <p><strong>Endereço:</strong> {{ $cadastro->endereco }}</p>
                <p><strong>Estado Civil:</strong> {{ $cadastro->estado_civil }}</p>
                <p><strong>Tem filhos:</strong> {{ $cadastro->filhos }}</p>
                <p><strong>Profissão:</strong> {{ $cadastro->profissao }}</p>
                <p><strong>Número da Camisa:</strong> {{ $cadastro->numero_camisa }}</p>
                <p><strong>Posição:</strong> {{ $cadastro->desc_posicao }}</p>
                <p><strong>Faz Atividade Física:</strong> {{ $cadastro->faz_atividade }}</p>
                <p><strong>Nutricionista:</strong> {{ $cadastro->nutricionista }}</p>
                <p><strong>Tem Alergia:</strong> {{ $cadastro->tem_alergia }}</p>
                <p><strong>Criado em:</strong> {{ convertDateHourBr($cadastro->created_at)}}</p>
            </div>
        </div>
    </section>
@endsection
