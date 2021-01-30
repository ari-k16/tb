<?php  

class User_model extends CI_Model
{
    private $_table = "users"; //nama table 

    // nama kolom ditabel, harus sama huruf besar dan kecilnya!
    public $id_user;
    public $username;
    public $password;
    public $email;
    public $full_name;
    public $phone;
    public $role;
    public $photo = "user_no_image.jpg";
    public $is_active;

    public function rules(){
        return [
        ['field' => 'username',
        'label' => 'Username',
        'rules' => 'required'],

        ['field' => 'password',
        'label' => 'Password',
        'rules' => 'required'],

        ['field' => 'email',
        'label' => 'Email',
        'rules' => 'required'],

        ['field' => 'full_name',
        'label' => 'Full_name',
        'rules' => 'required'],

        ['field' => 'phone',
        'label' => 'Phone',
        'rules' => 'required'],

        ['field' => 'role',
        'label' => 'Role',
        'rules' => 'required'],

        ['field' => 'role',
        'label' => 'Role',
        'rules' => 'required'],

        ['field' => 'is_active',
        'label' => 'Is_active',
        'rules' => 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post(); //ambil data dari form
        $this->username     = $post["username"];
        $this->password     = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->email        = $post["email"];
        $this->full_name    = $post["full_name"];
        $this->phone        = $post["phone"];
        $this->role         = $post["role"];
        $this->photo        = $this->_uploadPhoto();
        $this->is_active    = $post["is_active"];
        return $this->db->insert($this->_table, $this); //simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_user      = $post["id"];
        $this->username     = $post["username"];
        $this->password     = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->email        = $post["email"];
        $this->full_name    = $post["full_name"];
        $this->phone        = $post["phone"];
        $this->role         = $post["role"];

        if (!empty($_FILES["photo"]["name"])) {
            $this->photo = $this->_uploadPhoto();
        }else{
            $this->photo = $post["old_image"];
        }

        $this->is_active    = $post["is_active"];
        return $this->db->update($this->_table, $this, array('id_user' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deletePhoto($id);
        return $this->db->delete($this->_table, array("id_user" => $id));
    }

    private function _uploadPhoto(){
        $config['upload_path']      = './upload/user/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['file_name']        = $this->full_name;
        $config['overwrite']        = true;
        $config['max_size']         = 1024; // 1mb
        // $config['max_width']        = 1024;
        // $config['max_heigth']       = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }

        print_r($this->upload->display_errors());
        // return "user_no_image.jpg";
    }

    private function _deletePhoto($id){
        $user = $this->getById($id);
        if ($user->photo != "user_no_image.jpg") {
            $filename = explode(".", $user->image)[0];
            return array_map('unlink', glob(FCPATH."upload/user/$filename.*"));
        }
    }

    public function doLogin(){
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"])
                ->or_where('username', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar 
        if($user){
            // periksa password-nya 
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa role-nya
            $isAdmin = $user->role == "admin";

            // jika passwordnya benar dan dia admin
            if($isPasswordTrue && $isAdmin){
                // login berhasil
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->id_user);
                return true;
                echo "<div class='alert alert-info'>Login berhasil</div>";

            }
        }

        // login gagal
        return false;
        echo "<div class='alert alert-danger'>Login gagal</div>";
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($id_user){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE id_user={$id_user}";
        $this->db->query($sql);
    }
}


?>