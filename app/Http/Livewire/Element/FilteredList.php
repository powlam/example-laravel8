<?php

namespace App\Http\Livewire\Element;

use App\Models\Element;
use Livewire\Component;
use Livewire\WithPagination;

class FilteredList extends Component
{
    use WithPagination;

    public $loading_message = 'Cargando';

    public function loadList()
    {
        return Element::paginate(4);
    }

    public function render()
    {
        return view('livewire.element.filtered-list', [
            'elements' => $this->loadList(),
        ]);
    }
}
