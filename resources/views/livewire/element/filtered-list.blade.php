<div>
    <div wire:loading wire:init="loadList">
        {{ $loading_message }}
    </div>
        
    <table class="max-w-6xl mx-auto text-center">
        <thead class="bg-white">
            <tr>
                <th class="border-t">ID</th>
                <th class="border-t">Title</th>
                <th class="border-t">Description</th>
                <th class="border-t">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($elements as $element)
                <tr>
                    <td class="border-t">{{ $element->id }}</td>
                    <td class="border-t">{{ $element->title }}</td>
                    <td class="border-t">{{ $element->description }}</td>
                    <td class="border-t">{{ $element->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border-t">No hay elementos</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $elements->links() }}
</div>
