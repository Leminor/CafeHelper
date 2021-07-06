@extends('layouts.guest')
@section('content')
    {{ Form::open(array('url' => 'login', 'method' => 'post')) }}

        <div class="container">
            <h1 class="h3 mb-3 mt-4 fw-normal">Sign in</h1>

            {{ Form::label('email', null, ['class' => 'visually-hidden'] ) }}
            {{ Form::email('email', null, ['class' => 'form-control mt-3', 'id' => 'InputEmail', 'placeholder'=> 'Email' ]) }}

            {{ Form::label('password', null, ['class' => 'visually-hidden'] ) }}
            {{ Form::password('password', ['class' => 'form-control mt-3', 'id' => 'InputPassword', 'placeholder'=> 'Password' ]) }}

            {{ Form::submit('Sign In', ['class' => 'w-100 btn btn-primary mt-3']) }}

        </div>

    {{ Form::close() }}

@stop
