@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="mb-4">Agendamentos</h1>
    <form action="{{ route('schedulings.index') }}" method="GET" class="mb-4">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="date" class="form-label">Data:</label>
                    <input type="date" class="form-control" name="date" id="date" value="{{ $date }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_id" class="form-label">Profissional:</label> <br>
                    <select class="form-select" name="doctor_id" id="doctor_id">
                        <option value="">Selecione um Profissional</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}"{{ $doctorId == $doctor->id ? ' selected' : '' }}>{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="patient_id" class="form-label">Paciente:</label> <br>
                    <select class="form-select" name="patient_id" id="patient_id">
                        <option value="">Selecione um paciente</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}"{{ $patientId == $patient->id ? ' selected' : '' }}>{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-between mt-3">
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
            <div class="col-auto">
                <a href="{{ route('schedulings.create') }}" class="btn btn-success">Cadastrar Agendamento</a>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Profissional</th>
                <th>Atuação</th>
                <th>Paciente</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedulings as $scheduling)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($scheduling->date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($scheduling->time)->format('H:i') }}</td>
                    <td>{{ $scheduling->doctor->name ?? 'N/A' }}</td>
                    <td>{{ $scheduling->doctor->profession ?? 'N/A' }}</td>
                    <td>{{ $scheduling->patient->name ?? 'N/A' }}</td>
                    <td>{{ $scheduling->status }}</td>
                    <td>
                        <a href="{{ route('schedulings.edit', $scheduling->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('schedulings.destroy', $scheduling->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este agendamento?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        <form class="d-flex align-items-center">
            <label for="per_page" class="me-2">Exibir por página: </label>
            <select name="per_page" id="per_page" class="form-select" onchange="this.form.submit()">
                <option value="5"{{ $perPage == 5 ? ' selected' : '' }}>5</option>
                <option value="10"{{ $perPage == 10 ? ' selected' : '' }}>10</option>
                <option value="15"{{ $perPage == 15 ? ' selected' : '' }}>15</option>
                <option value="25"{{ $perPage == 25 ? ' selected' : '' }}>25</option>
                <option value="50"{{ $perPage == 50 ? ' selected' : '' }}>50</option>
            </select>
        </form>
    </div>

    {{ $schedulings->links() }}
</div>
@endsection
