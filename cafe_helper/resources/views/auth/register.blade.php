@extends('layouts.guest')
@section('content')
    {{ Form::open(array('url' => 'register', 'method' => 'post')) }}

        <div class="container">
            <h1 class="h3 mb-3 mt-4 fw-normal">Sign up</h1>

            {{ Form::label('name', null, ['class' => 'visually-hidden'] ) }}
            {{ Form::text('name', null, ['class' => 'form-control mt-3', 'id' => 'InputName', 'placeholder'=> 'Name' ]) }}

            {{ Form::label('email', null, ['class' => 'visually-hidden'] ) }}
            {{ Form::email('email', null, ['class' => 'form-control mt-3', 'id' => 'InputEmail', 'placeholder'=> 'Email' ]) }}

            {{ Form::label('password', null, ['class' => 'visually-hidden'] ) }}
            {{ Form::password('password', ['class' => 'form-control mt-3', 'id' => 'InputPassword', 'placeholder'=> 'Password' ]) }}

            {{ Form::label('repeatPassword', null, ['class' => 'visually-hidden'] ) }}
            {{ Form::password('repeatPassword', ['class' => 'form-control mt-3', 'id' => 'InputRepeatPassword', 'placeholder'=> 'Repeat Password' ]) }}

            {{ Form::submit('Sign Up', ['class' => 'w-100 btn btn-primary mt-3']) }}

        </div>

    {{ Form::close() }}

    <div class="container">
        <p class="h6 mb-3 mt-4 fw-normal"> or  <a href="/login">Log in</a></p>
    </div>

@stop
