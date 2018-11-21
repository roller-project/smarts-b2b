<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class App_model extends DB_Model{
	
	function __construct()
	{
		parent::__construct();
	}

	public function config(){
		$domain = $this->getDomainApps();
		$data = $this->db->get_where("apps",["app_domain" => $domain])->row();
		if(!isset($data->app_config)){
			$data = new stdClass;
			$arv = [
				"name" => "Smart B2B Blockchain",
				"athour" => "Roller Platform",
				"exchange"	=> "Smarts Exchange",
				"email"	=> "support@smarts.exchange",
				"description"	=>	"",
				"image"	=>	"",
				"keyword"	=>	""
			];

			$data->app_config = json_encode($arv);
		}

		return json_decode($data->app_config);
	}

	public function getDomainApps(){
		return str_replace(['http://', 'https://','www.','/'],'',site_url());
	}


	public function item($key){
		return $key;
	}
}