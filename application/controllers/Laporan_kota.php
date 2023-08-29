<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan_kota extends CI_Controller{
    
    private $myconfig;
    private $bulan_ini;


    function __construct()
    {
        parent::__construct();
        $this->load->model('Program_model');
        $this->load->model('Kegiatan_model');
        $this->load->model('Belanja_model');
        $this->load->model('Pejabat_model');
        $this->load->model('Pd_model');
        $this->load->model('Laporan_model');
        $this->load->model('Laporan_kota_model');
        $this->load->model('Config_model');
        $this->myconfig = $this->Config_model->get_config(1);
        $this->load->library('myclass');
        $this->bulan_ini = $this->myconfig["bulan_ini"];

        //$this->output->enable_profiler(TRUE);
    }

    function index($tahun_anggaran, $report = FALSE) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['total_kota'] = $this->Laporan_kota_model->get_total_target_realisasi_kota($tahun_anggaran);
        $data["bulan_ini"] = $this->bulan_ini;
        $data["nama_bulan_ini"] = $this->myclass->bulan_tahun_indo($data["bulan_ini"],$tahun_anggaran);
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Total Anggaran Kota';
        if (!$report){
            $data['_view'] = 'laporan_kota/index';
            $this->load->view('layouts/main_public',$data);
        } else {
            $this->load->view('laporan_kota/laporan',$data);            
        }
    }


    function index_bl($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['total_kota'] = $this->Laporan_kota_model->get_total_target_realisasi_kota($tahun_anggaran);
        $data["bulan_ini"] = $this->myconfig["bulan_ini"];
        $data["nama_bulan_ini"] = $this->myclass->bulan_tahun_indo($data["bulan_ini"],$tahun_anggaran);
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Belanja Langsung';
        $data['_view'] = 'laporan_kota/index_bl';
        $this->load->view('layouts/main_public',$data);
    }

    function index_btl($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['total_kota'] = $this->Laporan_kota_model->get_total_target_realisasi_kota($tahun_anggaran);
        $data["bulan_ini"] = $this->myconfig["bulan_ini"];
        $data["nama_bulan_ini"] = $this->myclass->bulan_tahun_indo($data["bulan_ini"],$tahun_anggaran);
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Belanja Tidak Langsung';
        $data['_view'] = 'laporan_kota/index_btl';
        $this->load->view('layouts/main_public',$data);
    }


function index_pptk($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        $data["bulan_ini"] = $this->myconfig["bulan_ini"];
        $data['laporan_kinerja_pptk'] = $this->Laporan_kota_model->get_kinerja_pptk($data["bulan_ini"]);
        $data['laporan_kinerja_pptk_total'] = $this->Laporan_kota_model->get_kinerja_pptk_total();
        $data['laporan_kinerja_pptk_terendah_fisik'] = $this->Laporan_kota_model->get_kinerja_pptk_terendah_fisik($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_kinerja_pptk_terendah_keuangan'] = $this->Laporan_kota_model->get_kinerja_pptk_terendah_keuangan($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_kinerja_pptk_tertinggi_fisik'] = $this->Laporan_kota_model->get_kinerja_pptk_tertinggi_fisik($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_kinerja_pptk_tertinggi_keuangan'] = $this->Laporan_kota_model->get_kinerja_pptk_tertinggi_keuangan($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl']);

        switch ($this->myconfig["bulan_ini"]) {
            case 1:
                $data['nama_bulan_ini'] = "Januari ".$this->myconfig["tahun_ini"];
                break;
            case 2:
                $data['nama_bulan_ini'] = "Februari ".$this->myconfig["tahun_ini"];
                break;
            case 3:
                $data['nama_bulan_ini'] = "Maret ".$this->myconfig["tahun_ini"];
                break;
            case 4:
                $data['nama_bulan_ini'] = "April ".$this->myconfig["tahun_ini"];
                break;
            case 5:
                $data['nama_bulan_ini'] = "Mei ".$this->myconfig["tahun_ini"];
                break;
            case 6:
                $data['nama_bulan_ini'] = "Juni ".$this->myconfig["tahun_ini"];
                break;
            case 7:
                $data['nama_bulan_ini'] = "Juli ".$this->myconfig["tahun_ini"];
                break;
            case 8:
                $data['nama_bulan_ini'] = "Agustus ".$this->myconfig["tahun_ini"];
                break;
            case 9:
                $data['nama_bulan_ini'] = "September ".$this->myconfig["tahun_ini"];
                break;
            case 10:
                $data['nama_bulan_ini'] = "Oktober ".$this->myconfig["tahun_ini"];
                break;
            case 11:
                $data['nama_bulan_ini'] = "November ".$this->myconfig["tahun_ini"];
                break;
            case 12:
                $data['nama_bulan_ini'] = "Desember ".$this->myconfig["tahun_ini"];
                break;
        }
        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['_view'] = 'laporan/index_pptk';
        $this->load->view('layouts/main',$data);
    }

function index_pptk_daftar_kegiatan($tahun_anggaran,$nip_pptk) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['laporan_kinerja_pptk_detail'] = $this->Laporan_model->get_kinerja_pptk_detail($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl'],$nip_pptk);
        $data['laporan_kinerja_pptk_chart'] = $this->Laporan_model->get_kinerja_pptk_chart($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_giat_btl'],$nip_pptk);
        $data['laporan_kinerja_pptk_detail_total'] = $this->Laporan_model->get_kinerja_pptk_detail_total($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl'],$nip_pptk);

        switch ($this->myconfig["bulan_ini"]) {
            case 1:
                $data['nama_bulan_ini'] = "Januari ".$this->myconfig["tahun_ini"];
                break;
            case 2:
                $data['nama_bulan_ini'] = "Februari ".$this->myconfig["tahun_ini"];
                break;
            case 3:
                $data['nama_bulan_ini'] = "Maret ".$this->myconfig["tahun_ini"];
                break;
            case 4:
                $data['nama_bulan_ini'] = "April ".$this->myconfig["tahun_ini"];
                break;
            case 5:
                $data['nama_bulan_ini'] = "Mei ".$this->myconfig["tahun_ini"];
                break;
            case 6:
                $data['nama_bulan_ini'] = "Juni ".$this->myconfig["tahun_ini"];
                break;
            case 7:
                $data['nama_bulan_ini'] = "Juli ".$this->myconfig["tahun_ini"];
                break;
            case 8:
                $data['nama_bulan_ini'] = "Agustus ".$this->myconfig["tahun_ini"];
                break;
            case 9:
                $data['nama_bulan_ini'] = "September ".$this->myconfig["tahun_ini"];
                break;
            case 10:
                $data['nama_bulan_ini'] = "Oktober ".$this->myconfig["tahun_ini"];
                break;
            case 11:
                $data['nama_bulan_ini'] = "November ".$this->myconfig["tahun_ini"];
                break;
            case 12:
                $data['nama_bulan_ini'] = "Desember ".$this->myconfig["tahun_ini"];
                break;
        }
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran ;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['submenu3'] = 'Daftar Kegiatan';
        $data['_view'] = 'laporan/index_pptk_daftar_kegiatan';
        $this->load->view('layouts/main',$data);
    }

function index_pptk_detail_kegiatan($tahun_anggaran,$kode_giat) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['laporan_realisasi_kegiatan'] = $this->Laporan_model->get_laporan_realisasi_kegiatan($this->myconfig["bulan_ini"],$kode_giat);
        $data['laporan_realisasi_kegiatan_chart'] = $this->Laporan_model->get_laporan_realisasi_kegiatan_chart($kode_giat);
        $data['bulan_ini'] = $this->myconfig["bulan_ini"];
        // $data['laporan_kinerja_pptk_detail_total'] = $this->Laporan_model->get_kinerja_pptk_detail_total($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl'],$nip_pptk);

        switch ($data['bulan_ini']) {
            case 1:
                $data['nama_bulan_ini'] = "Januari ".$this->myconfig["tahun_ini"];
                break;
            case 2:
                $data['nama_bulan_ini'] = "Februari ".$this->myconfig["tahun_ini"];
                break;
            case 3:
                $data['nama_bulan_ini'] = "Maret ".$this->myconfig["tahun_ini"];
                break;
            case 4:
                $data['nama_bulan_ini'] = "April ".$this->myconfig["tahun_ini"];
                break;
            case 5:
                $data['nama_bulan_ini'] = "Mei ".$this->myconfig["tahun_ini"];
                break;
            case 6:
                $data['nama_bulan_ini'] = "Juni ".$this->myconfig["tahun_ini"];
                break;
            case 7:
                $data['nama_bulan_ini'] = "Juli ".$this->myconfig["tahun_ini"];
                break;
            case 8:
                $data['nama_bulan_ini'] = "Agustus ".$this->myconfig["tahun_ini"];
                break;
            case 9:
                $data['nama_bulan_ini'] = "September ".$this->myconfig["tahun_ini"];
                break;
            case 10:
                $data['nama_bulan_ini'] = "Oktober ".$this->myconfig["tahun_ini"];
                break;
            case 11:
                $data['nama_bulan_ini'] = "November ".$this->myconfig["tahun_ini"];
                break;
            case 12:
                $data['nama_bulan_ini'] = "Desember ".$this->myconfig["tahun_ini"];
                break;
        }
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        $data['judul'] = "Laporan Kota";
        $data['subjudul'] = 'Daftar Pejabat';
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran ;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['submenu3'] = 'Detail Kegiatan';
        $data['_view'] = 'laporan/index_pptk_detail_kegiatan';
        $this->load->view('layouts/main',$data);
    }

function index_pptk_detail_belanja_swakelola($tahun_anggaran,$kode_rek_belanja) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['belanja'] = $this->Belanja_model->get_belanja_pengadaan_view($kode_rek_belanja);
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

        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['submenu3'] = 'Detail Swakelola';
        $data['_view'] = 'laporan/index_pptk_detail_belanja_swakelola';
        $this->load->view('layouts/main',$data);
    } 

function index_pptk_detail_belanja_pengadaan($tahun_anggaran,$kode_rek_belanja) // tahun anggaran akan diimplementasikan kemudian
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

        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['submenu3'] = 'Detail Pengadaan';
        $data['_view'] = 'laporan/index_pptk_detail_belanja_pengadaan';
        $this->load->view('layouts/main',$data);
    }     

function index_ppk($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['laporan_kinerja_ppk'] = $this->Laporan_model->get_kinerja_ppk($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit();        
        $data['laporan_kinerja_pptk_total'] = $this->Laporan_model->get_kinerja_pptk_total($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_kinerja_pptk_terendah_fisik'] = $this->Laporan_model->get_kinerja_pptk_terendah_fisik($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_kinerja_pptk_terendah_keuangan'] = $this->Laporan_model->get_kinerja_pptk_terendah_keuangan($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_kinerja_pptk_tertinggi_fisik'] = $this->Laporan_model->get_kinerja_pptk_tertinggi_fisik($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_kinerja_pptk_tertinggi_keuangan'] = $this->Laporan_model->get_kinerja_pptk_tertinggi_keuangan($this->session->userdata['logged_in']['user_pd'], $this->myconfig["bulan_ini"], $this->session->userdata['logged_in']['user_kode_giat_btl']);

        switch ($this->myconfig["bulan_ini"]) {
            case 1:
                $data['nama_bulan_ini'] = "Januari ".$this->myconfig["tahun_ini"];
                break;
            case 2:
                $data['nama_bulan_ini'] = "Februari ".$this->myconfig["tahun_ini"];
                break;
            case 3:
                $data['nama_bulan_ini'] = "Maret ".$this->myconfig["tahun_ini"];
                break;
            case 4:
                $data['nama_bulan_ini'] = "April ".$this->myconfig["tahun_ini"];
                break;
            case 5:
                $data['nama_bulan_ini'] = "Mei ".$this->myconfig["tahun_ini"];
                break;
            case 6:
                $data['nama_bulan_ini'] = "Juni ".$this->myconfig["tahun_ini"];
                break;
            case 7:
                $data['nama_bulan_ini'] = "Juli ".$this->myconfig["tahun_ini"];
                break;
            case 8:
                $data['nama_bulan_ini'] = "Agustus ".$this->myconfig["tahun_ini"];
                break;
            case 9:
                $data['nama_bulan_ini'] = "September ".$this->myconfig["tahun_ini"];
                break;
            case 10:
                $data['nama_bulan_ini'] = "Oktober ".$this->myconfig["tahun_ini"];
                break;
            case 11:
                $data['nama_bulan_ini'] = "November ".$this->myconfig["tahun_ini"];
                break;
            case 12:
                $data['nama_bulan_ini'] = "Desember ".$this->myconfig["tahun_ini"];
                break;
        }
        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['_view'] = 'laporan/index_pptk';
        $this->load->view('layouts/main',$data);
    }

function index_jenis_pengadaan($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['laporan_jenis_pengadaan'] = $this->Laporan_model->get_laporan_jenis_pengadaan($this->session->userdata['logged_in']['user_pd']);
        $data['laporan_jenis_pengadaan_total'] = $this->Laporan_model->get_laporan_jenis_pengadaan_total($this->session->userdata['logged_in']['user_pd']);
        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Jenis Pengadaan';
        $data['_view'] = 'laporan/index_jenis_pengadaan';
        $this->load->view('layouts/main',$data);
    }    

function index_jenis_pengadaan_detail_pptk($tahun_anggaran,$nip_pptk) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['laporan_jenis_pengadaan_detail'] = $this->Laporan_model->get_laporan_jenis_pengadaan_detail($this->session->userdata['logged_in']['user_pd'],$nip_pptk);
        $data['laporan_jenis_pengadaan_detail_tabel'] = $this->Laporan_model->get_laporan_jenis_pengadaan_detail_tabel($this->session->userdata['logged_in']['user_pd'],$nip_pptk);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Jenis Pengadaan';
        $data['submenu3'] = 'Detail PPTK';
        $data['_view'] = 'laporan/index_jenis_pengadaan_detail_pptk';
        $this->load->view('layouts/main',$data);
    }    

function index_jenis_pengadaan_detail_pengadaan($tahun_anggaran,$kode_rek_belanja) // tahun anggaran akan diimplementasikan kemudian
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

        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Jenis Pengadaan';
        $data['submenu3'] = 'Detail Pengadaan';
        $data['_view'] = 'laporan/index_jenis_pengadaan_detail_pengadaan';
        $this->load->view('layouts/main',$data);
    }      

function index_metode_pemilihan_penyedia($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['laporan_metode_pemilihan_penyedia_barang'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_barang($this->session->userdata['logged_in']['user_pd']);
        $data['laporan_metode_pemilihan_penyedia_konstruksi'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_konstruksi($this->session->userdata['logged_in']['user_pd']);
        $data['laporan_metode_pemilihan_penyedia_konsultan'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_konsultan($this->session->userdata['logged_in']['user_pd']);
        $data['laporan_metode_pemilihan_penyedia_jasa_lainnya'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_jasa_lainnya($this->session->userdata['logged_in']['user_pd']);

        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Metode Pemilihan Penyedia';
        $data['_view'] = 'laporan/index_metode_pemilihan_penyedia';
        $this->load->view('layouts/main',$data);
    } 

function index_metode_pemilihan_penyedia_detail_pptk($tahun_anggaran,$nip_pptk) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['laporan_metode_pemilihan_penyedia_detail_pptk'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_detail_pptk($this->session->userdata['logged_in']['user_pd'],$nip_pptk);
        $data['laporan_metode_pemilihan_penyedia_detail_pptk_tabel'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_detail_pptk_tabel($this->session->userdata['logged_in']['user_pd'],$nip_pptk);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Metode Pemilihan Penyedia';
        $data['submenu3'] = 'Detail PPTK';
        $data['_view'] = 'laporan/index_metode_pemilihan_penyedia_detail_pptk';
        $this->load->view('layouts/main',$data);
    }      

function index_metode_pemilihan_penyedia_detail_pengadaan($tahun_anggaran,$kode_rek_belanja) // tahun anggaran akan diimplementasikan kemudian
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

        $data['judul'] = "Laporan Kota";
        $data['menu'] = 'Laporan Kota';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Metode Pemilihan Penyedia';
        $data['submenu3'] = 'Detail Pengadaan';
        $data['_view'] = 'laporan/index_metode_pemilihan_penyedia_detail_pengadaan';
        $this->load->view('layouts/main',$data);
    }

}
