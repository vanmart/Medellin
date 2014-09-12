@extends('layouts/pruebas')

<!-- USING SECTION WITH PAREN OR MAIN FUNCTIONS-->
@section('navigation')

@endsection

<!-- Using section wothout main functions 
@section('navigation')
<li><a href="/about">About</a></li>
@endsection -->


@section('formulario')
	{{ Form::open(array('url' => 'person', 'files' => true)) }}

		@if(Session::has('message'))    
        {{ Session::get('message') }}
        @endif  
    
		{{ Form::label('names', 'Names') }}
		{{ Form::text('names', null, array( 'required'=>'true', 'pattern'=>"^[a-zA-Z ]+$")) }}

		{{ Form::label('last_name', 'Last Name') }}
		{{ Form::text('last_name',null,array( )) }}

		{{ Form::label('document', 'Document') }}
		{{ Form::text('document', null, array('required'=>'true')) }}

		{{ Form::label('telephone','Telephone') }}
		{{ Form::text('telephone', null, array( 'required'=>'true')) }}<br>

		{{ Form::submit('save') }} 

		<ul class="parsley-error-list">
                  @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                  @endforeach
                </ul>

	{{ Form::close() }} 

@endsection