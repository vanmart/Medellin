@extends('layouts/pruebas')

@section('scripts')
<!-- USING SECTION WITH PAREN OR MAIN FUNCTIONS-->
<script type="text/javascript">
            $('document').ready(function() { 
                
                $( "#sumar" ).click(function() {
                    var numero1 = $("#numero1").val(),
                        numero2 = $("#numero2").val();
                        //vERIFICABA VALORES POR CONSOLA 
                        //console.log("numero 1");
                        //console.log(numero1);
                        //console.log("numero 2");
                        //console.log(numero2);
                    if( (isNaN(numero1) || numero1==='') || (isNaN(numero2) || numero2==='' )  ){
                        alert("Digite 2 numeros.");
                        }
                    else {
                        //pasanado a entero los valores para poderlos sumar sino concatena
                        numero1 = parseInt($("#numero1").val());
                        numero2 = parseInt($("#numero2").val());
                        sumar(numero1, numero2);
                        //alert("ya sumamos con la nueva");
                    }
                     if (isNaN(numero1) || numero1==='' ) {
                                alert("El primer campo no es un numero o esta vacio.");
                                
                            }
                    if (isNaN(numero2) || numero2==='' ) {
                                alert("Te falta llenar el segundo campo o NO es un numero");
                                return false;
                           }
                    });   

                    

                          

            });

            function sumar(n1, n2){
                //alert("El numero 1 es " + n1 );
                //alert("El numero 2 es " + n2 );
                var resultado = n1 + n2;
                alert("listo!");
                $("#resultado").text(resultado + "  RESULTADO!");
            }
        </script>
@endsection

@section('navigation')

<li><a href="/about">Demenes</a></li>
@endsection

<!-- Using section wothout main functions 
@section('navigation')
<li><a href="/about">About</a></li>
@endsection -->
<h3 class="text-center login-title">Entra los numeros...</h3>
@section('formulario')
	{{ Form::open(array('class'=>'form-signin','class'=>'col-lg-1 col-offset-6 centered' , 'name'=>'my_form')) }}

		{{ Form::label('campo1', 'Campo1') }}<!-- utilizando html para validar los campos del formulario -->
		{{ Form::text('numero1', null, array('id'=>'numero1', 'placeholder'=>'Solo numeros', 'required'=>'true', 'pattern'=>"^[0-9]+$")) }}

		{{ Form::label('campo2', 'Campo2') }}
		{{ Form::text('numero2', null, array('id'=>'numero2','placeholder'=>'Solo numeros', 'required'=>'true', 'pattern'=>"^[0-9]+$")) }}

		{{ Form::label('resultado', '0.0', array('id' => 'resultado','class'=>'alert alert-danger' )) }}

		{{ HTML::decode(Form::button('sumar', array('class' => 'btn btn-lg btn-primary btn-block', 'value' => 'sumar', 'id'=>'sumar'))) }}
		
	{{ Form::close() }} 
		<!--<input type="button" id="sumar" value="sumar" class="btn btn-lg btn-primary btn-block" onclick="sumar()"> -->
	<ol>
  			<li><a href="http://www.google.com" class="text-center new-account" >Google</a></li>
  			<li><a href="http://www.youtube.com" class="text-center new-account" >Youtube</a></li>
  			<li><a href="http://www.yahoo.com" class="text-center new-account" >Yahoo</a></li>
  			<li><a href="http://www.wikipedia.com" class="text-center new-account" >Wikipedia</a></li>
	</ol>	
@endsection