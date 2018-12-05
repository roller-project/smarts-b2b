<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends Apps {
	private $is_ajax = false;
	function __construct()
	{
		parent::__construct();
		$this->get_lang("admin");
		if($this->account_model->get_login_id() < 1){
			$this->go("/login.html");
		}
		$this->setLayout("admin-layout");
	}

	public function index(){
		if(count($this->getplance()) == 0){
			$this->go("/stores/plance");
		}
		$this->go("/stores/app");
		$this->view("stores/dashboard");
	}


	public function plance(){
		if($this->isPost()){
			$plance = $this->input->post("saveplance");
			$name = $this->input->post("name");
			$arv = [
				"name" => $name,
				"account_id" => $this->account_model->get_login_id(),
				"limit_apps" => 1,
				"limit_hdd" => 1,
				"limit_bandwith" => 1
			];
			if($plance == 10){
				$arv = [
					"limit_apps" => 10,
					"limit_hdd" => 10,
					"limit_bandwith" => 100
				];
			}

			if($plance == 20){
				$arv = [
					"limit_apps" => 100,
					"limit_hdd" => 100,
					"limit_bandwith" => 1000
				];
			}

			$this->db->insert("plance", $arv);
			$this->go("/stores/plance");

		}

		if(count($this->getplance()) > 0){
			$this->go("/stores/app");
		}

		$this->view("stores/plance");
	}

	public function app(){
		$data = $this->db->get_where("apps",["app_author" => $this->account_model->get_login_id()])->result();
		$this->view("stores/managerapps",["apps" => $data]);
	}


	public function createapps(){
		if($this->isPost()){
			$name = $this->input->post("name");
			$domain = strtolower(trim(str_replace([' ','http://','.www','https://'],'',$this->input->post("domain"))));
			$data = $this->db->get_where("apps",["app_domain" => $domain])->row();
			if(!$data){
				$this->db->insert("apps",["app_name" => $name, "app_domain" => $domain, "app_author" => $this->account_model->get_login_id(), "app_url" => strtolower(url_title($name))]);
			}
			$this->go("/stores/app");

		}
		$this->view("stores/createapps");
	}



	private function getplance(){
		return $this->db->get_where("plance",["account_id" => $this->account_model->get_login_id()])->result();
	}
}