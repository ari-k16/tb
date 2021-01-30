<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Transaksi_model extends CI_model 
{
	private $_table = "transaksi";

	// nama kolom di table, harus sama huruf besar kecilnya!
	public $id_transaksi; 
	public $kode_transaksi;
	public $id_costumer;
	public $id_user;
	public $nama_cs;
	public $email;
	public $tlp_cs;
	public $alamat;
	public $tgl_transaksi;
	public $jumlah_transaksi;
	public $status_bayar;
	public $jumlah_bayar;
	public $rekening_pembayaran;
	public $rekening_cs;
	public $bukti_bayar = "default.jpg";
	public $tgl_post;
	public $tgl_update;
	
	public function rules(){
		return [

		// ['field' => 'id_transaksi',
		// 'label' => 'Id_transaksi',
		// 'rules' => 'required'],

		['field' => 'kode_transaksi',
		'label' => 'Kode_transaksi',
		'rules' => 'required'],

		['field' => 'id_costumer',
		'label' => 'Id_costumer',
		'rules' => 'required'],

		['field' => 'id_user',
		'label' => 'Id_user',
		'rules' => 'required'],

		['field' => 'nama_cs',
		'label' => 'Nama_cs',
		'rules' => 'required'],

		['field' => 'email',
		'label' => 'Email',
		'rules' => 'required'],

		['field' => 'tlp_cs',
		'label' => 'Tlp_cs',
		'rules' => 'required'],

		['field' => 'alamat',
		'label' => 'Alamat',
		'rules' => 'required'],

		['field' => 'tgl_transaksi',
		'label' => 'Tgl_transaksi',
		'rules' => 'required'],

		['field' => 'jumlah_transaksi',
		'label' => 'Jumlah_transaksi',
		'rules' => 'required'],

		['field' => 'status_bayar',
		'label' => 'Status_bayar',
		'rules' => 'required'],

		['field' => 'jumlah_bayar',
		'label' => 'Jumlah_bayar',
		'rules' => 'required'],

		['field' => 'rekening_pembayaran',
		'label' => 'Rekening_pembayaran',
		'rules' => 'required'],

		['field' => 'rekening_cs',
		'label' => 'Rekening_cs',
		'rules' => 'required'],

		['field' => 'tgl_post',
		'label' => 'Tgl_post',
		'rules' => 'required'],

		['field' => 'tgl_update',
		'label' => 'Tgl_update',
		'rules' => 'required']
	];
}

		public function getAll()
		{
			return $this->db->get($this->_table)->result();
			// ini sama seperti : 
			// SELECT * FROM transaksi
			// method ini akan mengembalikan sebuah array 
			// yang berisi objek dari row
		}

		public function getById($id)
		{
			return $this->db->get_where($this->_table, ["id_transaksi" => $id])->row();
		}

		public function buat_kode()
		{
			$this->db->select('RIGHT(transaksi.id_transaksi,3) as kode', FALSE);
			$this->db->order_by('id_transaksi','DESC');
			$this->db->limit(1);

			$query = $this->db->get('transaksi');

			if ($query->num_rows()<>0) 
			{
				$data = $query->row();
				$kode = intval($data->kode)+1;	
			}else{
				$kode=1;
			}
			$kode_max=str_pad($kode,3,"0",STR_PAD_LEFT);
			$kode_jadi = "TRX".$kode_max;
			date_default_timezone_set('Asia/Jakarta');
			return $kode_jadi.date('dmy');
		}

		public function get(){
			return $this->db->get($this->_table)->result();
		}

		public function save()
		{
			$post = $this->input->post(); // ambil dari database
			$this->id_transaksi 		= uniqid();
			$this->kode_transaksi 		= $post["kode_transaksi"];
			$this->id_costumer 			= $post["id_costumer"];
			$this->id_user 				= $post["id_user"];
			$this->nama_cs 				= $post["nama_cs"];
			$this->email 				= $post["email"];
			$this->tlp_cs 				= $post["tlp_cs"];
			$this->alamat 				= $post["alamat"];
			$this->tgl_transaksi 		= $post["tgl_transaksi"];
			$this->jumlah_transaksi 	= $post["jumlah_transaksi"];
			$this->status_bayar 		= $post["status_bayar"];
			$this->jumlah_bayar 		= $post["jumlah_bayar"];
			$this->rekening_pembayaran 	= $post["rekening_pembayaran"];
			$this->rekening_cs 			= $post["rekening_cs"];
			$this->bukti_bayar 			= $this->_uploadImage();
			$this->tgl_post 			= $post["tgl_post"];
			$this->tgl_update 			= $post["tgl_update"];
			return $this->db->insert($this->_table, $this);	
		}

		public function update()
		{
			$post = $this->input->post();
			$this->id_transaksi 		= $post["id"];
			$this->kode_transaksi 		= $post["kode_transaksi"];
			$this->id_costumer 			= $post["id_costumer"];
			$this->id_user 				= $post["id_user"];
			$this->nama_cs 				= $post["nama_cs"];
			$this->email 				= $post["email"];
			$this->tlp_cs 		    	= $post["tlp_cs"];
			$this->alamat 				= $post["alamat"];
			$this->tgl_transaksi 		= $post["tgl_transaksi"];
			$this->jumlah_transaksi 	= $post["jumlah_transaksi"];
			$this->status_bayar 		= $post["status_bayar"];
			$this->jumlah_bayar 	   	= $post["jumlah_bayar"];
			$this->rekening_pembayaran 	= $post["rekening_pembayaran"];
			$this->rekening_cs 			= $post["rekening_cs"];
			
			if (!empty($_FILES["bukti_bayar"]["name"])) {
				$this->bukti_bayar = $this->_uploadImage();
			}else{
				$this->bukti_bayar = $post["old_image"];
			}

			$this->tgl_post 			= $post["tgl_post"];
			$this->tgl_update 			= $post["tgl_update"];
			return $this->db->update($this->_table, $this, array('id_transaksi' => $post['id']));
		}

		public function delete($id)
		{
			$this->_deleteImage($id);
			$this->db->delete($this->_table, array("$id_transaksi" => $id));
		}

		private function _uploadImage(){
			$config['upload_path']	 	= './upload/buktip/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['file_name']	 	= $this->id_transaksi;
			$config['overwrite']	 	= true;
			$config['max_size']		 	= 1024;
			// $config['max_width']		= 1024;
			// $config['max_heigth']		= 786;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('bukti_bayar')) {
				return $this->upload->data("file_name");
			}

			print_r($this->upload->display_errors());	
			// return "default.jpg";
		}

		private function _deleteImage($id){
			$transaksi = $this->getById($id);
			if ($transaksi->bukti_bayar != "default.jpg") {
				$filename = explode(".", $transaksi->bukti_bayar)[0];
				return array_map('unlink', glob(FCPATH."upload/buktip/$filename.*"));
			}
		}

	}	
?>