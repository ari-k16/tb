<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Rekening extends CI_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("rekening_model");
		$this->load->model("costumer_model");
		$this->load->model("address_model");
		$this->load->library('form_validation');
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index()
	{
		$data["rekening"] = $this->rekening_model->getAll();

		$this->load->view("admin/rekening/list", $data);
	}

	public function add(){
		$rekening = $this->rekening_model;
		$validation = $this->form_validation;
		$validation->set_rules($rekening->rules());
		$data["kode"] = $this->rekening_model->buat_kode();
		$data["rekening"] = $this->rekening_model->getAll();
		$data["costumers"] = $this->costumer_model->get();
		
		if($validation->run()){
			$rekening->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$this->load->view("admin/rekening/new_form", $data);
	}

	public function edit($id = null){
		if (!isset($id)) redirect('admin/rekening');

		$rekening = $this->rekening_model;
		$validation = $this->form_validation;
	    $validation->set_rules($rekening->rules());
		$data["costumers"] = $this->costumer_model->get();

		 if ($validation->run()){
			$rekening->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		 }

		$data["rekening"] = $rekening->getById($id);
		if(!$data["rekening"]) show_404();

		$this->load->view("admin/rekening/edit_form", $data);
	}

	public function delete($id=null){
		if(!isset($id)) show_404();

		if($this->rekening_model->delete($id)){
			redirect(site_url('admin/rekening'));
		}
	}
}
?>