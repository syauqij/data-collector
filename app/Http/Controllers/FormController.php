<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Facade as Debugbar;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {   
        $forms = Form::get();

        Debugbar::info($forms);

        return view('forms.index', [
            'forms' => $forms
        ]);
    }
    
    public function create()
    {
        return view('forms.create');
    }
    
    public function destroy()
    {
        
    }

    public function show()
    {
        
    }
}
