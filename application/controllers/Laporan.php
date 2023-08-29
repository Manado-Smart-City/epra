<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        if (isset($this->session->userdata['logged_in'])) {
            $this->load->model('Program_model');
            $this->load->model('Kegiatan_model');
            $this->load->model('Belanja_model');
            $this->load->model('Pejabat_model');
            $this->load->model('Pd_model');
            $this->load->model('Laporan_model');
            //$this->output->enable_profiler(TRUE);
        } else {
            header("Location:" .base_url("login"));
        }
    }

    function index($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['total_anggaran'] = $this->Belanja_model->get_all_total_anggaran_pd($this->session->userdata['logged_in']['user_pd']);
        $data['total_anggaran_bl'] = $this->Belanja_model->get_all_total_anggaran_bl_pd($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_prog_btl']);
        $data['total_anggaran_btl'] = $this->Belanja_model->get_all_total_anggaran_btl_pd($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_prog_btl']);

        $data['jumlah_program'] = $this->Program_model->get_jumlah_program($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_prog_btl']);
        $data['jumlah_kegiatan'] = $this->Kegiatan_model->get_jumlah_kegiatan($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['jumlah_belanja'] = $this->Belanja_model->get_jumlah_belanja($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_giat_btl']);

        $data['laporan_realisasi_bl'] = $this->Laporan_model->get_realisasi_bulanan_bl($data['total_anggaran_bl'], $this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_realisasi_btl'] = $this->Laporan_model->get_realisasi_bulanan_btl($data['total_anggaran_btl'], $this->session->userdata['logged_in']['user_pd']);

        //masih bingo disini
        $bobot_bl = $data['total_anggaran_bl'] / $data['total_anggaran'];
        $bobot_btl = $data['total_anggaran_btl'] / $data['total_anggaran'];
        $data['laporan_realisasi'] = array('target_fisik_1' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_1  + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_1 ,
                                           'target_fisik_2' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_2  + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_2 ,
                                           'target_fisik_3' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_3  + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_3 ,
                                           'target_fisik_4' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_4  + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_4 ,
                                           'target_fisik_5' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_5  + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_5 ,
                                           'target_fisik_6' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_6  + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_6 ,
                                           'target_fisik_7' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_7  + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_7 ,
                                           'target_fisik_8' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_8  + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_8 ,
                                           'target_fisik_9' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_9  + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_9 ,
                                           'target_fisik_10' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_10 + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_10,
                                           'target_fisik_11' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_11 + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_11,
                                           'target_fisik_12' => $bobot_bl * $data['laporan_realisasi_bl']->target_fisik_12 + $bobot_btl * $data['laporan_realisasi_btl']->target_fisik_12,

                                           'realisasi_fisik_1' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_1  + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_1 ,
                                           'realisasi_fisik_2' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_2  + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_2 ,
                                           'realisasi_fisik_3' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_3  + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_3 ,
                                           'realisasi_fisik_4' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_4  + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_4 ,
                                           'realisasi_fisik_5' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_5  + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_5 ,
                                           'realisasi_fisik_6' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_6  + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_6 ,
                                           'realisasi_fisik_7' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_7  + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_7 ,
                                           'realisasi_fisik_8' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_8  + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_8 ,
                                           'realisasi_fisik_9' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_9  + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_9 ,
                                           'realisasi_fisik_10' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_10 + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_10,
                                           'realisasi_fisik_11' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_11 + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_11,
                                           'realisasi_fisik_12' => $bobot_bl * $data['laporan_realisasi_bl']->realisasi_fisik_12 + $bobot_btl * $data['laporan_realisasi_btl']->realisasi_fisik_12,

                                           'target_keuangan_1' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_1 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_1 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'target_keuangan_2' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_2 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_2 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'target_keuangan_3' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_3 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_3 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'target_keuangan_4' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_4 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_4 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'target_keuangan_5' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_5 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_5 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'target_keuangan_6' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_6 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_6 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'target_keuangan_7' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_7 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_7 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'target_keuangan_8' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_8 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_8 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'target_keuangan_9' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_9 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                   ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_9 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'target_keuangan_10' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_10/ 100)) / $data['total_anggaran'] ) * 100) +
                                                                   ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_10/ 100)) / $data['total_anggaran'] ) * 100) ,
                                           'target_keuangan_11' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_11/ 100)) / $data['total_anggaran'] ) * 100) +
                                                                   ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_11/ 100)) / $data['total_anggaran'] ) * 100) ,
                                           'target_keuangan_12' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->target_keuangan_12/ 100)) / $data['total_anggaran'] ) * 100) +
                                                                   ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->target_keuangan_12/ 100)) / $data['total_anggaran'] ) * 100) ,

                                           'realisasi_keuangan_1' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_1 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_1 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'realisasi_keuangan_2' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_2 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_2 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'realisasi_keuangan_3' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_3 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_3 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'realisasi_keuangan_4' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_4 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_4 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'realisasi_keuangan_5' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_5 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_5 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'realisasi_keuangan_6' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_6 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_6 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'realisasi_keuangan_7' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_7 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_7 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'realisasi_keuangan_8' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_8 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                  ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_8 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'realisasi_keuangan_9' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_9 / 100)) / $data['total_anggaran'] ) * 100) +
                                                                   ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_9 / 100)) / $data['total_anggaran'] ) * 100) ,
                                           'realisasi_keuangan_10' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_10/ 100)) / $data['total_anggaran'] ) * 100) +
                                                                   ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_10/ 100)) / $data['total_anggaran'] ) * 100) ,
                                           'realisasi_keuangan_11' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_11/ 100)) / $data['total_anggaran'] ) * 100) +
                                                                   ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_11/ 100)) / $data['total_anggaran'] ) * 100) ,
                                           'realisasi_keuangan_12' => ((($data['total_anggaran_bl' ] * ($data['laporan_realisasi_bl' ]->realisasi_keuangan_12/ 100)) / $data['total_anggaran'] ) * 100) +
                                                                   ((($data['total_anggaran_btl'] * ($data['laporan_realisasi_btl']->realisasi_keuangan_12/ 100)) / $data['total_anggaran'] ) * 100) ,
                                          );

        // echo "<pre>";
        // print_r($data['laporan_realisasi']['target_fisik_1 ']);
        // echo "</pre>";
        // exit();

        switch ($this->session->userdata['logged_in']['bulan_ini']) {
            case 1:
                $data['nama_bulan_ini'] = "Januari ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_1'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_1'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_1'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_1'];
                break;
            case 2:
                $data['nama_bulan_ini'] = "Februari ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_2'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_2'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_2'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_2'];
                break;
            case 3:
                $data['nama_bulan_ini'] = "Maret ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_3'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_3'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_3'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_3'];
                break;
            case 4:
                $data['nama_bulan_ini'] = "April ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_4'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_4'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_4'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_4'];
                break;
            case 5:
                $data['nama_bulan_ini'] = "Mei ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_5'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_5'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_5'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_5'];
                break;
            case 6:
                $data['nama_bulan_ini'] = "Juni ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_6'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_6'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_6'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_6'];
                break;
            case 7:
                $data['nama_bulan_ini'] = "Juli ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_7'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_7'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_7'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_7'];
                break;
            case 8:
                $data['nama_bulan_ini'] = "Agustus ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_8'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_8'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_8'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_8'];
                break;
            case 9:
                $data['nama_bulan_ini'] = "September ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_9'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_9'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_9'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_9'];
                break;
            case 10:
                $data['nama_bulan_ini'] = "Oktober ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_10'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_10'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_10'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_10'];
                break;
            case 11:
                $data['nama_bulan_ini'] = "November ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_11'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_11'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_11'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_11'];
                break;
            case 12:
                $data['nama_bulan_ini'] = "Desember ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bulan_ini'] = $data['laporan_realisasi']['target_fisik_12'];
                $data['realisasi_fisik_bulan_ini'] = $data['laporan_realisasi']['realisasi_fisik_12'];
                $data['target_keuangan_bulan_ini'] = $data['laporan_realisasi']['target_keuangan_12'];
                $data['realisasi_keuangan_bulan_ini'] = $data['laporan_realisasi']['realisasi_keuangan_12'];
                break;

        }

        //$data['laporan_realisasi_btl'] = $this->Laporan_model->get_realisasi_bulanan_bl($data['total_anggaran_btl'], $this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_giat_btl']);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        $data['nama_pd'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $box_pd = $this->Pd_model->get_pd_box($this->session->userdata['logged_in']['user_pd']);
        $data['alamat_pd'] = $box_pd->alamat_pd;
        $data['kepala_pd'] = $box_pd->nama_kepala;
        $data['foto_kepala_pd'] = $box_pd->foto_kepala;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        $data['subjudul'] = 'Daftar Pejabat';
        $data['menu'] = 'Laporan';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Total Anggaran PD';
        $data['_view'] = 'laporan/index';
        $this->load->view('layouts/main',$data);
    }


    function index_bl($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['total_anggaran'] = $this->Belanja_model->get_all_total_anggaran_pd($this->session->userdata['logged_in']['user_pd']);
        $data['total_anggaran_bl'] = $this->Belanja_model->get_all_total_anggaran_bl_pd($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_prog_btl']);
        $data['total_anggaran_btl'] = $this->Belanja_model->get_all_total_anggaran_btl_pd($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_prog_btl']);

        $data['jumlah_program'] = $this->Program_model->get_jumlah_program($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_prog_btl']);
        $data['jumlah_kegiatan'] = $this->Kegiatan_model->get_jumlah_kegiatan($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['jumlah_belanja'] = $this->Belanja_model->get_jumlah_belanja($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_giat_btl']);

        $data['laporan_realisasi_bl'] = $this->Laporan_model->get_realisasi_bulanan_bl($data['total_anggaran_bl'], $this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_giat_btl']);

        switch ($this->session->userdata['logged_in']['bulan_ini']) {
            case 1:
                $data['nama_bulan_ini'] = "Januari ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_1;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_1;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_1;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_1;
                break;
            case 2:
                $data['nama_bulan_ini'] = "Februari ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_2;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_2;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_2;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_2;
                break;
            case 3:
                $data['nama_bulan_ini'] = "Maret ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_3;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_3;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_3;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_3;
                break;
            case 4:
                $data['nama_bulan_ini'] = "April ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_4;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_4;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_4;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_4;
                break;
            case 5:
                $data['nama_bulan_ini'] = "Mei ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_5;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_5;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_5;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_5;
                break;
            case 6:
                $data['nama_bulan_ini'] = "Juni ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_6;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_6;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_6;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_6;
                break;
            case 7:
                $data['nama_bulan_ini'] = "Juli ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_7;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_7;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_7;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_7;
                break;
            case 8:
                $data['nama_bulan_ini'] = "Agustus ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_8;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_8;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_8;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_8;
                break;
            case 9:
                $data['nama_bulan_ini'] = "September ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_9;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_9;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_9;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_9;
                break;
            case 10:
                $data['nama_bulan_ini'] = "Oktober ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_10;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_10;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_10;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_10;
                break;
            case 11:
                $data['nama_bulan_ini'] = "November ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_11;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_11;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_11;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_11;
                break;
            case 12:
                $data['nama_bulan_ini'] = "Desember ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_fisik_12;
                $data['realisasi_fisik_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_fisik_12;
                $data['target_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->target_keuangan_12;
                $data['realisasi_keuangan_bl_bulan_ini'] = $data['laporan_realisasi_bl']->realisasi_keuangan_12;
                break;

        }

        //$data['laporan_realisasi_btl'] = $this->Laporan_model->get_realisasi_bulanan_bl($data['total_anggaran_btl'], $this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_giat_btl']);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        //$data['subjudul'] = 'Daftar Pejabat';
        $data['menu'] = 'Laporan';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Belanja Langsung';
        $data['_view'] = 'laporan/index_bl';
        $this->load->view('layouts/main',$data);
    }

function index_btl($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['total_anggaran'] = $this->Belanja_model->get_all_total_anggaran_pd($this->session->userdata['logged_in']['user_pd']);
        $data['total_anggaran_bl'] = $this->Belanja_model->get_all_total_anggaran_bl_pd($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_prog_btl']);
        $data['total_anggaran_btl'] = $this->Belanja_model->get_all_total_anggaran_btl_pd($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_prog_btl']);

        $data['jumlah_program'] = $this->Program_model->get_jumlah_program($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_prog_btl']);
        $data['jumlah_kegiatan'] = $this->Kegiatan_model->get_jumlah_kegiatan($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['jumlah_belanja'] = $this->Belanja_model->get_jumlah_belanja($this->session->userdata['logged_in']['user_pd'],$this->session->userdata['logged_in']['user_kode_giat_btl']);

        $data['laporan_realisasi_btl'] = $this->Laporan_model->get_realisasi_bulanan_btl($data['total_anggaran_btl'], $this->session->userdata['logged_in']['user_pd']);

        switch ($this->session->userdata['logged_in']['bulan_ini']) {
            case 1:
                $data['nama_bulan_ini'] = "Januari ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_1;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_1;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_1;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_1;
                break;
            case 2:
                $data['nama_bulan_ini'] = "Februari ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_2;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_2;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_2;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_2;
                break;
            case 3:
                $data['nama_bulan_ini'] = "Maret ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_3;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_3;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_3;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_3;
                break;
            case 4:
                $data['nama_bulan_ini'] = "April ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_4;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_4;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_4;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_4;
                break;
            case 5:
                $data['nama_bulan_ini'] = "Mei ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_5;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_5;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_5;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_5;
                break;
            case 6:
                $data['nama_bulan_ini'] = "Juni ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_6;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_6;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_6;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_6;
                break;
            case 7:
                $data['nama_bulan_ini'] = "Juli ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_7;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_7;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_7;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_7;
                break;
            case 8:
                $data['nama_bulan_ini'] = "Agustus ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_8;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_8;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_8;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_8;
                break;
            case 9:
                $data['nama_bulan_ini'] = "September ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_9;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_9;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_9;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_9;
                break;
            case 10:
                $data['nama_bulan_ini'] = "Oktober ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_10;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_10;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_10;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_10;
                break;
            case 11:
                $data['nama_bulan_ini'] = "November ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_11;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_11;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_11;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_11;
                break;
            case 12:
                $data['nama_bulan_ini'] = "Desember ".$this->session->userdata['logged_in']['tahun_ini'];
                $data['target_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_fisik_12;
                $data['realisasi_fisik_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_fisik_12;
                $data['target_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->target_keuangan_12;
                $data['realisasi_keuangan_btl_bulan_ini'] = $data['laporan_realisasi_btl']->realisasi_keuangan_12;
                break;

        }

        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        //$data['subjudul'] = 'Daftar Pejabat';
        $data['menu'] = 'Laporan';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Belanja Tidak Langsung';
        $data['_view'] = 'laporan/index_btl';
        $this->load->view('layouts/main',$data);
    }

function index_pptk($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        
        $data['cek_jumlah_pptk'] = $this->Laporan_model->cek_jumlah_pptk($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_giat_btl']);

        if ($data['cek_jumlah_pptk']->jumlah_pptk == 0) {
          echo "Anda belum mengisi data PPTK dalam kegiatan";
        } else {
          // echo "<pre>";
          // print_r($data);
          // echo "</pre>";
          // exit();         

          $data['laporan_kinerja_pptk_total'] = $this->Laporan_model->get_kinerja_pptk_total($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_giat_btl']);
         
          $data['laporan_kinerja_pptk'] = $this->Laporan_model->get_kinerja_pptk($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['bulan_ini'], $this->session->userdata['logged_in']['user_kode_giat_btl']);

      

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();


        //   $data['laporan_kinerja_pptk_terendah_fisik'] = $this->Laporan_model->get_kinerja_pptk_terendah_fisik($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['bulan_ini'], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        //   $data['laporan_kinerja_pptk_terendah_keuangan'] = $this->Laporan_model->get_kinerja_pptk_terendah_keuangan($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['bulan_ini'], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        //   $data['laporan_kinerja_pptk_tertinggi_fisik'] = $this->Laporan_model->get_kinerja_pptk_tertinggi_fisik($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['bulan_ini'], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        //   $data['laporan_kinerja_pptk_tertinggi_keuangan'] = $this->Laporan_model->get_kinerja_pptk_tertinggi_keuangan($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['bulan_ini'], $this->session->userdata['logged_in']['user_kode_giat_btl']);

          $data['bulan_ini'] = $this->session->userdata['logged_in']['bulan_ini'];

          switch ($data['bulan_ini']) {
              case 1:
                  $data['nama_bulan_ini'] = "Januari ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
              case 2:
                  $data['nama_bulan_ini'] = "Februari ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
              case 3:
                  $data['nama_bulan_ini'] = "Maret ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
              case 4:
                  $data['nama_bulan_ini'] = "April ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
              case 5:
                  $data['nama_bulan_ini'] = "Mei ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
              case 6:
                  $data['nama_bulan_ini'] = "Juni ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
              case 7:
                  $data['nama_bulan_ini'] = "Juli ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
              case 8:
                  $data['nama_bulan_ini'] = "Agustus ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
              case 9:
                  $data['nama_bulan_ini'] = "September ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
              case 10:
                  $data['nama_bulan_ini'] = "Oktober ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
              case 11:
                  $data['nama_bulan_ini'] = "November ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
              case 12:
                  $data['nama_bulan_ini'] = "Desember ".$this->session->userdata['logged_in']['tahun_ini'];
                  break;
          }
          $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
          $data['menu'] = 'Laporan';
          $data['submenu'] = $tahun_anggaran;
          $data['submenu2'] = 'Kinerja PPTK';
          $data['_view'] = 'laporan/index_pptk';
          $this->load->view('layouts/main',$data);
        }
    }

function index_pptk_daftar_kegiatan($tahun_anggaran,$nip_pptk) // tahun anggaran akan diimplementasikan kemudian
    {
        // ambil data PD
        $kode_pd = $this->session->userdata['logged_in']['user_pd'];
        $data['pd'] = $this->Pd_model->get_pd($kode_pd); 
        $data['laporan_kinerja_pptk_detail'] = $this->Laporan_model->get_kinerja_pptk_detail($kode_pd, $this->session->userdata['logged_in']['bulan_ini'], $data['pd']['kode_giat_btl'],$nip_pptk);
        $data['laporan_kinerja_pptk_tabel_kegiatan'] = $this->Laporan_model->get_kinerja_pptk_tabel_kegiatan($kode_pd, $this->session->userdata['logged_in']['bulan_ini'], $data['pd']['kode_giat_btl'],$nip_pptk);

        $data['bulan_ini'] = $this->session->userdata['logged_in']['bulan_ini'];
        switch ($data['bulan_ini']) {
            case 1:
                $data['nama_bulan_ini'] = "Januari ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 2:
                $data['nama_bulan_ini'] = "Februari ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 3:
                $data['nama_bulan_ini'] = "Maret ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 4:
                $data['nama_bulan_ini'] = "April ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 5:
                $data['nama_bulan_ini'] = "Mei ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 6:
                $data['nama_bulan_ini'] = "Juni ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 7:
                $data['nama_bulan_ini'] = "Juli ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 8:
                $data['nama_bulan_ini'] = "Agustus ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 9:
                $data['nama_bulan_ini'] = "September ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 10:
                $data['nama_bulan_ini'] = "Oktober ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 11:
                $data['nama_bulan_ini'] = "November ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 12:
                $data['nama_bulan_ini'] = "Desember ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
        }
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['kode_pd'] = $kode_pd; 

        $data['judul'] = $data['pd']['nama_pd'];
        $data['menu'] = 'Laporan';
        $data['submenu'] = $tahun_anggaran ;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['submenu3'] = 'Daftar Kegiatan';
        $data['_view'] = 'laporan/index_pptk_daftar_kegiatan';
        $this->load->view('layouts/main',$data);
    }

function index_pptk_detail_kegiatan($tahun_anggaran,$kode_giat) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['laporan_realisasi_kegiatan_tabel_belanja'] = $this->Laporan_model->get_laporan_realisasi_kegiatan_tabel_belanja($this->session->userdata['logged_in']['bulan_ini'],$kode_giat);
        $data['laporan_realisasi_kegiatan_detail'] = $this->Laporan_model->get_laporan_realisasi_kegiatan_detail($kode_giat);
        $data['bulan_ini'] = $this->session->userdata['logged_in']['bulan_ini'];
        // $data['laporan_kinerja_pptk_detail_total'] = $this->Laporan_model->get_kinerja_pptk_detail_total($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['bulan_ini'], $this->session->userdata['logged_in']['user_kode_giat_btl'],$nip_pptk);

        switch ($data['bulan_ini']) {
            case 1:
                $data['nama_bulan_ini'] = "Januari ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 2:
                $data['nama_bulan_ini'] = "Februari ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 3:
                $data['nama_bulan_ini'] = "Maret ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 4:
                $data['nama_bulan_ini'] = "April ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 5:
                $data['nama_bulan_ini'] = "Mei ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 6:
                $data['nama_bulan_ini'] = "Juni ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 7:
                $data['nama_bulan_ini'] = "Juli ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 8:
                $data['nama_bulan_ini'] = "Agustus ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 9:
                $data['nama_bulan_ini'] = "September ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 10:
                $data['nama_bulan_ini'] = "Oktober ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 11:
                $data['nama_bulan_ini'] = "November ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 12:
                $data['nama_bulan_ini'] = "Desember ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
        }
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['subjudul'] = 'Daftar Pejabat';
        $data['menu'] = 'Laporan';
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

        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['menu'] = 'Laporan';
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

        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['menu'] = 'Laporan';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['submenu3'] = 'Detail Pengadaan';
        $data['_view'] = 'laporan/index_pptk_detail_belanja_pengadaan';
        $this->load->view('layouts/main',$data);
    }     

function index_ppk($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['laporan_kinerja_ppk'] = $this->Laporan_model->get_kinerja_ppk($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['bulan_ini'], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit();        
        $data['laporan_kinerja_pptk_total'] = $this->Laporan_model->get_kinerja_pptk_total($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_kinerja_pptk_terendah_fisik'] = $this->Laporan_model->get_kinerja_pptk_terendah_fisik($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['bulan_ini'], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_kinerja_pptk_terendah_keuangan'] = $this->Laporan_model->get_kinerja_pptk_terendah_keuangan($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['bulan_ini'], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_kinerja_pptk_tertinggi_fisik'] = $this->Laporan_model->get_kinerja_pptk_tertinggi_fisik($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['bulan_ini'], $this->session->userdata['logged_in']['user_kode_giat_btl']);
        $data['laporan_kinerja_pptk_tertinggi_keuangan'] = $this->Laporan_model->get_kinerja_pptk_tertinggi_keuangan($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['bulan_ini'], $this->session->userdata['logged_in']['user_kode_giat_btl']);

        switch ($this->session->userdata['logged_in']['bulan_ini']) {
            case 1:
                $data['nama_bulan_ini'] = "Januari ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 2:
                $data['nama_bulan_ini'] = "Februari ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 3:
                $data['nama_bulan_ini'] = "Maret ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 4:
                $data['nama_bulan_ini'] = "April ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 5:
                $data['nama_bulan_ini'] = "Mei ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 6:
                $data['nama_bulan_ini'] = "Juni ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 7:
                $data['nama_bulan_ini'] = "Juli ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 8:
                $data['nama_bulan_ini'] = "Agustus ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 9:
                $data['nama_bulan_ini'] = "September ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 10:
                $data['nama_bulan_ini'] = "Oktober ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 11:
                $data['nama_bulan_ini'] = "November ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
            case 12:
                $data['nama_bulan_ini'] = "Desember ".$this->session->userdata['logged_in']['tahun_ini'];
                break;
        }
        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['menu'] = 'Laporan';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Kinerja PPTK';
        $data['_view'] = 'laporan/index_pptk';
        $this->load->view('layouts/main',$data);
    }

function index_jenis_pengadaan($tahun_anggaran) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['cek_jumlah_pptk'] = $this->Laporan_model->cek_jumlah_pptk($this->session->userdata['logged_in']['user_pd'], $this->session->userdata['logged_in']['user_kode_giat_btl']);

        if ($data['cek_jumlah_pptk']->jumlah_pptk == 0) {
          echo "Anda belum mengisi data PPTK dalam kegiatan";
        } else {        

            $data['laporan_jenis_pengadaan'] = $this->Laporan_model->get_laporan_jenis_pengadaan($this->session->userdata['logged_in']['user_pd']);
            $data['laporan_jenis_pengadaan_total'] = $this->Laporan_model->get_laporan_jenis_pengadaan_total($this->session->userdata['logged_in']['user_pd']);
            $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
            $data['menu'] = 'Laporan';
            $data['submenu'] = $tahun_anggaran;
            $data['submenu2'] = 'Jenis Pengadaan';
            $data['_view'] = 'laporan/index_jenis_pengadaan';
            $this->load->view('layouts/main',$data);
        }
    }    

function index_jenis_pengadaan_detail_pptk($tahun_anggaran,$nip_pptk) // tahun anggaran akan diimplementasikan kemudian
    {
        $data['laporan_jenis_pengadaan_detail'] = $this->Laporan_model->get_laporan_jenis_pengadaan_detail($this->session->userdata['logged_in']['user_pd'],$nip_pptk);
        $data['laporan_jenis_pengadaan_detail_tabel'] = $this->Laporan_model->get_laporan_jenis_pengadaan_detail_tabel($this->session->userdata['logged_in']['user_pd'],$nip_pptk);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['menu'] = 'Laporan';
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

        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['menu'] = 'Laporan';
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

        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['menu'] = 'Laporan';
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
        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['menu'] = 'Laporan';
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

        $data['judul'] = $this->session->userdata['logged_in']['user_nama_pd'];
        $data['menu'] = 'Laporan';
        $data['submenu'] = $tahun_anggaran;
        $data['submenu2'] = 'Metode Pemilihan Penyedia';
        $data['submenu3'] = 'Detail Pengadaan';
        $data['_view'] = 'laporan/index_metode_pemilihan_penyedia_detail_pengadaan';
        $this->load->view('layouts/main',$data);
    }

}
