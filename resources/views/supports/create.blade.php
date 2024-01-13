@extends('layouts.app')

@section('title', 'Suporte')

@section('content_header')
    <h1>Novo Suporte</h1>
@endsection

@section('content')
    <x-adminlte-card title="Novo Suporte">
        <form action="{{ route('supports.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <x-adminlte-input name="subject" label="Assunto" fgroup-class='col-sm-6' placeholder="Digite o Assunto"
                        required />
                    <x-adminlte-textarea name="body" fgroup-class='col-sm-12' col="30" aria-placeholder="Digite o texto"
                        label="Texto" placeholder="Digite o texto" required />
                </div>
            </div>
            <x-adminlte-button class="ml-auto float-right" type="submit" label="Salvar" theme="success"
                icon="fas fa-save mr-2" />

        </form>
    </x-adminlte-card>
@endsection
