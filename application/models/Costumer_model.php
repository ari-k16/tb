<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Costumer_model extends CI_model 
{
	private $_table = "costumers";

	// nama kolom di table, harus sama huruf besar kecilnya!
	public $id_costumer; 
	public $nama_cs;
	public $username;
	public $password;
	public $point_cs;
	public $email;
	public $tlp_cs;
	public $id_address_cs;
	public $id_rekening_cs;
	public $status;
	public $catatan_cs;
	
	public function rules(){
		return [
		// ['field' => 'id_costumer',
		// 'label' => 'Id_costumer',
		// 'rules' => 'required'],

		['field' => 'nama_cs',
		'label' => 'Nama_cs',
		'rules' => 'required'],

		['field' => 'username',
		'label' => 'Username',
		'rules' => 'required'],

		['field' => 'password',
		'label' => 'Password',
		'rules' => 'required'],

		['field' => 'point_cs',
		'label' => 'Point_cs',
		'rules' => 'required'],

		['field' => 'email',
		'label' => 'Email',
		'rules' => 'required'],

		['field' => 'tlp_cs',
		'label' => 'Tlp_cs',
		'rules' => 'required'],

		['field' => 'id_address_cs',
		'label' => 'Id_address_cs',
		'rules' => 'required'],

		['field' => 'id_rekening_cs',
		'label' => 'Id_rekening_cs',
		'rules' => 'required'],

		['field' => 'status',
		'label' => 'Status',
		'rules' => 'required'],

		['field' => 'catatan_cs',
		'label' => 'Catatan_cs',
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
			return $this->db->get_where($this->_table, ["id_costumer" => $id])->row();
		}

		public function buat_kode()
		{
			$this->db->select('RIGHT(costumers.id_costumer,3) as kode', FALSE);
			$this->db->order_by('id_costumer','DESC');
			$this->db->limit(1);

			$query = $this->db->get('costumers');

			if ($query->num_rows()<>0) 
			{
				$data = $query->row();
				$kode = intval($data->kode)+1;	
			}else{
				$kode=1;
			}
			$kode_max=str_pad($kode,3,"0",STR_PAD_LEFT);
			$kode_jadi = "CS".$kode_max;
			return $kode_jadi;
		}

		public function get(){
			return $this->db->get($this->_table)->result();
		}

		public function save()
		{
			$post = $this->input->post();
			$this->id_costumer 		= $post["id_costumer"];
			$this->nama_cs 			= $post["nama_cs"];
			$this->username 		= $post["username"];
			$this->password 		= password_hash($post["password"], PASSWORD_DEFAULT);
			$this->point_cs 		= $post["point_cs"];
			$this->email 			= $post["email"];
			$this->tlp_cs 			= $post["tlp_cs"];
			$this->id_address_cs 	= $post["id_address_cs"];
			$this->id_rekening_cs 	= $post["id_rekening_cs"];
			$this->status 			= $post["status"];
			$this->catatan_cs 		= $post["catatan_cs"];
			return $this->db->insert($this->_table, $this);	
		}

		public function update()
		{
			$post = $this->input->post();
			$this->id_costumer 		= $post["id"];
			$this->nama_cs 			= $post["nama_cs"];
			$this->username 		= $post["username"];
			$this->password 		= password_hash($post["password"], PASSWORD_DEFAULT);
			$this->point_cs 		= $post["point_cs"];
			$this->email 			= $post["email"];
			$this->tlp_cs 			= $post["tlp_cs"];
			$this->id_address_cs 	= $post["id_address_cs"];
			$this->id_rekening_cs 	= $post["id_rekening_cs"];
			$this->status 			= $post["status"];
			$this->catatan_cs 		= $post["catatan_cs"];
			return $this->db->update($this->_table, $this, array('id_costumer' => $post['id']));
		}

		public function delete($id)
		{
			$this->db->delete($this->_table, array("$id_costumer" => $id));
		}

	}	
?>