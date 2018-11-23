<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Apps {
	private $is_ajax = false;
	function __construct()
	{
		parent::__construct();
		$this->get_lang("admin");
		if ($this->input->is_ajax_request()) {
		   $this->is_ajax = true;
		}
	}

	private function call_view($file, $data=[]){
		if($this->is_ajax){
			$this->viewAjax($file, $data);
		}else{
			$this->view($file, $data);
		}
	}


	public function index()
	{
		$this->call_view('settings');
	}

	public function customs(){
		$this->call_view('stores/customs');
	}

	public function audience(){
		$this->call_view('stores/audience');
		
	}
}
