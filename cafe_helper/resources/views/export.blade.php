@extends('layouts.main')

@section('content')
    {{ Form::open(array('url' => 'export/excel', 'method' => 'post', 'enctype' => 'multipart/form-data')) }}

    <div class="container">

        {{ Form::select('table', ['products' => 'products',
                                  'production' => 'production',
                                  'clients' => 'clients',
                                  'suppliers' => 'suppliers',
                                  'menu' => 'menu'])}}
        {{ Form::submit('Export to Excel', ['class' => 'btn btn-success']) }}

    </div>

    {{ Form::close() }}

@stop
