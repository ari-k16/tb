<?php  

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("product_model");
		$this->load->library('form_validation');
	}

	public function index()
	{
		// jika form login
		if($this->input->post()){
			if($this->user_model->doLogin()) redirect(site_url('admin'));
		}

		// tampilkan halaman login
		$this->load->view("admin/login_page.php");

	}

	public function logout()
	{
		// hancurkan semua sesi
		$this->session->sess_destroy();
		redirect(site_url('admin/login'));
	}

	public function buy(){

		// jika form login 
		if($this->input->post()){
			if($this->costumer_model->doLogin()) redirect(site_url(''));
		}

		// tampilkan halaman chackout 
		$this->load->view("admin/");
	}


}

?>