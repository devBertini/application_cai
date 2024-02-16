@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="text-center">Profissionais</h1>
        </div>
    </div>
    <div class="row justify-content-end mb-2">
        <div class="col-auto">
            <a href="{{ route('professionals.create') }}" class="btn btn-primary">Adicionar Profissional</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Profissão</th>
                <th>CRM</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($professionals as $professional)
            <tr>
                <td>{{ $professional->name }}</td>
                <td>{{ $professional->phone }}</td>
                <td>{{ $professional->profession }}</td>
                <td>{{ $professional->crm }}</td>
                <td>
                    <a href="{{ route('professionals.show', $professional->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('professionals.edit', $professional->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('professionals.destroy', $professional->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
