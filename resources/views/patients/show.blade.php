@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Paciente</h1>
    <div class="mb-3">
        <strong>Nome:</strong> {{ $patient->name }}<br>
        <strong>Telefone:</strong> {{ $patient->phone }}<br>
        <strong>Email:</strong> {{ $patient->email }}
    </div>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
