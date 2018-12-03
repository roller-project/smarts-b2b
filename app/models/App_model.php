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
		if(!isset($data->app_id)){
			$data = new stdClass;
			$arv = [
				"name" => "Smarts B2B",
				"athour" => "Roller Platform",
				"exchange"	=> "Smarts Exchange",
				"email"	=> "support@smarts.exchange",
				"description"	=>	"",
				"image"	=>	"",
				"keyword"	=>	"",
				"app_author" => -1,
				"app_id" => 0,

			];

			$data->app_config = json_encode($arv);
		}else{

			$arv = [
				"name" => $data->app_name,
				"athour" => "Roller Platform",
				"exchange"	=> "Smarts Exchange",
				"email"	=> "support@smarts.exchange",
				"description"	=>	"",
				"image"	=>	"",
				"keyword"	=>	"",
				"app_author" => $data->app_author,
				"app_id" => $data->app_id,

			];

			/*
			read Menu By App
			*/

			
			$arv["menu"] = $this->apps_menu($data->app_id);

			

			$data->app_config = json_encode($this->magre_data($arv,($data->app_config ? $data->app_config : '{}')));

		}

		return json_decode($data->app_config);
	}

	public function apps_menu($app_id, $parent_id=0){
		$this->db->where("app_id", $app_id);
		$this->db->where("parent_id", $parent_id);

		$menu = $this->db->get("apps_menu")->result();

		if(count($menu) == 0) return false;
		
		$arv = [];

		foreach ($menu as $key => $value) {
			$menu_child_rows = $this->db->get_where("apps_menu",["app_id" => $app_id, "parent_id" => $value->menu_id])->num_rows();
			
			$arv[$value->menu_type][] = [
				"name" => $value->menu_name, 
				"url" => $value->menu_url,
				"icon" =>  $value->menu_icon,
				"menu_id" => $value->menu_id, 
				"child" => ($menu_child_rows > 0 ? $this->apps_menu($app_id, $value->menu_id) : [])
			];
			
		}
		return $arv;

	}

	public function getDomainApps(){
		return str_replace(['http://', 'https://','www.','/'],'',site_url());
	}


	public function item($key){
		return $key;
	}

	private function magre_data($obj1, $obj2){
		if(is_object($obj1)){
			$obj1 = $this->object_to_array($obj1);
		}

		if(is_object($obj2)){
			$obj2 = $this->object_to_array($obj2);
		}

		return array_merge($obj1, (is_array($obj2) ? $obj2 : []));
	}


	/*
	Conver Object To Array
	*/

	private function object_to_array($data)
	{
	    if (is_array($data) || is_object($data))
	    {
	        $result = array();
	        foreach ($data as $key => $value)
	        {
	            $result[$key] = $this->object_to_array($value);
	        }
	        return $result;
	    }
	    return $data;
	}

	public function get_admin($account_id=0){

	}

	public function get_team($account_id=0){
		
	}
}