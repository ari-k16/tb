<?php 

defined('BASEPATH') OR exit ('No direct script access allowed');

class Product_model extends CI_model
{
	private $_table = "products"; //nama tabel

	//nama kolom di tabel, harus sama huruf besar dan kecilnya!
	public $id_products;
	public $name;
	public $price;
	public $image = "default.jpg";
	public $description;

	public function rules(){
		return [
			['field' => 'name',
			'label' => 'Name',
			'rules' => 'required'],

			['field' => 'price',
			'label' => 'Price',
			'rules' => 'numeric'],

			['field' => 'description',
			'label' => 'Description',
			'rules' => 'required']		
	];
}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
		// ini sama artinya seperti :
		// SELECT * FROM products
		// method ini akan mengembalikan sebuah array 
		// yang berisi objek dari row
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table,["id_products" => $id])->row();
		// ini sama artinya seperti :
		// SELECT * FROM products WHERE product_id=$id
		// method ini akan mengembalikan sebuah objek 
	}

	public function save()
	{
		$post = $this->input->post(); // ambil data dari form  
		$this->id_products 	= uniqid(); //  membuat id unik 
		$this->name 		= $post["name"]; // isi field name
		$this->price 		= $post["price"]; // isi field price
		$this->image 		= $this->_uploadImage(); // isi filed upload image
		$this->description 	= $post["description"]; //isi field description
		return $this->db->insert($this->_table, $this); // simpan ke database
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_products = $post["id"];
		$this->name 	   = $post["name"];
		$this->price 	   = $post["price"];

		if (!empty($_FILES["image"]["name"])) {
			$this->image = $this->_uploadImage();
		}else{
			$this->image = $post["old_image"];
		}

		$this->description = $post["description"];
		return $this->db->update($this->_table, $this, array('id_products' => $post['id']));
	}

	public function delete($id)
	{
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("id_products" => $id));
	}

	private function _uploadImage(){
		$config['upload_path']		= './upload/product/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['file_name']		= $this->id_products;
		$config['overwrite']		= true;
		$config['max_size']			= 1024; // 1mb
		// $config['max_width']	= 1024;
		// $config['max_heigth']	= 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id){
		$product = $this->getById($id);
		if ($product->image != "default.jpg") {
			$filename = explode(".", $product->image)[0];
			return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
		}
	}

}




?>