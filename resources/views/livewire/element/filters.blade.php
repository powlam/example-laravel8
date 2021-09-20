<div class="filter-container">
    <h2>Filter</h2>
    <div class="row">
        <div class="col-md-3">
            <label for="">Buscar por nombre</label>
            <input type="text" class="form-control" wire:model.defer="filter.search"  >
        </div>

        <div class="col-md-2">
            <label for="">Estado</label>
            <select wire:model.defer="filter.status" class="form-control" >
                <option value="">...</option>
                @foreach (\App\Models\Element::validStatuses() as $v)
                    <option>{{ $v }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label for="">Ordenar por</label>
            <select wire:model.defer="filter.order_field" class="form-control" >
                <option value="">...</option>
                <option value="title">Título</option>
                <option value="description">Descripción</option>
                <option value="status">Estado</option>
            </select>
        </div>

        <div class="col-md-2">
            <label for="">Tipo de ordenación</label>
            <select wire:model.defer="filter.order_type" class="form-control" >
                <option value="">...</option>
                <option value="ASC">Ascendente</option>
                <option value="DESC">Descendente</option>
            </select>
        </div>

        <div class="col-md-2" style="display: flex;align-items: flex-end;" >
            <div>
                <button type="button" wire:click="$refresh" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </div>
</div>
