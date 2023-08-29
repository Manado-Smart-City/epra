<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Target extends CI_Controller{
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
            $data['total_anggaran_bl'] = $this->Belanja_model->get_all_total_anggaran_bl_pd($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_prog_btl']);

            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Daftar Target Belanja Daerah';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Daerah';
            $data['submenu2'] = 'Daftar Target Belanja Daerah';
            $data['_view'] = 'target/index';
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
            $data['total_anggaran_bl'] = $this->Belanja_model->get_all_total_anggaran_bl_pd($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_prog_btl']);
            if(isset($data['pd']['kode_pd']))
            {
                if(isset($_POST) && count($_POST) > 0)
                {
                    $data['success'] = TRUE;
                    // fisik
                    $this->form_validation->set_rules('tf_1', 'Target Fisik Januari', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tf_2', 'Target Fisik Februari', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tf_3', 'Target Fisik Maret', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tf_4', 'Target Fisik April', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tf_5', 'Target Fisik Mei', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tf_6', 'Target Fisik Juni', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tf_7', 'Target Fisik Juli', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tf_8', 'Target Fisik Agustus', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tf_9', 'Target Fisik September', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tf_10', 'Target Fisik Oktober', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tf_11', 'Target Fisik November', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tf_12', 'Target Fisik Desember', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    // permintaan eton tgl 12 Juli
                    $this->form_validation->set_rules('tk_1', 'Target Keuangan Januari', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tk_2', 'Target Keuangan Februari', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tk_3', 'Target Keuangan Maret', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tk_4', 'Target Keuangan April', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tk_5', 'Target Keuangan Mei', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tk_6', 'Target Keuangan Juni', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tk_7', 'Target Keuangan Juli', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tk_8', 'Target Keuangan Agustus', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tk_9', 'Target Keuangan September', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tk_10', 'Target Keuangan Oktober', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tk_11', 'Target Keuangan November', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
                    $this->form_validation->set_rules('tk_12', 'Target Keuangan Desember', 'trim|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');

                    // $this->form_validation->set_rules('tk_1', 'Target Keuangan Januari', 'trim|integer');
                    // $this->form_validation->set_rules('tk_2', 'Target Keuangan Februari', 'trim|integer');
                    // $this->form_validation->set_rules('tk_3', 'Target Keuangan Maret', 'trim|integer');
                    // $this->form_validation->set_rules('tk_4', 'Target Keuangan April', 'trim|integer');
                    // $this->form_validation->set_rules('tk_5', 'Target Keuangan Mei', 'trim|integer');
                    // $this->form_validation->set_rules('tk_6', 'Target Keuangan Juni', 'trim|integer');
                    // $this->form_validation->set_rules('tk_7', 'Target Keuangan Juli', 'trim|integer');
                    // $this->form_validation->set_rules('tk_8', 'Target Keuangan Agustus', 'trim|integer');
                    // $this->form_validation->set_rules('tk_9', 'Target Keuangan September', 'trim|integer');
                    // $this->form_validation->set_rules('tk_10', 'Target Keuangan Oktober', 'trim|integer');
                    // $this->form_validation->set_rules('tk_11', 'Target Keuangan November', 'trim|integer');
                    // $this->form_validation->set_rules('tk_12', 'Target Keuangan Desember', 'trim|integer');
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
                                'tf_1' => $this->input->post('tf_1'),
                                'tf_2' => $this->input->post('tf_2'),
                                'tf_3' => $this->input->post('tf_3'),
                                'tf_4' => $this->input->post('tf_4'),
                                'tf_5' => $this->input->post('tf_5'),
                                'tf_6' => $this->input->post('tf_6'),
                                'tf_7' => $this->input->post('tf_7'),
                                'tf_8' => $this->input->post('tf_8'),
                                'tf_9' => $this->input->post('tf_9'),
                                'tf_10' => $this->input->post('tf_10'),
                                'tf_11' => $this->input->post('tf_11'),
                                'tf_12' => $this->input->post('tf_12'),
                                'tk_1' => (($this->input->post('tk_1') / 100) * $data["total_anggaran_bl"]),
                                'tk_2' => (($this->input->post('tk_2') / 100) * $data["total_anggaran_bl"]),
                                'tk_3' => (($this->input->post('tk_3') / 100) * $data["total_anggaran_bl"]),
                                'tk_4' => (($this->input->post('tk_4') / 100) * $data["total_anggaran_bl"]),
                                'tk_5' => (($this->input->post('tk_5') / 100) * $data["total_anggaran_bl"]),
                                'tk_6' => (($this->input->post('tk_6') / 100) * $data["total_anggaran_bl"]),
                                'tk_7' => (($this->input->post('tk_7') / 100) * $data["total_anggaran_bl"]),
                                'tk_8' => (($this->input->post('tk_8') / 100) * $data["total_anggaran_bl"]),
                                'tk_9' => (($this->input->post('tk_9') / 100) * $data["total_anggaran_bl"]),
                                'tk_10' => (($this->input->post('tk_10') / 100) * $data["total_anggaran_bl"]),
                                'tk_11' => (($this->input->post('tk_11') / 100) * $data["total_anggaran_bl"]),
                                'tk_12' => (($this->input->post('tk_12') / 100) * $data["total_anggaran_bl"]),                            
                                'update_tgl' => date('Y-m-d H:i:s'),
                                'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                            );
                            $this->Pd_model->update_pd($this->session->userdata['logged_in']['user_pd'],$params);
                            $data['pd'] = $this->Pd_model->get_pd($this->session->userdata['logged_in']['user_pd']);
                            $data['message'] = "Perubahan data berhasil. Silahkan merubah data yang lain atau <a href='".base_url('target/index/')."'>klik disini</a> untuk kembali ke daftar.";
                        }
                    } 
                }
                // konversi doi jadi persen untuk Keuangan
                $data["pd"]["tk_1"]  = ( $data["pd"]["tk_1"] / $data["total_anggaran_bl"] ) * 100;
                $data["pd"]["tk_2"]  = ( $data["pd"]["tk_2"] / $data["total_anggaran_bl"] ) * 100;
                $data["pd"]["tk_3"]  = ( $data["pd"]["tk_3"] / $data["total_anggaran_bl"] ) * 100;
                $data["pd"]["tk_4"]  = ( $data["pd"]["tk_4"] / $data["total_anggaran_bl"] ) * 100;
                $data["pd"]["tk_5"]  = ( $data["pd"]["tk_5"] / $data["total_anggaran_bl"] ) * 100;
                $data["pd"]["tk_6"]  = ( $data["pd"]["tk_6"] / $data["total_anggaran_bl"] ) * 100;
                $data["pd"]["tk_7"]  = ( $data["pd"]["tk_7"] / $data["total_anggaran_bl"] ) * 100;
                $data["pd"]["tk_8"]  = ( $data["pd"]["tk_8"] / $data["total_anggaran_bl"] ) * 100;
                $data["pd"]["tk_9"]  = ( $data["pd"]["tk_9"] / $data["total_anggaran_bl"] ) * 100;
                $data["pd"]["tk_10"]  = ( $data["pd"]["tk_10"] / $data["total_anggaran_bl"] ) * 100;
                $data["pd"]["tk_11"]  = ( $data["pd"]["tk_11"] / $data["total_anggaran_bl"] ) * 100;
                $data["pd"]["tk_12"]  = ( $data["pd"]["tk_12"] / $data["total_anggaran_bl"] ) * 100;                


                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                // exit();


                $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
                $data['subjudul'] = 'Edit Target Belanja Daerah';
                $data['menu'] = 'Perangkat Daerah';
                $data['submenu'] = 'Belanja Daerah';
                $data['submenu2'] = 'Edit Target Belanja Daerah';
                $data['_view'] = 'target/edit';
                $this->load->view('layouts/main',$data);                
            }
            else
                show_error('The data you are trying to edit does not exist.');
        } else {
            header("Location:" .base_url("login"));
        } 
    }    
    
}
