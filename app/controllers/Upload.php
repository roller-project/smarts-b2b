<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends AdminController {
	private $is_ajax = false;
	function __construct()
	{
		parent::__construct();
		$this->get_lang("admin");
		if ($this->input->is_ajax_request()) {
		   $this->is_ajax = true;
		}
	}

	public function image($resize=false, $crop=false){

		$config['upload_path'] = FCPATH.'uploads/'.$this->app->app_author.'/'.$this->app_model->getDomainApps().'/';

		if(!is_dir($config['upload_path'])){
			mkdir($config['upload_path'],0755, true);
		}

        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;
 
        $this->load->library('upload', $config);
       
        if (!$this->upload->do_upload('filename'))
        {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }
        else
        {
        	/*
			client_name: "Screen Shot 2018-11-08 at 10_48_58 AM.png"
​
			file_ext: ".png"
			​
			file_name: "b236758c93e18620c064fb8440c5e8ce.png"
			​
			file_path: "/Volumes/DATA/roller-project/smarts-exchange-b2b/uploads/1/localhost/"
			​
			file_size: 28.62
			​
			file_type: "image/png"
			​
			full_path: "/Volumes/DATA/roller-project/smarts-exchange-b2b/uploads/1/localhost/b236758c93e18620c064fb8440c5e8ce.png"
			​
			image_height: 267
			​
			image_size_str: "width=\"313\" height=\"267\""
			​
			image_type: "png"
			​
			image_width: 313
			​
			is_image: true
			​
			orig_name: "Screen_Shot_2018-11-08_at_10_48_58_AM.png"
			​
			raw_name: "b236758c93e18620c064fb8440c5e8ce"
        	*/
            $data = $this->upload->data();
            echo json_encode(array("name" => site_url(str_replace(FCPATH,'', $data["full_path"])), "error" => false));
            exit();
        }
		echo json_encode(array(
			'name'  => "",
			'error' => "",
		));
		die();
	}
}