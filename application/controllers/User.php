<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Pd_model');
        if (!isset($this->session->userdata['logged_in'])) {
            header("Location:" .base_url("login"));
        }         
    }

    /*
     * Listing of user
     */
    function index()
    {
        $data['user'] = $this->User_model->get_all_user();
        $data['judul'] = 'Akun Pengguna';
        $data['subjudul'] = 'Daftar Akun';
        $data['menu'] = 'Pengaturan';
        $data['submenu'] = 'Akun Pengguna';
        $data['submenu2'] = 'Daftar Akun';
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new user
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $this->form_validation->set_rules('user_id', 'UserID', 'trim|required|callback_check_duplicate_userid['.$_POST["user_id"].']');
            $this->form_validation->set_rules('user_name', 'Nama User', 'trim|required');
            $this->form_validation->set_rules('user_password', 'Password User', 'trim|required|md5');
            $this->form_validation->set_rules('user_email', 'Email User', 'trim|valid_email');
            $this->form_validation->set_message('check_duplicate_userid','{field} yang anda masukkan sudah dimiliki user lain!');
            $this->form_validation->set_message('valid_email','{field} tidak valid!');
            $this->form_validation->set_message('required','{field} harus diisi!');
            // if failed
            if ($this->form_validation->run() == FALSE) {
                // Send message to the view
                $data['success'] = FALSE;
                $data['message'] = "Periksa lagi isian yang anda masukkan.";
            // if succeed
            } else {
                $config['upload_path']          = './resources/img/user_photos/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 500;
                $config['overwrite']            = TRUE;
                // initialization of the photos data
                $user_photo = "";
                $data['success'] = TRUE;
                // upload foto PA
                if (!empty($_FILES["user_photo"]["name"])) {
                    $config['file_name'] = $_POST["user_id"];
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('user_photo')) {
                        $data['success'] = FALSE;
                        $data['message'] = "Unggah foto user gagal. Pastikan file foto sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                    } else {
                        $upload_data = $this->upload->data();
                        $user_photo = $upload_data['file_name'];
                    }
                }
                // if uploads are ok, load data to database
                if ($data['success']){
                    // save data to the database
                    $params = array(
                        'user_id' => $this->input->post('user_id'),
                        'user_name' => $this->input->post('user_name'),
                        'user_email' => $this->input->post('user_email'),
                        'user_hp' => $this->input->post('user_hp'),
                        'user_password' => $this->input->post('user_password'),
                        'user_status' => $this->input->post('user_status'),
                        'user_role' => $this->input->post('user_role'),
                        'user_pd' => $this->input->post('user_pd'),
                        'user_photo' => $user_photo,
                        'update_tgl' => date('Y-m-d H:i:s'),
                        'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                    );
                    $user_id = $this->User_model->add_user($params);
                    $_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                    $data['message'] = "Penambahan User baru berhasil. Silahkan menambahkan User yang lain atau <a href='".base_url('user')."'>klik disini</a> untuk kembali ke daftar.";
                }
            }
        }
        // untuk pilihan PD
        $data_pd = $this->Pd_model->get_all_pd();
        $data['pd'] = array_column($data_pd, 'nama_pd','kode_pd');
        // ----------------
        $data['judul'] = 'Akun Pengguna';
        $data['subjudul'] = 'Daftar Akun';
        $data['menu'] = 'Pengaturan';
        $data['submenu'] = 'Akun Pengguna';
        $data['submenu2'] = 'Tambah Akun';
        $data['_view'] = 'user/add';
        $this->load->view('layouts/main',$data);

    }
    /*
     * Editing a user
     */
    function edit($user_id)
    {
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($user_id);

        if(isset($data['user']['user_id']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $this->form_validation->set_rules('user_name', 'Nama User', 'trim|required');
                //$this->form_validation->set_rules('user_password', 'Password User', 'trim|required|md5');
                $this->form_validation->set_rules('user_email', 'Email User', 'trim|valid_email');
                $this->form_validation->set_message('valid_email','{field} tidak valid!');
                $this->form_validation->set_message('required','{field} harus diisi!');
                // if failed
                if ($this->form_validation->run() == FALSE) {
                    // Send message to the view
                    $data['success'] = FALSE;
                    $data['message'] = "Periksa lagi isian yang anda masukkan.";
                // if succeed
                } else {
                    $config['upload_path']          = './resources/img/user_photos/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 1000;
                    $config['overwrite']            = TRUE;
                    // initialization of the photos data
                    $data['user'] = $this->User_model->get_user($user_id); // get data saat ini
                    $user_photo = $data['user']['user_photo'];
                    $data['success'] = TRUE;

                    // upload foto PA
                    if (!empty($_FILES["user_photo"]["name"])) {
                        $config['file_name'] = $_POST["user_id"];
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('user_photo')) {
                            $data['success'] = FALSE;
                            $data['message'] = "Unggah foto User gagal. Pastikan file foto sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                        } else {
                            $upload_data = $this->upload->data();
                            $user_photo = $upload_data['file_name'];
                        }
                    }
                    // if uploads are ok, load data to database
                    if ($data['success']){
                        // save data to the database
                        $params = array(
                          'user_name' => $this->input->post('user_name'),
                          'user_email' => $this->input->post('user_email'),
                          'user_hp' => $this->input->post('user_hp'),
                          'user_status' => $this->input->post('user_status'),
                          'user_role' => $this->input->post('user_role'),
                          'user_pd' => $this->input->post('user_pd'),
                          'user_photo' => $user_photo,
                          'update_tgl' => date('Y-m-d H:i:s'),
                          'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                        );
                        $this->User_model->update_user($user_id,$params);
                        $data['user'] = $this->User_model->get_user($user_id); // get data yang sudah terupdate
                        //$_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                        $data['message'] = "Perubahan data berhasil. Silahkan melakukan perubahan data lagi  atau <a href='".base_url('user')."'>klik disini</a> untuk kembali ke daftar.";
                    }
                }
            }
            // untuk pilihan PD
            $data_pd = $this->Pd_model->get_all_pd();
            $data['pd'] = array_column($data_pd, 'nama_pd','kode_pd');
            // ----------------
            $data['judul'] = 'Akun Pengguna';
            $data['subjudul'] = 'Daftar Akun';
            $data['menu'] = 'Pengaturan';
            $data['submenu'] = 'Akun Pengguna';
            $data['submenu2'] = 'Edit Akun';
            $data['_view'] = 'user/edit';
            $this->load->view('layouts/main',$data);
        }
        else
            show_error('The data you are trying to edit does not exist.');
    }

    /*
     * Deleting user
     */
    function remove($user_id)
    {
        $user = $this->User_model->get_user($user_id);

        // check if the user exists before trying to delete it
        if(isset($user['user_id']))
        {
            $this->User_model->delete_user($user_id);
            redirect('user/index');
        }
        else
            show_error('The data you are trying to delete does not exist.');
    }

    function view($user_id)
    {
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($user_id);

        if(isset($data['user']['user_id']))
        {
            // untuk pilihan PD
            $data_pd = $this->Pd_model->get_all_pd();
            $data['pd'] = array_column($data_pd, 'nama_pd','kode_pd');
            // ----------------
            $data['judul'] = 'Akun Pengguna';
            $data['subjudul'] = 'Daftar Akun';
            $data['menu'] = 'Pengaturan';
            $data['submenu'] = 'Akun Pengguna';
            $data['submenu2'] = 'Tampil Akun';
            $data['_view'] = 'user/view';
            $this->load->view('layouts/main',$data);
        }
        else
            show_error('The data you are trying to view does not exist.');
    }

    // Callback function untuk cek duplikasi userid
    public function check_duplicate_userid($user_id) {

        return $this->User_model->check_duplicate($user_id);

    }

}
