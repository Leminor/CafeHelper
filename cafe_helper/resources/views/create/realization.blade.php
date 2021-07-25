

@extends('layouts.main')

@section('content')
    {{ Form::open(array('url' => 'create/realization', 'method' => 'get', 'enctype' => 'multipart/form-data')) }}
    <livewire:test-add />


{{--    <div class="container">--}}
{{--        <label>Chose client</label>--}}
{{--        <livewire:clients-search-bar />--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--        <label>Chose product</label>--}}
{{--        <livewire:product-search-bar />--}}
{{--    </div>--}}


        {{ Form::submit('Create order', ['class' => 'btn btn-success']) }}


    {{ Form::close() }}

@stop
