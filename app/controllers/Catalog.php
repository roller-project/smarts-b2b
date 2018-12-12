<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends Apps {

	

	public function index()
	{
		$this->view('dashboard');
	}

	public function post($url=""){

		$data = $this->db->get_where("apps_menu",["menu_url" => $url])->row();
		if(!$data){
			$this->go("/");
		}
		$this->set_meta($data->menu_name);
		$this->view('catalog',["data" => $data, "editurl" => site_url("catalog/savedata/".$data->menu_id)]);
	}

	public function savedata($id){
		$content = $this->input->post("data");
		$title = $this->input->post("title");
		$this->db->update("apps_menu",["contents" => $content, "title" => $title],["menu_id" => $id]);
		echo json_decode(true);
	}
}
