@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Visualizar Usuário</h1>
    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <p>{{ $user->name }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">Email:</label>
        <p>{{ $user->email }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">Telefone:</label>
        <p>{{ $user->phone }}</p>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
