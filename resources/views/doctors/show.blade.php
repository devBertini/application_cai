@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Profissional</h1>
    <div class="mb-3">
        <h2>{{ $doctor->name }}</h2>
        <p><strong>Telefone:</strong> {{ $doctor->phone }}</p>
        <p><strong>Profissão:</strong> {{ $doctor->profession }}</p>
        <p><strong>CRM:</strong> {{ $doctor->crm }}</p>
    </div>
    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Voltar à lista</a>
</div>
@endsection
