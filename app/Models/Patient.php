<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patient';
    public $fillable = ['date_of_test', 'id_number', 'patient_name','phone_mobile', 'gender', 'date_of_birth', 'lab_number', 'clinic_code'];
    public function lab_studies()
    {
        return $this->hasMany(LabStudies::class);
    }
}
