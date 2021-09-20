<?php

namespace App\Http\Livewire\Element;

use App\Models\Element;
use Livewire\Component;

class FilteredList extends Component
{
    public $elements = []; 

    public $paginator = [];

    public $page = 1;

    public $items_per_page = 5;

    public $loading_message = 'Cargando';

    public $listeners = [
        'load_list' => 'loadList',
    ];

    public $filter = [
        'search' => '',
        'status' => '',
        'order_field' => '',
        'order_type' => '',
    ];

    protected $updatesQueryString = ['page'];
    
    public function mount()
    {
        $this->loadList();
    }

    public function loadList()
    {
//        $this->elements = Element::paginate($this->items_per_page);

        $query = [];

        if ($this->filter["status"] !== '' && in_array($this->filter["status"], Element::validStatuses())) {
            $query["status"] = $this->filter["status"];
            $elements = Element::where($query);
        }

        $elements = Element::where($query);

        // Search
        if (!empty($this->filter["search"])) {
            $filter = $this->filter;
            $elements = $elements->where(function ($query) use ($filter) {
                $query->where('title', 'LIKE', '%' . $filter['search'] . '%')
                ->orWhere('description', 'LIKE', '%' . $filter['search'] . '%');
            });
        }

        // Ordering
        if (!empty($this->filter["order_field"])) {
            $order_type = isset($this->filter["order_type"]) && ($this->filter["order_type"] == 'DESC') ? 'DESC' : 'ASC';
            $elements = $elements->orderBy($this->filter["order_field"], $order_type);
        }

        // Paginating
        $elements = $elements->paginate($this->items_per_page);

        $this->paginator = $elements->toArray();
        $this->elements = $elements->items();
    }

    // Pagination Method
    public function applyPagination($action, $value, $options=[])
    {
        if ($action == "previous_page" && $this->page > 1) {
            $this->page -= 1;
        }

        if ($action == "next_page") {
            $this->page += 1;
        }

        if ($action == "page") {
            $this->page = $value;
        }

        $this->loadList();
    }

    public function render()
    {
        return view('livewire.element.filtered-list');
    }
}
