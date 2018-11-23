<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends AdminController {
	private $is_ajax = false;
	function __construct()
	{
		parent::__construct();
		//$this->setLayout("admin-layout");
		$this->get_lang("admin");
		if ($this->input->is_ajax_request()) {
		   $this->is_ajax = true;
		}
	}

	public function index(){
		print_r($this->account_model->get_login_id());
		$this->view("admin/stores");
	}
}