<?php

class Person extends \Eloquent {
	protected $fillable = ['names','last_name', 'document','telephone'];

	public function calls(){
		return $this->hasMany('Call','idPerson');
	}

}


