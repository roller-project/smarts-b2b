<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Apps {

	
	public function index()
	{
		$this->view('welcome_message');
	}
}
