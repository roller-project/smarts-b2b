<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Apps {

	
	public function index()
	{
		$this->viewAjax('admin');
	}
}
