<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Targetbtl extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pd_model');
        $this->load->model('Belanja_model');
        if (!isset($this->session->userdata['logged_in'])) {
            header("Location:" .base_url("login"));
        }         
        //$this->output->enable_profiler(TRUE);
    }

    /*
     * Listing of kegiatan
     */

    function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['pd'] = $this->Pd_model->get_pd($this->session->userdata['logged_in']['user_pd']);
            $data['total_anggaran_btl'] = $this->Belanja_model->get_all_total_anggaran_btl_pd($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_prog_btl']);
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Daftar Target Belanja Tidak Langsung';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Tidak Langsung';
            $data['submenu2'] = 'Daftar Target BTL';
            $data['_view'] = 'targetbtl/index';
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
            $data['total_anggaran_btl'] = $this->Belanja_model->get_all_total_anggaran_btl_pd($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_prog_btl']);
            if(isset($data['pd']['kode_pd']))
            {
                if(isset($_POST) && count($_POST) > 0)
                {
                    $data['success'] = TRUE;
                    $this->form_validation->set_rules('btl_tf_1', 'Target Fisik Januari', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tf_2', 'Target Fisik Februari', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tf_3', 'Target Fisik Maret', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tf_4', 'Target Fisik April', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tf_5', 'Target Fisik Mei', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tf_6', 'Target Fisik Juni', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tf_7', 'Target Fisik Juli', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tf_8', 'Target Fisik Agustus', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tf_9', 'Target Fisik September', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tf_10', 'Target Fisik Oktober', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tf_11', 'Target Fisik November', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tf_12', 'Target Fisik Desember', 'trim|greater_than_equal_to[0]|less_than_equal_to[100]');
                    // permintaan eton tgl 12 Juli
                    $this->form_validation->set_rules('btl_tk_1', 'Target Keuangan Januari', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tk_2', 'Target Keuangan Februari', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tk_3', 'Target Keuangan Maret', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tk_4', 'Target Keuangan April', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tk_5', 'Target Keuangan Mei', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tk_6', 'Target Keuangan Juni', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tk_7', 'Target Keuangan Juli', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tk_8', 'Target Keuangan Agustus', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tk_9', 'Target Keuangan September', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tk_10', 'Target Keuangan Oktober', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tk_11', 'Target Keuangan November', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('btl_tk_12', 'Target Keuangan Desember', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');

                    // $this->form_validation->set_rules('btl_tk_1', 'Target Keuangan Januari', 'trim|integer');
                    // $this->form_validation->set_rules('btl_tk_2', 'Target Keuangan Februari', 'trim|integer');
                    // $this->form_validation->set_rules('btl_tk_3', 'Target Keuangan Maret', 'trim|integer');
                    // $this->form_validation->set_rules('btl_tk_4', 'Target Keuangan April', 'trim|integer');
                    // $this->form_validation->set_rules('btl_tk_5', 'Target Keuangan Mei', 'trim|integer');
                    // $this->form_validation->set_rules('btl_tk_6', 'Target Keuangan Juni', 'trim|integer');
                    // $this->form_validation->set_rules('btl_tk_7', 'Target Keuangan Juli', 'trim|integer');
                    // $this->form_validation->set_rules('btl_tk_8', 'Target Keuangan Agustus', 'trim|integer');
                    // $this->form_validation->set_rules('btl_tk_9', 'Target Keuangan September', 'trim|integer');
                    // $this->form_validation->set_rules('btl_tk_10', 'Target Keuangan Oktober', 'trim|integer');
                    // $this->form_validation->set_rules('btl_tk_11', 'Target Keuangan November', 'trim|integer');
                    // $this->form_validation->set_rules('btl_tk_12', 'Target Keuangan Desember', 'trim|integer');
                    // $this->form_validation->set_message('integer','Isian target harus diisi dengan angka!');
                    $this->form_validation->set_message('greater_than_equal_to','Isian target harus diisi dengan angka antara 0 sampai 100!');
                    $this->form_validation->set_message('less_than_equal_to','Isian target harus diisi dengan angka antara 0 sampai 100!');
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
                                'btl_tf_1' => $this->input->post('btl_tf_1'),
                                'btl_tf_2' => $this->input->post('btl_tf_2'),
                                'btl_tf_3' => $this->input->post('btl_tf_3'),
                                'btl_tf_4' => $this->input->post('btl_tf_4'),
                                'btl_tf_5' => $this->input->post('btl_tf_5'),
                                'btl_tf_6' => $this->input->post('btl_tf_6'),
                                'btl_tf_7' => $this->input->post('btl_tf_7'),
                                'btl_tf_8' => $this->input->post('btl_tf_8'),
                                'btl_tf_9' => $this->input->post('btl_tf_9'),
                                'btl_tf_10' => $this->input->post('btl_tf_10'),
                                'btl_tf_11' => $this->input->post('btl_tf_11'),
                                'btl_tf_12' => $this->input->post('btl_tf_12'),
                                'btl_tk_1' => (($this->input->post('btl_tk_1') / 100) * $data["total_anggaran_btl"]),
                                'btl_tk_2' => (($this->input->post('btl_tk_2') / 100) * $data["total_anggaran_btl"]),
                                'btl_tk_3' => (($this->input->post('btl_tk_3') / 100) * $data["total_anggaran_btl"]),
                                'btl_tk_4' => (($this->input->post('btl_tk_4') / 100) * $data["total_anggaran_btl"]),
                                'btl_tk_5' => (($this->input->post('btl_tk_5') / 100) * $data["total_anggaran_btl"]),
                                'btl_tk_6' => (($this->input->post('btl_tk_6') / 100) * $data["total_anggaran_btl"]),
                                'btl_tk_7' => (($this->input->post('btl_tk_7') / 100) * $data["total_anggaran_btl"]),
                                'btl_tk_8' => (($this->input->post('btl_tk_8') / 100) * $data["total_anggaran_btl"]),
                                'btl_tk_9' => (($this->input->post('btl_tk_9') / 100) * $data["total_anggaran_btl"]),
                                'btl_tk_10' => (($this->input->post('btl_tk_10') / 100) * $data["total_anggaran_btl"]),
                                'btl_tk_11' => (($this->input->post('btl_tk_11') / 100) * $data["total_anggaran_btl"]),
                                'btl_tk_12' => (($this->input->post('btl_tk_12') / 100) * $data["total_anggaran_btl"]),                                 
                                // 'btl_tk_1' => $this->input->post('btl_tk_1'),
                                // 'btl_tk_2' => $this->input->post('btl_tk_2'),
                                // 'btl_tk_3' => $this->input->post('btl_tk_3'),
                                // 'btl_tk_4' => $this->input->post('btl_tk_4'),
                                // 'btl_tk_5' => $this->input->post('btl_tk_5'),
                                // 'btl_tk_6' => $this->input->post('btl_tk_6'),
                                // 'btl_tk_7' => $this->input->post('btl_tk_7'),
                                // 'btl_tk_8' => $this->input->post('btl_tk_8'),
                                // 'btl_tk_9' => $this->input->post('btl_tk_9'),
                                // 'btl_tk_10' => $this->input->post('btl_tk_10'),
                                // 'btl_tk_11' => $this->input->post('btl_tk_11'),
                                // 'btl_tk_12' => $this->input->post('btl_tk_12'),                            
                                'update_tgl' => date('Y-m-d H:i:s'),
                                'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                            );
                            $this->Pd_model->update_pd($this->session->userdata['logged_in']['user_pd'],$params);
                            $data['pd'] = $this->Pd_model->get_pd($this->session->userdata['logged_in']['user_pd']);
                            $data['message'] = "Perubahan data berhasil. Silahkan merubah data yang lain atau <a href='".base_url('targetbtl/index/')."'>klik disini</a> untuk kembali ke daftar.";
                        }
                    }
                }

                // konversi doi jadi persen untuk Keuangan
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_1"]  = ( $data["pd"]["btl_tk_1"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_1"]  = 0;
                }
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_2"]  = ( $data["pd"]["btl_tk_2"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_2"]  = 0;
                }
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_3"]  = ( $data["pd"]["btl_tk_3"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_3"]  = 0;
                }
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_4"]  = ( $data["pd"]["btl_tk_4"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_4"]  = 0;
                }
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_5"]  = ( $data["pd"]["btl_tk_5"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_5"]  = 0;
                }
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_6"]  = ( $data["pd"]["btl_tk_6"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_6"]  = 0;
                }
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_7"]  = ( $data["pd"]["btl_tk_7"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_7"]  = 0;
                }
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_8"]  = ( $data["pd"]["btl_tk_8"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_8"]  = 0;
                }
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_9"]  = ( $data["pd"]["btl_tk_9"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_9"]  = 0;
                }
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_10"]  = ( $data["pd"]["btl_tk_10"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_10"] = 0;
                }
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_11"]  = ( $data["pd"]["btl_tk_11"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_11"] = 0;
                }
                if ($data["total_anggaran_btl"] > 0) {
                    $data["pd"]["btl_tk_12"]  = ( $data["pd"]["btl_tk_12"] / $data["total_anggaran_btl"] ) * 100;
                } else {
                    $data["pd"]["btl_tk_12"] = 0;
                }  

                $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
                $data['subjudul'] = 'Daftar Target Belanja Tidak Langsung';
                $data['menu'] = 'Perangkat Daerah';
                $data['submenu'] = 'Belanja Tidak Langsung';
                $data['submenu2'] = 'Edit Target BTL';
                $data['_view'] = 'targetbtl/edit';
                $this->load->view('layouts/main',$data);                
            }
            else
                show_error('The data you are trying to edit does not exist.');
        } else {
            header("Location:" .base_url("login"));
        } 
    }    
    
}
