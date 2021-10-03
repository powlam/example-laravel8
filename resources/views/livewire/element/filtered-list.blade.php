<div>
    <div wire:loading>
        {{ $loading_message }}
    </div>

    @include('livewire.element.filters')

    <table class="max-w-6xl mx-auto text-center table table-sm table-info table-hover table-bordered border-info">
        <caption>Tabla de elementos</caption>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($elements as $element)
                <tr>
                    <th scope="row">{{ $element->id }}</td>
                    <td>{{ $element->title }}</td>
                    <td>{{ $element->description }}</td>
                    <td>{{ $element->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay elementos</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($elements and $elements->count() > 0)
        {{ $elements->links() }}

        <div class="col-md-4">
            <button type="button" wire:click="downloadToCSV" wire:loading.attr="disabled" wire:target='downloadToCSV' class="btn btn-primary col-6 d-flex gap-2 align-items-center">
                <span>CSV</span>
                @include('icons.download')
                <span class="badge bg-warning ms-auto" title="{{ $elements->total() }} elementos">{{ $elements->total() }}</span>
            </button>
            <span wire:loading.delay wire:target="downloadToCSV" class="text-sm">Descargando...</span>
            @include('livewire.element.alert', ['target' => 'downloadToCSV'])
        </div>
    @endif

</div>
