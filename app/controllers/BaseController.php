<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
/*
	public function __construct()
	{
	    //Assets
	    Asset::add('jquery', 'js/jquery-1.7.2.min.js');
	    Asset::add('bootstrap-js', 'js/bootstrap.min.js');
	    Asset::add('bootstrap-css', 'css/bootstrap.min.css');
	    Asset::add('bootstrap-css-responsive', 'css/bootstrap-responsive.min.css', 'bootstrap-css');
	    Asset::add('style', 'css/style.css');
	    parent::__construct();
	}
*/

}
