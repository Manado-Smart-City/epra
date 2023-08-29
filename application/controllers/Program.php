<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Program extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Program_model');
        //$this->output->enable_profiler(TRUE);
        if (!isset($this->session->userdata['logged_in'])) {
            header("Location:" .base_url("login"));
        }         
    }

    /*
     * Listing of program
     */
    function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $bulan_ini = $this->session->userdata['logged_in']['bulan_ini'];
            $data['program'] = $this->Program_model->get_all_program($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_prog_btl'],$bulan_ini);
            $data['total_program'] = $this->Program_model->get_all_program_total($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_prog_btl'],$bulan_ini);
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Daftar Program';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Daerah';            
            $data['submenu2'] = 'Daftar Program';            
            $data['_view'] = 'program/index';
            $this->load->view('layouts/main',$data);
        } else {
            header("Location:" .base_url("login"));
        }        
    }

    /*
     * Adding a new program
     */
    function add()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if(isset($_POST) && count($_POST) > 0)
            {
                $data['success'] = TRUE;
                $this->form_validation->set_rules('kode_prog', 'Kode Program', 'trim|required|callback_check_duplicate_programid['.$_POST["kode_prog"].']');
                $this->form_validation->set_rules('nama_prog', 'Nama Program', 'trim|required');
                $this->form_validation->set_message('check_duplicate_programid','{field} yang anda masukkan sudah pernah dimasukkan!');
                $this->form_validation->set_message('required','{field} harus diisi!');
                // if failed
                if ($this->form_validation->run() == FALSE) {
                    // Send message to the view
                    $data['success'] = FALSE;
                    $data['message'] = "Periksa lagi isian yang anda masukkan.";
                // if succeed
                } else {
                    if ($data['success']){
                        // save data to the database
                        $params = array(
                            'kode_prog' => $this->input->post('kode_prog'),
                            'nama_prog' => $this->input->post('nama_prog'),
                            'kode_pd' => $this->session->userdata['logged_in']['user_pd'],
                            'update_tgl' => date('Y-m-d H:i:s'),
                            'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                        );
                        $kode_prog = $this->Program_model->add_program($params);
                        $_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                        $data['message'] = "Penambahan data baru berhasil. Silahkan menambahkan data yang lain atau <a href='".base_url('program/index/')."'>klik disini</a> untuk kembali ke daftar.";
                    }
                }
            }
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Tambah Program';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Langsung';            
            $data['submenu2'] = 'Tambah Program'; 
            $data['_view'] = 'program/add';
            $this->load->view('layouts/main',$data);
        } else {
            header("Location:" .base_url("login"));
        } 
    }
    /*
     * Editing a program
     */
    function edit($kode_prog)
    {
        if (isset($this->session->userdata['logged_in'])) {
            // check if the program exists before trying to edit it
            $data['program'] = $this->Program_model->get_program($kode_prog);

            if(isset($data['program']['kode_prog']))
            {
                if(isset($_POST) && count($_POST) > 0)
                {
                    $data['success'] = TRUE;
                    $this->form_validation->set_rules('nama_prog', 'Nama Program', 'trim|required');
                    $this->form_validation->set_message('check_duplicate_programid','{field} yang anda masukkan sudah pernah dimasukkan!');
                    $this->form_validation->set_message('required','{field} harus diisi!');
                    // if failed
                    if ($this->form_validation->run() == FALSE) {
                        // Send message to the view
                        $data['success'] = FALSE;
                        $data['message'] = "Periksa lagi isian yang anda masukkan.";
                    // if succeed
                    } else {
                        if ($data['success']){
                            // save data to the database
                            $params = array(
                                'nama_prog' => $this->input->post('nama_prog'),
                                'kode_pd' => $this->session->userdata['logged_in']['user_pd'],
                                'update_tgl' => date('Y-m-d H:i:s'),
                                'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                            );
                            $this->Program_model->update_program($kode_prog,$params);
                            $data['program'] = $this->Program_model->get_program($kode_prog); // get data yang sudah terupdate
                            //$_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                            $data['message'] = "Perubahan data berhasil. Silahkan menambahkan data yang lain atau <a href='".base_url('program/index/')."'>klik disini</a> untuk kembali ke daftar.";
                        }
                    }
                }
                $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
                $data['subjudul'] = 'Edit Program';
                $data['menu'] = 'Perangkat Daerah';
                $data['submenu'] = 'Belanja Langsung';                            
                $data['submenu2'] = 'Edit Program';
                $data['_view'] = 'program/edit';
                $this->load->view('layouts/main',$data);
            }
            else
                show_error('The data you are trying to edit does not exist.');
        } else {
            header("Location:" .base_url("login"));
        }             
    }

    /*
     * Deleting program
     */
    function remove($kode_prog)
    {
        if (isset($this->session->userdata['logged_in'])) {
            $program = $this->Program_model->get_program($kode_prog);

            // check if the program exists before trying to delete it
            if(isset($program['kode_prog']))
            {
                $this->Program_model->delete_program($kode_prog);
                redirect('program/index');
            }
            else
                show_error('The data you are trying to delete does not exist.');
        } else {
            header("Location:" .base_url("login"));
        }         
    }

    function view($kode_prog)
    {
        if (isset($this->session->userdata['logged_in'])) {
            // check if the program exists before trying to edit it
            $data['program'] = $this->Program_model->get_program($kode_prog);

            if(isset($data['program']['kode_prog']))
            {
                $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
                $data['subjudul'] = 'Tampil Program';
                $data['menu'] = 'Perangkat Daerah';
                $data['submenu'] = 'Belanja Langsung';            
                $data['submenu2'] = 'Tampil Program';
                $data['_view'] = 'program/view';
                $this->load->view('layouts/main',$data);
            }
            else
                show_error('The data you are trying to view does not exist.');
        } else {
            header("Location:" .base_url("login"));
        }              
    }

    // Callback function untuk cek duplikasi kode_prog
    public function check_duplicate_programid($kode_prog) {
        return $this->Program_model->check_duplicate($kode_prog);
    }

}
