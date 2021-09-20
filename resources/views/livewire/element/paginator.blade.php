<div class="pagination-container">
    <ul class="pagination">
        <li class="page-item 
                @if($page == 1)
                    disabled
                @endif
            ">
            <a class="page-link" href="javascript:void(0)" wire:click="applyPagination('previous_page', {{ $page-1 }})" >
                Previous
            </a>
        </li>

        <li class="page-item
                @if($page == $paginator['last_page']) 
                    disabled
                @endif
        
            ">
            <a class="page-link" href="javascript:void(0)" 
                @if($page <= $paginator['last_page']) 
                    wire:click="applyPagination('next_page', {{ $page+1 }})"
                @endif    
            >
            Next
            </a>
        </li>

        <li class="page-item"  style="margin: 0 5px" >
            Jump to Page
        </li>

        <li class="page-item"  style="margin: 0 5px" >
            <select class="form-control" title="" style="width: 80px" wire:model="page" >
                @for($i=1;$i<=$paginator['last_page'];$i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </li>

        <li class="page-item"  style="margin: 0 5px" >
            Items Per Page
        </li>

        <li class="page-item"  style="margin: 0 5px" >
            <select class="form-control" title="" style="width: 80px" wire:model="items_per_page" wire:change="loadList" >
                <option value="5">05</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
        </li>
    </ul>
</div>
