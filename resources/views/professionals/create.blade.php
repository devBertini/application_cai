@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Profissional</h1>
    <form action="{{ route('professionals.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="profession" class="form-label">Profissão</label>
            <input type="text" class="form-control" id="profession" name="profession" required>
        </div>
        <div class="mb-3">
            <label for="crm" class="form-label">CRM</label>
            <input type="text" class="form-control" id="crm" name="crm">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
