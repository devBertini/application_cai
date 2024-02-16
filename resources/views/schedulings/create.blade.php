@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cadastrar Novo Agendamento</h2>
    <form action="{{ route('schedulings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="doctor_id">Profissional:</label>
            <select class="form-control" name="doctor_id" required>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="patient_id">Paciente:</label>
            <select class="form-control" name="patient_id" required>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Data:</label>
            <input type="date" class="form-control" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Hora:</label>
            <input type="time" class="form-control" name="time" required step="60">
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" required>
                <option value="agendado">Agendado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Agendamento</button>
    </form>
</div>
@endsection
