<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pejabat extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pejabat_model');
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
        $data['pejabat'] = $this->Pejabat_model->get_all_p($this->session->userdata['logged_in']['user_pd']);
        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['subjudul'] = 'Daftar Pegawai';
        $data['menu'] = 'Perangkat Daerah';
        $data['submenu'] = 'Daftar Pegawai';
        $data['_view'] = 'pejabat/index';
        $this->load->view('layouts/main',$data);
    }

    // /*
    //  * Adding a new user
    //  */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $this->form_validation->set_rules('nip_p', 'NIP', 'trim|required|callback_check_duplicate_nip['.$_POST["nip_p"].']');
            $this->form_validation->set_rules('nama_p', 'Nama Pejabat', 'trim|required');
            $this->form_validation->set_rules('jabat_p', 'Jabatan', 'trim|required');
            $this->form_validation->set_rules('email_p', 'Email Pejabat', 'trim|valid_email');
            $this->form_validation->set_message('check_duplicate_nip','{field} yang anda masukkan sudah dimiliki user lain!');
            $this->form_validation->set_message('valid_email','{field} tidak valid!');
            $this->form_validation->set_message('required','{field} harus diisi!');
            // if failed
            if ($this->form_validation->run() == FALSE) {
                // Send message to the view
                $data['success'] = FALSE;
                $data['message'] = "Periksa lagi isian yang anda masukkan.";
            // if succeed
            } else {
                $config['upload_path']          = './uploads/pd/pejabat/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = $this->session->userdata['logged_in']['ukuran_file_upload'];
                $config['overwrite']            = TRUE;
                // initialization of the photos data
                $user_photo = "";
                $data['success'] = TRUE;
                // upload foto Pejabat
                if (!empty($_FILES["foto_p"]["name"])) {
                    $config['file_name'] = $_POST["nip_p"];
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto_p')) {
                        $data['success'] = FALSE;
                        $data['message'] = "Unggah foto Pejabat gagal. Pastikan file foto sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                    } else {
                        $upload_data = $this->upload->data();
                        $user_photo = $upload_data['file_name'];
                    }
                }
                // if uploads are ok, load data to database
                if ($data['success']){
                    // save data to the database
                    $params = array(
                        'nip_p' => $this->input->post('nip_p'),
                        'nama_p' => $this->input->post('nama_p'),
                        'alamat_p' => $this->input->post('alamat_p'),
                        'email_p' => $this->input->post('email_p'),
                        'hp_p' => $this->input->post('hp_p'),
                        'jabat_p' => $this->input->post('jabat_p'),
                        'urutan_p' => $this->input->post('urutan_p'),
                        'pejabat_pd' => $this->session->userdata['logged_in']['user_pd'],
                        'kode_pd_asal' => $this->input->post('kode_pd_asal'),                        
                        'foto_p' => $user_photo,
                        'update_tgl' => date('Y-m-d H:i:s'),
                        'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                    );
                    $nip_p = $this->Pejabat_model->add_p($params);
                    $_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                    $data['message'] = "Penambahan data Pejabat baru berhasil. Silahkan menambahkan data yang lain atau <a href='".base_url('pejabat/index')."'>klik disini</a> untuk kembali ke daftar.";
                }
            }
        }
        // untuk pilihan PD
        $data_pd = $this->Pd_model->get_all_pd();
        $data['pd'] = array_column($data_pd, 'nama_pd','kode_pd');
        // ----------------
        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['subjudul'] = 'Tambah Pegawai';
        $data['menu'] = 'Perangkat Daerah';
        $data['submenu'] = 'Tambah Pegawai';
        $data['_view'] = 'pejabat/add';
        $this->load->view('layouts/main',$data);
    }
    // /*
    //  * Editing a user
    //  */
    function edit($nip_p)
    {
        // check if the user exists before trying to edit it
        $data['pejabat'] = $this->Pejabat_model->get_p($nip_p);
    
        if(isset($data['pejabat']['nip_p']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                //$this->form_validation->set_rules('nip_p', 'NIP', 'trim|required|callback_check_duplicate_nip['.$_POST["nip_p"].']');
                $this->form_validation->set_rules('nama_p', 'Nama Pejabat', 'trim|required');
                $this->form_validation->set_rules('jabat_p', 'Jabatan', 'trim|required');
                $this->form_validation->set_rules('email_p', 'Email Pejabat', 'trim|valid_email');
                $this->form_validation->set_message('check_duplicate_nip','{field} yang anda masukkan sudah dimiliki user lain!');
                $this->form_validation->set_message('valid_email','{field} tidak valid!');
                $this->form_validation->set_message('required','{field} harus diisi!');
                // if failed
                if ($this->form_validation->run() == FALSE) {
                    // Send message to the view
                    $data['success'] = FALSE;
                    $data['message'] = "Periksa lagi isian yang anda masukkan.";
                // if succeed
                } else {
                    $config['upload_path']          = './uploads/pd/pejabat/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = $this->session->userdata['logged_in']['ukuran_file_upload'];
                    $config['overwrite']            = TRUE;
                    // initialization of the photos data
                    $user_photo = "";
                    $data['success'] = TRUE;
                    // upload foto Pejabat
                    if (!empty($_FILES["foto_p"]["name"])) {
                        $config['file_name'] = $_POST["nip_p"];
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('foto_p')) {
                            $data['success'] = FALSE;
                            $data['message'] = "Unggah foto Pejabat gagal. Pastikan file foto sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                        } else {
                            $upload_data = $this->upload->data();
                            $user_photo = $upload_data['file_name'];
                        }
                    }
                    // if uploads are ok, load data to database
                    if ($data['success']){
                        // save data to the database
                        $params = array(
                            'nama_p' => $this->input->post('nama_p'),
                            'alamat_p' => $this->input->post('alamat_p'),
                            'email_p' => $this->input->post('email_p'),
                            'hp_p' => $this->input->post('hp_p'),
                            'jabat_p' => $this->input->post('jabat_p'),
                            'urutan_p' => $this->input->post('urutan_p'),
                            'pejabat_pd' => $this->session->userdata['logged_in']['user_pd'],
                            'kode_pd_asal' => $this->input->post('kode_pd_asal'),                        
                            'foto_p' => $user_photo,
                            'update_tgl' => date('Y-m-d H:i:s'),
                            'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                        );
                        $nip_p = $this->Pejabat_model->update_p($this->input->post('nip_p'),$params);
                        //$_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                        $data['pejabat'] = $this->Pejabat_model->get_p($nip_p);
                        $data['message'] = "Perubahan data Pejabat berhasil. Silahkan merubah data yang lain atau <a href='".base_url('pejabat/index')."'>klik disini</a> untuk kembali ke daftar.";
                    }
                }
            }
            // untuk pilihan PD
            $data_pd = $this->Pd_model->get_all_pd();
            $data['pd'] = array_column($data_pd, 'nama_pd','kode_pd');
            // ----------------
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Edit Pegawai';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Edit Pegawai';            
            $data['_view'] = 'pejabat/edit';
            $this->load->view('layouts/main',$data);
        }
        else
            show_error('The data you are trying to edit does not exist.');
    }
    
    function view($nip_p)
    {
        // check if the user exists before trying to edit it
        $data['pejabat'] = $this->Pejabat_model->get_p($nip_p);
    
        if(isset($data['pejabat']['nip_p']))
        {
            // untuk pilihan PD
            $data_pd = $this->Pd_model->get_all_pd();
            $data['pd'] = array_column($data_pd, 'nama_pd','kode_pd');
            // ----------------
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Tampil Pegawai';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Tampil Pegawai';
            $data['_view'] = 'pejabat/view';
            $this->load->view('layouts/main',$data);
        }
        else
            show_error('The data you are trying to edit does not exist.');
    }

    // /*
    //  * Deleting user
    //  */
    function remove($nip_p)
    {
        $pejabat = $this->Pejabat_model->get_p($nip_p);
    
        // check if the user exists before trying to delete it
        if(isset($pejabat['nip_p']))
        {
            $this->Pejabat_model->delete_p($nip_p);
            redirect('pejabat/index');
        }
        else
            show_error('The data you are trying to delete does not exist.');
    }
    
    // // Callback function untuk cek duplikasi userid
    public function check_duplicate_nip($nip) {

        return $this->Pejabat_model->check_duplicate($nip);

    }

}
