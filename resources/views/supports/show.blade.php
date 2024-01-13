@extends('layouts.app')

@section('title', 'Suportes')

@section('content_header')
    <h1>Suporte / {{ $support->id }}</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 align-items-stretch">
            <x-adminlte-card title='Detalhes do Suporte'>
                <div class="text-muted col text-center">
                    <p class="text-md col-sm-12">
                        Assunto: <br><b>{{ $support->subject }}</b>
                    </p>
                    <p class="text-md col-sm-12">
                        Conteudo: <br><b>{{ $support->body }}</b>
                    </p>
                </div>
            </x-adminlte-card>
        </div>
    </div>
@endsection
