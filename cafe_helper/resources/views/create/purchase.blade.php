

@extends('layouts.main')

@section('content')
    {{ Form::open(array('url' => 'create/purchase', 'method' => 'get', 'enctype' => 'multipart/form-data')) }}
    <livewire:new-purchase />
    {{ Form::close() }}
@stop
