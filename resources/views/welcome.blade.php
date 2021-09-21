@extends('layouts.app')

@section('content')
<div class="uk-grid-collapse uk-flex-center uk-flex-middle" uk-grid style="flex-grow: 1">
    <div class="uk-width-1-1 uk-width-1-3@l">
        @livewire('shortlink-form')
        @livewire('shortlink-card')
    </div>
</div>
@endsection