<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Patient;
use App\Models\treatment;
use Illuminate\Http\Request;

use App\Models\visit;
use App\Http\Requests\StorevisitRequest;
use App\Http\Requests\UpdatevisitRequest;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visit = visit::with('patient', 'treatment')->get();
        return view('visit.visits', ['visit' => $visit]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $visit = visit::where('visit_date', 'Like', $search_text.'%')->get();

        return view ('visit.search',compact('visit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Visit $visit)
    {
        $visit = Visit::create($request->all());

        return redirect('/visit/list');
    }


    public function __invoke(Request $request, Patient $patient)
    {
        // Create a new visit for the patient
        $visit = new Visit();
        $visit->patient_id = $patient->id;
        $visit->visit_date = $request->input('visit_date');


    }
    /**
     * Display the specified resource.
     */
    public function edit(Request $request, visit $visit)
    {
        $patient = Patient::all();
        $treatment = Treatment::all();
        $visit = Visit::find($visit)->all();
        return view ('visit.edit', compact('visit','patient','treatment'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatevisitRequest $request, visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(visit $visit)
    {
        //
    }
}
