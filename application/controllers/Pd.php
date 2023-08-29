<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pd extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pd_model');
        if (!isset($this->session->userdata['logged_in'])) {
            header("Location:" .base_url("login"));
        }         
    }

    /*
     * Listing of pd
     */
    function index()
    {
        $data['pd'] = $this->Pd_model->get_all_pd();
        $data['judul'] = 'Data Perangkat Daerah';
        $data['subjudul'] = 'Daftar Perangkat daerah';
        $data['menu'] = 'Pengaturan';
        $data['submenu'] = 'Data PD';
        $data['submenu2'] = 'Daftar PD';
        $data['_view'] = 'pd/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new pd
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $this->form_validation->set_rules('nama_pd', 'Nama Perangkat Daerah', 'trim|required');
            $this->form_validation->set_rules('kode_pd', 'Kode Perangkat Daerah', 'trim|required');
            $this->form_validation->set_rules('alamat_pd', 'Alamat Perangkat Daerah', 'trim|required');
            $this->form_validation->set_rules('nip_kepala', 'NIP Kepala', 'trim|required');
            $this->form_validation->set_rules('kode_up', 'Kode Urusan', 'trim|required');
            $this->form_validation->set_rules('kode_prog_btl', 'Kode Program BTL', 'trim|required');
            $this->form_validation->set_rules('kode_giat_btl', 'Kode Kegiatan BTL', 'trim|required');
            $this->form_validation->set_message('required','{field} harus diisi!');
            // if failed
            if ($this->form_validation->run() == FALSE) {
                // Send message to the view
                $data['success'] = FALSE;
                $data['message'] = "Ada isian wajib yang tidak diisi. Silahkan coba lagi.";
            // if succeed
            } else {
                $config['upload_path']          = './uploads/pd/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 500;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
                $config['overwrite']            = TRUE;
                // initialization of the photos data
                $data['success'] = TRUE;
                // if uploads are ok, load data to database
                if ($data['success']){
                    // save data to the database
                    $params = array(
                        'kode_pd' => $this->input->post('kode_pd'),
                        'kode_up' => $this->input->post('kode_up'),
                        'nip_kepala' => $this->input->post('nip_kepala'),
                        'nama_pd' => $this->input->post('nama_pd'),
                        'alamat_pd' => $this->input->post('alamat_pd'),
                        'kode_prog_btl' => $this->input->post('kode_prog_btl'),
                        'kode_giat_btl' => $this->input->post('kode_giat_btl'),                        
                        'update_tgl' => date('Y-m-d H:i:s'),
                        'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                    );
                    $pd_id = $this->Pd_model->add_pd($params);
                    $_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                    $data['message'] = "Penambahan data baru berhasil. Silahkan menambahkan data yang lain atau <a href='".base_url('pd')."'>klik disini</a> untuk kembali ke daftar.";
                }
            }
        }
        $data['judul'] = 'Data Perangkat Daerah';
        $data['subjudul'] = 'Tambah Perangkat Daerah';
        $data['menu'] = 'Pengaturan';
        $data['submenu'] = 'Data PD';
        $data['submenu2'] = 'Tambah PD';
        $data['_view'] = 'pd/add';
        $this->load->view('layouts/main',$data);

    }
    /*
     * Editing a pd
     */
    function edit($kode_pd)
    {
        // check if the pd exists before trying to edit it
        $data['pd'] = $this->Pd_model->get_pd($kode_pd);

        if(isset($data['pd']['kode_pd']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $this->form_validation->set_rules('nama_pd', 'Nama Perangkat Daerah', 'trim|required');
                $this->form_validation->set_rules('kode_pd', 'Kode Perangkat Daerah', 'trim|required');
                $this->form_validation->set_rules('alamat_pd', 'Alamat Perangkat Daerah', 'trim|required');
                $this->form_validation->set_rules('nip_kepala', 'NIP Kepala', 'trim|required');
                $this->form_validation->set_rules('kode_up', 'Kode Urusan', 'trim|required');
                $this->form_validation->set_rules('kode_prog_btl', 'Kode Program BTL', 'trim|required');
                $this->form_validation->set_rules('kode_giat_btl', 'Kode Kegiatan BTL', 'trim|required');
                $this->form_validation->set_message('required','{field} harus diisi!');
                // if failed
                if ($this->form_validation->run() == FALSE) {
                    // Send message to the view
                    $data['success'] = FALSE;
                    $data['message'] = "Ada isian wajib yang tidak diisi. Silahkan coba lagi.";
                // if succeed
                } else {
                    $config['upload_path']          = './uploads/pd/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 500;
                    //$config['max_width']            = 1024;
                    //$config['max_height']           = 768;
                    $config['overwrite']            = TRUE;
                    // initialization of the photos data
                    $data['pd'] = $this->Pd_model->get_pd($kode_pd); // get data saat ini
                    $data['success'] = TRUE;
                    // if uploads are ok, load data to database
                    if ($data['success']){
                        // $keterangan_sebelum = $data['pd']['keterangan_pagu_1'];
                        // for ($i=2; $i <= 12; $i++) { 
                        //     if ($data['pd']['keterangan_pagu_'.$i] != $keterangan_sebelum) and 
                        //        ($this->input->post('keterangan_pagu_'.$i) == $data['pd']['keterangan_pagu_'.$i])
                        //     {
                        //         $keterangan = 

                        //     }    
                        // }
                        
                        // save data to the database
                        $params = array(
                            //'kode_pd' => $this->input->post('kode_pd'),
                            'kode_up' => $this->input->post('kode_up'),
                            'nip_kepala' => $this->input->post('nip_kepala'),
                            'nama_pd' => $this->input->post('nama_pd'),
                            'alamat_pd' => $this->input->post('alamat_pd'),
                            'kode_prog_btl' => $this->input->post('kode_prog_btl'),
                            'kode_giat_btl' => $this->input->post('kode_giat_btl'),
                            'keterangan_pagu_1' => $this->input->post('keterangan_pagu_1'),
                            'keterangan_pagu_2' => $this->input->post('keterangan_pagu_2'),
                            'keterangan_pagu_3' => $this->input->post('keterangan_pagu_3'),
                            'keterangan_pagu_4' => $this->input->post('keterangan_pagu_4'),
                            'keterangan_pagu_5' => $this->input->post('keterangan_pagu_5'),
                            'keterangan_pagu_6' => $this->input->post('keterangan_pagu_6'),
                            'keterangan_pagu_7' => $this->input->post('keterangan_pagu_7'),
                            'keterangan_pagu_8' => $this->input->post('keterangan_pagu_8'),
                            'keterangan_pagu_9' => $this->input->post('keterangan_pagu_9'),
                            'keterangan_pagu_10' => $this->input->post('keterangan_pagu_10'),
                            'keterangan_pagu_11' => $this->input->post('keterangan_pagu_11'),
                            'keterangan_pagu_12' => $this->input->post('keterangan_pagu_12'),
                            'update_tgl' => date('Y-m-d H:i:s'),
                            'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                        );
                        $this->Pd_model->update_pd($kode_pd,$params);
                        $data['pd'] = $this->Pd_model->get_pd($kode_pd); // get data yang sudah terupdate
                        //$_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                        $data['message'] = "Perubahan data berhasil. Silahkan melakukan perubahan data lagi  atau <a href='".base_url('pd')."'>klik disini</a> untuk kembali ke daftar.";
                    }
                }
            }
            $data['judul'] = 'Data Perangkat Daerah';
            $data['subjudul'] = 'Edit Perangkat Daerah';
            $data['menu'] = 'Pengaturan';
            $data['submenu'] = 'Data PD';
            $data['submenu2'] = 'Edit PD';
            $data['_view'] = 'pd/edit';
            $this->load->view('layouts/main',$data);
        }
        else
            show_error('The data you are trying to edit does not exist.');
    }

    /*
     * Deleting pd
     */
    function remove($kode_pd)
    {
        $pd = $this->Pd_model->get_pd($kode_pd);

        // check if the pd exists before trying to delete it
        if(isset($pd['kode_pd']))
        {
            $this->Pd_model->delete_pd($kode_pd);
            redirect('pd/index');
        }
        else
            show_error('The data you are trying to delete does not exist.');
    }

    function view($kode_pd)
    {
        // check if the pd exists before trying to edit it
        $data['pd'] = $this->Pd_model->get_pd($kode_pd);

        if(isset($data['pd']['kode_pd']))
        {
            $data['judul'] = 'Data Perangkat Daerah';
            $data['subjudul'] = 'Tampil Perangkat Daerah';
            $data['menu'] = 'Pengaturan';
            $data['submenu'] = 'Data PD';
            $data['submenu2'] = 'Tampil PD';
            $data['_view'] = 'pd/view';
            $this->load->view('layouts/main',$data);
        }
        else
            show_error('The data you are trying to view does not exist.');
    }

}
