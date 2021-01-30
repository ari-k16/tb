<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Rekening_model extends CI_model
{
	private $_table = "rekening";

	// nama kolom di table, harus sama huruf besar dan kecilnya! 
	public $id_rekening_cs;
	public $bank_ru;
	public $an_ru;
	public $no_ru;
	public $id_costumer;
	public $status_ru;


	public function rules(){
		return [
		// ['field' => 'id_rekening_cs',
		// 'label' => 'Id_rekening_cs',
		// 'rules' => 'required'],

		['field' => 'bank_ru',
		'label' => 'Bank_ru',
		'rules' => 'required'],

		['field' => 'an_ru',
		'label' => 'An_ru',
		'rules' => 'required'],

		['field' => 'no_ru',
		'label' => 'No_ru',
		'rules' => 'required'],

		['field' => 'id_costumer',
		'label' => 'Id_costumer',
		'rules' => 'required'],

		['field' => 'status_ru',
		'label' => 'Status_ru',
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
		return $this->db->get_where($this->_table, ["id_rekening_cs" => $id])->row();
	}

	public function buat_kode()
	{
		$this->db->select('RIGHT(rekening.id_rekening_cs,3) as kode', FALSE);
		$this->db->order_by('id_rekening_cs', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get('rekening');

		if ($query->num_rows()<>0) 
		{
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}
		$kode_max = str_pad($kode,3,"0",STR_PAD_LEFT);
		$kode_jadi = "RC".$kode_max;
		return $kode_jadi;
	}

	public function get(){
			return $this->db->get($this->_table)->result();
		}

	public function save()
	{
		$post = $this->input->post();
		$this->id_rekening_cs = $post["id_rekening_cs"];
		$this->bank_ru 		  = $post["bank_ru"];
		$this->an_ru 		  = $post["an_ru"];
		$this->no_ru 		  = $post["no_ru"];
		$this->id_costumer    = $post["id_costumer"];
		$this->status_ru  	  = $post["status_ru"];
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_rekening_cs = $post["id"];
		$this->bank_ru 		  = $post["bank_ru"];
		$this->an_ru 		  = $post["an_ru"];
		$this->no_ru 		  = $post["no_ru"];
		$this->id_costumer    = $post["id_costumer"];
		$this->status_ru  	  = $post["status_ru"];
		return $this->db->update($this->_table, $this, array('id_rekening_cs' => $post['id']));
	}

	public function delete($id)
	{
		$this->db->delete($this->_table, array("$id_address_costumer" => $id));
	}
}

?>