<?php

class UsersController extends \BaseController {

	public $restful = true;
	protected $user;
	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		//pasamos los usuarios a la vista en users   se puede hacer de 3 maneras
		//las 2 siguientes o la ultima (Utilizada en este caso)
    //return View::make('users/index')->withUsers($users);
    //return View::make('users/index',['users' => $users]);
    return View::make('users/index')->with('users',$users);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		 //creamos un objeto ser utilizar en la vista
		$user = new User;
		 return View::make('users/create')->with('user',$user);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */

	public function store()
	{
		//tomamos los datos que la el formulario mando en INPUT (POST) y lo guardamos en $data
		//$data = Input::all();
		$rules = array (
                'name' => 'required|min:3|max:50',
                'avatar' => 'image',
                'email' => 'required|email|max:150',
                'nickname'=>'required|min:3|max:50',
                'password' => 'required|min:8',
                //añadir la validacion mime:jpg.bmp,   etc para el archivo de la  foto 
            );
		$messages = array(
            'required'  => ':attribute can not be empty.',
            'min'       => ':attribute must be at least :min characters.',
            'max'       => ':attribute can not contain more that :max characters.',
            'email'     => 'your email address must be valid "examplo@mail.com"',
            'image'     => 'image files only (jpg,png,jpeg)',
        );
		//Validate data
		$validation  = Validator::make (Input::all(), $rules, $messages);
		//If everything is correct than run passes.
    if ($validation->fails()){
    	return Redirect::to('users/create')->withErrors($validation)->withInput();
    }
    	$user = new User;
    	//limpiaremos los datos con e()
		$user->name = e(Input::get('name'));
		$user->email = e(Input::get('email'));
		$user->nickname = e(Input::get('nickname'));
		$user->password = Hash::make(e(Input::get('password')));
	    $file = Input::file('file');
		if($file != null){
		  	//donde deseamos guardar la imagen $destinoPath
		  	$destinationPath = '../app/assets/images/';
		  	//obtenemos el nombre de la imagen
			$file_name = $file->getClientOriginalName();
			//subimos la imagen y la movemos al servidor
			//$upload = $file->move($destinationPath,$file_name);
			$user->avatar = $file_name;
			//Intervension de la imagen para redimiencionar - obteniendo la ruta real - y guardando en el server
		   	Image::make($file->getRealPath())->resize('116','116') ->save ($destinationPath.$file_name);
		}
		else{
		 	//$default_pic_route = "public_path().'/assests/images/default_user.png'";
		     $user->avatar = "default_user.png";
		}
		$user->save();
		$data = Input::all();
		$contenido =  array("mensaje"  => "Gracias por registrarte en Medellin", 
							"envia" => "MedellinApp"
							);
	    Mail::send('emails.registrationMail', $data, function($message) use ($contenido,$data){
	           		//email 'From' field: Get users email add and name
					$message->from('vanmartcgamer@gmail.com' , 'Medellin.wd');
					//email 'To' field: cahnge this to emails that you want to be notified. 
					$message->to('vanmartcgamer@gmail.com', 'my name')->cc('vanmartcgamer@gmail.com')->subject(' successful registration! on MedellinApp. VanMartc say HI!');

	            });
        return Redirect::to('users')->with('message', 'Correo recibido .. Gracias por Contactarnos!');
	}




	
	
	

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);

		return View::make('users.show', array('user' => $user));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}