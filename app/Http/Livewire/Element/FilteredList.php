<?php

namespace App\Http\Livewire\Element;

use App\Models\Element;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class FilteredList extends Component
{
    use WithPagination;

    public $currentPage = 1;

    public $items_per_page = 5;

    public $filter = [];

    public $loading_message = 'Cargando';

    public function loadList()
    {
        $search = $this->filter['search'] ?? null;
        $status = $this->filter['status'] ?? null;

        $elements = Element
            ::when($search, function ($query, $search) {
                return $query->where('title', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%');
            })
            ->when($status, function ($query, $status) { // FIX $status=0
                return $query->where('status', $status);
            });

        if (!empty($this->filter["order_field"])) {
            $order_type = isset($this->filter["order_type"]) && ($this->filter["order_type"] == 'DESC') ? 'desc' : 'asc';
            $elements = $elements->orderBy($this->filter["order_field"], $order_type);
        }

        return $elements->paginate($this->items_per_page);
    }

    public function resetFilters()
    {
        $this->filter = [];
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];

        Paginator::currentPageResolver(function() {
            return $this->currentPage;
        });
    }

    public function render()
    {
        return view('livewire.element.filtered-list', [
            'elements' => $this->loadList()
        ]);
    }

}
