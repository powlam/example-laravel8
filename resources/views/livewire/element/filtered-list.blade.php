<div>
    <div wire:loading>
        {{ $loading_message }}
    </div>

    @include('livewire.element.filters')

    <table class="max-w-6xl mx-auto text-center table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
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
    @endif

    <button type="button" wire:click="downloadToCSV" class="btn btn-primary">@include('icons.download')</button>

</div>
