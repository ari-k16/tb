<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Banking extends CI_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("banking_model");
		$this->load->model("costumer_model");
		$this->load->model("rekening_model");
		$this->load->library('form_validation');
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index(){
		$data["banking"] = $this->banking_model->getAll();
		$this->load->view("admin/banking/list", $data); 
	}


	public function add(){
		$banking = $this->banking_model;
		$validation = $this->form_validation;
		$validation->set_rules($banking->rules());
		$data["banking"] = $this->banking_model->getAll();
		$data["costumers"] = $this->costumer_model->get();
		$data["rekening"] = $this->rekening_model->get();
		$data["user"] = $this->user_model->getAll();

		if($validation->run()){
			$banking->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		
		$this->load->view("admin/banking/new_form", $data);
	}

	public function edit($id = null){
		if (!isset($id)) redirect('admin/banking');

		$banking = $this->banking_model; // objek model 
		$validation = $this->form_validation; // objek validation
	    $validation->set_rules($banking->rules()); // menerapkan rules
		$data["costumers"] = $this->costumer_model->get();
		$data["rekening"] = $this->rekening_model->get();
		$data["user"] = $this->user_model->getAll();

		if($validation->run()){
			$banking->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
	     }

		$data["banking"] = $banking->getById($id); // mengambil data untuk ditampilkan pada form 
		if(!$data["banking"]) show_404(); // jika tidak ada data, tampilkan error 404

		$this->load->view("admin/banking/edit_form", $data); // menampilkan form edit 
	}

	public function delete($id = null){
		if(!isset($id)) show_404();

		if($this->banking_model->delete($id)){
			redirect(site_url('admin/banking'));
		}
	}
}
?>