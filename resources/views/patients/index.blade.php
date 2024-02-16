@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="text-center">Pacientes</h1>
        </div>
    </div>
    <div class="row justify-content-end mb-2">
        <div class="col-auto">
            <a href="{{ route('patients.create') }}" class="btn btn-primary">Adicionar Paciente</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->email }}</td>
                <td>
                    <a href="{{ route('patients.show', $patient) }}" class="btn btn-info">Visualizar</a>
                    <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
