@extends('layouts/main')

<!-- USING SECTION WITH PAREN OR MAIN FUNCTIONS-->
@section('navigation')

<li><a href="/about">Demenes</a></li>
@endsection

<!-- Using section wothout main functions 
@section('navigation')
<li><a href="/about">About</a></li>
@endsection -->


@section('formulario')
	{{ Form::open(array('url' => 'users', 'files' => true)) }}

		@if(Session::has('message'))    
        {{ Session::get('message') }}
        @endif  
    
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array( 'required'=>'true', 'pattern'=>"^[a-zA-Z ]+$")) }}

		{{ Form::label('email', 'Email') }}
		{{ Form::text('email',null, array('placeholder'=>'example@mail.com', 'required'=> 'true', 'pattern'=> "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" )) }}<br>

		{{ Form::label('photo', 'Chosee your avatar pic.') }}
		{{ Form::file('file') }}

		{{ Form::label('nickname', 'Nickname') }}
		{{ Form::text('nickname', null, array( 'required'=>'true')) }}

		{{ Form::label('password') }}
		{{ Form::password('password', array( 'required'=>'true')) }}<br>

		{{ Form::submit('save') }} <a href="{{ URL::previous() }}">Go Back</a> {{ HTML::link('users','cancel') }}<br>
		
		<ul class="parsley-error-list">
                  @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                  @endforeach
                </ul>

	{{ Form::close() }} 

@endsection


