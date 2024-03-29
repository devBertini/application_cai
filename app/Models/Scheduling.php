<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    use HasFactory;

    protected $fillable = [
        'professional_id',
        'patient_id',
        'date',
        'time',
        'status',
    ];

    /**
     * Relação entre agendamento e usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relação entre agendamento e paciente.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    /**
     * Relação entre agendamento e Profissional.
     */
    public function professional()
    {
        return $this->belongsTo(Professional::class, 'professional_id');
    }
}
