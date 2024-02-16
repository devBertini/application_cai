@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Agendamento</h2>
    <form action="{{ route('schedulings.update', $scheduling->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="doctor_id">Profissional:</label>
            <select name="doctor_id" id="doctor_id" class="form-control">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $scheduling->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date">Data:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ \Carbon\Carbon::parse($scheduling->date)->format('Y-m-d') }}">
        </div>

        <div class="form-group">
            <label for="time">Hora:</label>
            <input type="time" name="time" id="time" class="form-control" value="{{ \Carbon\Carbon::parse($scheduling->time)->format('H:i') }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
