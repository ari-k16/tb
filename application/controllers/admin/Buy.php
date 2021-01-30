<?php 

class Buy extends CI_Controller {
	public function __construct(){
		parent::__construct(); 
		$this->load->model("buy_model");
		 // if($this->user_model->isNotLogin()) redirect(site_url('admin/buy'));
	}

	public function index(){
		//load view admin/overview.php
		$this->load->view("admin/buy/new_form");

	}
}

?>