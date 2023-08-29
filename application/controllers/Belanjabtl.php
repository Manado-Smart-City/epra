<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Belanjabtl extends CI_Controller{
    function __construct()
    {        
        parent::__construct();
        $this->load->model('Kegiatan_model');
        $this->load->model('Program_model');
        $this->load->model('Belanja_model');
        $this->load->model('Pejabat_model');
        $this->load->model('Pd_model');     
        //$this->output->enable_profiler(TRUE);   
    }

    function index()
    {        
        if (isset($this->session->userdata['logged_in'])) {
            // ambil kode kegiatan BTL
            $data['pd'] = $this->Pd_model->get_pd($this->session->userdata['logged_in']['user_pd']);
            //$kode_giat = $data['pd']['kode_giat_btl'];
            $kode_giat = $this->session->userdata['logged_in']['user_kode_giat_btl'];
            $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($kode_giat);
            //$data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']);        
            $data['belanja'] = $this->Belanja_model->get_all_belanja($kode_giat);
            $data['jumlah_belanja'] = count($data['belanja']);     
            $data['total_belanja'] = $this->Belanja_model->get_all_belanja_total($kode_giat); 
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Daftar Belanja';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Tidak Langsung';
            $data['submenu2'] = 'Daftar Belanja';
            $data['_view'] = 'belanjabtl/index';
            $this->load->view('layouts/main',$data);
        } else {
            header("Location:" .base_url("login"));
        }
    } 

    function add()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if(isset($_POST) && count($_POST) > 0)
            {
                $data['success'] = TRUE;
                $this->form_validation->set_rules('kode_rek_belanja', 'Kode Rekening Belanja', 'trim|required|callback_check_duplicate_kode_rek_belanja['.$_POST["kode_rek_belanja"].']');
                $this->form_validation->set_rules('nama_belanja', 'Nama Belanja', 'trim|required');
                $this->form_validation->set_message('check_duplicate_kode_rek_belanja','{field} yang anda masukkan sudah pernah dimasukkan!');
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
                            'tahun_anggaran' => $this->session->userdata['logged_in']['tahun_anggaran'],
                            'kode_rek_belanja' => $this->input->post('kode_rek_belanja'),
                            'nama_belanja' => $this->input->post('nama_belanja'),
                            'pagu_giat' => $this->input->post('pagu_giat'),
                            'kode_giat' => $this->session->userdata['logged_in']['user_kode_giat_btl'],
                            'update_tgl' => date('Y-m-d H:i:s'),
                            'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                        );
                        $kode_rek_belanja = $this->Belanja_model->add_belanja($params);
                        $_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                        $data['message'] = "Penambahan data baru berhasil. Silahkan menambahkan data yang lain atau <a href='".base_url('belanjabtl/index/')."'>klik disini</a> untuk kembali ke daftar.";
                    }
                }
            }
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Tambah Belanja';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Tak Langsung';            
            $data['submenu2'] = 'Tambah Belanja'; 
            $data['_view'] = 'belanjabtl/add';
            $this->load->view('layouts/main',$data);
        } else {
            header("Location:" .base_url("login"));
        } 
    }    

    /*
     * Deleting program
     */
    function remove($kode_rek_belanja)
    {
        $belanja = $this->Belanja_model->get_belanja($kode_rek_belanja);

        // check if the belanja exists before trying to delete it
        if(isset($belanja['kode_rek_belanja']))
        {
            $this->Belanja_model->delete_belanja($kode_rek_belanja);
            redirect('belanjabtl/index/');
        }
        else
            show_error('The data you are trying to delete does not exist.');
    }

    // Callback function untuk cek duplikasi kode_prog
    public function check_duplicate_kode_rek_belanja($kode_rek_belanja) {
        return $this->Belanja_model->check_duplicate($kode_rek_belanja);
    }

}
