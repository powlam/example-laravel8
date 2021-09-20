<?php

namespace App\Http\Livewire\Element;

use Livewire\Component;

class FilteredList extends Component
{
    public $elements;
    
    public function render()
    {
        return view('livewire.element.filtered-list');
    }
}
