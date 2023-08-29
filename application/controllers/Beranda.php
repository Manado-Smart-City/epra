<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Beranda extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('Pd_model');
        $this->load->model('Program_model');
        $this->load->model('Kegiatan_model');
        $this->load->model('Belanja_model');
        $this->load->model('Pejabat_model');
        $this->load->model('Pd_model');
        $this->load->model('Config_model');
        $this->load->model('Pengumuman_model');
        $this->load->model('Laporan_model');
        $this->load->model('Laporan_kota_model');        
    }

    /*
     * Listing of pd
     */
    function index()
    {
        $config = $this->Config_model->get_config(1);
        $tahun_anggaran = $config["tahun_anggaran"];
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['running_text'] = $config["running_text"];
        $data['pengumuman'] = $this->Pengumuman_model->get_recent_pengumuman();     

        //$data['bulan_ini'] = date('n')-1;
        $data['bulan_ini'] = $config["bulan_ini"];
        $data['tahun_ini'] = $config["tahun_ini"];
        $data['total_kota'] = $this->Laporan_kota_model->get_total_target_realisasi_kota($tahun_anggaran);
        $data['daftar_pd'] = $this->Laporan_kota_model->get_daftar_pd($tahun_anggaran);  
        $tabel_kota = $data['daftar_pd'];


        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        // realisasi fisik tertinggi
        foreach ($tabel_kota as $key => $row) {
            $realisasi_fisik_tertinggi[$key]  = $row['total_realisasi_fisik_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_fisik_tertinggi, SORT_DESC,$tabel_kota);     
        $data['realisasi_fisik_tertinggi'] = $tabel_kota[0];     

        // realisasi fisik terendah
        foreach ($tabel_kota as $key => $row) {
            $realisasi_fisik_terendah[$key]  = $row['total_realisasi_fisik_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_fisik_terendah, SORT_ASC,$tabel_kota);     
        $data['realisasi_fisik_terendah'] = $tabel_kota[0]; 

        // realisasi keuangan tertinggi
        foreach ($tabel_kota as $key => $row) {
            $realisasi_keuangan_tertinggi[$key]  = $row['total_realisasi_keuangan_persen_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_keuangan_tertinggi, SORT_DESC,$tabel_kota);     
        $data['realisasi_keuangan_tertinggi'] = $tabel_kota[0];     

        // realisasi keuangan terendah
        foreach ($tabel_kota as $key => $row) {
            $realisasi_keuangan_terendah[$key]  = $row['total_realisasi_keuangan_persen_'.$data['bulan_ini']];
        }
        array_multisort($realisasi_keuangan_terendah, SORT_ASC,$tabel_kota);     
        $data['realisasi_keuangan_terendah'] = $tabel_kota[0];  

        switch ($data['bulan_ini']) {
            case 1:
                $data['nama_bulan_ini'] = "Januari ".$data['tahun_ini'];
                break;
            case 2:
                $data['nama_bulan_ini'] = "Februari ".$data['tahun_ini'];
                break;
            case 3:
                $data['nama_bulan_ini'] = "Maret ".$data['tahun_ini'];
                break;
            case 4:
                $data['nama_bulan_ini'] = "April ".$data['tahun_ini'];
                break;
            case 5:
                $data['nama_bulan_ini'] = "Mei ".$data['tahun_ini'];
                break;
            case 6:
                $data['nama_bulan_ini'] = "Juni ".$data['tahun_ini'];
                break;
            case 7:
                $data['nama_bulan_ini'] = "Juli ".$data['tahun_ini'];
                break;
            case 8:
                $data['nama_bulan_ini'] = "Agustus ".$data['tahun_ini'];
                break;
            case 9:
                $data['nama_bulan_ini'] = "September ".$data['tahun_ini'];
                break;
            case 10:
                $data['nama_bulan_ini'] = "Oktober ".$data['tahun_ini'];
                break;
            case 11:
                $data['nama_bulan_ini'] = "November ".$data['tahun_ini'];
                break;
            case 12:
                $data['nama_bulan_ini'] = "Desember ".$data['tahun_ini'];
                break;
        }

        // echo "<pre>";
        // echo print_r($data);
        // echo "</pre>";        
        // exit();

        $data['judul'] = 'Beranda';
        $data['subjudul'] = 'Halaman Depan';
        $data['menu'] = '';
        $data['submenu'] = 'Beranda';
        $data['_view'] = 'beranda';
        if (isset($this->session->userdata['logged_in'])) {
            $this->load->view('layouts/main',$data);
        } else {
            $this->load->view('layouts/main_public',$data);    
        }  
    }

    function pengumuman($id_pengumuman)
    {
        // check if the pengumuman exists before trying to view it
        $data['pengumuman'] = $this->Pengumuman_model->get_pengumuman($id_pengumuman);
        $config = $this->Config_model->get_config(1);
        $tahun_anggaran = $config["tahun_anggaran"];
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['running_text'] = $config["running_text"];                
        
        if(isset($data['pengumuman']['id_pengumuman']))
        {
            $data['judul'] = "Pengumuman";
            $data['subjudul'] = 'Halaman Depan';
            $data['menu'] = '';
            $data['submenu'] = 'Beranda';            
            $data['_view'] = 'pengumuman';
            if (isset($this->session->userdata['logged_in'])) {
                $this->load->view('layouts/main',$data);
            } else {
                $this->load->view('layouts/main_public',$data);    
            } 
        }
        else
            show_error('Data pengumuman yang ingin anda tampilkan tidak ditemukan.');        
    }



}
