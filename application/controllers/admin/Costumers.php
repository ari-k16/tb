<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Costumers extends CI_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("costumer_model");
		$this->load->model("address_model");
		$this->load->model("rekening_model");
		$this->load->library('form_validation');
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index(){
		$data["costumers"] = $this->costumer_model->getAll();
		
		$this->load->view("admin/costumer/list", $data); 
	}

	public function add(){
		$costumer = $this->costumer_model;
		$validation = $this->form_validation;
		$validation->set_rules($costumer->rules());
		$data["kode"] = $this->costumer_model->buat_kode();
		$data["costumers"] = $this->costumer_model->getAll();
		$data["address"] = $this->address_model->get();
		$data["rekening"] = $this->rekening_model->get();

		if($validation->run()){
			$costumer->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		
		$this->load->view("admin/costumer/new_form", $data);
	}

	public function edit($id = null){
		if (!isset($id)) redirect('admin/costumers');

		$costumer = $this->costumer_model; // objek model 
		$validation = $this->form_validation; // objek validation
	    $validation->set_rules($costumer->rules()); // menerapkan rules
		$data["address"] = $this->address_model->get();
		$data["rekening"] = $this->rekening_model->get();

		 if ($validation->run()){ // melakukan validasi
			$costumer->update(); // menyiapkan data 
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		 }

		$data["costumer"] = $costumer->getById($id); // mengambil data untuk ditampilkan pada form 
		if(!$data["costumer"]) show_404(); // jika tidak ada data, tampilkan error 404

		$this->load->view("admin/costumer/edit_form", $data); // menampilkan form edit 
	}

	public function delete($id=null){
		if(!isset($id)) show_404();

		if($this->costumer_model->delete($id)){
			redirect(site_url('admin/costumers'));
		}
	}
}

?>