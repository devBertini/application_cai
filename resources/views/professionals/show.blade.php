@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Profissional</h1>
    <div class="mb-3">
        <h2>{{ $professional->name }}</h2>
        <p><strong>Telefone:</strong> {{ $professional->phone }}</p>
        <p><strong>Profissão:</strong> {{ $professional->profession }}</p>
        <p><strong>CRM:</strong> {{ $professional->crm }}</p>
    </div>
    <a href="{{ route('professionals.edit', $professional->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('professionals.destroy', $professional->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    <a href="{{ route('professionals.index') }}" class="btn btn-secondary">Voltar à lista</a>
</div>
@endsection
