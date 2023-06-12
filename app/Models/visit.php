<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\PatientController;
use App\TreatmentController;


class visit extends Model
{
    protected $table = 'visit';
    protected $primaryKey = 'id';

    public function patient()
    {
        return $this->belongsTo(patient::class);
    }

    public function treatment()
    {
        return $this->belongsTo(treatment::class);
    }

    protected $fillable = ['visit_date', 'patient_id','suggested_treatment'];

public $timestamps = false;
    use HasFactory;
}

