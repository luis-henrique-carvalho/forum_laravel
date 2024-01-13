@extends('layouts.app')

@section('title', 'Suportes')

@section('content_header')
    <h1>Suportes</h1>
@endsection

@section('content')

    @if (session('success'))
        <x-adminlte-alert title="Sucesso" theme="success" dismissable>
            {{ session('success') }}
        </x-adminlte-alert>
    @endif

    @if (session('error'))
        <x-adminlte-alert title="Sucesso" theme="danger" dismissable>
            {{ session('error') }}
        </x-adminlte-alert>
    @endif

    <x-adminlte-modal id="modal-delete" title="Excluir Suporte" theme="danger" icon="fas fa-trash" v-centered static-backdrop
        scrollable>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="secondary" label="Cancelar" data-dismiss="modal" />
            <x-adminlte-button theme="danger" label="Excluir" onclick="document.querySelector('#form-delete').submit()" />
        </x-slot>
        <form id="form-delete" method="POST">
            @csrf
            @method('DELETE')
        </form>
        <p>Tem certeza que deseja excluir esta Suporte?</p>
    </x-adminlte-modal>

    {{-- @can('create', App\Models\Support::class) --}}
    <a href="{{ route('supports.create') }}">
        <x-adminlte-button label="Nova Suporte" class="mb-2" theme="primary" icon="fas fa-plus mr-2" />
    </a>
    {{-- @endcan --}}

    <form class='card skip-empty-fields'>
        {{-- Header --}}
        <div class='card-header'>
            {{-- Tools --}}
            <div class="d-flex justify-content-between">
                <x-adminlte-button type="button" icon="fas fa-filter" data-toggle="collapse"
                    data-target="#collapseFilters" />
                <x-adminlte-input name="filters[name][$contains]" fgroup-class='mb-0' placeholder="Busca por Assunto"
                    value="{{ request()->filters['name']['$contains'] ?? null }}">
                    <x-slot name="appendSlot">
                        <x-adminlte-button type="submit" icon="fas fa-search" />
                    </x-slot>
                </x-adminlte-input>
            </div>
            {{-- Filters --}}
            <div class="collapse" id="collapseFilters">
                <div class="card-body">
                    <div class="row">
                        <x-adminlte-input name="filters[district][name][$contains]"
                            value="{{ request()->filters['district']['name']['$contains'] ?? null }}" label="Texto"
                            fgroup-class='col-sm-6' placeholder="Texto do Suporte" />
                    </div>
                </div>
            </div>
        </div>
        {{-- Body --}}
        <div class='card-body p-0'>
            {{-- Table --}}
            @if ($supports->count())
                <table class="table table-striped mb-0" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Assunto</th>
                            <th style="width:15%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supports as $support)
                            <tr>
                                <td>{{ $support->id }}</td>
                                <td>{{ $support->subject }}</td>
                                <td class='d-flex' style="gap: 5px">
                                    <div class="btn-group btn-group-sm">
                                        {{-- @can('view', $support) --}}
                                            <a href="{{ route('supports.show', $support) }}"
                                                class="btn btn-secondary">
                                                <i class="fas fa-eye px-1"></i>
                                            </a>
                                        {{-- @endcan --}}
                                        @can('update', $support)
                                            <a href="{{ route('supports.edit', $support) }}" class="btn btn-primary">
                                                <i class="fas fa-pencil-alt px-1"></i>
                                            </a>
                                        @endcan
                                        @can('delete', $support)
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modal-delete"
                                                data-action="{{ route('supports.destroy', $support->id) }}">
                                                <i class="fas fa-trash px-1"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="p-3">
                    <h5>Nenhuma Suporte encontrada</h5>

                    <p class="text-muted">Tente refazer sua busca ou <a href="{{ route('supports.index') }}">limpe os
                            filtros</a>.</p>

                    <p class="text-muted">Caso não tenha encontrado a Suporte que procura, <a
                            href="{{ route('supports.create') }}">crie uma nova Suporte</a>.</p>

                </div>
            @endif
        </div>
        {{-- Footer --}}
        <div class="card-footer">
            {{-- Pagination --}}
            {{ $supports->links() }}
        </div>
    </form>
@endsection

@section('js')
    <script>
        $('#modal-delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            modal.find('form').attr('action', action);
        });
    </script>
@endsection
