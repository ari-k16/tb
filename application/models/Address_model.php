<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Address_model extends CI_model
{
	private $_table = "address";

	// nama kolom di table, harus sama huruf besar dan kecilnya! 
	public $id_address_cs;
	public $id_costumer;
	public $kota_au;
	public $provinsi_au;
	public $kodepos_au;
	public $desakel_au;
	public $kecamatan_au;
	public $more_au;

	public function rules(){
		return [
		// ['field' => 'id_address_cs',
		// 'label' => 'Id_address_cs',
		// 'rules' => 'required'],

		['field' => 'id_costumer',
		'label' => 'Id_costumer',
		'rules' => 'required'],

		['field' => 'kota_au',
		'label' => 'Kota_au',
		'rules' => 'required'],

		['field' => 'provinsi_au',
		'label' => 'Provinsi_au',
		'rules' => 'required'],

		['field' => 'kodepos_au',
		'label' => 'Kodepos_au',
		'rules' => 'required'],

		['field' => 'desakel_au',
		'label' => 'Desakel_au',
		'rules' => 'required'],

		['field' => 'kecamatan_au',
		'label' => 'Kecamatan_au',
		'rules' => 'required'],

		['field' => 'more_au',
		'label' => 'More_au',
		'rules' => 'required']
	];

}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
		// ini sama seperti :
		// SELECT * FROM address
		// method ini akan mengembalikan sebuah array 
		// yang berisi objek dari row
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table,["id_address_cs" => $id])->row();
	}

	public function buat_kode()
	{
		$this->db->select('RIGHT(address.id_address_cs,3) as kode', FALSE);
		$this->db->order_by('id_address_cs', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get('address');

		if ($query->num_rows()<>0) 
		{
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}
		$kode_max = str_pad($kode,3,"0",STR_PAD_LEFT);
		$kode_jadi = "AC".$kode_max;
		return $kode_jadi;
	}

	public function get(){
		return $this->db->get($this->_table)->result();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->id_address_cs		= $post["id_address_cs"];
		$this->id_costumer 			= $post["id_costumer"];
		$this->kota_au 				= $post["kota_au"];
		$this->provinsi_au 			= $post["provinsi_au"];
		$this->kodepos_au 			= $post["kodepos_au"];
		$this->desakel_au 			= $post["desakel_au"];
		$this->kecamatan_au 		= $post["kecamatan_au"];
		$this->more_au 				= $post["more_au"];
		return $this->db->insert($this->_table, $this);
	}

	public function update() 
	{
		$post = $this->input->post();
		$this->id_address_cs		= $post["id"];
		$this->id_costumer 			= $post["id_costumer"];
		$this->kota_au 				= $post["kota_au"];
		$this->provinsi_au 			= $post["provinsi_au"];
		$this->kodepos_au 			= $post["kodepos_au"];
		$this->desakel_au 			= $post["desakel_au"];
		$this->kecamatan_au 		= $post["kecamatan_au"];
		$this->more_au 				= $post["more_au"];
		return $this->db->update($this->_table, $this, array('id_address_cs' => $post['id']));
	}

	public function delete($id)
	{
		$this->db->delete($this->_table, array("$id_address_cs" => $id));
	}
}

?>