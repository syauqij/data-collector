<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('forms.index');
    }
    
    public function create()
    {
        return view('forms.create');
    }

    public function store(Request $request)
    {           
        //dd($request);

        $validate = $this->validate($request, [
            'title' => 'required|max:255',
            'desc' => 'max:10',
        ]);

        $form = new Form;

        $form->title = $request->title;
        $form->desc = $request->desc;
        $form->fields = $request->fields;

        if($form->save()){
            return redirect()->route('forms');
        }
    }


    public function show()
    {
        
    }

    public function destroy()
    {
        
    }
}
