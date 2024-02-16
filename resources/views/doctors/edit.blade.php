@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Profissional</h1>
    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $doctor->phone }}" required>
        </div>
        <div class="mb-3">
            <label for="profession" class="form-label">Profissão</label>
            <input type="text" class="form-control" id="profession" name="profession" value="{{ $doctor->profession }}" required>
        </div>
        <div class="mb-3">
            <label for="crm" class="form-label">CRM</label>
            <input type="text" class="form-control" id="crm" name="crm" value="{{ $doctor->crm }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
