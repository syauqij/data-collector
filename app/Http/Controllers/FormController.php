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

    public function store(Request $request)
    {           
        Debugbar::info($request);

        //dd($request);

        $validate = $this->validate($request, [
            'title' => 'required|max:150',
            'desc' => 'max:255',
        ]);

        $form = new Form;

        $form->owner_id = $request->user()->id;
        $form->title = $request->title;
        $form->desc = $request->desc;
        $form->fields = $request->fields;

        if($form->save()){
            return redirect()->route('forms');
        }
    }
    
    public function submit(Form $form)
    {   
        return view('forms.submit', compact('form'));
    }

    public function destroy()
    {
        
    }

    public function show()
    {
        
    }
}
