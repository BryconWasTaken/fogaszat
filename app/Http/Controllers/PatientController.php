<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\patient;

class PatientController extends Controller
{
    public function index()
    {
        // Retrieve all users from the database and pass them to the view
        $patient = patient::with('visit')->get();
        return view('patients.index', ['patient' => $patient]);
    }

    public function show($id)
    {
        // Retrieve a specific user by ID from the database and pass it to the view
        $patient = patient::find($id);
        return view('patients/show', compact('patient'));
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $patient = patient::where('id', '=', $search_text)->get();

        return view ('patients.search',compact('patient'));
    }

    public function create()
    {
        // Display the form to create a new user
        return view('patients.create');
    }


    public function store(Request $request)
    {
        $patient = Patient::create($request->all());
        // You can also add validation and additional logic here

        /*$validatedData = $request->validate([
            'firstname' => 'required',
            'surname' => 'required',
            'taj' => 'required',
            'birthdate' => 'required',
        ]);

        patient::create($validatedData);*/
        return redirect('/patient/list');
    }



}
