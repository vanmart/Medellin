@extends('layouts/pruebas')

<!-- USING SECTION WITH PAREN OR MAIN FUNCTIONS-->
@section('scripts')
  <script type="text/javascript">
            $('document').ready(function() {
            //utilizamos la clase para identificar el evento submit en el formulario
            var form = $('.call_ajax');
                console.log(form.html());
                console.log(form.attr('class'));

                form.bind('submit',function () {
                        $.ajax({
                                type: form.attr('method'),
                                url: form.attr('action'),
                                data: form.serialize(),
                                
                                beforeSend: function(){
                                    $('.before').append('<img src="assets/llamando.gif" />');
                                },
                                
                                complete: function(data){
                                    
                                    console.log(data);
                                    /*
                                    var calls = data.responseJSON; 
                                    console.log(calls);
                                    
                                    var my_calls = calls.my_calls;
                                    console.log(my_calls);

                                    var duraciondelacero = my_calls[0].duration;
                                    console.log(duraciondelacero);
                                    */
                                    var total_minutos=0;
                                    for (var i = 0; i < data.responseJSON.my_calls.length; i++) {

                                      var duracion_llamada = parseInt(data.responseJSON.my_calls[i].duration);
                                      total_minutos = total_minutos + duracion_llamada;
                                    };
                                    
                                    //console.log(total_minutos);
                                    //Obtengo el Id de la persona para modificar su label  de cantidad de minutos 
                                    var id = data.responseJSON.el_id;
                                    console.log(id);

                                    //deberia ser una funcion valor a pagar
                                    //obtenemos el valor del minuto que nos entrega el server una vez lo lee del archivo de configuracion
                                    var valor_minuto = data.responseJSON.precio_minuto;
                                    console.log(valor_minuto);

                                    var valor_a_pagar = total_minutos * valor_minuto;
                                    $("#"+id).text(total_minutos);
                                    $("#valor_a_pagar_"+id).text(valor_a_pagar);

                                },

                                success: function (data) {
                                    $('.before').hide();
                                    $('.errors_form').html('');
                                    $('.success_message').hide().html('');
                                    if(data.success == false){
                                        var errores = '';
                                        for(datos in data.errors){
                                            errores += '<small class="error">' + data.errors[datos] + '</small>';
                                        }
                                        $('.errors_form').html(errores);
                                    }else{

                                        $(form)[0].reset();//limpiamos el formulario
                                        $('.success_message').show().html(data.message);
                                    }
                                },
                                error: function(errors){
                                    $('.before').hide();
                                    $('.errors_form').html('');
                                    $('.errors_form').html(errors);
                                }
                            });

                   return false;
                });
                    //Evento clic en el boton de llamada 
                    $('#makecall').click(function() {
                    $('#curtain').toggle("slow");
                    $('');
                });

            }) //fin document ready
        </script>
@endsection

@section('navigation')
@endsection




@section('content')
<div><h3>Clients</h3></div>

  @if($persons)
  <div>
    <table>
       <tr>
          <th scope="col">Nombre cliente</th>
          <th scope="col">Apellido Cliente</th>
          <th scope="col">Numero Documento</th>
          <th scope="col">Numero de telefono</th>
          <th scope="col" >Cantidad de minutos</th>
          <th scope="col" >Valor a pagar</th>
      </tr>

      @foreach($persons as $person)
      <tr id="p_{{$person->id}}">
          <td>{{$person->names}}</td>
          <td>{{$person->las_name}}</td>
          <td>{{$person->document}}</td>
          <td>{{$person->telephone}}</td>
          <td ><label id="{{$person->id}}"></label></td><!-- la cantidad de minutos que ha de la persona ID -->
          <td ><label id="valor_a_pagar_{{$person->id}}"></label></td> <!-- El total a pagar de la persona ID -->
      </tr>
      @endforeach
    </table>
  </div>
  @endif
@endsection


@section('call')  
  {{ HTML::decode(Form::button('make a call!', array('class' => 'btn btn-lg btn-primary btn-block', 'id'=>'makecall'))) }}
  <a href="/person/create">new client</a>
  <div id="curtain" name="curtain" style="display: none;">

    <hr>
    <!-- call es la funcion ajax para el envio del registro de la llamada :P!!!! -->
    {{ Form::open(array('url'=>'call','id'=>'call_form', 'class' => 'call_ajax')) }}
      {{ Form::text('phone_number', null, array('id'=>'phone_number', 'placeholder'=>'your phone number pls!', 'required'=>'true', 'pattern'=>"^[0-9]+$")) }}
      {{ Form::text('duration', null, array('id'=>'duration', 'placeholder'=>'call time pls!', 'required'=>'true', 'pattern'=>"^[0-9]+$")) }}
      {{ Form::submit('caLL!', array('class' => 'btn btn-lg btn-primary btn', 'id'=>'call')) }}
      {{ Form::close() }}
      {{ HTML::link(URL::to('#'),'Ver llamadas realizadas', array('class' => 'button round expand success show_users')) }}   
  </div>

   <!--en este div mostramos el preloader-->
            <div style='margin: 10px 0px 0px 300px' class='before'></div>   
            <!--en este los errores del formulario--> 
            <div class='errors_form'></div>
            <!--en este el mensaje de registro correcto-->
            <div style='display: none' class='success_message alert-box success'></div>     
            </div>       
        </div>

        <div class='row'>
          <!--al pulsar en el botón debajo de éste mostraremos los usuarios registrados-->
           <div class='small-12 pull users expand round'>
                @if(Session::has('message'))    
                  {{ Session::get('message') }}
                @endif
              <!--div para mostrar un preloader mientras cargamos los usuarios-->
              <div style='margin: 10px 0px 0px 300px' class='preload_users'></div>
              <!--aquí se mostrarán los usuarios-->
              <div class='load_ajax'></div>
            </div>
        </div>

@endsection









