<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\LabStudies;

class PatientController extends Controller
{
    public function get()
    {
        $patients = Patient::with('lab_studies')->get();
        return response($patients);
    }

    public function store(Request $request)
    {
        $patient = new Patient();
        $patient->id_number = $request->input('id_number');
        if (strcmp($request->input('patient_data.id_number'),"") != 0) {
            $patient->id_number = $request->input('patient_data.id_number');
        }

        $patient->patient_name = $request->input('patient_name');
        if (strcmp($request->input('patient_data.first_name'),  "") != 0) {
            $patient->patient_name = $request->input('patient_data.first_name') . $request->input('patient_data.last_name');
        }
        $patient->phone_mobile = $request->input('phone_mobile');
        if (strcmp($request->input('patient_data.phone_mobile'), "") != 0) {
            $patient->phone_mobile = $request->input('patient_data.phone_mobile');
        }
        $patient->gender = $request->input('gender');
        if (strcmp($request->input('patient_data.gender'), "") != 0) {
            $patient->gender = $request->input('patient_data.gender');
        }
        
        if (strcmp($request->input('date_of_birth'), "") != 0) {
            $patient->date_of_birth = \Carbon\Carbon::createFromFormat('Ymd', $request->input('date_of_birth'));
        }
        if (strcmp($request->input('patient_data.date_of_birth'), "") != 0) {
            $patient->date_of_birth = \Carbon\Carbon::createFromFormat('Ymd', $request->input('patient_data.date_of_birth'));
        }
        $patient->date_of_test = \Carbon\Carbon::createFromFormat('YmdHis', $request->input('date_of_test'));
        $patient->lab_number = $request->input('lab_number');
        $patient->clinic_code = $request->input('clinic_code');     
        $patient->save();

        foreach ($request->input('lab_studies') as $req_lab_studies) {
            $lab_studies = new LabStudies();
            $lab_studies->code = $req_lab_studies['code'];
            $lab_studies->name = $req_lab_studies['name'];
            $lab_studies->value = $req_lab_studies['value'];
            $lab_studies->unit = $req_lab_studies['unit'];
            $lab_studies->ref_range = $req_lab_studies['ref_range'];
            $lab_studies->finding = $req_lab_studies['finding'];
            $lab_studies->result_state = $req_lab_studies['result_state'];
            $patient->lab_studies()->save($lab_studies);
        }
        return 'success';
    }
}
