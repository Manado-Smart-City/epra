<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profil extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users');
        if (!isset($this->session->userdata['logged_in'])) {
            header("Location:" .base_url("login"));
        }         
    }

    /*
     * Listing of pd
     */
    function index()
    {
        $data['judul'] = 'Profil';
        $data['subjudul'] = 'Data Akun Pengguna';
        $data['menu'] = 'Profil';
        $data['submenu'] = '';
        $data['_view'] = 'profil';
        $this->load->view('layouts/main',$data);
    }

    // Change Profile
    public function change_akun_user() {
        $this->form_validation->set_rules('user_name', 'Nama', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_message('required', 'Isian %s tidak boleh kosong!');
        $this->form_validation->set_message('valid_email', 'Format email tidak valid!');
        // if failed
        if ($this->form_validation->run() == FALSE) {
            // Send message to the view
            $data['judul'] = 'Profil';
            $data['subjudul'] = 'Data Akun Pengguna';
            $data['menu'] = 'Profil';
            $data['submenu'] = '';            
            $data['success'] = FALSE;
            $data['message'] = "Perubahan data akun user tidak berhasil. Silahkan coba lagi.";
            $data['_view'] = 'profil';
            $this->load->view('layouts/main',$data);
        // if succeed
        } else {
            // Update database
            $user_id = $this->input->post('user_id');
            $data_user = array(
                'user_name' => $this->input->post('user_name'),
                'user_email' => $this->input->post('user_email'),
            );
            $this->Users->update_user_data($user_id,$data_user);
            // Update session's data
            $session_data = array(
                'user_id' => $this->session->userdata['logged_in']['user_id'],
                'user_role' => $this->session->userdata['logged_in']['user_role'],
                'user_photo' => $this->session->userdata['logged_in']['user_photo'],
                'user_id' => $this->session->userdata['logged_in']['user_id'],
                'user_name' => $this->input->post('user_name'),
                'user_email' => $this->input->post('user_email'),
                'user_role' => $this->session->userdata['logged_in']['user_role'],
                'user_photo' => $this->session->userdata['logged_in']['user_photo'],
                'user_pd' => $this->session->userdata['logged_in']['user_pd'],
                'user_nama_pd' => $this->session->userdata['logged_in']['user_nama_pd'],
                'user_kode_prog_btl' => $this->session->userdata['logged_in']['user_kode_prog_btl'],
                'user_kode_giat_btl' => $this->session->userdata['logged_in']['user_kode_giat_btl'],
                'ukuran_file_upload' => $this->session->userdata['logged_in']['ukuran_file_upload'],
                'tahun_anggaran' => $this->session->userdata['logged_in']['tahun_anggaran'],                  
            );
            $this->session->set_userdata('logged_in', $session_data);            
            // Send message to the view
            $data['judul'] = 'Profil';
            $data['subjudul'] = 'Data Akun Pengguna';
            $data['menu'] = 'Profil';
            $data['submenu'] = '';            
            $data['success'] = TRUE;
            $data['message'] = "Perubahan data akun user berhasil.";
            $data['_view'] = 'profil';
            $this->load->view('layouts/main',$data);
        }
    }    

    public function change_password() {
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required|md5');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|matches[password_baru2]|md5');
        $this->form_validation->set_rules('password_baru2', 'Konfirmasi password', 'trim|required');
        $this->form_validation->set_message('required', 'Isian %s tidak boleh kosong!');
        $this->form_validation->set_message('matches', 'Isian password dan konfirmasinya tidak sama!');
        if ($this->form_validation->run() == FALSE) {
            // Send message to the view
            $data['judul'] = 'Profil';
            $data['subjudul'] = 'Data Akun Pengguna';
            $data['menu'] = 'Profil';
            $data['submenu'] = '';            
            $data['success'] = FALSE;
            $data['message'] = "Perubahan password user tidak berhasil. Pastikan kedua isian password baru sama. Silahkan coba lagi.";
            $data['_view'] = 'profil';
            $this->load->view('layouts/main',$data);
        } else {
            $user_id = $this->session->userdata['logged_in']['user_id'];
            $password_lama = $this->input->post('password_lama');
            # check rubah password
            if ($this->Users->check_user_password($user_id,$password_lama) == TRUE) {
                $data_user = array(
                    'user_password' => $this->input->post('password_baru')
                );
                $this->Users->update_user_data($user_id,$data_user);
                // Send message to the view
                $data['judul'] = 'Profil';
                $data['subjudul'] = 'Data Akun Pengguna';
                $data['menu'] = 'Profil';
                $data['submenu'] = '';            
                $data['success'] = TRUE;
                $data['message'] = "Perubahan password user berhasil.";
                $data['_view'] = 'profil';
                $this->load->view('layouts/main',$data);
            } else {
                // If failed, send message to the view
                $data['judul'] = 'Profil';
                $data['subjudul'] = 'Data Akun Pengguna';
                $data['menu'] = 'Profil';
                $data['submenu'] = '';            
                $data['success'] = FALSE;
                $data['message'] = "Perubahan password user tidak berhasil. Password lama tidak cocok. Silahkan coba lagi.";
                $data['_view'] = 'profil';
                $this->load->view('layouts/main',$data);
            }
        }
    }

    function upload_photo() {
        $config['upload_path'] = './resources/img/user_photos/';
        //$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '500';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $config['file_name']  = $user_id;
        $config['overwrite']  = TRUE;
        $this->upload->initialize($config);   
            //print_r($_FILES);
            //echo empty($_FILES["foto_bp"]["name"]);
            //exit();        
        if (!$this->upload->do_upload("user_photo")) {
            // Send message to the view
            $data['judul'] = 'Profil';
            $data['subjudul'] = 'Data Akun Pengguna';
            $data['menu'] = 'Profil';
            $data['submenu'] = '';            
            $data['success'] = FALSE;
            $data['message'] = "Unggah foto user tidak berhasil. Pastikan file foto sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
            $data['_view'] = 'profil';
            $this->load->view('layouts/main',$data);
        } else {
            // Update the database
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];
            $data_user = array(
                'user_photo' => $file_name
            );
            $this->Users->update_user_data($user_id,$data_user);
            // Update session's data
            $session_data = array(
                'user_id' => $this->session->userdata['logged_in']['user_id'],
                'user_name' => $this->session->userdata['logged_in']['user_name'],
                'user_email' => $this->session->userdata['logged_in']['user_email'],
                'user_role' => $this->session->userdata['logged_in']['user_role'],
                'user_photo' => $file_name, // update this one
                'user_pd' => $this->session->userdata['logged_in']['user_pd'],
                'user_nama_pd' => $this->session->userdata['logged_in']['user_nama_pd'],
                'user_kode_prog_btl' => $this->session->userdata['logged_in']['user_kode_prog_btl'],
                'user_kode_giat_btl' => $this->session->userdata['logged_in']['user_kode_giat_btl'],
                'ukuran_file_upload' => $this->session->userdata['logged_in']['ukuran_file_upload'],
                'tahun_anggaran' => $this->session->userdata['logged_in']['tahun_anggaran'],              
            );
            $this->session->set_userdata('logged_in', $session_data);              
            // Send message to the view
            $data['judul'] = 'Profil';
            $data['subjudul'] = 'Data Akun Pengguna';
            $data['menu'] = 'Profil';
            $data['submenu'] = '';            
            $data['success'] = TRUE;
            $data['message'] = "Unggah foto user berhasil. Refresh browser anda untuk melihat perubahan.";
            $data['_view'] = 'profil';
            $this->load->view('layouts/main',$data);
        }
    }    

}
