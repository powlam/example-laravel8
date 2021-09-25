@if($target && !empty($alert[$target]))
    @foreach ($alert[$target] as $type => $message)
        <div class="alert alert-{{ $type ?? 'danger' }} alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" wire:click="resetAlert('{{ $target }}', '{{ $type }}')" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>        
    @endforeach
@endif
