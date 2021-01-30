<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Address extends CI_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("address_model");
		$this->load->model("costumer_model");
		$this->load->library('form_validation');
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index(){
		$data["address"] = $this->address_model->getAll();
		$this->load->view("admin/address/list", $data); 
	}


	public function add(){
		$address = $this->address_model;
		$validation = $this->form_validation;
		$validation->set_rules($address->rules());
		$data["kode"] = $this->address_model->buat_kode();
		$data["address"] = $this->address_model->getAll();
		$data["costumers"] = $this->costumer_model->get();

		if($validation->run()){
			$address->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		
		$this->load->view("admin/address/new_form", $data);
	}

	public function edit($id = null){
		if (!isset($id)) redirect('admin/address');

		$address = $this->address_model; // objek model 
		$validation = $this->form_validation; // objek validation
		$validation->set_rules($address->rules()); // menerapkan rules
		$data["costumers"] = $this->costumer_model->get();

		 if($validation->run()){
			$address->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		 }

		$data["address"] = $address->getById($id); // mengambil data untuk ditampilkan pada form 
		if(!$data["address"]) show_404(); // jika tidak ada data, tampilkan error 404

		$this->load->view("admin/address/edit_form", $data); // menampilkan form edit 
	}

	public function delete($id = null){
		if(!isset($id)) show_404();

		if($this->address_model->delete($id)){
			redirect(site_url('admin/address'));
		}
	}
}
?>