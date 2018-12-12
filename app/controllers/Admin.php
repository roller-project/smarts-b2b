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

	public function mode_edit(){
		if($this->isGet()){
			return false;
		}
		$this->session->set_userdata("mode","edit");
		$url = $this->input->post("current_url");
		$this->go($url);
	}

	public function mode_view(){
		if($this->isGet()){
			return false;
		}
		$this->session->set_userdata("mode","view");
		$url = $this->input->post("current_url");
		$this->go($url);
	}

	public function menucontroller($type="", $parent=0, $json=true){

		$arv = [
			"app_id" => $this->app->app_id,
			"menu_name" => "Create Menu",
			"menu_type" => $type,
			'parent_id' => $parent,
			'language' => config_item("language"),
			"menu_url" => $this->rewrite_url("Create Menu"),
		];

		$this->db->insert("apps_menu", $arv);

		if($json){
			print_r($arv);
		}
		
	}

	public function menuinsert($type, $parent){
		$this->menucontroller($type, $parent, false);
		$back = $this->input->get("ref");
		$this->go(($back ? $back : "/"));
	}

	public function rewrite_url($title="", $type="insert"){
		$title = strip_tags($title);
        $titleURL = strtolower(url_title($title));
        $count = $this->db->get_where("apps_menu",["app_id" => $this->app->app_id, "menu_url" => $titleURL])->num_rows();
        return $titleURL.($count > 0 && $type == "insert" ? "-".time()  : "");
	}


	public function updatemenu($id=0){
		$name = $this->input->post("name");
		$url = $this->input->post("url");
		$this->db->update("apps_menu",["menu_name" => $name, "menu_url" => $this->rewrite_url($url,"edit")],["menu_id" => $id]);
		echo json_encode(["name" => $name, "url" => $url]);
	}
}