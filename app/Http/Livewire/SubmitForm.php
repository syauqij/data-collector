<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubmitForm extends Component
{
    public $form;
    
    public function mount()
    {
        $this->form;
    }

    public function submit($form)
    {
        
    }

    public function render()
    {
        return view('livewire.submit-form');
    }
}
