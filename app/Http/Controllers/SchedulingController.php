<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Scheduling;
use App\Models\Patient;
use App\Models\Professional;

class SchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $date = $request->input('date', Carbon::today()->format('Y-m-d'));
        $professionalId = $request->input('professional_id');
        $patientId = $request->input('patient_id');
        $perPage = $request->input('per_page', 15);

        $schedulings = Scheduling::with(['professional', 'patient']) // Garante que os relacionamentos estejam sendo carregados
            ->when($date, function ($query) use ($date) {
                return $query->whereDate('date', '=', $date);
            })
            ->when($professionalId, function ($query) use ($professionalId) {
                return $query->where('professional_id', $professionalId);
            })
            ->when($patientId, function ($query) use ($patientId) {
                return $query->where('patient_id', $patientId);
            })
            ->paginate($perPage);

        $professionals = Professional::all();
        $patients = Patient::all();

        return view('schedulings.index', compact('schedulings', 'professionals', 'patients', 'date', 'professionalId', 'patientId', 'perPage'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professionals = Professional::all();
        $patients = Patient::all();
        return view('schedulings.create', compact('professionals', 'patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'professional_id' => 'required|integer|exists:professionals,id',
            'patient_id' => 'required|integer|exists:patients,id',
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
            'status' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        $validated = $validator->validated();
    
        // Convertendo data e hora para o formato correto
        // $validated['date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $validated['date'])->format('Y-m-d');
        $validated['time'] .= ':00'; // Adiciona segundos ao tempo
    
        // Cria o agendamento com os dados validados e convertidos
        $scheduling = Scheduling::create($validated);
    
        return redirect()->route('schedulings.index')->with('success', 'Agendamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scheduling $scheduling)
    {
        $scheduling = Scheduling::findOrFail($id);
        return response()->json($scheduling);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scheduling $scheduling)
    {
        $professionals = Professional::all();
        $patients = Patient::all();
        return view('schedulings.edit', compact('scheduling', 'professionals', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scheduling $scheduling)
    {
        $validator = Validator::make($request->all(), [
            'professional_id' => 'required|integer|exists:professionals,id',
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
            'status' => 'sometimes|required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        $validated = $validator->validated();
        $validated['time'] .= ':00'; // Adiciona segundos ao tempo
    
        $scheduling->update($validated);
        return redirect()->route('schedulings.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scheduling $scheduling)
    {
        $scheduling->delete();
        return redirect()->route('schedulings.index')->with('success', 'Agendamento excluído com sucesso!');
    }
}
