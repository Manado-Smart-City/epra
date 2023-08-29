<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Belanja extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model');
        $this->load->model('Program_model');
        $this->load->model('Belanja_model');
        $this->load->model('Pejabat_model');
        $this->load->model('Pd_model');
        //$this->output->enable_profiler(TRUE);
        if (!isset($this->session->userdata['logged_in'])) {
            header("Location:" .base_url("login"));
        }        
    }

    function index($kode_giat)
    {        
        if (isset($this->session->userdata['logged_in'])) {
            $bulan_ini = $this->session->userdata['logged_in']['bulan_ini'];
            $data['bulan_ini'] = $bulan_ini;
            $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($kode_giat);
            $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']);  
            // data belanja yg belum dikonfirmasi      
            $data['belanja'] = $this->Belanja_model->get_all_unconfirmed_belanja($kode_giat,$bulan_ini);
            $data['jumlah_belanja'] = count($data['belanja']);   
            $data['total_belanja'] = 0;
            foreach ($data["belanja"] as $key => $value) {
                $data['total_belanja'] = $data['total_belanja'] + $value["pagu_giat_".$bulan_ini];
            }
            // data belanja swakelola
            $data['belanja_swakelola'] = $this->Belanja_model->get_all_belanja_swakelola($kode_giat,$bulan_ini);
            $data['jumlah_belanja_swakelola'] = count($data['belanja_swakelola']);
            $data['total_belanja_swakelola'] = 0;
            foreach ($data["belanja_swakelola"] as $key => $value) {
                $data['total_belanja_swakelola'] = $data['total_belanja_swakelola'] + $value["pagu_giat_".$bulan_ini];
            }            
            // data belanja pengadaan
            $data['belanja_pengadaan'] = $this->Belanja_model->get_all_belanja_pengadaan($kode_giat,$bulan_ini);
            $data['jumlah_belanja_pengadaan'] = count($data['belanja_pengadaan']);
            $data['total_belanja_pengadaan'] = 0;
            foreach ($data["belanja_pengadaan"] as $key => $value) {
                $data['total_belanja_pengadaan'] = $data['total_belanja_pengadaan'] + $value["pagu_giat_".$bulan_ini];
            }    

            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Daftar Belanja';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Daerah';
            $data['submenu2'] = 'Daftar Belanja';
            $data['_view'] = 'belanja/index';
            $this->load->view('layouts/main',$data);
        } else {
            header("Location:" .base_url("login"));
        }
    } 
    /*
     * Adding a new program
     */
    function add_swakelola($kode_giat)
    {        
        $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($kode_giat);
        $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']); 
        $tahun_anggaran = $this->session->userdata['logged_in']['tahun_anggaran'];
        if(isset($_POST) && count($_POST) > 0)
        {
            $data['success'] = TRUE;
            $this->form_validation->set_rules('kode_rek_belanja', 'Kode Rekening Belanja', 'trim|required|callback_check_duplicate_kode_rek_belanja['.$_POST["kode_rek_belanja"].']');
            $this->form_validation->set_rules('nama_giat_swa', 'Nama Belanja Swakelola', 'trim|required');
            $this->form_validation->set_message('check_duplicate_kode_rek_belanja','{field} yang anda masukkan sudah pernah dimasukkan!');
            $this->form_validation->set_message('required','{field} harus diisi!');
            // if failed
            if ($this->form_validation->run() == FALSE) {
                // Send message to the view
                $data['success'] = FALSE;
                $data['message'] = "Periksa lagi isian yang anda masukkan.";
            // if succeed
            } else {
                $config['upload_path']          = './uploads/belanja/swakelola/';
                $config['allowed_types']        = 'pdf|doc|docx';
                $config['max_size']             = $this->session->userdata['logged_in']['ukuran_file_upload'];
                $config['overwrite']            = TRUE;
                // initialization of the photos data
                $user_doc = "";
                $data['success'] = TRUE;
                // upload doc
                if (!empty($_FILES["file_dokumen_kak"]["name"])) {
                    $config['file_name'] = 'kak-tor-'.str_replace(".", "-", $_POST["kode_rek_belanja"]);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('file_dokumen_kak')) {
                        $data['success'] = FALSE;
                        $data['message'] = "Unggah dokumen KAK/TOR gagal. Pastikan file sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                    } else {
                        $upload_data = $this->upload->data();
                        $user_doc = $upload_data['file_name'];
                    }
                }
                // if uploads are ok, load data to database

                if ($data['success']){
                    // save data to the database
                    $params = array(
                        'tahun_anggaran' => $tahun_anggaran,
                        'jenis_kegiatan' => 'Swakelola',
                        'kode_rek_belanja' => str_replace(' ', '', $this->input->post('kode_rek_belanja')), // tambahan Feb 2019
                        'nama_belanja' => $this->input->post('nama_belanja'),
                        'nama_giat_swa' => $this->input->post('nama_giat_swa'),
                        'kode_giat' => $this->input->post('kode_giat'),
                        'pagu_giat' => $this->input->post('pagu_giat'),                        
                        'pagu_giat_1' => $this->input->post('pagu_giat'),
                        'pagu_giat_2' => $this->input->post('pagu_giat'),
                        'pagu_giat_3' => $this->input->post('pagu_giat'),
                        'pagu_giat_4' => $this->input->post('pagu_giat'),
                        'pagu_giat_5' => $this->input->post('pagu_giat'),
                        'pagu_giat_6' => $this->input->post('pagu_giat'),
                        'pagu_giat_7' => $this->input->post('pagu_giat'),
                        'pagu_giat_8' => $this->input->post('pagu_giat'),
                        'pagu_giat_9' => $this->input->post('pagu_giat'),
                        'pagu_giat_10' => $this->input->post('pagu_giat'),
                        'pagu_giat_11' => $this->input->post('pagu_giat'),
                        'pagu_giat_12' => $this->input->post('pagu_giat'),
                        'bulan_pelaksanaan_mulai' => $this->input->post('bulan_pelaksanaan_mulai'),
                        'bulan_pelaksanaan_selesai' => $this->input->post('bulan_pelaksanaan_selesai'),
                        'lokasi_giat' => $this->input->post('lokasi_giat'),
                        'lokasi_spesifik' => $this->input->post('lokasi_spesifik'),
                        'lokasi_lintang' => $this->input->post('lokasi_lintang'),
                        'lokasi_bujur' => $this->input->post('lokasi_bujur'),
                        'jenis_belanja' => $this->input->post('jenis_belanja'),
                        'volume_belanja' => $this->input->post('volume_belanja'),
                        'deskripsi_belanja' => $this->input->post('deskripsi_belanja'),
                        'file_dokumen_kak' => $user_doc,
                        'usulan_dari' => $this->input->post('usulan_dari'),                        
                        'update_tgl' => date('Y-m-d H:i:s'),
                        'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                    );
                    $kode_rek_belanja = $this->Belanja_model->add_belanja($params);
                    $_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                    $data['message'] = "Penambahan data baru berhasil. Silahkan menambahkan data yang lain atau <a href='".base_url('belanja/index/'.$kode_giat)."'>klik disini</a> untuk kembali ke daftar.";
                }
            }
        }
        $data['kode_giat'] = $kode_giat;
        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['subjudul'] = 'Tambah Belanja Swakelola';
        $data['menu'] = 'Perangkat Daerah';
        $data['submenu'] = 'Belanja Daerah';
        $data['submenu2'] = 'Tambah Belanja Swakelola';
        $data['_view'] = 'belanja/add_swakelola';
        $this->load->view('layouts/main',$data);

    }

    /*
     * Adding a new program
     */
    function add_pengadaan($kode_giat)
    {        
        $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($kode_giat);
        $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']); 
        $tahun_anggaran = $this->session->userdata['logged_in']['tahun_anggaran'];
        if(isset($_POST) && count($_POST) > 0)
        {
            $data['success'] = TRUE;
            $this->form_validation->set_rules('kode_rek_belanja', 'Kode Rekening Belanja', 'trim|required|callback_check_duplicate_kode_rek_belanja['.$_POST["kode_rek_belanja"].']');
            $this->form_validation->set_rules('nama_belanja', 'Nama Belanja', 'trim|required');
            $this->form_validation->set_rules('nama_paket_pengadaan', 'Nama Paket Pengadaan', 'trim|required');
            $this->form_validation->set_message('check_duplicate_kode_rek_belanja','{field} yang anda masukkan sudah pernah dimasukkan!');
            $this->form_validation->set_message('required','{field} harus diisi!');
            // if failed
            if ($this->form_validation->run() == FALSE) {
                // Send message to the view
                $data['success'] = FALSE;
                $data['message'] = "Periksa lagi isian yang anda masukkan.";
            // if succeed
            } else {
                $config['upload_path']          = './uploads/belanja/pengadaan/';
                $config['allowed_types']        = 'pdf|doc|docx';
                $config['max_size']             = $this->session->userdata['logged_in']['ukuran_file_upload'];
                $config['overwrite']            = TRUE;
                // initialization of the photos data
                
                $data['success'] = TRUE;
                // upload doc
                $file_dokumen_kak = "";
                if (!empty($_FILES["file_dokumen_kak"]["name"])) {
                    $config['file_name'] = 'kak-tor-'.str_replace(".", "-", $_POST["kode_rek_belanja"]);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('file_dokumen_kak')) {
                        $data['success'] = FALSE;
                        $data['message'] = "Unggah dokumen KAK/TOR gagal. Pastikan file sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                    } else {
                        $upload_data = $this->upload->data();
                        $file_dokumen_kak = $upload_data['file_name'];
                    }
                }
                
                // upload doc
                $file_dokumen_kontrak = "";
                if (!empty($_FILES["file_dokumen_kontrak"]["name"])) {
                    $config['file_name'] = 'dok-kontrak-'.str_replace(".", "-", $_POST["kode_rek_belanja"]);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('file_dokumen_kontrak')) {
                        $data['success'] = FALSE;
                        $data['message'] = "Unggah file dokumen kontrak gagal. Pastikan file sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                    } else {
                        $upload_data = $this->upload->data();
                        $file_dokumen_kontrak = $upload_data['file_name'];
                    }
                }


                // if uploads are ok, load data to database

                if ($data['success']){
                    // save data to the database
                    $params = array(
                        // data umum
                        'tahun_anggaran' => $tahun_anggaran,
                        'jenis_kegiatan' => 'Pengadaan',
                        'kode_rek_belanja' => str_replace(' ', '', $this->input->post('kode_rek_belanja')), // tambahan Feb 2019
                        'nama_belanja' => $this->input->post('nama_belanja'),
                        'nama_paket_pengadaan' => $this->input->post('nama_paket_pengadaan'),
                        'kode_giat' => $this->input->post('kode_giat'),                        
                        'pagu_giat' => $this->input->post('pagu_giat'),
                        'pagu_giat_1' => $this->input->post('pagu_giat'),
                        'pagu_giat_2' => $this->input->post('pagu_giat'),
                        'pagu_giat_3' => $this->input->post('pagu_giat'),
                        'pagu_giat_4' => $this->input->post('pagu_giat'),
                        'pagu_giat_5' => $this->input->post('pagu_giat'),
                        'pagu_giat_6' => $this->input->post('pagu_giat'),
                        'pagu_giat_7' => $this->input->post('pagu_giat'),
                        'pagu_giat_8' => $this->input->post('pagu_giat'),
                        'pagu_giat_9' => $this->input->post('pagu_giat'),
                        'pagu_giat_10' => $this->input->post('pagu_giat'),
                        'pagu_giat_11' => $this->input->post('pagu_giat'),
                        'pagu_giat_12' => $this->input->post('pagu_giat'),                        
                        'lokasi_giat' => $this->input->post('lokasi_giat'),
                        'lokasi_spesifik' => $this->input->post('lokasi_spesifik'),
                        'usulan_dari' => $this->input->post('usulan_dari'),            
                        'file_dokumen_kak' => $file_dokumen_kak,
                        'nip_ppk' => $this->input->post('nip_ppk'),
                        'nip_pp' => $this->input->post('nip_pp'),
                        'jenis_pengadaan' => $this->input->post('jenis_pengadaan'),
                        'metode_pemilihan_peny' => $this->input->post('metode_pemilihan_peny'),                        
                        'jenis_belanja' => $this->input->post('jenis_belanja'),                
                        'volume_belanja' => $this->input->post('volume_belanja'),
                        'hps' => $this->input->post('hps'),  
                        // data penyedia    
                        'nama_peny' => $this->input->post('nama_peny'),  
                        'nama_direktur' => $this->input->post('nama_direktur'),  
                        'alamat_peny' => $this->input->post('alamat_peny'),  
                        'kualifikasi_peny' => $this->input->post('kualifikasi_peny'),  
                        'nomor_kontrak' => $this->input->post('nomor_kontrak'),  
                        'tanggal_kontrak' => $this->input->post('tanggal_kontrak'),  
                        'jangka_waktu_kontrak' => $this->input->post('jangka_waktu_kontrak'), 
                        'tanggal_mulai_kontrak' => $this->input->post('tanggal_mulai_kontrak'), 
                        'tanggal_selesai_kontrak' => $this->input->post('tanggal_selesai_kontrak'), 
                        'nilai_kontrak' => $this->input->post('nilai_kontrak'), 
                        'file_dokumen_kontrak' => $file_dokumen_kontrak,                         
                        //'nomor_pphp' => $this->input->post('nomor_pphp'), 
                        //'tanggal_pphp' => $this->input->post('tanggal_pphp'), 
                        'update_tgl' => date('Y-m-d H:i:s'),
                        'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                    );
                    $kode_rek_belanja = $this->Belanja_model->add_belanja($params);
                    $_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                    $data['message'] = "Penambahan data baru berhasil. Silahkan menambahkan data yang lain atau <a href='".base_url('belanja/index3/'.$kode_giat)."'>klik disini</a> untuk kembali ke daftar.";
                }
            }
        }
        $data['kode_giat'] = $kode_giat;
        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['subjudul'] = 'Tambah Paket Pengadaan';
        $data['menu'] = 'Perangkat Daerah';
        $data['submenu'] = 'Belanja Daerah';
        $data['submenu2'] = 'Tambah Paket Pengadaan';
        $data['_view'] = 'belanja/add_pengadaan';
        $this->load->view('layouts/main',$data);

    }    
    /*
     * Editing a program
     */

    function konfirmasi($jenis_kegiatan,$kode_rek_belanja)
    {
        if (isset($this->session->userdata['logged_in'])) {
           $params = array(
                // data umum
                'jenis_kegiatan' => $jenis_kegiatan,
                //log
                'update_tgl' => date('Y-m-d H:i:s'),
                'update_oleh' => $this->session->userdata['logged_in']['user_id'],
            );
            $this->Belanja_model->update_belanja($kode_rek_belanja,$params);            

            $data_belanja = $this->Belanja_model->get_belanja($kode_rek_belanja);
            $kode_giat = $data_belanja['kode_giat'];
            redirect('belanja/index/'.$kode_giat);
        } else {
            header("Location:" .base_url("login"));
        }
    }    

    function edit_swakelola($kode_rek_belanja)
    {
        $data['belanja'] = $this->Belanja_model->get_belanja($kode_rek_belanja);
        $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($data['belanja']['kode_giat']);
        $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']);        
        $data['foto_realisasi'] = $this->Belanja_model->get_all_foto_realisasi($kode_rek_belanja);
        $data['pd'] = $this->Pd_model->get_pd($this->session->userdata['logged_in']['user_pd']);
        $data['tab_menu'] = "umum";
        $bulan_ini = $this->session->userdata['logged_in']['bulan_ini'];
        $data['bulan_ini'] = $bulan_ini;        
        
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        // hitung persentase realisasi belanja terhadap pagu (20nov2018)
        for ($i=1; $i <= 12 ; $i++) { 
            if ($data['belanja']['pagu_giat_'.$i] <> 0){
                $data['belanja']['persen_kk_'.$i] = round(($data['belanja']['kk_'.$i] / $data['belanja']['pagu_giat_'.$i]) * 100 , 2);
            } else {
                $data['belanja']['persen_kk_'.$i] = 0;
            }
        }        

        // jika tombol hapus foto realisasi diklik, mengecek variabel $_POST untuk mengambil id foto yang diklik
        foreach ( $_POST as $key => $value )
        {
            if ( preg_match('/btn_hapus_file_foto_realisasi/', $key) )
            {
                $id_foto_realisasi_yg_dihapus = substr(strrchr($key,"_"),1);
            }
        }         

        if(isset($data['belanja']['kode_rek_belanja']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                // jika salah satu tombol unggah diklik
                if (
                    isset($_POST["btn_unggah_file_foto_realisasi_1"]) ||
                    isset($_POST["btn_unggah_file_foto_realisasi_2"]) ||
                    isset($_POST["btn_unggah_file_foto_realisasi_3"]) ||
                    isset($_POST["btn_unggah_file_foto_realisasi_4"]) ||
                    isset($_POST["btn_unggah_file_foto_realisasi_5"]) ||
                    isset($_POST["btn_unggah_file_foto_realisasi_6"]) ||
                    isset($_POST["btn_unggah_file_foto_realisasi_7"]) ||
                    isset($_POST["btn_unggah_file_foto_realisasi_8"]) ||
                    isset($_POST["btn_unggah_file_foto_realisasi_9"]) ||
                    isset($_POST["btn_unggah_file_foto_realisasi_10"]) ||
                    isset($_POST["btn_unggah_file_foto_realisasi_11"]) ||
                    isset($_POST["btn_unggah_file_foto_realisasi_12"]) 
                   ){        
                    
                    // menentukan bulan
                    if       (isset($_POST["btn_unggah_file_foto_realisasi_1"])) {
                        $pilihan_bulan_foto_realisasi = 1;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_2"])) {
                        $pilihan_bulan_foto_realisasi = 2;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_3"])) {
                        $pilihan_bulan_foto_realisasi = 3;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_4"])) {
                        $pilihan_bulan_foto_realisasi = 4;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_5"])) {
                        $pilihan_bulan_foto_realisasi = 5;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_6"])) {
                        $pilihan_bulan_foto_realisasi = 6;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_7"])) {
                        $pilihan_bulan_foto_realisasi = 7;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_8"])) {
                        $pilihan_bulan_foto_realisasi = 8;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_9"])) {
                        $pilihan_bulan_foto_realisasi = 9;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_10"])) {
                        $pilihan_bulan_foto_realisasi = 10;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_11"])) {
                        $pilihan_bulan_foto_realisasi = 11;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_12"])) {
                        $pilihan_bulan_foto_realisasi = 12;
                    }    
                    $jumlah_foto_dalam_db_saat_ini = $this->Belanja_model->count_foto_realisasi($data['belanja']['kode_rek_belanja']);
                    $jumlah_foto_dalam_db_saat_ini = $jumlah_foto_dalam_db_saat_ini + 1;

                    $data['success'] = TRUE;
                    $config['upload_path']          = './uploads/belanja/swakelola/';
                    $config['allowed_types']        = 'jpg|jpeg|png|gif';
                    $config['max_size']             = $this->session->userdata['logged_in']['ukuran_file_upload'];
                    $config['overwrite']            = TRUE;                              
                    $config['file_name']            = 'foto-realisasi-'.$pilihan_bulan_foto_realisasi.'-'.$jumlah_foto_dalam_db_saat_ini.'-'.str_replace(".", "-", $kode_rek_belanja);   
                    $this->upload->initialize($config);
                    $nama_file_foto_realisasi = 'file_foto_realisasi_'.$pilihan_bulan_foto_realisasi;
                    if (!$this->upload->do_upload($nama_file_foto_realisasi)) {
                        $data['success'] = FALSE;
                        $data['message'] = "Unggah foto realisasi gagal. Pastikan file sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                    } else {
                        $upload_data = $this->upload->data();
                        $foto_realisasi = $upload_data['file_name'];
                    }      
                    if ($data['success']){
                        $params = array(
                            'kode_rek_belanja' => $kode_rek_belanja,
                            'file_foto_realisasi' => $foto_realisasi,
                            'bulan' => $pilihan_bulan_foto_realisasi,
                            'update_tgl' => date('Y-m-d H:i:s'),
                            'update_oleh' => $this->session->userdata['logged_in']['user_id'],                        
                        );
                        $this->Belanja_model->add_foto_realisasi($params);
                        unset($data["success"]);
                    }     
                    $data['foto_realisasi'] = $this->Belanja_model->get_all_foto_realisasi($kode_rek_belanja);
                    $data['tab_menu'] = "realisasi"; 

                } elseif(isset($id_foto_realisasi_yg_dihapus)){ 
                    $this->Belanja_model->delete_foto_realisasi($id_foto_realisasi_yg_dihapus);                    
                    $data['foto_realisasi'] = $this->Belanja_model->get_all_foto_realisasi($kode_rek_belanja);
                    $data['tab_menu'] = "realisasi";                     

                // Jika yang lain, dalam hal ini yang diklik adalah tombol SIMPAN    
                } else {

                    $data['success'] = TRUE;
                    $this->form_validation->set_rules('nama_giat_swa', 'Nama Belanja Swakelola', 'trim|required');
                    $this->form_validation->set_message('required','{field} harus diisi!');
                    // if failed
                    if ($this->form_validation->run() == FALSE) {
                        // Send message to the view
                        $data['success'] = FALSE;
                        $data['message'] = "Periksa lagi isian yang anda masukkan.";
                    // if succeed
                    } else {
                        $config['upload_path']          = './uploads/belanja/swakelola/';
                        $config['allowed_types']        = 'pdf|doc|docx';
                        $config['max_size']             = $this->session->userdata['logged_in']['ukuran_file_upload'];
                        $config['overwrite']            = TRUE;
                        // initialization of the photos data
                        $user_doc = $data['belanja']['file_dokumen_kak'];
                        $data['success'] = TRUE;
                        // upload doc
                        if (!empty($_FILES["file_dokumen_kak"]["name"])) {
                            $config['file_name'] = 'kak-tor-'.str_replace(".", "-", $kode_rek_belanja);
                            // echo "<pre>";
                            // print_r($config);
                            // echo "</pre>";
                            // exit();

                            $this->upload->initialize($config);
                            if (!$this->upload->do_upload('file_dokumen_kak')) {
                                $data['success'] = FALSE;
                                $data['message'] = "Unggah dokumen KAK/TOR gagal. Pastikan file sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                            } else {
                                $upload_data = $this->upload->data();
                                $user_doc = $upload_data['file_name'];
                            }
                        }
                        // if uploads are ok, load data to database

                        if ($data['success']){

                            // untuk realisasi, otomatis isi yang terbesar
                            $kf_1 =  $this->input->post('kf_1');     
                            $kf_2 =  ($this->input->post('kf_2')  < $kf_1  ? $kf_1  : $this->input->post('kf_2'));     
                            $kf_3 =  ($this->input->post('kf_3')  < $kf_2  ? $kf_2  : $this->input->post('kf_3'));     
                            $kf_4 =  ($this->input->post('kf_4')  < $kf_3  ? $kf_3  : $this->input->post('kf_4'));     
                            $kf_5 =  ($this->input->post('kf_5')  < $kf_4  ? $kf_4  : $this->input->post('kf_5'));     
                            $kf_6 =  ($this->input->post('kf_6')  < $kf_5  ? $kf_5  : $this->input->post('kf_6'));     
                            $kf_7 =  ($this->input->post('kf_7')  < $kf_6  ? $kf_6  : $this->input->post('kf_7'));     
                            $kf_8 =  ($this->input->post('kf_8')  < $kf_7  ? $kf_7  : $this->input->post('kf_8'));     
                            $kf_9 =  ($this->input->post('kf_9')  < $kf_8  ? $kf_8  : $this->input->post('kf_9'));     
                            $kf_10 = ($this->input->post('kf_10') < $kf_9  ? $kf_9  : $this->input->post('kf_10'));   
                            $kf_11 = ($this->input->post('kf_11') < $kf_10 ? $kf_10 : $this->input->post('kf_11'));  
                            $kf_12 = ($this->input->post('kf_12') < $kf_11 ? $kf_11 : $this->input->post('kf_12'));  

                            $kk_1 =  $this->input->post('kk_1');      
                            $kk_2 =  ($this->input->post('kk_2')  < $kk_1  ? $kk_1  : $this->input->post('kk_2'));     
                            $kk_3 =  ($this->input->post('kk_3')  < $kk_2  ? $kk_2  : $this->input->post('kk_3'));     
                            $kk_4 =  ($this->input->post('kk_4')  < $kk_3  ? $kk_3  : $this->input->post('kk_4'));     
                            $kk_5 =  ($this->input->post('kk_5')  < $kk_4  ? $kk_4  : $this->input->post('kk_5'));     
                            $kk_6 =  ($this->input->post('kk_6')  < $kk_5  ? $kk_5  : $this->input->post('kk_6'));     
                            $kk_7 =  ($this->input->post('kk_7')  < $kk_6  ? $kk_6  : $this->input->post('kk_7'));     
                            $kk_8 =  ($this->input->post('kk_8')  < $kk_7  ? $kk_7  : $this->input->post('kk_8'));     
                            $kk_9 =  ($this->input->post('kk_9')  < $kk_8  ? $kk_8  : $this->input->post('kk_9'));     
                            $kk_10 = ($this->input->post('kk_10') < $kk_9  ? $kk_9  : $this->input->post('kk_10'));   
                            $kk_11 = ($this->input->post('kk_11') < $kk_10 ? $kk_10 : $this->input->post('kk_11'));  
                            $kk_12 = ($this->input->post('kk_12') < $kk_11 ? $kk_11 : $this->input->post('kk_12')); 

                            // echo "<pre>";
                            // print_r($_POST);
                            // echo "</pre>";
                            // exit();

                            // save data to the database
                            $params = array(
                                // data umum
                                'nama_giat_swa' => $this->input->post('nama_giat_swa'),
                                'nama_belanja' => $this->input->post('nama_belanja'),
                                'pagu_giat' => $this->input->post('pagu_giat_'.$bulan_ini),
                                'pagu_giat_1' => $this->input->post('pagu_giat_1'),
                                'pagu_giat_2' => $this->input->post('pagu_giat_2'),
                                'pagu_giat_3' => $this->input->post('pagu_giat_3'),
                                'pagu_giat_4' => $this->input->post('pagu_giat_4'),
                                'pagu_giat_5' => $this->input->post('pagu_giat_5'),
                                'pagu_giat_6' => $this->input->post('pagu_giat_6'),
                                'pagu_giat_7' => $this->input->post('pagu_giat_7'),
                                'pagu_giat_8' => $this->input->post('pagu_giat_8'),
                                'pagu_giat_9' => $this->input->post('pagu_giat_9'),
                                'pagu_giat_10' => $this->input->post('pagu_giat_10'),
                                'pagu_giat_11' => $this->input->post('pagu_giat_11'),
                                'pagu_giat_12' => $this->input->post('pagu_giat_12'),
                                'bulan_pelaksanaan_mulai' => $this->input->post('bulan_pelaksanaan_mulai'),
                                'bulan_pelaksanaan_selesai' => $this->input->post('bulan_pelaksanaan_selesai'),
                                'lokasi_giat' => $this->input->post('lokasi_giat'),
                                'lokasi_spesifik' => $this->input->post('lokasi_spesifik'),
                                'lokasi_lintang' => $this->input->post('lokasi_lintang'),
                                'lokasi_bujur' => $this->input->post('lokasi_bujur'),
                                'jenis_belanja' => $this->input->post('jenis_belanja'),
                                'volume_belanja' => $this->input->post('volume_belanja'),
                                'deskripsi_belanja' => $this->input->post('deskripsi_belanja'),
                                'file_dokumen_kak' => $user_doc,
                                'usulan_dari' => $this->input->post('usulan_dari'),             
                                // data realisasi fisik
                                'kf_1' => $kf_1,
                                'kf_2' => $kf_2,
                                'kf_3' => $kf_3,
                                'kf_4' => $kf_4,
                                'kf_5' => $kf_5,
                                'kf_6' => $kf_6,
                                'kf_7' => $kf_7,
                                'kf_8' => $kf_8,
                                'kf_9' => $kf_9,
                                'kf_10' => $kf_10,
                                'kf_11' => $kf_11,
                                'kf_12' => $kf_12,
                                // data realisasi keuangan    
                                'kk_1' => $kk_1,
                                'kk_2' => $kk_2,
                                'kk_3' => $kk_3,
                                'kk_4' => $kk_4,
                                'kk_5' => $kk_5,
                                'kk_6' => $kk_6,
                                'kk_7' => $kk_7,
                                'kk_8' => $kk_8,
                                'kk_9' => $kk_9,
                                'kk_10' => $kk_10,
                                'kk_11' => $kk_11,
                                'kk_12' => $kk_12,  
                                // log                                
                                'update_tgl' => date('Y-m-d H:i:s'),
                                'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                            );
                            $this->Belanja_model->update_belanja($kode_rek_belanja,$params);
                            $_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                            $data['belanja'] = $this->Belanja_model->get_belanja($kode_rek_belanja);
                            // hitung persentase realisasi belanja terhadap pagu (20nov2018)
                            for ($i=1; $i <= 12 ; $i++) { 
                                $data['belanja']['persen_kk_'.$i] = round(($data['belanja']['kk_'.$i] / $data['belanja']['pagu_giat_'.$i]) * 100 , 2);
                            }                            
                            $data['message'] = "Perubahan data baru berhasil. Silahkan melakukan perubahan data yang lain atau <a href='".base_url('belanja/index/'.$this->input->post('kode_giat'))."'>klik disini</a> untuk kembali ke daftar.";
                        }                    
                     }
                }
            }
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Edit Swakelola';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Daerah';
            $data['submenu2'] = 'Edit Swakelola';
            $data['_view'] = 'belanja/edit_swakelola';

            $this->load->view('layouts/main',$data);
        }
        else
            show_error('The data you are trying to edit does not exist.');
    }

    function edit_pengadaan($kode_rek_belanja, $operasi="", $value="")
    {        
        $data['belanja'] = $this->Belanja_model->get_belanja($kode_rek_belanja);
        $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($data['belanja']['kode_giat']);
        $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']);   
        $data['pd'] = $this->Pd_model->get_pd($this->session->userdata['logged_in']['user_pd']);        
        $bulan_ini = $this->session->userdata['logged_in']['bulan_ini'];
        $data['bulan_ini'] = $bulan_ini;
    
        $data['pphp'] = $this->Belanja_model->get_all_pphp($kode_rek_belanja);
        $data['pejabat'] = $this->Pejabat_model->get_all_p($this->session->userdata['logged_in']['user_pd']);
        $data['pejabat_pphp'] = $this->Pejabat_model->get_all_p_pphp($this->session->userdata['logged_in']['user_pd'],$kode_rek_belanja);
        $data['hasil_pemeriksaan'] = $this->Belanja_model->get_all_hasil_pemeriksaan($kode_rek_belanja);
        $data['foto_realisasi'] = $this->Belanja_model->get_all_foto_realisasi($kode_rek_belanja);

        $data['tab_menu'] = "umum";

        // hitung persentase realisasi belanja terhadap pagu (20nov2018)
        for ($i=1; $i <= 12 ; $i++) { 
            if ($data['belanja']['pagu_giat_'.$i] <> 0) {
                $data['belanja']['persen_kk_'.$i] = round(($data['belanja']['kk_'.$i] / $data['belanja']['pagu_giat_'.$i]) * 100 , 2);
            } else {
                $data['belanja']['persen_kk_'.$i] = 0;
            }
        }

        // if ($_POST){
        //     echo "<pre>";
        //     print_r($_POST);
        //     echo "</pre>";
        //     exit();            
        // }


        // jika tombol hapus foto realisasi diklik, mengecek variabel $_POST untuk mengambil id foto yang diklik
        foreach ( $_POST as $key => $value )
        {
            if ( preg_match('/btn_hapus_file_foto_realisasi/', $key) )
            {
                $id_foto_realisasi_yg_dihapus = substr(strrchr($key,"_"),1);
            }
        }        


        if(isset($data['belanja']['kode_rek_belanja']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                if($_POST['pilihan_nip_pphp']){    
                    $params = array(
                        'kode_rek_belanja' => $kode_rek_belanja,
                        'nip_pphp' => $this->input->post('pilihan_nip_pphp'),
                        'update_tgl' => date('Y-m-d H:i:s'),
                        'update_oleh' => $this->session->userdata['logged_in']['user_id'],                        
                    );
                    $nip_pphp = $this->Belanja_model->add_pphp($params);
                    $data['pphp'] = $this->Belanja_model->get_all_pphp($kode_rek_belanja);
                    $data['pejabat'] = $this->Pejabat_model->get_all_p($this->session->userdata['logged_in']['user_pd']);
                    $data['pejabat_pphp'] = $this->Pejabat_model->get_all_p_pphp($this->session->userdata['logged_in']['user_pd'],$kode_rek_belanja);
                    $data['tab_menu'] = "pemeriksaan";

                } elseif(
                        isset($_POST["btn_unggah_file_foto_realisasi_1"]) ||
                        isset($_POST["btn_unggah_file_foto_realisasi_2"]) ||
                        isset($_POST["btn_unggah_file_foto_realisasi_3"]) ||
                        isset($_POST["btn_unggah_file_foto_realisasi_4"]) ||
                        isset($_POST["btn_unggah_file_foto_realisasi_5"]) ||
                        isset($_POST["btn_unggah_file_foto_realisasi_6"]) ||
                        isset($_POST["btn_unggah_file_foto_realisasi_7"]) ||
                        isset($_POST["btn_unggah_file_foto_realisasi_8"]) ||
                        isset($_POST["btn_unggah_file_foto_realisasi_9"]) ||
                        isset($_POST["btn_unggah_file_foto_realisasi_10"]) ||
                        isset($_POST["btn_unggah_file_foto_realisasi_11"]) ||
                        isset($_POST["btn_unggah_file_foto_realisasi_12"]) 
                        ){        
                    
                    // menentukan bulan
                    if       (isset($_POST["btn_unggah_file_foto_realisasi_1"])) {
                        $pilihan_bulan_foto_realisasi = 1;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_2"])) {
                        $pilihan_bulan_foto_realisasi = 2;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_3"])) {
                        $pilihan_bulan_foto_realisasi = 3;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_4"])) {
                        $pilihan_bulan_foto_realisasi = 4;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_5"])) {
                        $pilihan_bulan_foto_realisasi = 5;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_6"])) {
                        $pilihan_bulan_foto_realisasi = 6;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_7"])) {
                        $pilihan_bulan_foto_realisasi = 7;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_8"])) {
                        $pilihan_bulan_foto_realisasi = 8;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_9"])) {
                        $pilihan_bulan_foto_realisasi = 9;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_10"])) {
                        $pilihan_bulan_foto_realisasi = 10;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_11"])) {
                        $pilihan_bulan_foto_realisasi = 11;
                    } elseif (isset($_POST["btn_unggah_file_foto_realisasi_12"])) {
                        $pilihan_bulan_foto_realisasi = 12;
                    }    
                    $jumlah_foto_dalam_db_saat_ini = $this->Belanja_model->count_foto_realisasi($data['belanja']['kode_rek_belanja']);
                    $jumlah_foto_dalam_db_saat_ini = $jumlah_foto_dalam_db_saat_ini + 1;

                    $data['success'] = TRUE;
                    $config['upload_path']          = './uploads/belanja/pengadaan/';
                    $config['allowed_types']        = 'jpg|jpeg|png|gif';
                    $config['max_size']             = $this->session->userdata['logged_in']['ukuran_file_upload'];
                    $config['overwrite']            = TRUE;                              
                    $config['file_name']            = 'foto-realisasi-'.$pilihan_bulan_foto_realisasi.'-'.$jumlah_foto_dalam_db_saat_ini.'-'.str_replace(".", "-", $kode_rek_belanja);   
                    $this->upload->initialize($config);
                    $nama_file_foto_realisasi = 'file_foto_realisasi_'.$pilihan_bulan_foto_realisasi;
                    if (!$this->upload->do_upload($nama_file_foto_realisasi)) {
                        $data['success'] = FALSE;
                        $data['message'] = "Unggah foto realisasi gagal. Pastikan file sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                    } else {
                        $upload_data = $this->upload->data();
                        $foto_realisasi = $upload_data['file_name'];
                    }      
                    if ($data['success']){
                        $params = array(
                            'kode_rek_belanja' => $kode_rek_belanja,
                            'file_foto_realisasi' => $foto_realisasi,
                            'bulan' => $pilihan_bulan_foto_realisasi,
                            'update_tgl' => date('Y-m-d H:i:s'),
                            'update_oleh' => $this->session->userdata['logged_in']['user_id'],                        
                        );
                        $this->Belanja_model->add_foto_realisasi($params);
                        unset($data["success"]);
                    }     
                    //$data['hasil_pemeriksaan'] = $this->Belanja_model->get_all_hasil_pemeriksaan($kode_rek_belanja);
                    $data['foto_realisasi'] = $this->Belanja_model->get_all_foto_realisasi($kode_rek_belanja);
                    $data['tab_menu'] = "kemajuan";     

                } elseif(isset($id_foto_realisasi_yg_dihapus)){ 
                    $this->Belanja_model->delete_foto_realisasi($id_foto_realisasi_yg_dihapus);
                    //$data['hasil_pemeriksaan'] = $this->Belanja_model->get_all_hasil_pemeriksaan($kode_rek_belanja);
                    $data['foto_realisasi'] = $this->Belanja_model->get_all_foto_realisasi($kode_rek_belanja);
                    $data['tab_menu'] = "kemajuan";                     


                // jika yang ditekan adalah tombol "Tambahkan Hasil Pemeriksaan"
                } elseif(isset($_POST["btn_tambah_hasil_pemeriksaan"])){    
                    $data['success'] = TRUE;
                    $this->form_validation->set_rules('tanggal_pemeriksaan', 'Tanggal Pemeriksaan', 'trim|required');
                    $this->form_validation->set_rules('hasil_pemeriksaan', 'Hasil Pemeriksaan', 'trim|required');
                    $this->form_validation->set_rules('nomor_berita_acara_pemeriksaan', 'Nomor BAP', 'trim|required');
                    $this->form_validation->set_message('required','{field} harus diisi!');
                    // if failed
                    if ($this->form_validation->run() == FALSE) {
                        // Send message to the view
                        $data['success'] = FALSE;
                        $data['message'] = "Periksa lagi isian yang anda masukkan.";                    
                    } else {
                        // upload doc                    
                        $config['upload_path']          = './uploads/belanja/pengadaan/';
                        $config['allowed_types']        = 'pdf|doc|docx';
                        $config['max_size']             = $this->session->userdata['logged_in']['ukuran_file_upload'];
                        $config['overwrite']            = TRUE;   


                        //$file_dokumen_kak = $data['belanja']['file_dokumen_kak'];                                                                   
                        if (!empty($_FILES["file_berita_acara_pemeriksaan"]["name"])) {                        
                            $config['file_name'] = 'bap-'.str_replace(".", "-", str_replace(".", "-", $kode_rek_belanja));
                            $this->upload->initialize($config);
                            if (!$this->upload->do_upload('file_berita_acara_pemeriksaan')) {
                                $data['success'] = FALSE;
                                $data['message'] = "Unggah dokumen berita acara pemeriksaan gagal. Pastikan file sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                            } else {
                                $upload_data = $this->upload->data();
                                $user_doc = $upload_data['file_name'];
                            }
                        }
                        if ($data['success']){
                            $params = array(
                                'kode_rek_belanja' => $this->input->post('kode_rek_belanja'),
                                'tanggal_pemeriksaan' => $this->input->post('tanggal_pemeriksaan'),
                                'hasil_pemeriksaan' => $this->input->post('hasil_pemeriksaan'),
                                'nomor_berita_acara_pemeriksaan' => $this->input->post('nomor_berita_acara_pemeriksaan'),
                                'file_berita_acara_pemeriksaan' => (isset($user_doc) ? $user_doc : ""),
                                'update_tgl' => date('Y-m-d H:i:s'),
                                'update_oleh' => $this->session->userdata['logged_in']['user_id'],                        
                            );
                            $this->Belanja_model->add_hasil_pemeriksaan($params);
                            unset($data["success"]);
                        }     
                    }
                    $data['hasil_pemeriksaan'] = $this->Belanja_model->get_all_hasil_pemeriksaan($kode_rek_belanja);
                    $data['tab_menu'] = "pemeriksaan";    

                } else {
                
                    $data['success'] = TRUE;
                    $this->form_validation->set_rules('nama_paket_pengadaan', 'Nama Paket Pengadaan', 'trim|required');
                    $this->form_validation->set_message('required','{field} harus diisi!');
                    // if failed
                    if ($this->form_validation->run() == FALSE) {
                        // Send message to the view
                        $data['success'] = FALSE;
                        $data['message'] = "Periksa lagi isian yang anda masukkan.";
                    // if succeed
                    } else {
                        $config['upload_path']          = './uploads/belanja/pengadaan/';
                        $config['allowed_types']        = 'pdf|doc|docx';
                        $config['max_size']             = $this->session->userdata['logged_in']['ukuran_file_upload'];
                        $config['overwrite']            = TRUE;

                        // initialization of the photos data
                        $file_dokumen_kak = $data['belanja']['file_dokumen_kak'];                        
                        $data['success'] = TRUE;
                        // upload doc
                        if (!empty($_FILES["file_dokumen_kak"]["name"])) {
                            $config['file_name'] = 'kak-tor-'.str_replace(".", "-", str_replace(".", "-", $kode_rek_belanja));
                            //$config['file_name'] = 'kak-tor';
                            $this->upload->initialize($config);
                            if (!$this->upload->do_upload('file_dokumen_kak')) {
                                $data['success'] = FALSE;
                                $data['message'] = "Unggah dokumen KAK/TOR gagal. Pastikan file sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                            } else {
                                $upload_data = $this->upload->data();
                                $file_dokumen_kak = $upload_data['file_name'];
                            }
                        }
                        // upload doc
                        $file_dokumen_kontrak = $data['belanja']['file_dokumen_kontrak'];
                        if (!empty($_FILES["file_dokumen_kontrak"]["name"])) {                            
                            $config['file_name'] = 'kontrak-'.str_replace(".", "-", str_replace(".", "-", $kode_rek_belanja));
                            $this->upload->initialize($config);
                            if (!$this->upload->do_upload('file_dokumen_kontrak')) {
                                $data['success'] = FALSE;
                                $data['message'] = "Unggah dokumen kontrak gagal. Pastikan file sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                            } else {
                                $upload_data = $this->upload->data();
                                $file_dokumen_kontrak = $upload_data['file_name'];
                            }
                        }
                        // upload doc
                        $konsultan_perencanaan_file_dokumen_kontrak = $data['belanja']['konsultan_perencanaan_file_dokumen_kontrak'];
                        if (!empty($_FILES["konsultan_perencanaan_file_dokumen_kontrak"]["name"])) {
                            $config['file_name'] = 'kontrak-perencanaan-'.str_replace(".", "-", $kode_rek_belanja);
                            $this->upload->initialize($config);
                            if (!$this->upload->do_upload('konsultan_perencanaan_file_dokumen_kontrak')) {
                                $data['success'] = FALSE;
                                $data['message'] = "Unggah dokumen kontrak perencanaan gagal. Pastikan file sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                            } else {
                                $upload_data = $this->upload->data();
                                $konsultan_perencanaan_file_dokumen_kontrak = $upload_data['file_name'];
                            }
                        }
                        // upload doc
                        $konsultan_pengawasan_file_dokumen_kontrak = $data['belanja']['konsultan_pengawasan_file_dokumen_kontrak'];
                        if (!empty($_FILES["konsultan_pengawasan_file_dokumen_kontrak"]["name"])) {
                            $config['file_name'] = 'kontrak-pengawasan-'.str_replace(".", "-", $kode_rek_belanja);
                            $this->upload->initialize($config);
                            if (!$this->upload->do_upload('konsultan_pengawasan_file_dokumen_kontrak')) {
                                $data['success'] = FALSE;
                                $data['message'] = "Unggah dokumen kontrak pengawasan gagal. Pastikan file sesuai dengan batasan format dan ukuran yang ditetapkan. Silahkan coba lagi.";
                            } else {
                                $upload_data = $this->upload->data();
                                $konsultan_pengawasan_file_dokumen_kontrak = $upload_data['file_name'];
                            }
                        }
                        // if uploads are ok, load data to database

                        if ($data['success']){

                            // untuk realisasi, otomatis isi yang terbesar
                            $kf_1 =  $this->input->post('kf_1');     
                            $kf_2 =  ($this->input->post('kf_2')  < $kf_1  ? $kf_1  : $this->input->post('kf_2'));     
                            $kf_3 =  ($this->input->post('kf_3')  < $kf_2  ? $kf_2  : $this->input->post('kf_3'));     
                            $kf_4 =  ($this->input->post('kf_4')  < $kf_3  ? $kf_3  : $this->input->post('kf_4'));     
                            $kf_5 =  ($this->input->post('kf_5')  < $kf_4  ? $kf_4  : $this->input->post('kf_5'));     
                            $kf_6 =  ($this->input->post('kf_6')  < $kf_5  ? $kf_5  : $this->input->post('kf_6'));     
                            $kf_7 =  ($this->input->post('kf_7')  < $kf_6  ? $kf_6  : $this->input->post('kf_7'));     
                            $kf_8 =  ($this->input->post('kf_8')  < $kf_7  ? $kf_7  : $this->input->post('kf_8'));     
                            $kf_9 =  ($this->input->post('kf_9')  < $kf_8  ? $kf_8  : $this->input->post('kf_9'));     
                            $kf_10 = ($this->input->post('kf_10') < $kf_9  ? $kf_9  : $this->input->post('kf_10'));   
                            $kf_11 = ($this->input->post('kf_11') < $kf_10 ? $kf_10 : $this->input->post('kf_11'));  
                            $kf_12 = ($this->input->post('kf_12') < $kf_11 ? $kf_11 : $this->input->post('kf_12'));  

                            $kk_1 =  $this->input->post('kk_1');      
                            $kk_2 =  ($this->input->post('kk_2')  < $kk_1  ? $kk_1  : $this->input->post('kk_2'));     
                            $kk_3 =  ($this->input->post('kk_3')  < $kk_2  ? $kk_2  : $this->input->post('kk_3'));     
                            $kk_4 =  ($this->input->post('kk_4')  < $kk_3  ? $kk_3  : $this->input->post('kk_4'));     
                            $kk_5 =  ($this->input->post('kk_5')  < $kk_4  ? $kk_4  : $this->input->post('kk_5'));     
                            $kk_6 =  ($this->input->post('kk_6')  < $kk_5  ? $kk_5  : $this->input->post('kk_6'));     
                            $kk_7 =  ($this->input->post('kk_7')  < $kk_6  ? $kk_6  : $this->input->post('kk_7'));     
                            $kk_8 =  ($this->input->post('kk_8')  < $kk_7  ? $kk_7  : $this->input->post('kk_8'));     
                            $kk_9 =  ($this->input->post('kk_9')  < $kk_8  ? $kk_8  : $this->input->post('kk_9'));     
                            $kk_10 = ($this->input->post('kk_10') < $kk_9  ? $kk_9  : $this->input->post('kk_10'));   
                            $kk_11 = ($this->input->post('kk_11') < $kk_10 ? $kk_10 : $this->input->post('kk_11'));  
                            $kk_12 = ($this->input->post('kk_12') < $kk_11 ? $kk_11 : $this->input->post('kk_12')); 

                            // save data to the database
                            $params = array(
                                // data umum
                                'nama_belanja' => $this->input->post('nama_belanja'),
                                'nama_paket_pengadaan' => $this->input->post('nama_paket_pengadaan'),
                                'pagu_giat' => $this->input->post('pagu_giat_'.$bulan_ini),
                                'pagu_giat_1' => $this->input->post('pagu_giat_1'),
                                'pagu_giat_2' => $this->input->post('pagu_giat_2'),
                                'pagu_giat_3' => $this->input->post('pagu_giat_3'),
                                'pagu_giat_4' => $this->input->post('pagu_giat_4'),
                                'pagu_giat_5' => $this->input->post('pagu_giat_5'),
                                'pagu_giat_6' => $this->input->post('pagu_giat_6'),
                                'pagu_giat_7' => $this->input->post('pagu_giat_7'),
                                'pagu_giat_8' => $this->input->post('pagu_giat_8'),
                                'pagu_giat_9' => $this->input->post('pagu_giat_9'),
                                'pagu_giat_10' => $this->input->post('pagu_giat_10'),
                                'pagu_giat_11' => $this->input->post('pagu_giat_11'),
                                'pagu_giat_12' => $this->input->post('pagu_giat_12'),
                                'bulan_pelaksanaan_mulai' => $this->input->post('bulan_pelaksanaan_mulai'),
                                'bulan_pelaksanaan_selesai' => $this->input->post('bulan_pelaksanaan_selesai'),
                                'lokasi_giat' => $this->input->post('lokasi_giat'),
                                'lokasi_spesifik' => $this->input->post('lokasi_spesifik'),
                                'lokasi_lintang' => $this->input->post('lokasi_lintang'),
                                'lokasi_bujur' => $this->input->post('lokasi_bujur'),
                                'usulan_dari' => $this->input->post('usulan_dari'),                        
                                'file_dokumen_kak' => $file_dokumen_kak,    
                                'nip_ppk' => $this->input->post('nip_ppk'),                        
                                'nip_pp' => $this->input->post('nip_pp'),                        
                                'jenis_pengadaan' => $this->input->post('jenis_pengadaan'),                        
                                'metode_pemilihan_peny' => $this->input->post('metode_pemilihan_peny'),
                                'jenis_belanja' => $this->input->post('jenis_belanja'),
                                'volume_belanja' => $this->input->post('volume_belanja'),
                                'hps' => $this->input->post('hps'), 
                                // penyedia
                                'nama_peny' => $this->input->post('nama_peny'), 
                                'nama_direktur' => $this->input->post('nama_direktur'), 
                                'alamat_peny' => $this->input->post('alamat_peny'), 
                                'kualifikasi_peny' => $this->input->post('kualifikasi_peny'), 
                                'nomor_kontrak' => $this->input->post('nomor_kontrak'), 
                                'tanggal_kontrak' => $this->input->post('tanggal_kontrak'), 
                                'jangka_waktu_kontrak' => $this->input->post('jangka_waktu_kontrak'), 
                                'tanggal_mulai_kontrak' => $this->input->post('tanggal_mulai_kontrak'),
                                'tanggal_selesai_kontrak' => $this->input->post('tanggal_selesai_kontrak'),
                                'nilai_kontrak' => $this->input->post('nilai_kontrak'),
                                'file_dokumen_kontrak' => $file_dokumen_kontrak,
                                // kemajuan
                                // data realisasi fisik
                                'kf_1' => $kf_1,
                                'kf_2' => $kf_2,
                                'kf_3' => $kf_3,
                                'kf_4' => $kf_4,
                                'kf_5' => $kf_5,
                                'kf_6' => $kf_6,
                                'kf_7' => $kf_7,
                                'kf_8' => $kf_8,
                                'kf_9' => $kf_9,
                                'kf_10' => $kf_10,
                                'kf_11' => $kf_11,
                                'kf_12' => $kf_12,
                                // data realisasi keuangan    
                                'kk_1' => $kk_1,
                                'kk_2' => $kk_2,
                                'kk_3' => $kk_3,
                                'kk_4' => $kk_4,
                                'kk_5' => $kk_5,
                                'kk_6' => $kk_6,
                                'kk_7' => $kk_7,
                                'kk_8' => $kk_8,
                                'kk_9' => $kk_9,
                                'kk_10' => $kk_10,
                                'kk_11' => $kk_11,
                                'kk_12' => $kk_12,      
                                // pemeriksa
                                'nomor_pphp' => $this->input->post('nomor_pphp'),
                                'tanggal_pphp' => $this->input->post('tanggal_pphp'),
                                // konsultan
                                'konsultan_perencanaan_nama_paket' => $this->input->post('konsultan_perencanaan_nama_paket'),
                                'konsultan_perencanaan_nama_penyedia' => $this->input->post('konsultan_perencanaan_nama_penyedia'),
                                'konsultan_perencanaan_alamat' => $this->input->post('konsultan_perencanaan_alamat'), 
                                'konsultan_perencanaan_nama_pimpinan' => $this->input->post('konsultan_perencanaan_nama_pimpinan'),   
                                'konsultan_perencanaan_alamat_pimpinan' => $this->input->post('konsultan_perencanaan_alamat_pimpinan'),
                                'konsultan_perencanaan_nilai_kontrak' => $this->input->post('konsultan_perencanaan_nilai_kontrak'),
                                'konsultan_perencanaan_file_dokumen_kontrak' => $konsultan_perencanaan_file_dokumen_kontrak,
                                'konsultan_pengawasan_nama_paket' => $this->input->post('konsultan_pengawasan_nama_paket'),
                                'konsultan_pengawasan_nama_penyedia' => $this->input->post('konsultan_pengawasan_nama_penyedia'),
                                'konsultan_pengawasan_alamat' => $this->input->post('konsultan_pengawasan_alamat'), 
                                'konsultan_pengawasan_nama_pimpinan' => $this->input->post('konsultan_pengawasan_nama_pimpinan'),   
                                'konsultan_pengawasan_alamat_pimpinan' => $this->input->post('konsultan_pengawasan_alamat_pimpinan'),
                                'konsultan_pengawasan_nilai_kontrak' => $this->input->post('konsultan_pengawasan_nilai_kontrak'),
                                'konsultan_pengawasan_file_dokumen_kontrak' => $konsultan_pengawasan_file_dokumen_kontrak,     
                                // pengguna                         
                                'pengguna_penerima' => $this->input->post('pengguna_penerima'),
                                'alamat_pengguna_penerima' => $this->input->post('alamat_pengguna_penerima'),
                                'pilihan_sudah_dimanfaatkan' => $this->input->post('pilihan_sudah_dimanfaatkan'),
                                'sudah_dimanfaatkan_sejak' => $this->input->post('sudah_dimanfaatkan_sejak'),
                                'belum_dimanfaatkan_karena' => $this->input->post('belum_dimanfaatkan_karena'),
                                //log    
                                'update_tgl' => date('Y-m-d H:i:s'),
                                'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                            );
                            $this->Belanja_model->update_belanja($kode_rek_belanja,$params);
                            $_POST = array(); // kosongkan array POST agar tidak dimunculkan lagi di isian
                            // load lagi data teruptodate
                            $data['belanja'] = $this->Belanja_model->get_belanja($kode_rek_belanja);

                            // hitung persentase realisasi belanja terhadap pagu (20nov2018)
                            for ($i=1; $i <= 12 ; $i++) { 
                                $data['belanja']['persen_kk_'.$i] = round(($data['belanja']['kk_'.$i] / $data['belanja']['pagu_giat_'.$i]) * 100 , 2);
                            }

                            $data['message'] = "Perubahan data baru berhasil. Silahkan melakukan perubahan data yang lain atau <a href='".base_url('belanja/index3/'.$data['belanja']['kode_giat'] )."'>klik disini</a> untuk kembali ke daftar.";
                            $data['tab_menu'] = "umum";
                        }
                    }
                } 
            } elseif ($operasi == 'tambah_nip_pphp'){
                $nip_pphp = $value;
                $this->Belanja_model->delete_pphp($kode_rek_belanja,$nip_pphp);
                $data['pphp'] = $this->Belanja_model->get_all_pphp($kode_rek_belanja);
                $data['pejabat'] = $this->Pejabat_model->get_all_p_pphp($this->session->userdata['logged_in']['user_pd'],$kode_rek_belanja);
                $data['tab_menu'] = "pemeriksaan";
            } elseif ($operasi == 'hapus_hasil_pemeriksaan'){
                $id_hasil_pemeriksaan = $value;
                $this->Belanja_model->delete_hasil_pemeriksaan($kode_rek_belanja,$id_hasil_pemeriksaan);
                $data['hasil_pemeriksaan'] = $this->Belanja_model->get_all_hasil_pemeriksaan($kode_rek_belanja);
                $data['tab_menu'] = "pemeriksaan";
            }

            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['subjudul'] = 'Edit Pengadaan';
            $data['menu'] = 'Perangkat Daerah';
            $data['submenu'] = 'Belanja Daerah';
            $data['submenu2'] = 'Edit Pengadaan';
            $data['_view'] = 'belanja/edit_pengadaan';
            $data['included_script'][0] = 'dynamic_selection.php';
            $this->load->view('layouts/main',$data);
        }
        else
            show_error('The data you are trying to edit does not exist.');
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
            redirect('belanja/index/'.$belanja['kode_giat']);
        }
        else
            show_error('The data you are trying to delete does not exist.');
    }

    function remove_jenis_belanja($kode_rek_belanja)
    {
        $belanja = $this->Belanja_model->get_belanja($kode_rek_belanja);
        // check if the belanja exists before trying to delete it
        if(isset($belanja['kode_rek_belanja']))
        {
            $params = array(
                'jenis_kegiatan ' => '',
            );            
            $this->Belanja_model->update_belanja($kode_rek_belanja,$params);
            //$this->Belanja_model->delete_belanja($kode_rek_belanja);
            redirect('belanja/index/'.$belanja['kode_giat']);
        }
        else
            show_error('The data you are trying to delete does not exist.');
    }    

    function view_swakelola($kode_rek_belanja)
    {
        $data['belanja'] = $this->Belanja_model->get_belanja_swakelola_view($kode_rek_belanja);
        $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($data['belanja']['kode_giat']);
        $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']);   
        $data['bulan'] = array(
                            1 => "Januari", 
                            2 => "Februari", 
                            3 => "Maret", 
                            4 => "April", 
                            5 => "Mei", 
                            6 => "Juni", 
                            7 => "Juli", 
                            8 => "Agustus", 
                            9 => "September", 
                            10 => "Oktober", 
                            11 => "November", 
                            12 => "Desember" );
        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['subjudul'] = 'Tampil Belanja Pengadaan';
        $data['menu'] = 'Perangkat Daerah';
        $data['submenu'] = 'Belanja Daerah';
        $data['submenu2'] = 'Tampil Swakelola';
        $data['_view'] = 'belanja/view_swakelola';
        $this->load->view('layouts/main',$data);
    }    

    function view_pengadaan($kode_rek_belanja)
    {
        $data['belanja'] = $this->Belanja_model->get_belanja_pengadaan_view($kode_rek_belanja);
        $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($data['belanja']['kode_giat']);
        $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']);   
        $data['pphp'] = $this->Belanja_model->get_all_pphp($kode_rek_belanja);
        $data['pejabat'] = $this->Pejabat_model->get_all_p($this->session->userdata['logged_in']['user_pd']);
        $data['pejabat_pphp'] = $this->Pejabat_model->get_all_p_pphp($this->session->userdata['logged_in']['user_pd'],$kode_rek_belanja);
        $data['hasil_pemeriksaan'] = $this->Belanja_model->get_all_hasil_pemeriksaan($kode_rek_belanja);
        $data['foto_realisasi'] = $this->Belanja_model->get_all_foto_realisasi($kode_rek_belanja);
        $data['bulan'] = array(
                            1 => "Januari", 
                            2 => "Februari", 
                            3 => "Maret", 
                            4 => "April", 
                            5 => "Mei", 
                            6 => "Juni", 
                            7 => "Juli", 
                            8 => "Agustus", 
                            9 => "September", 
                            10 => "Oktober", 
                            11 => "November", 
                            12 => "Desember" );
        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['subjudul'] = 'Tampil Belanja Pengadaan';
        $data['menu'] = 'Perangkat Daerah';
        $data['submenu'] = 'Belanja Daerah';
        $data['submenu2'] = 'Tampil Pengadaan';
        $data['_view'] = 'belanja/view_pengadaan';
        $this->load->view('layouts/main',$data);
    }

    // Callback function untuk cek duplikasi kode_prog
    public function check_duplicate_kode_rek_belanja($kode_rek_belanja) {
        return $this->Belanja_model->check_duplicate($kode_rek_belanja);
    }

}
