<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Forms extends Component
{   
    public $formFields = [];

    public function mount()
    {
        $this->formFields[] = ['question' => '', 'type' => 'text'];
    }

    public function addField($type = 'text')
    {   
        if($type == 'text') {
            $this->formFields[] = [
                'question' => 'New Question',
                'type' => $type
            ];
        }

        if($type == 'option') {
            $this->formFields[] = [
                'question' => 'New Question',
                'type' => $type,
                'options' => [''] 
            ];
        }
    }

    public function removeField($index)
    {   
        unset($this->formFields[$index]);
        $this->formFields = array_values($this->formFields);
    }

    public function addAnswer($index)
    {   
        array_push($this->formFields[$index]['options'], 'New Answer');
    }

    public function removeAnswer($indexField, $indexAnswer)
    {   
        unset($this->formFields[$indexField]['options'][$indexAnswer]);
        $this->formFields[$indexField]['options'] = array_values($this->formFields[$indexField]['options']);
    }

    public function render()
    {
        return view('livewire.forms');
    }
}
