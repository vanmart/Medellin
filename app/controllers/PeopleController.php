<?php

class PeopleController extends \BaseController {

	protected $person;
	/**
   	* Inject the User Repository
   	*/
  	public function __construct(User $person)
  	{
    	$this->person = $person;
  	}
	/**
	 * Display a listing of the resource.
	 * GET /person
	 *
	 * @return Response
	 */
	public function index()
	{
		$persons = Person::all();

		foreach ($persons as $persona) {
			# code...
		}
		//
		return View::make('people/index')->with('persons',$persons);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /person/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$person = new Person;
		return View::make('people/create')->with('person',$person);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /person
	 *
	 * @return Response
	 */
	public function store()
	{
		//tomamos los datos que la el formulario mando en INPUT (POST) y lo guardamos en $data
		//$data = Input::all();
		$rules = array (
                'names' => 'required|min:3|max:45',
                'last_name' => 'min:3',
                'document' => 'required|max:45|unique:people',
                'telephone'=>'required|min:3|max:50|unique:people',
            );
		$messages = array(
            'required'  => ':attribute no puede ser vacio.',
            'min'       => ':attribute debe ser de por lo menos :min caracteres.',
            'max'       => ':attribute debe ser de por lo menos :max caracteres.',
            'unique'	=> 'el :attribute ya esta registrado'
            );
		//Validate data
		$validation  = Validator::make (Input::all(), $rules, $messages);
		//If everything is correct than run passes.
    if ($validation->fails()){
    	return Redirect::to('person/create')->withErrors($validation)->withInput();
    }
    	$person = new Person;
    	//limpiaremos los datos con e()
		$person->names = e(Input::get('names'));
		$person->last_name = e(Input::get('last_name'));
		$person->document = e(Input::get('document'));
		$person->telephone = e(Input::get('telephone'));
		$person->save();
		return Redirect::to('/')->with('flash', 'new person created!');	
		//
	}

	/**
	 * Display the specified resource.
	 * GET /person/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $this->person->find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /person/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('users.edit');
	}
 
	/**
	 * Update the specified resource in storage.
	 * PUT /person/{id}
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
	 * DELETE /person/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $this->person->delete($id);
	}

}