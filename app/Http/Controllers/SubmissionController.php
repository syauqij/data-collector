<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Barryvdh\Debugbar\Facade as Debugbar;

class SubmissionController extends Controller
{
    public function index()
    {

    }

    public function create(Form $form)
    {   
        Debugbar::info($form);
        return view('submissions.create', compact('form'));
    }

    public function store(Request $request)
    {   
        dd($request);
        Debugbar::info($request);
        
    }
}
