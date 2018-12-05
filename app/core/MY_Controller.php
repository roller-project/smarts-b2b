<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH."libraries/Format.php";
include_once APPPATH."libraries/ApiServer.php";
include_once APPPATH."libraries/ApiClient.php";
class BaseController extends CI_Controller{
	public $layout = "home-layout";
	public $title = "B2B Blockchian Exchange";
	public $description = "";
	public $image = "";
	public $language = "vietnam";
	function __construct()
	{
		parent::__construct();
		$this->load->library(['session','email','user_agent']);
		$this->load->helper(['url','form','functions','language']);
		$this->load->model(['account_model','app_model']);

		/*
		Default Language
		*/
		
		if($this->session->has_userdata("language")){
			$this->language = $this->session->userdata("language");
		}
        $this->get_lang('global');	
		$this->smtp_email_setup();
	}

	public function get_lang($lang=""){
		$this->lang->load($lang,$this->language, false, false);
	}


	public function set_meta($title, $des="", $img=""){
		if($title) $this->title = $title;
		if($des) $this->description = $des;
		if($img) $this->image = $img;
	}

	public function setLayout($layout){
		$this->layout = $layout;
	}
	/*
	Get Layout 
	*/
	public function getLayout(){
		$file = VIEWPATH.$this->layout.".php";
		if(file_exists($file)){
			return true;
		}
		return false;
	}

	/*
	Return View
	*/
	public function view($layout, $data=[]){
		
		$is_login = $this->account_model->get_login_id();
		//$is_admin = $this->app_model->get_admin($is_login);
		//$is_team = $this->app_model->get_team($is_login);
		//$is_login = 1;
		$data = array_merge($data,["is_login" => $is_login]);
		
		if($this->getLayout()){

			$data = $this->load->view($layout, $data, true);
			return $this->load->view($this->layout,[
				"title" => $this->title, 
				"description" => $this->description, 
				"image" => $this->image,
				"content" => $data, 
				"flash" => $this->get_flash(), 
				"header" => "",
				"is_login" => $is_login
			]);

		}else{
			return $this->load->view($layout, $data);
		}
	}

	public function viewAjax($layout, $data=[]){
		return $this->load->view($layout, $data);
	}

	public function isPost(){
		if($this->input->method() == "post"){
			return true;
		}
		return false;
	}

	public function isPut(){
		if($this->input->method() == "put"){
			return true;
		}
		return false;
	}

	public function isGet(){
		if($this->input->method() == "get"){
			return true;
		}
		return false;
	}

	/*
	Note Flash Member
	*/
	public function flash($key, $content=""){
		$this->session->set_flashdata($key, $content);
	}
	public function get_flash(){
		$html = "";
		if($this->session->flashdata("error")){
			$html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Error !</strong> '.$this->session->flashdata("error").'.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>';
		}

		if($this->session->flashdata("success")){
			$html = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Success !</strong> '.$this->session->flashdata("success").'.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>';
		}


		if($this->session->flashdata("warning")){
			$html = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Warning!</strong> '.$this->session->flashdata("warning").'.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>';
		}


		return $html;
	}


	public function go($url=""){
		redirect(site_url($url));
		exit();
	}

	public function error404(){
		$this->view("errors/404");
	}



	/*
	Swap Layout data
	*/

	public function swapLayout(){
		
	}



	public function recaptcha(){
		return '<div class="form-group"><div class="g-recaptcha" data-sitekey="'.$this->config->item("recaptcha_key").'"></div></div>';
	}

	public function validate_captcha(){
		if(!$this->config->item("recaptcha_key")) return true;
		//cấu hình thông tin do google cung cấp
		$api_url     = 'https://www.google.com/recaptcha/api/siteverify';
		$site_key    = $this->config->item("recaptcha_key");
		$secret_key  = $this->config->item("captcha_secret_key");
		  
		//lấy dữ liệu được post lên
	    $site_key_post    = $this->input->post('g-recaptcha-response');
	    if(!$site_key_post) return false;

	    
	    $remoteip = $this->input->ip_address();
	    //tạo link kết nối
	    $api_url = $api_url.'?secret='.$secret_key.'&response='.$site_key_post.'&remoteip='.$remoteip;
	    //lấy kết quả trả về từ google
	    $response = file_get_contents($api_url);
	    //dữ liệu trả về dạng json
	    $response = json_decode($response);
	    if(!isset($response->success))
	    {
	        return false;
	    }
	    if($response->success == true)
	    {
	        return true;
	    }else{
	       return false;
	    }
	}


	public function smtp_email_setup(){

		$smtp_email = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'email-smtp.eu-west-1.amazonaws.com',
			//'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 587,
			'smtp_user' => 'AKIAIQLJQ535QN4ZU2GQ',
			'smtp_pass' => 'Av6NKIXBkdxdk4f/PxBcNSEnEN34Kahwjk4AJq/dW1NX',
			'smtp_user' => 'support@smarts.exchange',
			'smtp_pass' => 'anhkhoa@321',
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'smtp_crypto' => 'tls', // tls or ssl
			'smtp_from' => 'support@smarts.exchange' // tls or ssl
		);


		$this->email->initialize($smtp_email);
		$this->email->from($smtp_email["smtp_from"], $smtp_email["smtp_from"]);
		$this->email->set_newline("\r\n");
	}

	public function sendEmail($toEmail, $subject, $body, $body_text='', $mailtype="html"){
		$body = $this->load->view("email", ["content" => $body], true);
		$this->email->to($toEmail);
		$this->email->subject($subject);
		$this->email->message($body);
		$this->email->set_alt_message($body_text);
		$this->email->set_mailtype($mailtype);

		return $this->email->send();
	}
}


class AdminController extends BaseController{
	function __construct()
	{
		define('ADMIN', true);
		parent::__construct();
		$this->load->database();
		
		$this->app = $this->app_model->config();
		$this->config->set_item("app",$this->app);
		$this->set_meta($this->app->name,$this->app->description,$this->app->image);

		$this->app->admin = false;

		if($this->app->app_author == $this->account_model->get_login_id()){
			$this->app->admin = true;
		}

		if($this->app->admin === false){
			$this->go("/404.html");
			exit();
		}
	}
}

/**
 * 
 */
class Apps extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->app = $this->app_model->config();
		$this->config->set_item("app",$this->app);
		$this->set_meta($this->app->name,$this->app->description,$this->app->image);
		
		$this->app->admin = false;
		$this->app->mode = 'view';
		
		if($this->session->userdata("mode") == "edit"){
			$this->app->mode = "edit";
		}


		if($this->app->app_author == $this->account_model->get_login_id()){
			$this->app->admin = true;
		}
	}
}


class ApiController extends ApiClient{
	function __construct()
	{
		parent::__construct();
	}
}



class APIAdminController extends ApiServer{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
}