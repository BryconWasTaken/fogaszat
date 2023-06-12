<?php

namespace App\Http\Controllers;

use App\Models\problem_detected;
use App\Models\patient;
use App\Models\visit;
use Illuminate\Http\Request;


class Problem_DetectedController extends Controller
{
    public function index()
    {
        $problem = problem_detected::with('visit')-get();
        return view('patients.problems', ['problem_detected' => $problem]);
    }
}
