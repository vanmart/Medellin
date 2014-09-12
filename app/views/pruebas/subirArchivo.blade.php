@extends('layouts/pruebas')
@section('scripts')
	<script type="text/javascript">
        $(document).ready(function(){

            $('#continuar').hide();
            $('#import_to_DB').hide();

            //$("#mensaje").hide();
            //queremos que esta variable sea global
            var fileExtension = "";

            //función que observa los cambios del campo file y obtiene información
            //$(':file').change(function(){  :file mira los elementos de la pagina que sean de ese tipo por eso si tienes mas de 1 es mejor identificar por id  
            $('#configurationFile').change(function(){
                //limpiamos el formulario   
                //obtenemos un array con los datos del archivo
                var file = $("#configurationFile")[0].files[0];
                //obtenemos el nombre del archivo
                var fileName = file.name;
                //obtenemos la extensión del archivo   //la ponemos sin var para que quede global
                fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
                alert(fileExtension);
                //obtenemos el tamaño del archivo
                var fileSize = file.size;
                //obtenemos el tipo de archivo image/png ejemplo
                var fileType = file.type;
                //mensaje con la información del archivo
                if(isConfigurationFile(fileExtension)){
                    $("#mensaje").removeClass( "alert alert-danger" ).removeClass( "alert alert-info" );
                    showMessage("<strong>Atencion!</strong> <span class='info'> Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
                }
                else {
                    $("#mensaje").removeClass( "alert alert-info" ).addClass( "alert alert-danger" );
                    showMessage("<strong>Error!</strong> <span class='info'> "+fileName+", No es un archivo valido .php o .cvs</span>"); 
                }
            });
                
            $('#import_to_DB').click(function() {
                    $('#import_curtain').toggle("slow");
                    $('');

                });
            $('#file2').change(function(){
                console.log();
                var div = $('#file2');
                //console.log(div.html());

                var file2 = $("#file2")[0].files[0];
                console.log(file2);
                var file2Name = file2.name;
                console.log(file2.name);
                file2Extension = file2Name.substring(file2Name.lastIndexOf('.') + 1);
                alert(file2Extension);
                var file2Size = file2.size;
                var file2Type = file2.type;
                if(isConfigurationFile(file2Extension)){
                    $("#mensaje2").removeClass( "alert alert-danger" ).removeClass( "alert alert-info" ).addClass( "alert alert-warning" );
                    showMessage2("<strong>Atencion!</strong> <span class='info'> Archivo para subir: "+file2Name+", peso total: "+file2Size+" bytes.</span>");
                }
                else {
                    $("#mensaje2").removeClass( "alert alert-info" ).addClass( "alert alert-danger" );
                    showMessage2("<strong>Error!</strong> <span class='info'> "+file2Name+", No es un archivo valido .php o .cvs</span>"); 
                }
                
            });
            
            //Mejor identificar por id por si se tienen varios botones
            $('#subirConAjax').click(function(){
                //el constructor FormData() a traves del metodo .append crea key/value por cada elemento del formulario de subida de archivos identificado id upload_ajax 
                var formData = new FormData($(".upload_ajax")[0]);
                var message= "";

                
                //hacemos la petición ajax  
                $.ajax({
                    url: '/uploadajax',  
                    type: 'POST',
                    // Form data
                    //datos del formulario
                    data: formData,

                    //necesario para subir archivos via ajax
                    cache: false,
                    contentType: false,
                    processData: false,
                    //mientras enviamos el archivo
                    beforeSend: function(){
                        
                        message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                        if(!isConfigurationFile){ 
                            return false;
                        }
                        showMessage(message);          
                     },
                    //una vez finalizado correctamente
                    success: function(data){
                        
                        message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                        showMessage(message);    
                        $("#mensaje").text("SUBIDO CORRECTAMENTE.").addClass( "alert alert-success" );
                        $('#file').hide();
                        $('#configurationFile').hide();
                        $('#continuar').show();
                        
                        if(isConfigurationFile(fileExtension)){
                            $(".showImage").html("<img src='files/"+data+"' />");
                        }

                        if (fileExtension == 'csv') {
                            $('#import_message').show();
                            $('#import_to_DB').show();
                        };
                    },
                     //si ha ocurrido un error
                    error: function(){
                        
                        message = $("<span class='error'>Ha ocurrido un error. Verifique su archivo</span>");
                        showMessage(message); 
                    }
                });
                return false;
            });
            //Hacemos una peticion Get el cual solo nos dira si el importa a la base de datos fue exitoso
            $('#si').click(function(){
                $.get("csv", function(data){
                    alert("Data: " + data);
                    $("#mensaje").text("IMPORTADO CORRECTAMENTE.").addClass( "alert alert-success" );
                    $('#import_message').hide();
                    $('#import_curtain').hide();
                    $('#import_to_DB').hide();
                });


            });



        //como la utilizamos demasiadas veces, creamos una función para 
        //evitar repetición de código
        function showMessage(message){
            $("#mensaje").html("").show().removeClass( "alert alert-info" ).addClass( "alert alert-warning" );
            //$(".messages").html(message);
            $("#mensaje").html(message);
        }

        function showMessage2(message2){
            //$("#mensaje2").html("").show().removeClass( "alert alert-info" ).addClass( "alert alert-warning" );
            //$(".messages").html(message);
            $("#mensaje2").html(message2);
        }
        
        //comprobamos si el archivo es un archivo de configuracion php csv (png  jpg de ejemplos)
        //para visualizarla una vez haya subido
        function isConfigurationFile(extension){
            switch(extension.toLowerCase()){
                case 'php':
                case 'csv':
                case 'png':
                case 'jpeg':
                        return true;
                break;
                default:
                        return false;
                break;
            }
        }

    });
            
        </script>
        
@endsection

@section('formulario')

<h3>Archivo de configuracion para el precio de los minutos</h3>

<!-- LINEAS PARA UTILIZAR SUBIA DE ARCHIVO POR AJAX  (/uploadajax) -->
{{ Form::open(array('files' => true, 'class' => 'upload_ajax' )) }}  
    {{ Form::file('file',array('required'=>'true' , 'class' => 'btn btn-link' , 'id'=>'configurationFile' )) }}
     <!--div para visualizar mensajes-->
    <div class="messages"></div>
    {{ Form::label('file', ' Selecciona el archivo de configuracion que deseas usar.', array('id' => 'mensaje', 'class' => 'alert alert-info'  ))  }}
    {{ HTML::decode(Form::button('Subir Archivo con Ajax', array('class' => 'btn btn-lg btn-primary btn-block', 'id'=>'subirConAjax'))) }}
    <!--{{ Form::submit('upload', array('class' => 'btn btn-primary')) }} <a href="{{ URL::previous() }}">Go Back</a> {{ HTML::link('person','cancel') }} -->
    <hr>
    
{{	Form::close()}}

<!-- SUBIA DE ARCHIVO SIN AJAX (/archivoconfiguracion) -->
{{ Form::open(array('url' => 'archivoconfiguracion', 'files' => true )) }} 
    {{ Form::file('file2',array('required'=>'true' , 'class' => 'btn btn-link' , 'id'=>'file2' )) }}
     <!--div para visualizar mensajes-->
    <div class="messages"></div>
    {{ Form::label('file2', ' Selecciona el archivo de configuracion que deseas usar.', array('id' => 'mensaje2', 'class' => 'alert alert-info'  ))  }}
    {{ Form::submit('Subir archivo sin AJAX', array('class' => 'btn btn-lg btn-primary btn-block', 'id'=>'subirSinAjax' )) }} <a href="{{ URL::previous() }}">Go Back</a> {{ HTML::link('person','cancel') }}
    <hr>
    
{{  Form::close()}}




@if(Session::has('message'))    
    {{ Session::get('message') }}
@endif 

@endsection

@section('import')
    
        <p id="import_message" style="display: none;"> Su archivo de configuracion es .csv <strong>Desea importarlo a la base de datos.</strong></p>
        {{ HTML::decode(Form::button('Import to DB', array('class' => 'btn btn-lg btn-primary btn-block', 'id'=>'import_to_DB'))) }}
        <div id="import_curtain" name="import_curtain" style="display: none;">
            <p id="import_message2"> Este archivo  .csv modificara la estructura de la base de datos. <strong>Esta Seguro?</strong></p>
            <hr>
            <p id="no"   class="text-center" ><a href="/person" class="btn btn-info">No</a>{{ HTML::decode(Form::button('Si', array('class' => 'btn btn-danger', 'id'=>'si'))) }}</p>
        </div>    
    
    <hr>
@endsection

@section('continue')
    <p id="continuar"   class="text-center" style="display: none;"><a href="/person" class="btn btn-lg btn-primary btn-block">Continuar. &raquo;</a>
    <hr>
@endsection