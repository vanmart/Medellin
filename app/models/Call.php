<?php

class Call extends \Eloquent {
	
	protected $table = 'calls';

	protected $fillable = ['idPerson','duration'];


	public function person() 
    { 
        return $this->belongsTo('Person'); 
    }

}

