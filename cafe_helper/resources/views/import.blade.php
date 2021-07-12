@extends('layouts.main')

@section('content')
    {{ Form::open(array('url' => 'import/excel', 'method' => 'post', 'enctype' => 'multipart/form-data')) }}

    <div class="container">

        {{ Form::file('file', ['class' => 'mt-3']) }}
        {{ Form::select('table', ['products' => 'products',
                                  'production' => 'production',
                                  'clients' => 'clients',
                                  'suppliers' => 'suppliers',
                                  'menu' => 'menu'])}}
        {{ Form::submit('Import from Excel', ['class' => 'btn btn-success']) }}

    </div>

    {{ Form::close() }}

@stop
