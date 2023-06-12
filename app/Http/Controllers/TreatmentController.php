<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\treatment;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatment = treatment::all();
        return view('patients.treatment', ['treatment' => $treatment]);
    }

    public function show($id)
    {
        // Retrieve a specific user by ID from the database and pass it to the view
        $treatment = treatment::find($id);
        return view('patients/show', compact('patient'));
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $treatment = treatment::where('id', '=', $search_text)->get();

        return view ('patients.treatmentsearch',compact('treatment'));
    }

    public function create()
    {
        // Display the form to create a new user
        return view('patients.create');
    }


    public function store(Request $request)
    {
        $treatment = treatment::create($request->all());
        // You can also add validation and additional logic here

        /*$validatedData = $request->validate([
            'firstname' => 'required',
            'surname' => 'required',
            'taj' => 'required',
            'birthdate' => 'required',
        ]);

        patient::create($validatedData);*/
        return redirect('/treatment/list');
    }
}
