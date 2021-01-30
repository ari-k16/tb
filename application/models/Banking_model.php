<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Banking_model extends CI_model 
{
	private $_table = "banking";

	// nama kolom di table, harus sama huruf besar kecilnya!
	public $id_banking; 
	public $id_costumer;
	public $id_rekening_cs;
	public $jumlah_tf_banking;
	public $tgl_tf_banking;
	public $tgl_konfirmasi_banking;
	public $status_banking;
	public $id_user;
	
	public function rules(){
		return [
		
		['field' => 'id_costumer',
		'label' => 'Id_costumer',
		'rules' => 'required'],

		['field' => 'id_rekening_cs',
		'label' => 'Id_rekening_cs',
		'rules' => 'required'],

		['field' => 'jumlah_tf_banking',
		'label' => 'Jumlah_tf_banking',
		'rules' => 'required'],

		['field' => 'tgl_tf_banking',
		'label' => 'Tgl_tf_banking',
		'rules' => 'required'],

		['field' => 'tgl_konfirmasi_banking',
		'label' => 'Tgl_konfirmasi_banking',
		'rules' => 'required'],

		['field' => 'status_banking',
		'label' => 'Status_banking',
		'rules' => 'required'],

		['field' => 'id_user',
		'label' => 'Id_user',
		'rules' => 'required']

	];
}

		public function getAll()
		{
			return $this->db->get($this->_table)->result();
			// ini sama seperti : 
			// SELECT * FROM costumers
			// method ini akan mengembalikan sebuah array 
			// yang berisi objek dari row
		}

		public function getById($id)
		{
			return $this->db->get_where($this->_table, ["id_banking" => $id])->row();
		}

		public function get(){
			return $this->db->get($this->_table)->result();
		}

		public function save()
		{
			$post = $this->input->post();
			$this->id_banking 		  	  = $post["id_banking"];
			$this->id_costumer 		  	  = $post["id_costumer"];
			$this->id_rekening_cs 	  	  = $post["id_rekening_cs"];
			$this->jumlah_tf_banking  	  = $post["jumlah_tf_banking"];
			$this->tgl_tf_banking 	  	  = $post["tgl_tf_banking"];
			$this->tgl_konfirmasi_banking = $post["tgl_konfirmasi_banking"];
			$this->status_banking 	 	  = $post["status_banking"];
			$this->id_user 	  	  		  = $post["id_user"];
			return $this->db->insert($this->_table, $this);	
		}

		public function update()
		{
			$post = array('id_costumer'  => $this->input->post('id_costumer'),
			  	'id_rekening_cs' 	 	 => $this->input->post('id_rekening_cs'),
			  	'jumlah_tf_banking'      => $this->input->post('jumlah_tf_banking'),
			  	'tgl_tf_banking' 	 	 => $this->input->post('tgl_tf_banking'),
			  	'tgl_konfirmasi_banking' => $this->input->post('tgl_konfirmasi_banking'),
			  	'status_banking' 		 => $this->input->post('status_banking'),
			  	'id_user' 	 		 	 => $this->input->post('id_user'));
		return $this->db->update($this->_table, $post, array('id_banking' => $this->input->post('id')));
		}

		public function delete($id)
		{
			$this->db->delete($this->_table, array("$id_banking" => $id));
		}

	}	
?>