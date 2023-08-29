<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Realisasibtl extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pd_model');
        if (!isset($this->session->userdata['logged_in'])) {
            header("Location:" .base_url("login"));
        }         
    }

    /*
     * Listing of kegiatan
     */

    function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['pd'] = $this->Pd_model->get_pd($this->session->userdata['logged_in']['user_pd']);
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Daftar Realisasi Belanja Tidak Langsung';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Tidak Langsung';
            $data['submenu2'] = 'Daftar Realisasi BTL';
            $data['_view'] = 'realisasibtl/index';
            $this->load->view('layouts/main',$data);
        } else {
            header("Location:" .base_url("login"));
        }             
    }

    function edit()
    {
        if (isset($this->session->userdata['logged_in'])) {    
            // check if the kegiatan exists before trying to edit it
            $data['pd'] = $this->Pd_model->get_pd($this->session->userdata['logged_in']['user_pd']);
            if(isset($data['pd']['kode_pd']))
            {
                if(isset($_POST) && count($_POST) > 0)
                {
                    $data['success'] = TRUE;
                    $this->form_validation->set_rules('btl_rf_1', 'Realisasi Fisik Januari', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rf_2', 'Realisasi Fisik Februari', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rf_3', 'Realisasi Fisik Maret', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rf_4', 'Realisasi Fisik April', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rf_5', 'Realisasi Fisik Mei', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rf_6', 'Realisasi Fisik Juni', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rf_7', 'Realisasi Fisik Juli', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rf_8', 'Realisasi Fisik Agustus', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rf_9', 'Realisasi Fisik September', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rf_10', 'Realisasi Fisik Oktober', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rf_11', 'Realisasi Fisik November', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rf_12', 'Realisasi Fisik Desember', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_rk_1', 'Realisasi Keuangan Januari', 'trim|integer');
                    $this->form_validation->set_rules('btl_rk_2', 'Realisasi Keuangan Februari', 'trim|integer');
                    $this->form_validation->set_rules('btl_rk_3', 'Realisasi Keuangan Maret', 'trim|integer');
                    $this->form_validation->set_rules('btl_rk_4', 'Realisasi Keuangan April', 'trim|integer');
                    $this->form_validation->set_rules('btl_rk_5', 'Realisasi Keuangan Mei', 'trim|integer');
                    $this->form_validation->set_rules('btl_rk_6', 'Realisasi Keuangan Juni', 'trim|integer');
                    $this->form_validation->set_rules('btl_rk_7', 'Realisasi Keuangan Juli', 'trim|integer');
                    $this->form_validation->set_rules('btl_rk_8', 'Realisasi Keuangan Agustus', 'trim|integer');
                    $this->form_validation->set_rules('btl_rk_9', 'Realisasi Keuangan September', 'trim|integer');
                    $this->form_validation->set_rules('btl_rk_10', 'Realisasi Keuangan Oktober', 'trim|integer');
                    $this->form_validation->set_rules('btl_rk_11', 'Realisasi Keuangan November', 'trim|integer');
                    $this->form_validation->set_rules('btl_rk_12', 'Realisasi Keuangan Desember', 'trim|integer');
                    $this->form_validation->set_message('integer','Isian realisasi harus diisi dengan angka bulat!');
                    $this->form_validation->set_message('numeric','Isian realisasi harus diisi dengan angka desimal!');
                    $this->form_validation->set_message('greater_than_equal_to','Isian realisasi harus diisi dengan angka antara 0 sampai 100!');
                    $this->form_validation->set_message('less_than_equal_to','Isian realisasi harus diisi dengan angka antara 0 sampai 100!');
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
                                'btl_rf_1' => $this->input->post('btl_rf_1'),
                                'btl_rf_2' => $this->input->post('btl_rf_2'),
                                'btl_rf_3' => $this->input->post('btl_rf_3'),
                                'btl_rf_4' => $this->input->post('btl_rf_4'),
                                'btl_rf_5' => $this->input->post('btl_rf_5'),
                                'btl_rf_6' => $this->input->post('btl_rf_6'),
                                'btl_rf_7' => $this->input->post('btl_rf_7'),
                                'btl_rf_8' => $this->input->post('btl_rf_8'),
                                'btl_rf_9' => $this->input->post('btl_rf_9'),
                                'btl_rf_10' => $this->input->post('btl_rf_10'),
                                'btl_rf_11' => $this->input->post('btl_rf_11'),
                                'btl_rf_12' => $this->input->post('btl_rf_12'),
                                'btl_rk_1' => $this->input->post('btl_rk_1'),
                                'btl_rk_2' => $this->input->post('btl_rk_2'),
                                'btl_rk_3' => $this->input->post('btl_rk_3'),
                                'btl_rk_4' => $this->input->post('btl_rk_4'),
                                'btl_rk_5' => $this->input->post('btl_rk_5'),
                                'btl_rk_6' => $this->input->post('btl_rk_6'),
                                'btl_rk_7' => $this->input->post('btl_rk_7'),
                                'btl_rk_8' => $this->input->post('btl_rk_8'),
                                'btl_rk_9' => $this->input->post('btl_rk_9'),
                                'btl_rk_10' => $this->input->post('btl_rk_10'),
                                'btl_rk_11' => $this->input->post('btl_rk_11'),
                                'btl_rk_12' => $this->input->post('btl_rk_12'),                            
                                'update_tgl' => date('Y-m-d H:i:s'),
                                'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                            );
                            $this->Pd_model->update_pd($this->session->userdata['logged_in']['user_pd'],$params);
                            $data['pd'] = $this->Pd_model->get_pd($this->session->userdata['logged_in']['user_pd']);
                            $data['message'] = "Perubahan data berhasil. Silahkan merubah data yang lain atau <a href='".base_url('realisasibtl/index/')."'>klik disini</a> untuk kembali ke daftar.";
                        }
                    }
                }
                $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
                $data['subjudul'] = 'Daftar Realisasi Belanja Tidak Langsung';
                $data['menu'] = 'Perangkat Daerah';
                $data['submenu'] = 'Belanja Tidak Langsung';
                $data['submenu2'] = 'Edit Realisasi BTL';
                $data['_view'] = 'realisasibtl/edit';
                $this->load->view('layouts/main',$data);                
            }
            else
                show_error('The data you are trying to edit does not exist.');
        } else {
            header("Location:" .base_url("login"));
        } 
    }    
    
}
