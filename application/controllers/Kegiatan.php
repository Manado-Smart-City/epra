<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kegiatan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model');
        $this->load->model('Program_model');
        $this->load->model('Pejabat_model');
        //$this->output->enable_profiler(TRUE);
    }

    /*
     * Listing of kegiatan
     */

    function index($kode_prog = "")
    {
        if (isset($this->session->userdata['logged_in'])) {
            $bulan_ini = $this->session->userdata['logged_in']['bulan_ini'];
            $data['program'] = $this->Program_model->get_program($kode_prog);
            $data['kegiatan'] = $this->Kegiatan_model->get_all_kegiatan($kode_prog,$bulan_ini);
            $data['jumlah_kegiatan'] = count($data['kegiatan']);
            $data['total_kegiatan'] = $this->Kegiatan_model->get_all_kegiatan_total($kode_prog,$bulan_ini);            
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Daftar Sub Kegiatan';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Daerah';
            $data['submenu2'] = 'Daftar Sub Kegiatan';
            $data['_view'] = 'kegiatan/index';
            $this->load->view('layouts/main',$data);
        } else {
            header("Location:" .base_url("login"));
        }     
    }

    /*
     * Adding a new kegiatan
     */
    function add($kode_prog = "")
    {
        if (isset($this->session->userdata['logged_in'])) {    
            $data['pejabat'] = $this->Pejabat_model->get_all_p($this->session->userdata['logged_in']['user_pd']);
            if(isset($_POST) && count($_POST) > 0)
            {
                $data['success'] = TRUE;
                $this->form_validation->set_rules('kode_giat', 'Kode kegiatan', 'trim|required|callback_check_duplicate_kegiatanid['.$_POST["kode_giat"].']');
                $this->form_validation->set_rules('nama_giat', 'Nama kegiatan', 'trim|required');
                //$this->form_validation->set_rules('pagu_giat', 'Pagu kegiatan', 'trim|required|integer');
                $this->form_validation->set_message('check_duplicate_kegiatanid','{field} yang anda masukkan sudah pernah dimasukkan!');
                $this->form_validation->set_message('required','{field} harus diisi!');
                $this->form_validation->set_message('integer','{field} harus diisi dengan angka!');
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
                            'kode_giat' => $this->input->post('kode_giat'),
                            'nama_giat' => $this->input->post('nama_giat'),
                            'kode_prog' => $this->input->post('kode_prog'),
                            'nip_pptk' => $this->input->post('nip_pptk'),
                            'sumber_dana' => $this->input->post('sumber_dana'),
                            'update_tgl' => date('Y-m-d H:i:s'),
                            'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                        );
                        $kode_giat = $this->Kegiatan_model->add_kegiatan($params);
                        $_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                        $data['message'] = "Penambahan data baru berhasil. Silahkan menambahkan data yang lain atau <a href='".base_url('kegiatan/index/'.$kode_prog)."'>klik disini</a> untuk kembali ke daftar.";
                    }
                }
            }
            $data['kode_prog'] = $kode_prog;
            $data['program'] = $this->Program_model->get_program($kode_prog);
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Tambah Sub Kegiatan';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Daerah';
            $data['submenu2'] = 'Tambah Sub Kegiatan';
            $data['_view'] = 'kegiatan/add';
            $this->load->view('layouts/main',$data);
        } else {
            header("Location:" .base_url("login"));
        }             
    }
    /*
     * Editing a kegiatan
     */
    function edit($kode_giat = "")
    {
        if (isset($this->session->userdata['logged_in'])) {        
            // check if the kegiatan exists before trying to edit it
            $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($kode_giat);
            $data['pejabat'] = $this->Pejabat_model->get_all_p($this->session->userdata['logged_in']['user_pd']);

            if(isset($data['kegiatan']['kode_giat']))
            {
                if(isset($_POST) && count($_POST) > 0)
                {
                    $data['success'] = TRUE;
                    $this->form_validation->set_rules('nama_giat', 'Nama Kegiatan', 'trim|required');
                    $this->form_validation->set_message('check_duplicate_kegiatanid','{field} yang anda masukkan sudah pernah dimasukkan!');
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
                                'nama_giat' => $this->input->post('nama_giat'),
                                'nip_pptk' => $this->input->post('nip_pptk'),
                                'sumber_dana' => $this->input->post('sumber_dana'),
                                'update_tgl' => date('Y-m-d H:i:s'),
                                'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                            );
                            $this->Kegiatan_model->update_kegiatan($kode_giat,$params);
                            $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($kode_giat); // get data yang sudah terupdate
                            $data['message'] = "Perubahan data berhasil. Silahkan menambahkan data yang lain atau <a href='".base_url('kegiatan/index/'.$data['kegiatan']['kode_prog'])."'>klik disini</a> untuk kembali ke daftar.";
                        }
                    }
                }
                $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']);
                $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
                $data['subjudul'] = 'Edit Kegiatan';
                $data['menu'] = 'Perangkat Daerah';
                $data['submenu'] = 'Belanja Daerah';
                $data['submenu2'] = 'Edit Kegiatan';
                $data['_view'] = 'kegiatan/edit';
                $this->load->view('layouts/main',$data);
            }
            else
                show_error('The data you are trying to edit does not exist.');
        } else {
            header("Location:" .base_url("login"));
        }         
    }

    /*
     * Deleting kegiatan
     */
    function remove($kode_giat = "")
    {
        if (isset($this->session->userdata['logged_in'])) {            
            $kegiatan = $this->Kegiatan_model->get_kegiatan($kode_giat);

            // check if the kegiatan exists before trying to delete it
            if(isset($kegiatan['kode_giat']))
            {
                $this->Kegiatan_model->delete_kegiatan($kode_giat);
                redirect('kegiatan/index/'.$kegiatan['kode_prog']);
            }
            else
                show_error('The data you are trying to delete does not exist.');
        } else {
            header("Location:" .base_url("login"));
        }             
    }

    function view($kode_giat = "")
    {
        if (isset($this->session->userdata['logged_in'])) {            
            // check if the kegiatan exists before trying to edit it
            $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($kode_giat);

            if(isset($data['kegiatan']['kode_giat']))
            {
                $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']);
                $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
                $data['subjudul'] = 'Tampil Sub Kegiatan';
                $data['menu'] = 'Perangkat Daerah';
                $data['submenu'] = 'Belanja Daerah';
                $data['submenu2'] = 'Tampil Sub Kegiatan';
                $data['_view'] = 'kegiatan/view';
                $this->load->view('layouts/main',$data);
            }
            else
                show_error('The data you are trying to view does not exist.');
        } else {
            header("Location:" .base_url("login"));
        }         
    }

    // Callback function untuk cek duplikasi kode_giat
    public function check_duplicate_kegiatanid($kode_giat) {
        return $this->Kegiatan_model->check_duplicate($kode_giat);
    }

}
