<?php

namespace App\Http\Controllers;

use App\Models\CustomPatient;
use App\Http\Requests\Request;

use App\Http\Requests\PatientCreateRequest;



class CustomPatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function createPatients()
    {
        return view('patients.create');
    }

    public function index()
    {
        $data = CustomPatient::all();
    

        return view('patients.index',compact('data'));
          
    }

    public function store(PatientCreateRequest $request)
    {
        $patient=new Patient();
 
        $dateBirthday = date_create($request->date_birthday);

        $patient->code_patient=$patient->getNumDoct();
        $patient->cin_number=$request->cin_number;
        $patient->first_name=$request->first_name;
        $patient->second_name=$request->second_name;
        $patient->email=$request->email;
        $patient->telephone=$request->telephone;
        $patient->adress=$request->adress;
        $patient->nationality=$request->nationality;
        $patient->city=$request->city;
        $patient->gender=$request->gender;
        $patient->date_birthday=date_format($dateBirthday, "Y-m-d");
        $patient->family_situation=$request->family_situation;
        if($request->hasFile('profile_picture')){
            $patient->profile_picture=$this->savePicture($request->file('profile_picture'));
        }
        $patient->notes=$request->notes;
        $patient->status=1;      
     
        try {
        //    Log::info($patient);
            $patient->save();
            //$request->flash();
            activity()->performedOn($patient)->log('Création du patient  ' .($patient->code_patient).' - '.($patient->first_name).' '.$patient->second_name .' avec succés');
            return redirect()->route('patients.index')->with('success','Nouveau patient  '.($patient->code_interne).' - '.$patient->first_name.'  '.$patient->second_name . '  ajouté avec succés.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail',"Une erreur s'est produite. Veuillez réessayer ultérieurement");


    }
    

}
}
