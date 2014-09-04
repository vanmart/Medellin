@extends('layouts/index')

<!-- USING SECTION WITH PAREN OR MAIN FUNCTIONS-->

@parent
<li><a href="/about">Abouts</a></li>
@endsection

<!-- Using section wothout main functions 
@section('navigation')
<li><a href="/about">About</a></li>
@endsection -->


@section('content')
<div><h1>Clientes</h1></div>

	@if($users)
	<div>
		<ul>
			@foreach($users as $user)
	 		<li>
	  		<h2>PICTURE</h2>
	  		<span class="glyphicon glyphicon-search"></span>
				ID: {{ $user->id }} - {{HTML::link('user/destroy/'.$user->id,'Delete')}}<br> 
				Name: {{ $user->name}}<Br>
				
				<img src="assets/{{$user->avatar }}" class="img-rounded" >
				
	 		</li>
			@endforeach
		</ul>
	</div>
	@endif	

 
	<!-- Example row of columns -->
	<div class="row">
	    <div class="span3">
	        &nbsp;
	    </div>
	    <div class="span3">
	        &nbsp;
	    </div>
	    <div class="span3">
	        &nbsp;
    </div>
</div>
@endsection