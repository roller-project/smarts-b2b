<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Apps {

	

	public function index()
	{
		
		$this->view('dashboard');
	}


	public function login(){
		if($this->isPost()){
			$isLogin = $this->account_model->login($this->input->post("email"),$this->input->post("password"));
			if($isLogin){
				$this->go("/");
			}else{
				$this->go("/login.html");
			}
		}

		$loginwith = $this->input->get("with");
		echo $loginwith;
		$this->setLayout("access-layout");
		$this->view("account/login");
	}


	private function LoginAccount(){

	}


	public function register(){
		if($this->isPost()){
			$isLogin = $this->account_model->register($this->input->post("email"),$this->input->post("password"));
			if($isLogin){
				$this->go("/login.html");
			}else{
				$this->go("/register.html");
			}
		}
		$this->setLayout("access-layout");
		$this->view("account/register");
	}


	public function logout(){
		$this->session->sess_destroy();
		$this->go("/");
	}
}
