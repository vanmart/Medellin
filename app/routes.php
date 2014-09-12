<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/  


Route::resource('users', 'UsersController');
Route::resource('person', 'PeopleController');
Route::resource('calls', 'CallsController');


Route::get('/', function(){
	return View::make('layouts/index');
});


Route::get('/pruebaconsola', function(){
	return View::make('pruebas/pruebaConsola');
});
	
Route::get('/ejercicio1', function(){
	return View::make('pruebas/ejercicio1');
});

Route::get('/ejercicio2', function(){
    $persons = Person::all();
	return View::make('pruebas/ejercicio2')->with('persons',$persons);
});

Route::get('/ejercicio3', function(){
    $persons = Person::all();
    return View::make('pruebas/ejercicio3')->with('persons',$persons);
});

Route::get('/ejercicio4', function(){
    //UTILIZANDO ELOQUENT
    //obetener la lista de los datos de donde se seleccionara uno aleatoreamente
    
    $datos = Data::all();
    $numero = rand(1,4);
    $seleccionado = Data::where('id', $numero)->get();
    
    $dato_seleccionado = $seleccionado[0]->datos;
    
    //ejecutamos explode para dividir cadena por ; y guardarlo en un array porciones
    $porciones = explode(";", $dato_seleccionado);
    //echo''.$porciones[0];
    // UNA CONEXION PARA EL INSERT 
    $link=mysqli_connect("localhost","vanmartc","s4mur41","dev_medellin");
        // Check connection
        if (mysqli_connect_errno()) {
            //echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        //recorro las porciones
        for($i = 0; $i < sizeof($porciones);$i++)  
            {
                //echo'<br> en porcion <br>'.$porciones[$i];
                //A cada porcion la divido con el separador ,
                $contenidoColumna= (explode(",", $porciones[$i]));

                if (! $query = mysqli_query($link,"INSERT INTO data_news (column_a, column_b, column_c)  
                                                            VALUES ('".$contenidoColumna[0]."', '".$contenidoColumna[1]."', '".$contenidoColumna[2]."' )")){

                     echo "Falló la preparación: (" . $link->errno . ") " . $link->error;
                    }

                /*
                    DB::table('data_news')->insert(('column_a' => $contenidoColumna[0], 'column_b' => $contenidoColumna[1], 'column_c' => $contenidoColumna[2])
                        
                    );                   
                */      
            }

    $data_news = Datanew::all();

            
    mysqli_close($link);  
    return View::make('pruebas/ejercicio4')->with('datos',$datos)
                                        ->with('numero',$numero)
                                        ->with('seleccionado',$seleccionado)
                                        ->with('porciones', $porciones)
                                        ->with('contenidoColumna', $contenidoColumna)
                                        ->with('data_news',$data_news);
});

Route::get('/ejercicio5', function(){
    return View::make('pruebas/ejercicio5');
});

Route::get('/ensayo', function(){   
    $link=mysqli_connect("localhost","vanmartc","s4mur41","dev_medellin");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($link,"SELECT * FROM Data");
        echo "<table border='1'>
                <tr>
                    <th>id</th>
                    <th>datos</th>
                </tr>";
        while($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['datos'] . "</td>";
              echo "</tr>";
                }
        echo "</table>";

        $numero = rand(1,4);

        echo "el numero: ".$numero;
        //Obtenemos el string del dato seleccionado por el numero aleatorio
        $seleccionado = mysqli_query($link,"SELECT * FROM Data WHERE id=$numero");
        echo "<table border='1'>
                <tr>
                    <th>id</th>
                    <th>datos</th>
                </tr>";
        //toca recorrer y obtener el dato
        while($row = mysqli_fetch_array($seleccionado)) {
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['datos'] . "</td>";
              echo "</tr>";
              $dato_seleccionado = $row['datos'];
                }
        //ejecutamos explode para dividir cadena por ; y guardarlo en un array porciones
        $porciones = explode(";", $dato_seleccionado);

        //recorro las porciones
        for($i = 0; $i < sizeof($porciones);$i++)  
            {
                echo'<br> en porcion <br>'.$porciones[$i];
                //A cada porcion la divido con el separador ,
                $contenidoColumna= (explode(",", $porciones[$i]));

                for ($j=0; $j < sizeof($contenidoColumna) ; $j++) {

                    echo '<br>----*---- contenido columna <br>'.$contenidoColumna[$j];

                }
             
               if (! $query = mysqli_query($link,"INSERT INTO data_news (column_a, column_b, column_c)  
                VALUES ('".$contenidoColumna[0]."', '".$contenidoColumna[1]."', '".$contenidoColumna[2]."' )")){

                     echo "Falló la preparación: (" . $link->errno . ") " . $link->error;
               }

                echo'<br>pase<br>';
            }
mysqli_close($link);  
//return View::make('pruebas/ensayox')->with('datos',$row[0])->with('numero',$numero);
});

Route::post('/call',function(){
    //basado en tutorial uno de piedra 
     //validamos el formulario
    //breamos el array callData para almacenamos los datos que enviaron desde el formulario y recivimos en Input formulario
        $callData = array(
            'phone_number'    =>    Input::get('phone_number'),
            'duration'       =>    Input::get('duration')
           );
        $rules = array(
            'phone_number'         => 'required|min:7',
            'duration'         => 'required|min:1'
        );
        $messages = array(
            'required'        => 'El :attribute es obligatorio.',
            'min'             => 'El campo :attribute no puede tener menos de :min carácteres.',
            'max'             => 'El campo :attribute no puede tener más de :max carácteres.',
            'unique'         => 'El email ingresado ya está registrado en la base de datos.',
            'confirmed'     => 'Los passwords no coinciden.'
        );

        //Se valida
        $validation = Validator::make(Input::all(), $rules, $messages);
         //si la validación falla redirigimos al formulario de registro con los errores   
        if ($validation->fails())
        {
            //como ha fallado el formulario, devolvemos los datos en formato json
            //esta es la forma de hacerlo en laravel, o una de ellas
            return Response::json(array(
                'success' => false,
                'errors' => $validation->getMessageBag()->toArray()
            ));
        }
        //si todo va bn podemos insertar ala base de datos
        else         
        {
            
            $persona = Person::where('telephone', $callData['phone_number'])->get();
            //obtenemos el ID de la persona que tenga ese numero de telegono 
            $id = $persona[0] -> id;

            //creamos una instancia de una llamada para llenarla con los datos del formulario que guardamos en $callData
            $call = new Call($callData);
            $call->idPerson = $id;
            //guardamos el registro en la base de datos
            $call->save();

            //OBTENIENDO TODAS LAS LLAMADAS QUE HA REALIZADO
            $calls = Person::find($id)->calls;

            $configuracion = include('../app/assets/archivosConfiguracion/valor_minuto.php');
            $precio_minuto = intval($configuracion['celular']);

            //CLASIFICACION DE LLAMADAS DESDE ARCHIVO
            // json_encode();
            $rangos = $configuracionRangos = include('../app/assets/archivosConfiguracion/valor_por_rango.php'); 
            $descuentos = $configuracionDescuentos = include('../app/assets/archivosConfiguracion/descuento_por_rango.php'); 

            if($call)
            {
                return Response::json(array(
                    'success'           => true,
                    'message'           => 'Llamada exitosa',
                    //'phone_number'    => $numero,
                    //'persons'         => $persons,
                    'persona'           => $persona,
                    'el_id'             => $id,
                    'la llamada'        => $call,
                    'precio_minuto'     => $precio_minuto,
                    'my_calls'          => $calls,
                    'valorPorRango'     => $rangos,
                    'descuentos'        => $descuentos
                    //'resultado'         => $resultado 
                    
                ));
            }
            
        }
});

Route::post('/uploadajax',function(){

        //validamos que sea una peticion ajax
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
             //obtenemos el archivo a subir
            $file = $_FILES['file']['name'];

            //comprobamos si existe un directorio para subir el archivo
            //si no es así, lo creamos.
            if(!is_dir("../app/assets/archivosConfiguracion/")) 
            mkdir("../app/assets/archivosConfiguracion/", 0777);

            //comprobamos si el archivo ha subido
            if ($file && move_uploaded_file($_FILES['file']['tmp_name'],"../app/assets/archivosConfiguracion/".$file)) {
                sleep(3);//retrasamos la petición 3 segundos
                echo $file;//devolvemos el nombre del archivo para pintar la imagen
                echo(" Se guardo correctamente en la carpeta archivosConfiguracion");
            
            
            
               
            }
            else{
                throw new Exception("Error Processing Request", 1);
                
            }
        }       
     
});

Route::get('/archivoconfiguracion', function()
{
    return View::make('pruebas/subirArchivo');
});

Route::post('/archivoconfiguracion',function(){

    $uploadedFile = Input::file('file2');
    $mimeType = $uploadedFile->getMimeType();
    echo $mimeType;

    $rules = array(
            'file2' => 'required',
        );
    $messages = array(
            'required' => 'no anexo :attribute o no es tipo de archivo valido ',
            'mimes'    => 'Solo archivos con extension .csv o .php son'
        );

    $validation = Validator::make(Input::all(),$rules,$messages);
        
    if($validation->fails()){
        //como ha fallado el formulario, devolvemos los datos en formato json
        //esta es la forma de hacerlo en laravel, o una de ellas
        return Response::json(array(
            'success' => false,
            'errors' => $validation->getMessageBag()->toArray()
        ));
    }

    else{
        $destinationPath = '../app/assets/archivos_de_configuracion/';
        //obtenemos el nombre del archivo
        $file_name = $uploadedFile->getClientOriginalName();
        //subimos el archivo y lo movemos al servidor
        $upload = $uploadedFile->move($destinationPath,$file_name);
        return Redirect::to('pruebaejercicio2')->with('message', 'se ha subido correctamente el archivo de configuracion...');
    }
});

//importar precio de minutos
Route::get('csv',function(){
    //abrimos el archivo y vamos almacenando lo leido en $data
    if (($handle = fopen('C:\xampp\htdocs\Medellin\app\assets\archivosConfiguracion\valor_minuto.csv','r')) !== FALSE) {
        //recorremos el archivo y almacenamos aca registro linea
        while(($data = fgetcsv($handle, 1000, ',')) !== FALSE){
            $valor_minuto = new Valor_minuto();
            $valor_minuto->minuto = $data[0];
            $valor_minuto->valor = $data[1];
            $valor_minuto->save();
        }
        fclose($handle);
        return Valor_minuto::all(); 
    }

    return "de malas";
    
});




//Route::get('user/{id}', 'UserController@showProfile');

