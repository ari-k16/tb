<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Transaksi extends CI_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("transaksi_model");
		$this->load->model("costumer_model");
		$this->load->model("address_model");
		$this->load->model("rekening_model");
		$this->load->library('form_validation');
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index(){
		$data["transaksi"] = $this->transaksi_model->getAll();

		$this->load->view("admin/transaksi/list", $data); 
	}

	public function add(){
		$transaksi 			= $this->transaksi_model;
		$validation 		= $this->form_validation;
		$validation->set_rules($transaksi->rules());
		$data["kode"] 		= $this->transaksi_model->buat_kode();
		$data["costumers"] 	= $this->costumer_model->getAll();
		$data["address"] 	= $this->address_model->get();
		$data["rekening"] 	= $this->rekening_model->get();
		$data["user"]	    = $this->user_model->getAll();

		if($validation->run()){
			$transaksi->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		
		$this->load->view("admin/transaksi/new_form", $data);
	}

	public function edit($id = null){
		if (!isset($id)) redirect('admin/transaksi');

		$transaksi = $this->transaksi_model; // objek model 
		$validation = $this->form_validation; // objek validation
	    $validation->set_rules($transaksi->rules()); // menerapkan rules
		$data["costumers"] = $this->costumer_model->getAll();
		$data["address"] = $this->address_model->get();
		$data["rekening"] = $this->rekening_model->get();
		$data["address"] = $this->address_model->get();
		$data["user"] = $this->user_model->getAll();

		 if ($validation->run()){ // melakukan validasi
			$transaksi->update(); // menyiapkan data 
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		 }

		$data["transaksi"] = $transaksi->getById($id); // mengambil data untuk ditampilkan pada form 
		if(!$data["transaksi"]) show_404(); // jika tidak ada data, tampilkan error 404

		$this->load->view("admin/transaksi/edit_form", $data); // menampilkan form edit 
	}

	public function delete($id=null){
		if(!isset($id)) show_404();

		if($this->costumer_model->delete($id)){
			redirect(site_url('admin/transaksi'));
		}
	}
}
?>