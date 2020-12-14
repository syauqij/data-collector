<?php

namespace App\Http\Livewire;

use App\Models\Form;
use Livewire\Component;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;

class Forms extends Component
{   
    public $title = "Untitled Form";
    public $description;
    public $fields = [];

    protected $rules = [
        'title' => 'required|min:5|max:100',
        'description' => 'nullable|min:5|max:100',
        'fields.*.question' => 'required|min:5|max:150',
        'fields.*.min_char' => 'required_with:fields.*.max_char|integer|digits_between: 1,3',
        'fields.*.max_char' => 'required_with:fields.*.min_char|integer|gt:fields.*.min_char|digits_between: 1,3',
        'fields.*.answers.*' => 'required|min:1|max:255'
    ];

    public function mount()
    {
        $this->fields[] = ['question' => '', 'type' => 'text', 'long_text' => ''];
    }

    public function updated($propertyName)
    {   
        $this->validateOnly($propertyName);
    }

    public function submit(Request $request)
    {
        $this->validate();

        $form = new Form;

        $form->owner_id = $request->user()->id;
        $form->title = $this->title;
        $form->desc = $this->description;
        $form->fields = $this->fields;

        if($form->save()){
            return redirect()->route('forms');
        }
    }

    public function addField($type = 'text')
    {   
        if($type == 'text') {
            $this->fields[] = [
                'question' => 'New Question',
                'type' => $type,
                'long_text' => ''
            ];
        }

        if($type == 'option') {
            $this->fields[] = [
                'question' => 'New Question',
                'multiple' => '',
                'type' => $type,
                'answers' => ['']
            ];
        }
    }

    public function removeField($index)
    {   
        unset($this->fields[$index]);
        $this->fields = array_values($this->fields);
    }

    public function addAnswer($index)
    {   
        array_push($this->fields[$index]['answers'], 'New Answer');
    }

    public function removeAnswer($indexField, $indexAnswer)
    {   
        unset($this->fields[$indexField]['answers'][$indexAnswer]);
        $this->fields[$indexField]['answers'] = array_values($this->fields[$indexField]['answers']);
    }

    public function render()
    {   
        $errors = $this->getErrorBag();
        Debugbar::info($errors);
        return view('livewire.forms');
    }
}
