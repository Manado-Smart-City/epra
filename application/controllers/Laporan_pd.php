<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan_pd extends CI_Controller{

    private $myconfig;

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
        //$this->output->enable_profiler(TRUE);
    }


    function daftar_pd($tahun_anggaran = "") // tahun anggaran akan diimplementasikan kemudian
    {
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['bulan_ini'] = $this->myconfig["bulan_ini"];
        $data['jumlah_pd'] = 57;
        $data['anggaran_total_kota'] = $this->Laporan_kota_model->get_anggaran_total_kota($tahun_anggaran)->anggaran_total_kota;   

        // DINAS, BADAN dan LEMBAGA TEKNIS
        $data['daftar_pd'] = $this->Laporan_kota_model->get_daftar_pd_dinas($tahun_anggaran);   
        $tabel_kota = $data['daftar_pd'];


        // realisasi fisik tertinggi
        foreach ($tabel_kota as $key => $row) {
            $realisasi_fisik_tertinggi[$key]  = $row['total_realisasi_fisik_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_fisik_tertinggi, SORT_DESC,$tabel_kota);     
        $data['realisasi_fisik_5_tertinggi_dinas'] = array_slice($tabel_kota,0,5);     

        // realisasi fisik terendah
        foreach ($tabel_kota as $key => $row) {
            $realisasi_fisik_terendah[$key]  = $row['total_realisasi_fisik_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_fisik_terendah, SORT_ASC,$tabel_kota);     
        $data['realisasi_fisik_5_terendah_dinas'] = array_slice($tabel_kota,0,5); 

        // realisasi keuangan tertinggi
        foreach ($tabel_kota as $key => $row) {
            $realisasi_keuangan_tertinggi[$key]  = $row['total_realisasi_keuangan_persen_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_keuangan_tertinggi, SORT_DESC,$tabel_kota);     
        $data['realisasi_keuangan_5_tertinggi_dinas'] = array_slice($tabel_kota,0,5);   

        // realisasi keuangan terendah
        foreach ($tabel_kota as $key => $row) {
            $realisasi_keuangan_terendah[$key]  = $row['total_realisasi_keuangan_persen_'.$data['bulan_ini']];
        }

        array_multisort($realisasi_keuangan_terendah, SORT_ASC,$tabel_kota);     
        $data['realisasi_keuangan_5_terendah_dinas'] = array_slice($tabel_kota,0,5);       



        // SETDA -----------------------------------------------------------------------------------
        $data['daftar_pd'] = $this->Laporan_kota_model->get_daftar_pd_setda($tahun_anggaran);   
        $tabel_kota = $data['daftar_pd'];

        unset($realisasi_fisik_tertinggi);
        unset($realisasi_fisik_terendah);
        unset($realisasi_keuangan_tertinggi);
        unset($realisasi_keuangan_terendah);

        // realisasi fisik tertinggi
        foreach ($tabel_kota as $key => $row) {
            $realisasi_fisik_tertinggi[$key]  = $row['total_realisasi_fisik_'.$data['bulan_ini']];
        }
        
        array_multisort($realisasi_fisik_tertinggi, SORT_DESC,$tabel_kota);     
        $data['realisasi_fisik_5_tertinggi_setda'] = array_slice($tabel_kota,0,5);     

        // realisasi fisik terendah
        foreach ($tabel_kota as $key => $row) {
            $realisasi_fisik_terendah[$key]  = $row['total_realisasi_fisik_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_fisik_terendah, SORT_ASC,$tabel_kota);     
        $data['realisasi_fisik_5_terendah_setda'] = array_slice($tabel_kota,0,5); 

        // realisasi keuangan tertinggi
        foreach ($tabel_kota as $key => $row) {
            $realisasi_keuangan_tertinggi[$key]  = $row['total_realisasi_keuangan_persen_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_keuangan_tertinggi, SORT_DESC,$tabel_kota);     
        $data['realisasi_keuangan_5_tertinggi_setda'] = array_slice($tabel_kota,0,5);   

        // realisasi keuangan terendah
        foreach ($tabel_kota as $key => $row) {
            $realisasi_keuangan_terendah[$key]  = $row['total_realisasi_keuangan_persen_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_keuangan_terendah, SORT_ASC,$tabel_kota);     
        $data['realisasi_keuangan_5_terendah_setda'] = array_slice($tabel_kota,0,5);            



        // KECAMATAN
        $data['daftar_pd'] = $this->Laporan_kota_model->get_daftar_pd_kecamatan($tahun_anggaran);   
        $tabel_kota = $data['daftar_pd'];

        unset($realisasi_fisik_tertinggi);
        unset($realisasi_fisik_terendah);
        unset($realisasi_keuangan_tertinggi);
        unset($realisasi_keuangan_terendah);

        // realisasi fisik tertinggi
        foreach ($tabel_kota as $key => $row) {
            $realisasi_fisik_tertinggi[$key]  = $row['total_realisasi_fisik_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_fisik_tertinggi, SORT_DESC,$tabel_kota);     
        $data['realisasi_fisik_5_tertinggi_kecamatan'] = array_slice($tabel_kota,0,5);     

        // realisasi fisik terendah
        foreach ($tabel_kota as $key => $row) {
            $realisasi_fisik_terendah[$key]  = $row['total_realisasi_fisik_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_fisik_terendah, SORT_ASC,$tabel_kota);     
        $data['realisasi_fisik_5_terendah_kecamatan'] = array_slice($tabel_kota,0,5); 

        // realisasi keuangan tertinggi
        foreach ($tabel_kota as $key => $row) {
            $realisasi_keuangan_tertinggi[$key]  = $row['total_realisasi_keuangan_persen_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_keuangan_tertinggi, SORT_DESC,$tabel_kota);     
        $data['realisasi_keuangan_5_tertinggi_kecamatan'] = array_slice($tabel_kota,0,5);   

        // realisasi keuangan terendah
        foreach ($tabel_kota as $key => $row) {
            $realisasi_keuangan_terendah[$key]  = $row['total_realisasi_keuangan_persen_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_keuangan_terendah, SORT_ASC,$tabel_kota);     
        $data['realisasi_keuangan_5_terendah_kecamatan'] = array_slice($tabel_kota,0,5); 



        // AMBIL LAGI SEMUANYA
        $data['daftar_pd'] = $this->Laporan_kota_model->get_daftar_pd($tahun_anggaran);  


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
        // echo print_r($data);
        // echo "</pre>";        
        // exit();
        $data['judul'] = "";
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Daftar PD';
        $data['_view'] = 'laporan_pd/daftar_pd';
        $this->load->view('layouts/main_public',$data);        

    }

    function index($tahun_anggaran, $kode_pd, $report = FALSE) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd);
        $data['kepala_pd'] = $this->Pejabat_model->get_p($data['pd']['nip_kepala']);      
        if ($data['kepala_pd']['foto_p'] == "") {
          $data['kepala_pd']['foto_p'] = "no-pict.jpg";
        }  

        $data['total_anggaran'] = $this->Belanja_model->get_all_total_anggaran_pd($kode_pd);
        $data['total_anggaran_bl'] = $this->Belanja_model->get_all_total_anggaran_bl_pd($kode_pd,$data['pd']['kode_prog_btl']);
        $data['total_anggaran_btl'] = $this->Belanja_model->get_all_total_anggaran_btl_pd($kode_pd,$data['pd']['kode_prog_btl']);

        $data['jumlah_program'] = $this->Program_model->get_jumlah_program($kode_pd,$data['pd']['kode_prog_btl']);
        $data['jumlah_kegiatan'] = $this->Kegiatan_model->get_jumlah_kegiatan($kode_pd,$data['pd']['kode_giat_btl']);
        $data['jumlah_belanja'] = $this->Belanja_model->get_jumlah_belanja($kode_pd,$data['pd']['kode_giat_btl']);

        $data['realisasi_pd'] = $this->Laporan_model->get_realisasi_pd($tahun_anggaran, $kode_pd);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        $data['bulan_ini'] = $this->myconfig["bulan_ini"];
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

        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd;
        $data['judul'] = $data['pd']['nama_pd'];
        //$data['subjudul'] = 'Daftar Pejabat';
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Total Anggaran PD';
        // $data['_view'] = 'laporan_pd/index';
        // $this->load->view('layouts/main_public',$data);
        if (!$report){
            $data['_view'] = 'laporan_pd/index';
            $this->load->view('layouts/main_public',$data);
        } else {
            $this->load->view('laporan_pd/laporan',$data);            
        }        
    }


    function index_bl($tahun_anggaran,$kode_pd, $report = FALSE) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['total_anggaran'] = $this->Belanja_model->get_all_total_anggaran_pd($kode_pd);
        $data['total_anggaran_bl'] = $this->Belanja_model->get_all_total_anggaran_bl_pd($kode_pd,$data['pd']['kode_prog_btl']);
        $data['total_anggaran_btl'] = $this->Belanja_model->get_all_total_anggaran_btl_pd($kode_pd,$data['pd']['kode_prog_btl']);

        $data['persentase_bl'] = ($data['total_anggaran_bl'] / $data['total_anggaran']) * 100;

        $data['jumlah_program'] = $this->Program_model->get_jumlah_program($kode_pd,$data['pd']['kode_prog_btl']);
        $data['jumlah_kegiatan'] = $this->Kegiatan_model->get_jumlah_kegiatan($kode_pd,$data['pd']['kode_giat_btl']);
        $data['jumlah_belanja'] = $this->Belanja_model->get_jumlah_belanja($kode_pd,$data['pd']['kode_giat_btl']);

        $data['jumlah_belanja_swakelola'] = $this->Belanja_model->get_jumlah_belanja_swakelola($kode_pd,$data['pd']['kode_giat_btl']);
        $data['jumlah_belanja_pengadaan'] = $this->Belanja_model->get_jumlah_belanja_pengadaan($kode_pd,$data['pd']['kode_giat_btl']);

        $data['realisasi_pd'] = $this->Laporan_model->get_realisasi_pd($tahun_anggaran, $kode_pd);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        $data['bulan_ini'] = $this->myconfig["bulan_ini"];
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

        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd;
        $data['judul'] = $data['pd']['nama_pd'];
        //$data['subjudul'] = 'Daftar Pejabat';
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Belanja Langsung';
        if (!$report){
            $data['_view'] = 'laporan_pd/index_bl';
            $this->load->view('layouts/main_public',$data);
        } else {
            $this->load->view('laporan_pd/laporan_bl',$data);            
        }        
    }

function index_btl($tahun_anggaran,$kode_pd, $report = FALSE) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['total_anggaran'] = $this->Belanja_model->get_all_total_anggaran_pd($kode_pd);
        $data['total_anggaran_bl'] = $this->Belanja_model->get_all_total_anggaran_bl_pd($kode_pd,$data['pd']['kode_prog_btl']);
        $data['total_anggaran_btl'] = $this->Belanja_model->get_all_total_anggaran_btl_pd($kode_pd,$data['pd']['kode_prog_btl']);

        $data['persentase_btl'] = ($data['total_anggaran_btl'] / $data['total_anggaran']) * 100;

        $data['jumlah_program'] = $this->Program_model->get_jumlah_program($kode_pd,$data['pd']['kode_prog_btl']);
        $data['jumlah_kegiatan'] = $this->Kegiatan_model->get_jumlah_kegiatan($kode_pd,$data['pd']['kode_giat_btl']);
        $data['jumlah_belanja'] = $this->Belanja_model->get_jumlah_belanja($kode_pd,$data['pd']['kode_giat_btl']);

        $data['realisasi_pd'] = $this->Laporan_model->get_realisasi_pd($tahun_anggaran, $kode_pd);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        $data['bulan_ini'] = $this->myconfig["bulan_ini"];
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
        
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd;
        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Belanja Tidak Langsung';
        if (!$report){
            $data['_view'] = 'laporan_pd/index_btl';
            $this->load->view('layouts/main_public',$data);
        } else {
            $this->load->view('laporan_pd/laporan_btl',$data);            
        }         
    }

function index_pptk($tahun_anggaran,$kode_pd, $report = FALSE) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['laporan_kinerja_pptk'] = $this->Laporan_model->get_kinerja_pptk($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl']);
        $data['laporan_kinerja_pptk_total'] = $this->Laporan_model->get_kinerja_pptk_total($kode_pd, $data['pd']['kode_giat_btl']);
        // $data['laporan_kinerja_pptk_terendah_fisik'] = $this->Laporan_model->get_kinerja_pptk_terendah_fisik($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl']);
        // $data['laporan_kinerja_pptk_terendah_keuangan'] = $this->Laporan_model->get_kinerja_pptk_terendah_keuangan($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl']);
        // $data['laporan_kinerja_pptk_tertinggi_fisik'] = $this->Laporan_model->get_kinerja_pptk_tertinggi_fisik($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl']);
        // $data['laporan_kinerja_pptk_tertinggi_keuangan'] = $this->Laporan_model->get_kinerja_pptk_tertinggi_keuangan($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl']);

        $data['bulan_ini'] = $this->myconfig["bulan_ini"];
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
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd;        
        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Kinerja PPTK';

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        if (!$report){
            $data['_view'] = 'laporan_pd/index_pptk';    
            $this->load->view('layouts/main_public',$data);
        } else {
            $this->load->view('laporan_pd/laporan_pptk',$data);            
        }         
    }

function index_pptk_daftar_kegiatan($tahun_anggaran,$kode_pd,$nip_pptk, $report = FALSE) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['laporan_kinerja_pptk_detail'] = $this->Laporan_model->get_kinerja_pptk_detail($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl'],$nip_pptk);
        $data['laporan_kinerja_pptk_tabel_kegiatan'] = $this->Laporan_model->get_kinerja_pptk_tabel_kegiatan($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl'],$nip_pptk);

        $data['bulan_ini'] = $this->myconfig["bulan_ini"];
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

        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd; 

        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran ;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['submenu3'] = 'Daftar Kegiatan';

        if (!$report){
            $data['_view'] = 'laporan_pd/index_pptk_daftar_kegiatan';
            $this->load->view('layouts/main_public',$data);
        } else {
            $this->load->view('laporan_pd/laporan_pptk_daftar_kegiatan',$data);            
        }          
    }

function index_pptk_detail_kegiatan($tahun_anggaran,$kode_pd,$kode_giat) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['laporan_realisasi_kegiatan'] = $this->Laporan_model->get_laporan_realisasi_kegiatan($this->myconfig["bulan_ini"],$kode_giat);
        $data['laporan_realisasi_kegiatan_chart'] = $this->Laporan_model->get_laporan_realisasi_kegiatan_chart($kode_giat);
        $data['bulan_ini'] = $this->myconfig["bulan_ini"];
        // $data['laporan_kinerja_pptk_detail_total'] = $this->Laporan_model->get_kinerja_pptk_detail_total($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl'],$nip_pptk);

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
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd;         
        $data['judul'] = $data['pd']['nama_pd'];
        $data['subjudul'] = 'Daftar Pejabat';
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran ;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['submenu3'] = 'Detail Kegiatan';
        $data['_view'] = 'laporan_pd/index_pptk_detail_kegiatan';
        $this->load->view('layouts/main_public',$data);
    }

function index_pptk_detail_belanja_swakelola($tahun_anggaran,$kode_pd,$kode_rek_belanja) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

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

        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd; 
        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['submenu3'] = 'Detail Swakelola';
        $data['_view'] = 'laporan_pd/index_pptk_detail_belanja_swakelola';
        $this->load->view('layouts/main_public',$data);
    } 

function index_pptk_detail_belanja_pengadaan($tahun_anggaran,$kode_pd,$kode_rek_belanja) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['belanja'] = $this->Belanja_model->get_belanja_pengadaan_view($kode_rek_belanja);
        $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($data['belanja']['kode_giat']);
        $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']);   
        $data['pphp'] = $this->Belanja_model->get_all_pphp($kode_rek_belanja);
        $data['pejabat'] = $this->Pejabat_model->get_all_p($kode_pd);
        $data['pejabat_pphp'] = $this->Pejabat_model->get_all_p_pphp($kode_pd,$kode_rek_belanja);
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

        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd; 

        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['submenu3'] = 'Detail Pengadaan';
        $data['_view'] = 'laporan_pd/index_pptk_detail_belanja_pengadaan';
        $this->load->view('layouts/main_public',$data);
    }     

function index_ppk($tahun_anggaran,$kode_pd) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['laporan_kinerja_ppk'] = $this->Laporan_model->get_kinerja_ppk($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl']);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit();        
        $data['laporan_kinerja_pptk_total'] = $this->Laporan_model->get_kinerja_pptk_total($kode_pd, $data['pd']['kode_giat_btl']);
        $data['laporan_kinerja_pptk_terendah_fisik'] = $this->Laporan_model->get_kinerja_pptk_terendah_fisik($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl']);
        $data['laporan_kinerja_pptk_terendah_keuangan'] = $this->Laporan_model->get_kinerja_pptk_terendah_keuangan($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl']);
        $data['laporan_kinerja_pptk_tertinggi_fisik'] = $this->Laporan_model->get_kinerja_pptk_tertinggi_fisik($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl']);
        $data['laporan_kinerja_pptk_tertinggi_keuangan'] = $this->Laporan_model->get_kinerja_pptk_tertinggi_keuangan($kode_pd, $this->myconfig["bulan_ini"], $data['pd']['kode_giat_btl']);

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
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd;         
        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['_view'] = 'laporan_pd/index_pptk';
        $this->load->view('layouts/main_public',$data);
    }

function index_jenis_pengadaan($tahun_anggaran,$kode_pd) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['laporan_jenis_pengadaan'] = $this->Laporan_model->get_laporan_jenis_pengadaan($kode_pd);
        $data['laporan_jenis_pengadaan_total'] = $this->Laporan_model->get_laporan_jenis_pengadaan_total($kode_pd);
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd;         
        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Jenis Pengadaan';
        $data['_view'] = 'laporan_pd/index_jenis_pengadaan';
        $this->load->view('layouts/main_public',$data);
    }    

function index_jenis_pengadaan_detail_pptk($tahun_anggaran,$kode_pd,$nip_pptk) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['laporan_jenis_pengadaan_detail'] = $this->Laporan_model->get_laporan_jenis_pengadaan_detail($kode_pd,$nip_pptk);
        $data['laporan_jenis_pengadaan_detail_tabel'] = $this->Laporan_model->get_laporan_jenis_pengadaan_detail_tabel($kode_pd,$nip_pptk);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd;         
        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Jenis Pengadaan';
        $data['submenu3'] = 'Detail PPTK';
        $data['_view'] = 'laporan_pd/index_jenis_pengadaan_detail_pptk';
        $this->load->view('layouts/main_public',$data);
    }    

function index_jenis_pengadaan_detail_pengadaan($tahun_anggaran,$kode_pd,$kode_rek_belanja) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['belanja'] = $this->Belanja_model->get_belanja_pengadaan_view($kode_rek_belanja);
        $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($data['belanja']['kode_giat']);
        $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']);   
        $data['pphp'] = $this->Belanja_model->get_all_pphp($kode_rek_belanja);
        $data['pejabat'] = $this->Pejabat_model->get_all_p($kode_pd);
        $data['pejabat_pphp'] = $this->Pejabat_model->get_all_p_pphp($kode_pd,$kode_rek_belanja);
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

        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd; 

        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Jenis Pengadaan';
        $data['submenu3'] = 'Detail Pengadaan';
        $data['_view'] = 'laporan_pd/index_jenis_pengadaan_detail_pengadaan';
        $this->load->view('layouts/main_public',$data);
    }      

function index_metode_pemilihan_penyedia($tahun_anggaran,$kode_pd) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['laporan_metode_pemilihan_penyedia_barang'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_barang($kode_pd);
        $data['laporan_metode_pemilihan_penyedia_konstruksi'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_konstruksi($kode_pd);
        $data['laporan_metode_pemilihan_penyedia_konsultan'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_konsultan($kode_pd);
        $data['laporan_metode_pemilihan_penyedia_jasa_lainnya'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_jasa_lainnya($kode_pd);

        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd; 

        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Metode Pemilihan Penyedia';
        $data['_view'] = 'laporan_pd/index_metode_pemilihan_penyedia';
        $this->load->view('layouts/main_public',$data);
    } 

function index_metode_pemilihan_penyedia_detail_pptk($tahun_anggaran,$kode_pd,$nip_pptk) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['laporan_metode_pemilihan_penyedia_detail_pptk'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_detail_pptk($kode_pd,$nip_pptk);
        $data['laporan_metode_pemilihan_penyedia_detail_pptk_tabel'] = $this->Laporan_model->get_laporan_metode_pemilihan_penyedia_detail_pptk_tabel($kode_pd,$nip_pptk);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd; 

        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Metode Pemilihan Penyedia';
        $data['submenu3'] = 'Detail PPTK';
        $data['_view'] = 'laporan_pd/index_metode_pemilihan_penyedia_detail_pptk';
        $this->load->view('layouts/main_public',$data);
    }      

function index_metode_pemilihan_penyedia_detail_pengadaan($tahun_anggaran,$kode_pd,$kode_rek_belanja) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 

        $data['belanja'] = $this->Belanja_model->get_belanja_pengadaan_view($kode_rek_belanja);
        $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan($data['belanja']['kode_giat']);
        $data['program'] = $this->Program_model->get_program($data['kegiatan']['kode_prog']);   
        $data['pphp'] = $this->Belanja_model->get_all_pphp($kode_rek_belanja);
        $data['pejabat'] = $this->Pejabat_model->get_all_p($kode_pd);
        $data['pejabat_pphp'] = $this->Pejabat_model->get_all_p_pphp($kode_pd,$kode_rek_belanja);
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

        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd; 

        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan PD';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Metode Pemilihan Penyedia';
        $data['submenu3'] = 'Detail Pengadaan';
        $data['_view'] = 'laporan_pd/index_metode_pemilihan_penyedia_detail_pengadaan';
        $this->load->view('layouts/main_public',$data);
    }

}
