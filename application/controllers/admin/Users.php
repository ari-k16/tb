x<?php 

defined('BASEPATH') OR exit ('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_model");
		$this->load->library('form_validation');
		$this->load->model("banking_model");
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index(){
		$data["users"] = $this->user_model->getAll();
		$this->load->view("admin/user/list", $data);
	}

	public function add(){
		$user = $this->user_model; //objek model
		$validation = $this->form_validation; //objek validation
		$validation->set_rules($user->rules()); // terapkan rules

		if($validation->run()) { //melakukan validasi
			$user->save(); // simpan data ke database
			$this->session->set_flashdata('success', 'Berhasil disimpan'); //tampilkan pesan berhasil
		}

		$this->load->view("admin/user/new_form"); // tampilkan form add
	}

	public function edit($id = null){
		if (!isset($id)) redirect('admin/users');

		$user = $this->user_model; //objek model
		$validation = $this->form_validation; //objek validation
		$validation->set_rules($user->rules()); // menerapkan rules

		if($validation->run()) { //melakukan validasi 
			$user->update(); // menyimpan data 
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		} 

		$data["user"] = $user->getById($id); // mengambil data untuk ditampilkan pada form 
		if (!$data["user"]) show_404(); // jika tidak ada data, tampilkan error 404

		$this->load->view("admin/user/edit_form", $data); // menampilkan edit 
	}

	public function delete ($id=null){
		if (!isset($id)) show_404();

		if ($this->user_model->delete($id)) {
			redirect(site_url('admin/users'));
		}
	}
}

?>