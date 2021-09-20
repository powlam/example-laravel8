@extends('layouts.main')

@section('local_styles')
    @livewireStyles
@endsection

@section('local_scripts')
    @livewireScripts
@endsection

@section('main')
    @livewire('element.filtered-list', ['elements' => $elements])
@endsection
