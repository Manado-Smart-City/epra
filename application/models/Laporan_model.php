<?php
class Laporan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

function get_realisasi_pd($tahun_anggaran,$kode_pd)
    {
      $sql_str = '

            # total anggaran
            DROP TEMPORARY TABLE IF EXISTS total_anggaran_pd;
            CREATE TEMPORARY TABLE total_anggaran_pd AS
            SELECT 
              d.kode_pd,
              d.nama_pd,
              d.nip_kepala,
              e.nama_p AS nama_kepala,
              e.jabat_p AS jabatan_kepala,
              e.foto_p AS foto_kepala,
              d.kode_prog_btl,
              d.kode_giat_btl,
              SUM(a.pagu_giat) AS anggaran_total
            FROM belanja AS a
            JOIN kegiatan AS b ON a.kode_giat = b.kode_giat
            JOIN program AS c ON b.kode_prog = c.kode_prog
            JOIN pd AS d ON c.kode_pd = d.kode_pd
            LEFT JOIN pejabat AS e ON d.nip_kepala = e.nip_p            
            WHERE c.kode_pd = "'.$kode_pd.'"
            GROUP BY c.kode_pd;

            # total anggaran BL

            DROP TEMPORARY TABLE IF EXISTS total_anggaran_pd_bl;
            CREATE TEMPORARY TABLE total_anggaran_pd_bl AS
            SELECT 
              e.*,
              SUM(IF(b.kode_giat <> e.kode_giat_btl,a.pagu_giat,0)) AS anggaran_total_bl,
              SUM(IF(b.kode_giat = e.kode_giat_btl,a.pagu_giat,0)) AS anggaran_total_btl
            FROM belanja AS a
            JOIN kegiatan AS b ON a.kode_giat = b.kode_giat
            JOIN program AS c ON b.kode_prog = c.kode_prog
            JOIN pd AS d ON c.kode_pd = d.kode_pd
            JOIN total_anggaran_pd AS e ON c.kode_pd = e.kode_pd            
            WHERE c.kode_pd = "'.$kode_pd.'"
            GROUP BY c.kode_pd;

            # realisasi BL

            DROP TEMPORARY TABLE IF EXISTS realisasi_anggaran_pd_bl;
            CREATE TEMPORARY TABLE realisasi_anggaran_pd_bl AS
            SELECT 
              e.*,

              # fisik
              d.tf_1  AS bl_target_fisik_1 ,
              d.tf_2  AS bl_target_fisik_2 ,
              d.tf_3  AS bl_target_fisik_3 ,
              d.tf_4  AS bl_target_fisik_4 ,
              d.tf_5  AS bl_target_fisik_5 ,
              d.tf_6  AS bl_target_fisik_6 ,
              d.tf_7  AS bl_target_fisik_7 ,
              d.tf_8  AS bl_target_fisik_8 ,
              d.tf_9  AS bl_target_fisik_9 ,
              d.tf_10 AS bl_target_fisik_10,
              d.tf_11 AS bl_target_fisik_11,
              d.tf_12 AS bl_target_fisik_12,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_1 ),0) AS bl_realisasi_fisik_1 ,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_2 ),0) AS bl_realisasi_fisik_2 ,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_3 ),0) AS bl_realisasi_fisik_3 ,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_4 ),0) AS bl_realisasi_fisik_4 ,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_5 ),0) AS bl_realisasi_fisik_5 ,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_6 ),0) AS bl_realisasi_fisik_6 ,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_7 ),0) AS bl_realisasi_fisik_7 ,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_8 ),0) AS bl_realisasi_fisik_8 ,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_9 ),0) AS bl_realisasi_fisik_9 ,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_10),0) AS bl_realisasi_fisik_10,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_11),0) AS bl_realisasi_fisik_11,
              IFNULL(SUM((a.pagu_giat/e.anggaran_total_bl)*a.kf_12),0) AS bl_realisasi_fisik_12,

              # keuangan
              d.tk_1  AS bl_target_keuangan_1 ,
              d.tk_2  AS bl_target_keuangan_2 ,
              d.tk_3  AS bl_target_keuangan_3 ,
              d.tk_4  AS bl_target_keuangan_4 ,
              d.tk_5  AS bl_target_keuangan_5 ,
              d.tk_6  AS bl_target_keuangan_6 ,
              d.tk_7  AS bl_target_keuangan_7 ,
              d.tk_8  AS bl_target_keuangan_8 ,
              d.tk_9  AS bl_target_keuangan_9 ,
              d.tk_10 AS bl_target_keuangan_10,
              d.tk_11 AS bl_target_keuangan_11,
              d.tk_12 AS bl_target_keuangan_12,
              IFNULL((d.tk_1 /e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_1 ,
              IFNULL((d.tk_2 /e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_2 ,
              IFNULL((d.tk_3 /e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_3 ,
              IFNULL((d.tk_4 /e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_4 ,
              IFNULL((d.tk_5 /e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_5 ,
              IFNULL((d.tk_6 /e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_6 ,
              IFNULL((d.tk_7 /e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_7 ,
              IFNULL((d.tk_8 /e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_8 ,
              IFNULL((d.tk_9 /e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_9 ,
              IFNULL((d.tk_10/e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_10,
              IFNULL((d.tk_11/e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_11,
              IFNULL((d.tk_12/e.anggaran_total_bl)*100,0) AS bl_target_keuangan_persen_12,  
              SUM(a.kk_1 ) AS bl_realisasi_keuangan_1 ,
              SUM(a.kk_2 ) AS bl_realisasi_keuangan_2 ,
              SUM(a.kk_3 ) AS bl_realisasi_keuangan_3 ,
              SUM(a.kk_4 ) AS bl_realisasi_keuangan_4 ,
              SUM(a.kk_5 ) AS bl_realisasi_keuangan_5 ,
              SUM(a.kk_6 ) AS bl_realisasi_keuangan_6 ,
              SUM(a.kk_7 ) AS bl_realisasi_keuangan_7 ,
              SUM(a.kk_8 ) AS bl_realisasi_keuangan_8 ,
              SUM(a.kk_9 ) AS bl_realisasi_keuangan_9 ,
              SUM(a.kk_10) AS bl_realisasi_keuangan_10,
              SUM(a.kk_11) AS bl_realisasi_keuangan_11,
              SUM(a.kk_12) AS bl_realisasi_keuangan_12,
              IFNULL((SUM(a.kk_1 )/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_1 ,
              IFNULL((SUM(a.kk_2 )/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_2 ,
              IFNULL((SUM(a.kk_3 )/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_3 ,
              IFNULL((SUM(a.kk_4 )/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_4 ,
              IFNULL((SUM(a.kk_5 )/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_5 ,
              IFNULL((SUM(a.kk_6 )/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_6 ,
              IFNULL((SUM(a.kk_7 )/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_7 ,
              IFNULL((SUM(a.kk_8 )/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_8 ,
              IFNULL((SUM(a.kk_9 )/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_9 ,
              IFNULL((SUM(a.kk_10)/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_10,
              IFNULL((SUM(a.kk_11)/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_11,
              IFNULL((SUM(a.kk_12)/anggaran_total_bl)*100,0) AS bl_realisasi_keuangan_persen_12  

            FROM belanja AS a
            JOIN kegiatan AS b ON a.kode_giat = b.kode_giat
            JOIN program AS c ON b.kode_prog = c.kode_prog
            JOIN pd AS d ON c.kode_pd = d.kode_pd
            JOIN total_anggaran_pd_bl AS e ON c.kode_pd = e.kode_pd 
            WHERE c.kode_pd = "'.$kode_pd.'"
            GROUP BY c.kode_pd;


            # tambahkan realisasi BTL

            DROP TEMPORARY TABLE IF EXISTS realisasi_anggaran_pd_bl_btl;
            CREATE TEMPORARY TABLE realisasi_anggaran_pd_bl_btl AS
            SELECT 
              e.*,

              # fisik
              d.btl_tf_1  AS btl_target_fisik_1 ,
              d.btl_tf_2  AS btl_target_fisik_2 ,
              d.btl_tf_3  AS btl_target_fisik_3 ,
              d.btl_tf_4  AS btl_target_fisik_4 ,
              d.btl_tf_5  AS btl_target_fisik_5 ,
              d.btl_tf_6  AS btl_target_fisik_6 ,
              d.btl_tf_7  AS btl_target_fisik_7 ,
              d.btl_tf_8  AS btl_target_fisik_8 ,
              d.btl_tf_9  AS btl_target_fisik_9 ,
              d.btl_tf_10 AS btl_target_fisik_10,
              d.btl_tf_11 AS btl_target_fisik_11,
              d.btl_tf_12 AS btl_target_fisik_12,
              d.btl_rf_1  AS btl_realisasi_fisik_1 ,
              d.btl_rf_2  AS btl_realisasi_fisik_2 ,
              d.btl_rf_3  AS btl_realisasi_fisik_3 ,
              d.btl_rf_4  AS btl_realisasi_fisik_4 ,
              d.btl_rf_5  AS btl_realisasi_fisik_5 ,
              d.btl_rf_6  AS btl_realisasi_fisik_6 ,
              d.btl_rf_7  AS btl_realisasi_fisik_7 ,
              d.btl_rf_8  AS btl_realisasi_fisik_8 ,
              d.btl_rf_9  AS btl_realisasi_fisik_9 ,
              d.btl_rf_10 AS btl_realisasi_fisik_10,
              d.btl_rf_11 AS btl_realisasi_fisik_11,
              d.btl_rf_12 AS btl_realisasi_fisik_12,

              # keuangan
              d.btl_tk_1  AS btl_target_keuangan_1 ,
              d.btl_tk_2  AS btl_target_keuangan_2 ,
              d.btl_tk_3  AS btl_target_keuangan_3 ,
              d.btl_tk_4  AS btl_target_keuangan_4 ,
              d.btl_tk_5  AS btl_target_keuangan_5 ,
              d.btl_tk_6  AS btl_target_keuangan_6 ,
              d.btl_tk_7  AS btl_target_keuangan_7 ,
              d.btl_tk_8  AS btl_target_keuangan_8 ,
              d.btl_tk_9  AS btl_target_keuangan_9 ,
              d.btl_tk_10 AS btl_target_keuangan_10,
              d.btl_tk_11 AS btl_target_keuangan_11,
              d.btl_tk_12 AS btl_target_keuangan_12,
              IFNULL((d.btl_tk_1 /e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_1 ,
              IFNULL((d.btl_tk_2 /e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_2 ,
              IFNULL((d.btl_tk_3 /e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_3 ,
              IFNULL((d.btl_tk_4 /e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_4 ,
              IFNULL((d.btl_tk_5 /e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_5 ,
              IFNULL((d.btl_tk_6 /e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_6 ,
              IFNULL((d.btl_tk_7 /e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_7 ,
              IFNULL((d.btl_tk_8 /e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_8 ,
              IFNULL((d.btl_tk_9 /e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_9 ,
              IFNULL((d.btl_tk_10/e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_10,
              IFNULL((d.btl_tk_11/e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_11,
              IFNULL((d.btl_tk_12/e.anggaran_total_btl)*100, 0) AS btl_target_keuangan_persen_12,  
              d.btl_rk_1  AS btl_realisasi_keuangan_1 ,
              d.btl_rk_2  AS btl_realisasi_keuangan_2 ,
              d.btl_rk_3  AS btl_realisasi_keuangan_3 ,
              d.btl_rk_4  AS btl_realisasi_keuangan_4 ,
              d.btl_rk_5  AS btl_realisasi_keuangan_5 ,
              d.btl_rk_6  AS btl_realisasi_keuangan_6 ,
              d.btl_rk_7  AS btl_realisasi_keuangan_7 ,
              d.btl_rk_8  AS btl_realisasi_keuangan_8 ,
              d.btl_rk_9  AS btl_realisasi_keuangan_9 ,
              d.btl_rk_10 AS btl_realisasi_keuangan_10,
              d.btl_rk_11 AS btl_realisasi_keuangan_11,
              d.btl_rk_12 AS btl_realisasi_keuangan_12,
              IFNULL((d.btl_rk_1 /e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_1 ,
              IFNULL((d.btl_rk_2 /e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_2 ,
              IFNULL((d.btl_rk_3 /e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_3 ,
              IFNULL((d.btl_rk_4 /e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_4 ,
              IFNULL((d.btl_rk_5 /e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_5 ,
              IFNULL((d.btl_rk_6 /e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_6 ,
              IFNULL((d.btl_rk_7 /e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_7 ,
              IFNULL((d.btl_rk_8 /e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_8 ,
              IFNULL((d.btl_rk_9 /e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_9 ,
              IFNULL((d.btl_rk_10/e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_10,
              IFNULL((d.btl_rk_11/e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_11,
              IFNULL((d.btl_rk_12/e.anggaran_total_btl)*100, 0) AS btl_realisasi_keuangan_persen_12  

            FROM belanja AS a
            JOIN kegiatan AS b ON a.kode_giat = b.kode_giat
            JOIN program AS c ON b.kode_prog = c.kode_prog
            JOIN pd AS d ON c.kode_pd = d.kode_pd
            JOIN realisasi_anggaran_pd_bl AS e ON c.kode_pd = e.kode_pd 
            WHERE c.kode_pd = "'.$kode_pd.'"
            GROUP BY c.kode_pd;


            # realisasi total

            DROP TEMPORARY TABLE IF EXISTS realisasi_anggaran_pd_total;
            CREATE TEMPORARY TABLE realisasi_anggaran_pd_total AS
            SELECT 
              a.*,
              # fisik
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_1 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_1 ), 0) AS total_target_fisik_1 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_2 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_2 ), 0) AS total_target_fisik_2 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_3 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_3 ), 0) AS total_target_fisik_3 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_4 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_4 ), 0) AS total_target_fisik_4 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_5 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_5 ), 0) AS total_target_fisik_5 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_6 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_6 ), 0) AS total_target_fisik_6 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_7 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_7 ), 0) AS total_target_fisik_7 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_8 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_8 ), 0) AS total_target_fisik_8 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_9 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_9 ), 0) AS total_target_fisik_9 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_10), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_10), 0) AS total_target_fisik_10,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_11), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_11), 0) AS total_target_fisik_11,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_target_fisik_12), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_target_fisik_12), 0) AS total_target_fisik_12,

              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_1 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_1 ), 0) AS total_realisasi_fisik_1 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_2 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_2 ), 0) AS total_realisasi_fisik_2 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_3 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_3 ), 0) AS total_realisasi_fisik_3 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_4 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_4 ), 0) AS total_realisasi_fisik_4 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_5 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_5 ), 0) AS total_realisasi_fisik_5 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_6 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_6 ), 0) AS total_realisasi_fisik_6 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_7 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_7 ), 0) AS total_realisasi_fisik_7 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_8 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_8 ), 0) AS total_realisasi_fisik_8 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_9 ), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_9 ), 0) AS total_realisasi_fisik_9 ,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_10), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_10), 0) AS total_realisasi_fisik_10,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_11), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_11), 0) AS total_realisasi_fisik_11,
              IFNULL(((a.anggaran_total_bl / a.anggaran_total) * a.bl_realisasi_fisik_12), 0) + IFNULL(((a.anggaran_total_btl / a.anggaran_total) * a.btl_realisasi_fisik_12), 0) AS total_realisasi_fisik_12,

              IFNULL(a.bl_target_keuangan_1 ,0) + IFNULL(a.btl_target_keuangan_1 ,0) AS total_target_keuangan_1 ,
              IFNULL(a.bl_target_keuangan_2 ,0) + IFNULL(a.btl_target_keuangan_2 ,0) AS total_target_keuangan_2 ,
              IFNULL(a.bl_target_keuangan_3 ,0) + IFNULL(a.btl_target_keuangan_3 ,0) AS total_target_keuangan_3 ,
              IFNULL(a.bl_target_keuangan_4 ,0) + IFNULL(a.btl_target_keuangan_4 ,0) AS total_target_keuangan_4 ,
              IFNULL(a.bl_target_keuangan_5 ,0) + IFNULL(a.btl_target_keuangan_5 ,0) AS total_target_keuangan_5 ,
              IFNULL(a.bl_target_keuangan_6 ,0) + IFNULL(a.btl_target_keuangan_6 ,0) AS total_target_keuangan_6 ,
              IFNULL(a.bl_target_keuangan_7 ,0) + IFNULL(a.btl_target_keuangan_7 ,0) AS total_target_keuangan_7 ,
              IFNULL(a.bl_target_keuangan_8 ,0) + IFNULL(a.btl_target_keuangan_8 ,0) AS total_target_keuangan_8 ,
              IFNULL(a.bl_target_keuangan_9 ,0) + IFNULL(a.btl_target_keuangan_9 ,0) AS total_target_keuangan_9 ,
              IFNULL(a.bl_target_keuangan_10,0) + IFNULL(a.btl_target_keuangan_10,0) AS total_target_keuangan_10,
              IFNULL(a.bl_target_keuangan_11,0) + IFNULL(a.btl_target_keuangan_11,0) AS total_target_keuangan_11,
              IFNULL(a.bl_target_keuangan_12,0) + IFNULL(a.btl_target_keuangan_12,0) AS total_target_keuangan_12,

              IFNULL(((a.bl_target_keuangan_1  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_1  / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_1 ,
              IFNULL(((a.bl_target_keuangan_2  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_2  / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_2 ,
              IFNULL(((a.bl_target_keuangan_3  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_3  / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_3 ,
              IFNULL(((a.bl_target_keuangan_4  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_4  / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_4 ,
              IFNULL(((a.bl_target_keuangan_5  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_5  / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_5 ,
              IFNULL(((a.bl_target_keuangan_6  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_6  / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_6 ,
              IFNULL(((a.bl_target_keuangan_7  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_7  / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_7 ,
              IFNULL(((a.bl_target_keuangan_8  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_8  / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_8 ,
              IFNULL(((a.bl_target_keuangan_9  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_9  / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_9 ,
              IFNULL(((a.bl_target_keuangan_10 / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_10 / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_10,
              IFNULL(((a.bl_target_keuangan_11 / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_11 / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_11,
              IFNULL(((a.bl_target_keuangan_12 / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_target_keuangan_12 / a.anggaran_total) * 100), 0) AS total_target_keuangan_persen_12,

              IFNULL(a.bl_realisasi_keuangan_1 ,0) + IFNULL(a.btl_realisasi_keuangan_1 ,0) AS total_realisasi_keuangan_1 ,
              IFNULL(a.bl_realisasi_keuangan_2 ,0) + IFNULL(a.btl_realisasi_keuangan_2 ,0) AS total_realisasi_keuangan_2 ,
              IFNULL(a.bl_realisasi_keuangan_3 ,0) + IFNULL(a.btl_realisasi_keuangan_3 ,0) AS total_realisasi_keuangan_3 ,
              IFNULL(a.bl_realisasi_keuangan_4 ,0) + IFNULL(a.btl_realisasi_keuangan_4 ,0) AS total_realisasi_keuangan_4 ,
              IFNULL(a.bl_realisasi_keuangan_5 ,0) + IFNULL(a.btl_realisasi_keuangan_5 ,0) AS total_realisasi_keuangan_5 ,
              IFNULL(a.bl_realisasi_keuangan_6 ,0) + IFNULL(a.btl_realisasi_keuangan_6 ,0) AS total_realisasi_keuangan_6 ,
              IFNULL(a.bl_realisasi_keuangan_7 ,0) + IFNULL(a.btl_realisasi_keuangan_7 ,0) AS total_realisasi_keuangan_7 ,
              IFNULL(a.bl_realisasi_keuangan_8 ,0) + IFNULL(a.btl_realisasi_keuangan_8 ,0) AS total_realisasi_keuangan_8 ,
              IFNULL(a.bl_realisasi_keuangan_9 ,0) + IFNULL(a.btl_realisasi_keuangan_9 ,0) AS total_realisasi_keuangan_9 ,
              IFNULL(a.bl_realisasi_keuangan_10,0) + IFNULL(a.btl_realisasi_keuangan_10,0) AS total_realisasi_keuangan_10,
              IFNULL(a.bl_realisasi_keuangan_11,0) + IFNULL(a.btl_realisasi_keuangan_11,0) AS total_realisasi_keuangan_11,
              IFNULL(a.bl_realisasi_keuangan_12,0) + IFNULL(a.btl_realisasi_keuangan_12,0) AS total_realisasi_keuangan_12,

              IFNULL(((a.bl_realisasi_keuangan_1  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_1  / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_1 ,
              IFNULL(((a.bl_realisasi_keuangan_2  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_2  / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_2 ,
              IFNULL(((a.bl_realisasi_keuangan_3  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_3  / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_3 ,
              IFNULL(((a.bl_realisasi_keuangan_4  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_4  / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_4 ,
              IFNULL(((a.bl_realisasi_keuangan_5  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_5  / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_5 ,
              IFNULL(((a.bl_realisasi_keuangan_6  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_6  / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_6 ,
              IFNULL(((a.bl_realisasi_keuangan_7  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_7  / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_7 ,
              IFNULL(((a.bl_realisasi_keuangan_8  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_8  / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_8 ,
              IFNULL(((a.bl_realisasi_keuangan_9  / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_9  / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_9 ,
              IFNULL(((a.bl_realisasi_keuangan_10 / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_10 / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_10,
              IFNULL(((a.bl_realisasi_keuangan_11 / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_11 / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_11,
              IFNULL(((a.bl_realisasi_keuangan_12 / a.anggaran_total) * 100), 0) + IFNULL(((a.btl_realisasi_keuangan_12 / a.anggaran_total) * 100), 0) AS total_realisasi_keuangan_persen_12

            FROM realisasi_anggaran_pd_bl_btl AS a;

            # hitung deviasi

            DROP TEMPORARY TABLE IF EXISTS realisasi_anggaran_pd_total_deviasi;
            CREATE TEMPORARY TABLE realisasi_anggaran_pd_total_deviasi AS
            SELECT 
              a.*,

              # deviasi

              a.bl_realisasi_fisik_1  - a.bl_target_fisik_1  AS bl_deviasi_fisik_1 ,
              a.bl_realisasi_fisik_2  - a.bl_target_fisik_2  AS bl_deviasi_fisik_2 ,
              a.bl_realisasi_fisik_3  - a.bl_target_fisik_3  AS bl_deviasi_fisik_3 ,
              a.bl_realisasi_fisik_4  - a.bl_target_fisik_4  AS bl_deviasi_fisik_4 ,
              a.bl_realisasi_fisik_5  - a.bl_target_fisik_5  AS bl_deviasi_fisik_5 ,
              a.bl_realisasi_fisik_6  - a.bl_target_fisik_6  AS bl_deviasi_fisik_6 ,
              a.bl_realisasi_fisik_7  - a.bl_target_fisik_7  AS bl_deviasi_fisik_7 ,
              a.bl_realisasi_fisik_8  - a.bl_target_fisik_8  AS bl_deviasi_fisik_8 ,
              a.bl_realisasi_fisik_9  - a.bl_target_fisik_9  AS bl_deviasi_fisik_9 ,
              a.bl_realisasi_fisik_10 - a.bl_target_fisik_10 AS bl_deviasi_fisik_10,
              a.bl_realisasi_fisik_11 - a.bl_target_fisik_11 AS bl_deviasi_fisik_11,
              a.bl_realisasi_fisik_12 - a.bl_target_fisik_12 AS bl_deviasi_fisik_12,

              a.bl_realisasi_keuangan_persen_1  - a.bl_target_keuangan_persen_1  AS bl_deviasi_keuangan_persen_1 ,
              a.bl_realisasi_keuangan_persen_2  - a.bl_target_keuangan_persen_2  AS bl_deviasi_keuangan_persen_2 ,
              a.bl_realisasi_keuangan_persen_3  - a.bl_target_keuangan_persen_3  AS bl_deviasi_keuangan_persen_3 ,
              a.bl_realisasi_keuangan_persen_4  - a.bl_target_keuangan_persen_4  AS bl_deviasi_keuangan_persen_4 ,
              a.bl_realisasi_keuangan_persen_5  - a.bl_target_keuangan_persen_5  AS bl_deviasi_keuangan_persen_5 ,
              a.bl_realisasi_keuangan_persen_6  - a.bl_target_keuangan_persen_6  AS bl_deviasi_keuangan_persen_6 ,
              a.bl_realisasi_keuangan_persen_7  - a.bl_target_keuangan_persen_7  AS bl_deviasi_keuangan_persen_7 ,
              a.bl_realisasi_keuangan_persen_8  - a.bl_target_keuangan_persen_8  AS bl_deviasi_keuangan_persen_8 ,
              a.bl_realisasi_keuangan_persen_9  - a.bl_target_keuangan_persen_9  AS bl_deviasi_keuangan_persen_9 ,
              a.bl_realisasi_keuangan_persen_10 - a.bl_target_keuangan_persen_10 AS bl_deviasi_keuangan_persen_10,
              a.bl_realisasi_keuangan_persen_11 - a.bl_target_keuangan_persen_11 AS bl_deviasi_keuangan_persen_11,
              a.bl_realisasi_keuangan_persen_12 - a.bl_target_keuangan_persen_12 AS bl_deviasi_keuangan_persen_12,

              a.btl_realisasi_fisik_1  - a.btl_target_fisik_1  AS btl_deviasi_fisik_1 ,
              a.btl_realisasi_fisik_2  - a.btl_target_fisik_2  AS btl_deviasi_fisik_2 ,
              a.btl_realisasi_fisik_3  - a.btl_target_fisik_3  AS btl_deviasi_fisik_3 ,
              a.btl_realisasi_fisik_4  - a.btl_target_fisik_4  AS btl_deviasi_fisik_4 ,
              a.btl_realisasi_fisik_5  - a.btl_target_fisik_5  AS btl_deviasi_fisik_5 ,
              a.btl_realisasi_fisik_6  - a.btl_target_fisik_6  AS btl_deviasi_fisik_6 ,
              a.btl_realisasi_fisik_7  - a.btl_target_fisik_7  AS btl_deviasi_fisik_7 ,
              a.btl_realisasi_fisik_8  - a.btl_target_fisik_8  AS btl_deviasi_fisik_8 ,
              a.btl_realisasi_fisik_9  - a.btl_target_fisik_9  AS btl_deviasi_fisik_9 ,
              a.btl_realisasi_fisik_10 - a.btl_target_fisik_10 AS btl_deviasi_fisik_10,
              a.btl_realisasi_fisik_11 - a.btl_target_fisik_11 AS btl_deviasi_fisik_11,
              a.btl_realisasi_fisik_12 - a.btl_target_fisik_12 AS btl_deviasi_fisik_12,

              a.btl_realisasi_keuangan_persen_1  - a.btl_target_keuangan_persen_1  AS btl_deviasi_keuangan_persen_1 ,
              a.btl_realisasi_keuangan_persen_2  - a.btl_target_keuangan_persen_2  AS btl_deviasi_keuangan_persen_2 ,
              a.btl_realisasi_keuangan_persen_3  - a.btl_target_keuangan_persen_3  AS btl_deviasi_keuangan_persen_3 ,
              a.btl_realisasi_keuangan_persen_4  - a.btl_target_keuangan_persen_4  AS btl_deviasi_keuangan_persen_4 ,
              a.btl_realisasi_keuangan_persen_5  - a.btl_target_keuangan_persen_5  AS btl_deviasi_keuangan_persen_5 ,
              a.btl_realisasi_keuangan_persen_6  - a.btl_target_keuangan_persen_6  AS btl_deviasi_keuangan_persen_6 ,
              a.btl_realisasi_keuangan_persen_7  - a.btl_target_keuangan_persen_7  AS btl_deviasi_keuangan_persen_7 ,
              a.btl_realisasi_keuangan_persen_8  - a.btl_target_keuangan_persen_8  AS btl_deviasi_keuangan_persen_8 ,
              a.btl_realisasi_keuangan_persen_9  - a.btl_target_keuangan_persen_9  AS btl_deviasi_keuangan_persen_9 ,
              a.btl_realisasi_keuangan_persen_10 - a.btl_target_keuangan_persen_10 AS btl_deviasi_keuangan_persen_10,
              a.btl_realisasi_keuangan_persen_11 - a.btl_target_keuangan_persen_11 AS btl_deviasi_keuangan_persen_11,
              a.btl_realisasi_keuangan_persen_12 - a.btl_target_keuangan_persen_12 AS btl_deviasi_keuangan_persen_12,  

              a.total_realisasi_fisik_1  - a.total_target_fisik_1  AS total_deviasi_fisik_1 ,
              a.total_realisasi_fisik_2  - a.total_target_fisik_2  AS total_deviasi_fisik_2 ,
              a.total_realisasi_fisik_3  - a.total_target_fisik_3  AS total_deviasi_fisik_3 ,
              a.total_realisasi_fisik_4  - a.total_target_fisik_4  AS total_deviasi_fisik_4 ,
              a.total_realisasi_fisik_5  - a.total_target_fisik_5  AS total_deviasi_fisik_5 ,
              a.total_realisasi_fisik_6  - a.total_target_fisik_6  AS total_deviasi_fisik_6 ,
              a.total_realisasi_fisik_7  - a.total_target_fisik_7  AS total_deviasi_fisik_7 ,
              a.total_realisasi_fisik_8  - a.total_target_fisik_8  AS total_deviasi_fisik_8 ,
              a.total_realisasi_fisik_9  - a.total_target_fisik_9  AS total_deviasi_fisik_9 ,
              a.total_realisasi_fisik_10 - a.total_target_fisik_10 AS total_deviasi_fisik_10,
              a.total_realisasi_fisik_11 - a.total_target_fisik_11 AS total_deviasi_fisik_11,
              a.total_realisasi_fisik_12 - a.total_target_fisik_12 AS total_deviasi_fisik_12,

              a.total_realisasi_keuangan_persen_1  - a.total_target_keuangan_persen_1  AS total_deviasi_keuangan_persen_1 ,
              a.total_realisasi_keuangan_persen_2  - a.total_target_keuangan_persen_2  AS total_deviasi_keuangan_persen_2 ,
              a.total_realisasi_keuangan_persen_3  - a.total_target_keuangan_persen_3  AS total_deviasi_keuangan_persen_3 ,
              a.total_realisasi_keuangan_persen_4  - a.total_target_keuangan_persen_4  AS total_deviasi_keuangan_persen_4 ,
              a.total_realisasi_keuangan_persen_5  - a.total_target_keuangan_persen_5  AS total_deviasi_keuangan_persen_5 ,
              a.total_realisasi_keuangan_persen_6  - a.total_target_keuangan_persen_6  AS total_deviasi_keuangan_persen_6 ,
              a.total_realisasi_keuangan_persen_7  - a.total_target_keuangan_persen_7  AS total_deviasi_keuangan_persen_7 ,
              a.total_realisasi_keuangan_persen_8  - a.total_target_keuangan_persen_8  AS total_deviasi_keuangan_persen_8 ,
              a.total_realisasi_keuangan_persen_9  - a.total_target_keuangan_persen_9  AS total_deviasi_keuangan_persen_9 ,
              a.total_realisasi_keuangan_persen_10 - a.total_target_keuangan_persen_10 AS total_deviasi_keuangan_persen_10,
              a.total_realisasi_keuangan_persen_11 - a.total_target_keuangan_persen_11 AS total_deviasi_keuangan_persen_11,
              a.total_realisasi_keuangan_persen_12 - a.total_target_keuangan_persen_12 AS total_deviasi_keuangan_persen_12  

            FROM realisasi_anggaran_pd_total AS a;

            SELECT * FROM realisasi_anggaran_pd_total_deviasi

      ';
      $sql_arr = explode(';', $sql_str);
      foreach ($sql_arr as $sql){
        $query = $this->db->query($sql);
      }
      $realisasi_pd = $query->result_array()[0];         
      return $realisasi_pd;      
    }




    function get_realisasi_bulanan_bl($pagu_total,$kode_pd,$kode_giat_btl)
    {
      $sql = '
        SELECT
          # realisasi fisik PD
          SUM(a.kf_1 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_1,
          SUM(a.kf_2 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_2,
          SUM(a.kf_3 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_3,
          SUM(a.kf_4 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_4,
          SUM(a.kf_5 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_5,
          SUM(a.kf_6 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_6,
          SUM(a.kf_7 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_7,
          SUM(a.kf_8 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_8,
          SUM(a.kf_9 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_9,
          SUM(a.kf_10 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_10,
          SUM(a.kf_11 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_11,
          SUM(a.kf_12 * ROUND(a.pagu_giat / '.$pagu_total.',8)) AS realisasi_fisik_12,
          # realisasi keuangan PD
          ROUND(SUM(a.kk_1 ) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_1 ,
          ROUND(SUM(a.kk_2 ) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_2 ,
          ROUND(SUM(a.kk_3 ) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_3 ,
          ROUND(SUM(a.kk_4 ) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_4 ,
          ROUND(SUM(a.kk_5 ) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_5 ,
          ROUND(SUM(a.kk_6 ) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_6 ,
          ROUND(SUM(a.kk_7 ) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_7 ,
          ROUND(SUM(a.kk_8 ) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_8 ,
          ROUND(SUM(a.kk_9 ) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_9 ,
          ROUND(SUM(a.kk_10) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_10,
          ROUND(SUM(a.kk_11) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_11,
          ROUND(SUM(a.kk_12) / SUM(a.pagu_giat),8) * 100 AS realisasi_keuangan_12,
          # realisasi keuangan PD (rupiah)
          SUM(a.kk_1 ) AS realisasi_keuangan_rp_1 ,
          SUM(a.kk_2 ) AS realisasi_keuangan_rp_2 ,
          SUM(a.kk_3 ) AS realisasi_keuangan_rp_3 ,
          SUM(a.kk_4 ) AS realisasi_keuangan_rp_4 ,
          SUM(a.kk_5 ) AS realisasi_keuangan_rp_5 ,
          SUM(a.kk_6 ) AS realisasi_keuangan_rp_6 ,
          SUM(a.kk_7 ) AS realisasi_keuangan_rp_7 ,
          SUM(a.kk_8 ) AS realisasi_keuangan_rp_8 ,
          SUM(a.kk_9 ) AS realisasi_keuangan_rp_9 ,
          SUM(a.kk_10) AS realisasi_keuangan_rp_10,
          SUM(a.kk_11) AS realisasi_keuangan_rp_11,
          SUM(a.kk_12) AS realisasi_keuangan_rp_12,
          # target fisik PD
          d.tf_1  AS target_fisik_1 ,
          d.tf_2  AS target_fisik_2 ,
          d.tf_3  AS target_fisik_3 ,
          d.tf_4  AS target_fisik_4 ,
          d.tf_5  AS target_fisik_5 ,
          d.tf_6  AS target_fisik_6 ,
          d.tf_7  AS target_fisik_7 ,
          d.tf_8  AS target_fisik_8 ,
          d.tf_9  AS target_fisik_9 ,
          d.tf_10 AS target_fisik_10,
          d.tf_11 AS target_fisik_11,
          d.tf_12 AS target_fisik_12,
          # target keuangan PD
          ROUND(d.tk_1 / '.$pagu_total.',8)*100  AS target_keuangan_1 ,
          ROUND(d.tk_2 / '.$pagu_total.',8)*100  AS target_keuangan_2 ,
          ROUND(d.tk_3 / '.$pagu_total.',8)*100  AS target_keuangan_3 ,
          ROUND(d.tk_4 / '.$pagu_total.',8)*100  AS target_keuangan_4 ,
          ROUND(d.tk_5 / '.$pagu_total.',8)*100  AS target_keuangan_5 ,
          ROUND(d.tk_6 / '.$pagu_total.',8)*100  AS target_keuangan_6 ,
          ROUND(d.tk_7 / '.$pagu_total.',8)*100  AS target_keuangan_7 ,
          ROUND(d.tk_8 / '.$pagu_total.',8)*100  AS target_keuangan_8 ,
          ROUND(d.tk_9 / '.$pagu_total.',8)*100  AS target_keuangan_9 ,
          ROUND(d.tk_10/ '.$pagu_total.',8)*100  AS target_keuangan_10,
          ROUND(d.tk_11/ '.$pagu_total.',8)*100  AS target_keuangan_11,
          ROUND(d.tk_12/ '.$pagu_total.',8)*100  AS target_keuangan_12,
          # target keuangan PD (rupiah)
          d.tk_1  AS target_keuangan_rp_1 ,
          d.tk_2  AS target_keuangan_rp_2 ,
          d.tk_3  AS target_keuangan_rp_3 ,
          d.tk_4  AS target_keuangan_rp_4 ,
          d.tk_5  AS target_keuangan_rp_5 ,
          d.tk_6  AS target_keuangan_rp_6 ,
          d.tk_7  AS target_keuangan_rp_7 ,
          d.tk_8  AS target_keuangan_rp_8 ,
          d.tk_9  AS target_keuangan_rp_9 ,
          d.tk_10 AS target_keuangan_rp_10,
          d.tk_11 AS target_keuangan_rp_11,
          d.tk_12 AS target_keuangan_rp_12       
        FROM belanja AS a
        JOIN kegiatan AS b ON a.kode_giat = b.kode_giat
        JOIN program AS c ON b.kode_prog = c.kode_prog
        JOIN pd AS d ON c.kode_pd = d.kode_pd
        WHERE c.kode_pd="'.$kode_pd.'" AND b.kode_giat <> "'.$kode_giat_btl.'"';
      $query = $this->db->query($sql);
      return $query->result()[0];      
    }

    function get_realisasi_bulanan_btl($pagu_total,$kode_pd)
    {
      $sql = '
        SELECT
          # realisasi fisik PD
          a.btl_rf_1  AS realisasi_fisik_1 ,
          a.btl_rf_2  AS realisasi_fisik_2 ,
          a.btl_rf_3  AS realisasi_fisik_3 ,
          a.btl_rf_4  AS realisasi_fisik_4 ,
          a.btl_rf_5  AS realisasi_fisik_5 ,
          a.btl_rf_6  AS realisasi_fisik_6 ,
          a.btl_rf_7  AS realisasi_fisik_7 ,
          a.btl_rf_8  AS realisasi_fisik_8 ,
          a.btl_rf_9  AS realisasi_fisik_9 ,
          a.btl_rf_10 AS realisasi_fisik_10,
          a.btl_rf_11 AS realisasi_fisik_11,
          a.btl_rf_12 AS realisasi_fisik_12,
          # realisasi keuangan PD
          (ROUND(a.btl_rk_1 / '.$pagu_total.',8))*100  AS realisasi_keuangan_1 ,
          (ROUND(a.btl_rk_2 / '.$pagu_total.',8))*100  AS realisasi_keuangan_2 ,
          (ROUND(a.btl_rk_3 / '.$pagu_total.',8))*100  AS realisasi_keuangan_3 ,
          (ROUND(a.btl_rk_4 / '.$pagu_total.',8))*100  AS realisasi_keuangan_4 ,
          (ROUND(a.btl_rk_5 / '.$pagu_total.',8))*100  AS realisasi_keuangan_5 ,
          (ROUND(a.btl_rk_6 / '.$pagu_total.',8))*100  AS realisasi_keuangan_6 ,
          (ROUND(a.btl_rk_7 / '.$pagu_total.',8))*100  AS realisasi_keuangan_7 ,
          (ROUND(a.btl_rk_8 / '.$pagu_total.',8))*100  AS realisasi_keuangan_8 ,
          (ROUND(a.btl_rk_9 / '.$pagu_total.',8))*100  AS realisasi_keuangan_9 ,
          (ROUND(a.btl_rk_10 / '.$pagu_total.',8))*100 AS realisasi_keuangan_10,
          (ROUND(a.btl_rk_11 / '.$pagu_total.',8))*100 AS realisasi_keuangan_11,
          (ROUND(a.btl_rk_12 / '.$pagu_total.',8))*100 AS realisasi_keuangan_12,
          a.btl_rk_1  AS realisasi_keuangan_rp_1 ,
          a.btl_rk_2  AS realisasi_keuangan_rp_2 ,
          a.btl_rk_3  AS realisasi_keuangan_rp_3 ,
          a.btl_rk_4  AS realisasi_keuangan_rp_4 ,
          a.btl_rk_5  AS realisasi_keuangan_rp_5 ,
          a.btl_rk_6  AS realisasi_keuangan_rp_6 ,
          a.btl_rk_7  AS realisasi_keuangan_rp_7 ,
          a.btl_rk_8  AS realisasi_keuangan_rp_8 ,
          a.btl_rk_9  AS realisasi_keuangan_rp_9 ,
          a.btl_rk_10 AS realisasi_keuangan_rp_10,
          a.btl_rk_11 AS realisasi_keuangan_rp_11,
          a.btl_rk_12 AS realisasi_keuangan_rp_12,
          # target fisik PD
          a.btl_tf_1  AS target_fisik_1 ,
          a.btl_tf_2  AS target_fisik_2 ,
          a.btl_tf_3  AS target_fisik_3 ,
          a.btl_tf_4  AS target_fisik_4 ,
          a.btl_tf_5  AS target_fisik_5 ,
          a.btl_tf_6  AS target_fisik_6 ,
          a.btl_tf_7  AS target_fisik_7 ,
          a.btl_tf_8  AS target_fisik_8 ,
          a.btl_tf_9  AS target_fisik_9 ,
          a.btl_tf_10 AS target_fisik_10,
          a.btl_tf_11 AS target_fisik_11,
          a.btl_tf_12 AS target_fisik_12,
          # target keuangan PD
          (ROUND(a.btl_tk_1 / '.$pagu_total.',8))*100  AS target_keuangan_1 ,
          (ROUND(a.btl_tk_2 / '.$pagu_total.',8))*100  AS target_keuangan_2 ,
          (ROUND(a.btl_tk_3 / '.$pagu_total.',8))*100  AS target_keuangan_3 ,
          (ROUND(a.btl_tk_4 / '.$pagu_total.',8))*100  AS target_keuangan_4 ,
          (ROUND(a.btl_tk_5 / '.$pagu_total.',8))*100  AS target_keuangan_5 ,
          (ROUND(a.btl_tk_6 / '.$pagu_total.',8))*100  AS target_keuangan_6 ,
          (ROUND(a.btl_tk_7 / '.$pagu_total.',8))*100  AS target_keuangan_7 ,
          (ROUND(a.btl_tk_8 / '.$pagu_total.',8))*100  AS target_keuangan_8 ,
          (ROUND(a.btl_tk_9 / '.$pagu_total.',8))*100  AS target_keuangan_9 ,
          (ROUND(a.btl_tk_10 / '.$pagu_total.',8))*100 AS target_keuangan_10,
          (ROUND(a.btl_tk_11 / '.$pagu_total.',8))*100 AS target_keuangan_11,
          (ROUND(a.btl_tk_12 / '.$pagu_total.',8))*100 AS target_keuangan_12,
          # target keuangan PD (rupiah)
          a.btl_tk_1  AS target_keuangan_rp_1 ,
          a.btl_tk_2  AS target_keuangan_rp_2 ,
          a.btl_tk_3  AS target_keuangan_rp_3 ,
          a.btl_tk_4  AS target_keuangan_rp_4 ,
          a.btl_tk_5  AS target_keuangan_rp_5 ,
          a.btl_tk_6  AS target_keuangan_rp_6 ,
          a.btl_tk_7  AS target_keuangan_rp_7 ,
          a.btl_tk_8  AS target_keuangan_rp_8 ,
          a.btl_tk_9  AS target_keuangan_rp_9 ,
          a.btl_tk_10 AS target_keuangan_rp_10,
          a.btl_tk_11 AS target_keuangan_rp_11,
          a.btl_tk_12 AS target_keuangan_rp_12           
        FROM pd AS a
        WHERE a.kode_pd="'.$kode_pd.'"';
      // jika PD-nya tidak ada BTL
      $sql2 = '
        SELECT
          # realisasi fisik PD
          a.btl_rf_1  AS realisasi_fisik_1 ,
          a.btl_rf_2  AS realisasi_fisik_2 ,
          a.btl_rf_3  AS realisasi_fisik_3 ,
          a.btl_rf_4  AS realisasi_fisik_4 ,
          a.btl_rf_5  AS realisasi_fisik_5 ,
          a.btl_rf_6  AS realisasi_fisik_6 ,
          a.btl_rf_7  AS realisasi_fisik_7 ,
          a.btl_rf_8  AS realisasi_fisik_8 ,
          a.btl_rf_9  AS realisasi_fisik_9 ,
          a.btl_rf_10 AS realisasi_fisik_10,
          a.btl_rf_11 AS realisasi_fisik_11,
          a.btl_rf_12 AS realisasi_fisik_12,
          # realisasi keuangan PD
          a.btl_rk_1  AS realisasi_keuangan_1 ,
          a.btl_rk_2  AS realisasi_keuangan_2 ,
          a.btl_rk_3  AS realisasi_keuangan_3 ,
          a.btl_rk_4  AS realisasi_keuangan_4 ,
          a.btl_rk_5  AS realisasi_keuangan_5 ,
          a.btl_rk_6  AS realisasi_keuangan_6 ,
          a.btl_rk_7  AS realisasi_keuangan_7 ,
          a.btl_rk_8  AS realisasi_keuangan_8 ,
          a.btl_rk_9  AS realisasi_keuangan_9 ,
          a.btl_rk_10 AS realisasi_keuangan_10,
          a.btl_rk_11 AS realisasi_keuangan_11,
          a.btl_rk_12 AS realisasi_keuangan_12,
          # realisasi keuangan PD
          a.btl_rk_1  AS realisasi_keuangan_rp_1 ,
          a.btl_rk_2  AS realisasi_keuangan_rp_2 ,
          a.btl_rk_3  AS realisasi_keuangan_rp_3 ,
          a.btl_rk_4  AS realisasi_keuangan_rp_4 ,
          a.btl_rk_5  AS realisasi_keuangan_rp_5 ,
          a.btl_rk_6  AS realisasi_keuangan_rp_6 ,
          a.btl_rk_7  AS realisasi_keuangan_rp_7 ,
          a.btl_rk_8  AS realisasi_keuangan_rp_8 ,
          a.btl_rk_9  AS realisasi_keuangan_rp_9 ,
          a.btl_rk_10 AS realisasi_keuangan_rp_10,
          a.btl_rk_11 AS realisasi_keuangan_rp_11,
          a.btl_rk_12 AS realisasi_keuangan_rp_12,          
          # target fisik PD
          a.btl_tf_1  AS target_fisik_1 ,
          a.btl_tf_2  AS target_fisik_2 ,
          a.btl_tf_3  AS target_fisik_3 ,
          a.btl_tf_4  AS target_fisik_4 ,
          a.btl_tf_5  AS target_fisik_5 ,
          a.btl_tf_6  AS target_fisik_6 ,
          a.btl_tf_7  AS target_fisik_7 ,
          a.btl_tf_8  AS target_fisik_8 ,
          a.btl_tf_9  AS target_fisik_9 ,
          a.btl_tf_10 AS target_fisik_10,
          a.btl_tf_11 AS target_fisik_11,
          a.btl_tf_12 AS target_fisik_12,
          # target keuangan PD
          a.btl_tk_1  AS target_keuangan_1 ,
          a.btl_tk_2  AS target_keuangan_2 ,
          a.btl_tk_3  AS target_keuangan_3 ,
          a.btl_tk_4  AS target_keuangan_4 ,
          a.btl_tk_5  AS target_keuangan_5 ,
          a.btl_tk_6  AS target_keuangan_6 ,
          a.btl_tk_7  AS target_keuangan_7 ,
          a.btl_tk_8  AS target_keuangan_8 ,
          a.btl_tk_9  AS target_keuangan_9 ,
          a.btl_tk_10 AS target_keuangan_10,
          a.btl_tk_11 AS target_keuangan_11,
          a.btl_tk_12 AS target_keuangan_12,
          # target keuangan PD (rupiah)
          a.btl_tk_1  AS target_keuangan_rp_1 ,
          a.btl_tk_2  AS target_keuangan_rp_2 ,
          a.btl_tk_3  AS target_keuangan_rp_3 ,
          a.btl_tk_4  AS target_keuangan_rp_4 ,
          a.btl_tk_5  AS target_keuangan_rp_5 ,
          a.btl_tk_6  AS target_keuangan_rp_6 ,
          a.btl_tk_7  AS target_keuangan_rp_7 ,
          a.btl_tk_8  AS target_keuangan_rp_8 ,
          a.btl_tk_9  AS target_keuangan_rp_9 ,
          a.btl_tk_10 AS target_keuangan_rp_10,
          a.btl_tk_11 AS target_keuangan_rp_11,
          a.btl_tk_12 AS target_keuangan_rp_12           
        FROM pd AS a
        WHERE a.kode_pd="'.$kode_pd.'"';
      if ($pagu_total > 0) {
        $query = $this->db->query($sql);
      } else {
        $query = $this->db->query($sql2);
      }
      return $query->result()[0];
    }


    function cek_jumlah_pptk($kode_pd, $kode_giat_btl)
    {
      $sql = '
        SELECT
        COUNT(DISTINCT a.nip_pptk) AS jumlah_pptk        
        FROM kegiatan AS a
        JOIN program AS d ON a.kode_prog = d.kode_prog
        WHERE
        d.kode_pd = "'.$kode_pd.'" AND
        a.kode_giat <> "'.$kode_giat_btl.'" AND
        a.nip_pptk <> ""';
      $query = $this->db->query($sql);
        // echo "<pre>";
        // print_r($query->result());
        // echo "</pre>";
        // exit();
      return $query->result()[0];
    }

    function get_kinerja_pptk($kode_pd, $bulan_pelaporan, $kode_giat_btl)
    {

      // Koreksi Nov 12, 2017
      $sql_str = '  

        SELECT
          @jumlah_pptk := COUNT(DISTINCT a.nip_pptk) AS jumlah_pptk,
          @anggaran_yang_dikelola := SUM(b.pagu_giat) AS anggaran_yang_dikelola,
          @jumlah_kegiatan := COUNT(DISTINCT a.kode_giat) AS jumlah_kegiatan
        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN program AS d ON a.kode_prog = d.kode_prog
        WHERE
          d.kode_pd = "'.$kode_pd.'" AND
          a.kode_giat <> "'.$kode_giat_btl.'";

        DROP TEMPORARY TABLE IF EXISTS daftar_anggaran_pptk;
        CREATE TEMPORARY TABLE daftar_anggaran_pptk AS
        SELECT
          a.nip_pptk,
          d.nama_p,
          d.hp_p,
          d.jabat_p,
          d.foto_p,
          SUM(b.pagu_giat) AS anggaran_yang_dikelola,
          COUNT(DISTINCT a.kode_giat) AS jumlah_kegiatan
        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN program AS c ON a.kode_prog = c.kode_prog
        JOIN pejabat AS d ON a.nip_pptk = d.nip_p
        WHERE
          c.kode_pd = "'.$kode_pd.'" AND
          a.kode_giat <> "'.$kode_giat_btl.'" AND 
          a.nip_pptk <> ""
        GROUP BY
          a.nip_pptk;

        DROP TEMPORARY TABLE IF EXISTS daftar_realisasi_pptk;
        CREATE TEMPORARY TABLE daftar_realisasi_pptk AS
        SELECT
          d.*,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_1 ) AS realisasi_fisik_1 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_2 ) AS realisasi_fisik_2 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_3 ) AS realisasi_fisik_3 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_4 ) AS realisasi_fisik_4 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_5 ) AS realisasi_fisik_5 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_6 ) AS realisasi_fisik_6 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_7 ) AS realisasi_fisik_7 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_8 ) AS realisasi_fisik_8 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_9 ) AS realisasi_fisik_9 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_10) AS realisasi_fisik_10,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_11) AS realisasi_fisik_11,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_12) AS realisasi_fisik_12,

          SUM(b.kk_1 ) AS realisasi_keuangan_1 ,
          SUM(b.kk_2 ) AS realisasi_keuangan_2 ,
          SUM(b.kk_3 ) AS realisasi_keuangan_3 ,
          SUM(b.kk_4 ) AS realisasi_keuangan_4 ,
          SUM(b.kk_5 ) AS realisasi_keuangan_5 ,
          SUM(b.kk_6 ) AS realisasi_keuangan_6 ,
          SUM(b.kk_7 ) AS realisasi_keuangan_7 ,
          SUM(b.kk_8 ) AS realisasi_keuangan_8 ,
          SUM(b.kk_9 ) AS realisasi_keuangan_9 ,
          SUM(b.kk_10) AS realisasi_keuangan_10,
          SUM(b.kk_11) AS realisasi_keuangan_11,
          SUM(b.kk_12) AS realisasi_keuangan_12, 

          (SUM(b.kk_1 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_1 ,
          (SUM(b.kk_2 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_2 ,
          (SUM(b.kk_3 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_3 ,
          (SUM(b.kk_4 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_4 ,
          (SUM(b.kk_5 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_5 ,
          (SUM(b.kk_6 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_6 ,
          (SUM(b.kk_7 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_7 ,
          (SUM(b.kk_8 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_8 ,
          (SUM(b.kk_9 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_9 ,
          (SUM(b.kk_10) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_10,
          (SUM(b.kk_11) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_11,
          (SUM(b.kk_12) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_12

        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN program AS c ON a.kode_prog = c.kode_prog
        JOIN daftar_anggaran_pptk AS d ON a.nip_pptk = d.nip_pptk
        WHERE
          c.kode_pd = "'.$kode_pd.'" AND
          a.kode_giat <> "'.$kode_giat_btl.'"
        GROUP BY
          a.nip_pptk;

        SELECT * FROM daftar_realisasi_pptk ORDER BY realisasi_keuangan_persen_'.$bulan_pelaporan.' DESC  
      ';
      $sql_arr = explode(';', $sql_str);
      foreach ($sql_arr as $sql){
        $query = $this->db->query($sql);
      }      
      $kinerja_pptk["tabel_kinerja_pptk"] = $query->result();

      // kinerja tertinggi fisik
      $sql = '
        SELECT * FROM daftar_realisasi_pptk 
        ORDER BY realisasi_fisik_'.$bulan_pelaporan.' DESC LIMIT 1';
      $query = $this->db->query($sql);
      $kinerja_pptk["tertinggi_fisik"] = $query->result()[0];

      // kinerja terendah fisik
      $sql = '
        SELECT * FROM daftar_realisasi_pptk 
        ORDER BY realisasi_fisik_'.$bulan_pelaporan.' ASC LIMIT 1';
      $query = $this->db->query($sql);
      $kinerja_pptk["terendah_fisik"] = $query->result()[0];

      // kinerja tertinggi keuangan
      $sql = '
        SELECT * FROM daftar_realisasi_pptk 
        ORDER BY realisasi_keuangan_persen_'.$bulan_pelaporan.' DESC LIMIT 1';
      $query = $this->db->query($sql);
      $kinerja_pptk["tertinggi_keuangan"] = $query->result()[0];

      // kinerja terendah keuangan
      $sql = '
        SELECT * FROM daftar_realisasi_pptk 
        ORDER BY realisasi_keuangan_persen_'.$bulan_pelaporan.' ASC LIMIT 1';
      $query = $this->db->query($sql);
      $kinerja_pptk["terendah_keuangan"] = $query->result()[0];

      return $kinerja_pptk;

    }

    function get_kinerja_pptk_detail($kode_pd, $bulan_pelaporan, $kode_giat_btl, $nip_pptk)
    {
      // Koreksi Nov 12, 2017
      $sql_str = '  

        SELECT
          @jumlah_pptk := COUNT(DISTINCT a.nip_pptk) AS jumlah_pptk,
          @anggaran_yang_dikelola := SUM(b.pagu_giat) AS anggaran_yang_dikelola,
          @jumlah_kegiatan := COUNT(DISTINCT a.kode_giat) AS jumlah_kegiatan
        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN program AS d ON a.kode_prog = d.kode_prog
        WHERE
          d.kode_pd = "'.$kode_pd.'" AND
          a.kode_giat <> "'.$kode_giat_btl.'";

        DROP TEMPORARY TABLE IF EXISTS daftar_anggaran_pptk;
        CREATE TEMPORARY TABLE daftar_anggaran_pptk AS
        SELECT
          a.nip_pptk,
          d.nama_p,
          d.hp_p,
          d.jabat_p,
          d.foto_p,
          SUM(b.pagu_giat) AS anggaran_yang_dikelola,
          COUNT(DISTINCT a.kode_giat) AS jumlah_kegiatan
        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN program AS c ON a.kode_prog = c.kode_prog
        JOIN pejabat AS d ON a.nip_pptk = d.nip_p
        WHERE
          c.kode_pd = "'.$kode_pd.'" AND
          a.kode_giat <> "'.$kode_giat_btl.'" AND 
          a.nip_pptk <> ""
        GROUP BY
          a.nip_pptk;

        DROP TEMPORARY TABLE IF EXISTS daftar_realisasi_pptk;
        CREATE TEMPORARY TABLE daftar_realisasi_pptk AS
        SELECT
          d.*,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_1 ) AS realisasi_fisik_1 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_2 ) AS realisasi_fisik_2 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_3 ) AS realisasi_fisik_3 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_4 ) AS realisasi_fisik_4 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_5 ) AS realisasi_fisik_5 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_6 ) AS realisasi_fisik_6 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_7 ) AS realisasi_fisik_7 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_8 ) AS realisasi_fisik_8 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_9 ) AS realisasi_fisik_9 ,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_10) AS realisasi_fisik_10,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_11) AS realisasi_fisik_11,
          SUM((b.pagu_giat / d.anggaran_yang_dikelola) * b.kf_12) AS realisasi_fisik_12,

          SUM(b.kk_1 ) AS realisasi_keuangan_1 ,
          SUM(b.kk_2 ) AS realisasi_keuangan_2 ,
          SUM(b.kk_3 ) AS realisasi_keuangan_3 ,
          SUM(b.kk_4 ) AS realisasi_keuangan_4 ,
          SUM(b.kk_5 ) AS realisasi_keuangan_5 ,
          SUM(b.kk_6 ) AS realisasi_keuangan_6 ,
          SUM(b.kk_7 ) AS realisasi_keuangan_7 ,
          SUM(b.kk_8 ) AS realisasi_keuangan_8 ,
          SUM(b.kk_9 ) AS realisasi_keuangan_9 ,
          SUM(b.kk_10) AS realisasi_keuangan_10,
          SUM(b.kk_11) AS realisasi_keuangan_11,
          SUM(b.kk_12) AS realisasi_keuangan_12, 

          (SUM(b.kk_1 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_1 ,
          (SUM(b.kk_2 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_2 ,
          (SUM(b.kk_3 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_3 ,
          (SUM(b.kk_4 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_4 ,
          (SUM(b.kk_5 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_5 ,
          (SUM(b.kk_6 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_6 ,
          (SUM(b.kk_7 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_7 ,
          (SUM(b.kk_8 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_8 ,
          (SUM(b.kk_9 ) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_9 ,
          (SUM(b.kk_10) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_10,
          (SUM(b.kk_11) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_11,
          (SUM(b.kk_12) / d.anggaran_yang_dikelola) * 100 AS realisasi_keuangan_persen_12

        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN program AS c ON a.kode_prog = c.kode_prog
        JOIN daftar_anggaran_pptk AS d ON a.nip_pptk = d.nip_pptk
        WHERE
          c.kode_pd = "'.$kode_pd.'" AND
          a.kode_giat <> "'.$kode_giat_btl.'"
        GROUP BY
          a.nip_pptk;

        SELECT * FROM daftar_realisasi_pptk  
          WHERE nip_pptk = "'.$nip_pptk.'"  
          ORDER BY realisasi_keuangan_persen_'.$bulan_pelaporan.'
      ';
      $sql_arr = explode(';', $sql_str);
      foreach ($sql_arr as $sql){
        $query = $this->db->query($sql);
      }      
      
      return $query->result()[0];
    }

    function get_kinerja_pptk_tabel_kegiatan($kode_pd, $bulan_pelaporan, $kode_giat_btl, $nip_pptk)
    {
      // Koreksi Nov 12, 2017
      $sql_str = '  
        DROP TEMPORARY TABLE IF EXISTS daftar_anggaran_pptk;
        CREATE TEMPORARY TABLE daftar_anggaran_pptk AS
        SELECT 
          y.kode_giat,
          y.nama_giat,
          SUM(x.pagu_giat) AS pagu_anggaran
        FROM belanja AS x
        JOIN kegiatan AS y ON x.kode_giat = y.kode_giat
        JOIN program AS z ON z.kode_prog = y.kode_prog
        WHERE
        y.nip_pptk = "'.$nip_pptk.'" AND
        z.kode_pd = "'.$kode_pd.'" AND
        y.kode_giat <> "'.$kode_giat_btl.'"
        GROUP BY y.kode_giat
        ORDER BY y.kode_giat;

        DROP TEMPORARY TABLE IF EXISTS daftar_realisasi_pptk;
        CREATE TEMPORARY TABLE daftar_realisasi_pptk AS
        SELECT 
        a.kode_giat,
        b.nama_giat,
        d.pagu_anggaran,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_1 ) AS realisasi_fisik_1 ,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_2 ) AS realisasi_fisik_2 ,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_3 ) AS realisasi_fisik_3 ,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_4 ) AS realisasi_fisik_4 ,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_5 ) AS realisasi_fisik_5 ,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_6 ) AS realisasi_fisik_6 ,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_7 ) AS realisasi_fisik_7 ,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_8 ) AS realisasi_fisik_8 ,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_9 ) AS realisasi_fisik_9 ,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_10) AS realisasi_fisik_10,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_11) AS realisasi_fisik_11,
        SUM((a.pagu_giat / d.pagu_anggaran)*a.kf_12) AS realisasi_fisik_12,
        SUM(a.kk_1 ) AS realisasi_keuangan_1 ,
        SUM(a.kk_2 ) AS realisasi_keuangan_2 ,
        SUM(a.kk_3 ) AS realisasi_keuangan_3 ,
        SUM(a.kk_4 ) AS realisasi_keuangan_4 ,
        SUM(a.kk_5 ) AS realisasi_keuangan_5 ,
        SUM(a.kk_6 ) AS realisasi_keuangan_6 ,
        SUM(a.kk_7 ) AS realisasi_keuangan_7 ,
        SUM(a.kk_8 ) AS realisasi_keuangan_8 ,
        SUM(a.kk_9 ) AS realisasi_keuangan_9 ,
        SUM(a.kk_10) AS realisasi_keuangan_10,
        SUM(a.kk_11) AS realisasi_keuangan_11,
        SUM(a.kk_12) AS realisasi_keuangan_12,
        (SUM(a.kk_1 ) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_1 ,
        (SUM(a.kk_2 ) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_2 ,
        (SUM(a.kk_3 ) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_3 ,
        (SUM(a.kk_4 ) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_4 ,
        (SUM(a.kk_5 ) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_5 ,
        (SUM(a.kk_6 ) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_6 ,
        (SUM(a.kk_7 ) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_7 ,
        (SUM(a.kk_8 ) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_8 ,
        (SUM(a.kk_9 ) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_9 ,
        (SUM(a.kk_10) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_10,
        (SUM(a.kk_11) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_11,
        (SUM(a.kk_12) / d.pagu_anggaran) * 100 AS realisasi_keuangan_persen_12
        FROM belanja AS a
        JOIN kegiatan AS b ON a.kode_giat = b.kode_giat
        JOIN program AS c ON b.kode_prog = c.kode_prog
        JOIN daftar_anggaran_pptk AS d ON b.kode_giat = d.kode_giat
        WHERE
        b.nip_pptk = "'.$nip_pptk.'" AND
        c.kode_pd = "'.$kode_pd.'" AND
        b.kode_giat <> "'.$kode_giat_btl.'"
        GROUP BY a.kode_giat
        ORDER BY a.kode_giat;

        SELECT * FROM daftar_realisasi_pptk  
          ORDER BY realisasi_keuangan_persen_'.$bulan_pelaporan.'
      ';
      $sql_arr = explode(';', $sql_str);
      foreach ($sql_arr as $sql){
        $query = $this->db->query($sql);
      }      
      
      return $query->result();
    }

    function get_kinerja_pptk_detail_total($kode_pd, $bulan_pelaporan, $kode_giat_btl, $nip_pptk)
    {
      $sql = '
        SELECT
        a.nip_pptk,
        c.nama_p,
        c.jabat_p,
        c.hp_p,
        c.foto_p,
        SUM(b.pagu_giat) AS anggaran_yang_dikelola,
        SUM(b.kf_'.$bulan_pelaporan.' * (b.pagu_giat /
          (SELECT SUM(x.pagu_giat) AS anggaran_yang_dikelola
           FROM belanja AS x
           JOIN kegiatan AS y ON x.kode_giat = y.kode_giat
           JOIN program AS z ON z.kode_prog = y.kode_prog
           WHERE
           y.nip_pptk = a.nip_pptk AND
           z.kode_pd = "'.$kode_pd.'" AND
           y.kode_giat <> "'.$kode_giat_btl.'")
           )) AS realisasi_fisik,
        SUM(100 * ROUND(b.kk_'.$bulan_pelaporan.' /
          (SELECT SUM(x.pagu_giat) AS anggaran_yang_dikelola
           FROM belanja AS x
           JOIN kegiatan AS y ON x.kode_giat = y.kode_giat
           JOIN program AS z ON z.kode_prog = y.kode_prog
           WHERE
           y.nip_pptk = a.nip_pptk AND
           z.kode_pd = "'.$kode_pd.'" AND
           y.kode_giat <> "'.$kode_giat_btl.'")
           ,8)) AS realisasi_keuangan
        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN pejabat AS c ON a.nip_pptk = c.nip_p
        JOIN program AS d ON a.kode_prog = d.kode_prog
        WHERE
        d.kode_pd = "'.$kode_pd.'" AND
        a.kode_giat <> "'.$kode_giat_btl.'" AND
        a.nip_pptk = "'.$nip_pptk.'"';
      $query = $this->db->query($sql);
        // echo "<pre>";
        // print_r($query->result());
        // echo "</pre>";
        // exit();
      return $query->result();
    }

    function get_kinerja_pptk_total($kode_pd, $kode_giat_btl)
    {
      $sql = '
        SELECT
        COUNT(DISTINCT a.nip_pptk) AS jumlah_pptk,
        SUM(b.pagu_giat) AS anggaran_yang_dikelola,
        COUNT(DISTINCT a.kode_giat) AS jumlah_kegiatan
        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN program AS d ON a.kode_prog = d.kode_prog
        WHERE
        d.kode_pd = "'.$kode_pd.'" AND
        a.kode_giat <> "'.$kode_giat_btl.'"';
      $query = $this->db->query($sql);
        // echo "<pre>";
        // print_r($query->result());
        // echo "</pre>";
        // exit();
      return $query->result()[0];
    }

    function get_kinerja_pptk_terendah_fisik($kode_pd, $bulan_pelaporan, $kode_giat_btl)
    {
      $sql = '
        SELECT 
        *, 
        realisasi_fisik_'.$bulan_pelaporan.' AS realisasi_fisik, 
        realisasi_keuangan_'.$bulan_pelaporan.' AS realisasi_keuangan 
        FROM daftar_pptk_realisasi
        WHERE kode_pd = "'.$kode_pd.'"
        ORDER BY realisasi_fisik';
      $query = $this->db->query($sql);
      return $query->result()[0];
    }

    function get_kinerja_pptk_terendah_keuangan($kode_pd, $bulan_pelaporan, $kode_giat_btl)
    {
      $sql = '
        SELECT 
        *, 
        realisasi_fisik_'.$bulan_pelaporan.' AS realisasi_fisik, 
        realisasi_keuangan_'.$bulan_pelaporan.' AS realisasi_keuangan 
        FROM daftar_pptk_realisasi
        WHERE kode_pd = "'.$kode_pd.'"
        ORDER BY realisasi_keuangan';
      $query = $this->db->query($sql);
      return $query->result()[0];
    }

    function get_kinerja_pptk_tertinggi_fisik($kode_pd, $bulan_pelaporan, $kode_giat_btl)
    {
      $sql = '
        SELECT 
        *, 
        realisasi_fisik_'.$bulan_pelaporan.' AS realisasi_fisik, 
        realisasi_keuangan_'.$bulan_pelaporan.' AS realisasi_keuangan 
        FROM daftar_pptk_realisasi
        WHERE kode_pd = "'.$kode_pd.'"
        ORDER BY realisasi_fisik DESC';
      $query = $this->db->query($sql);
      return $query->result()[0];
    }

    function get_kinerja_pptk_tertinggi_keuangan($kode_pd, $bulan_pelaporan, $kode_giat_btl)
    {
      $sql = '
        SELECT 
        *, 
        realisasi_fisik_'.$bulan_pelaporan.' AS realisasi_fisik, 
        realisasi_keuangan_'.$bulan_pelaporan.' AS realisasi_keuangan 
        FROM daftar_pptk_realisasi
        WHERE kode_pd = "'.$kode_pd.'"
        ORDER BY realisasi_keuangan DESC';
      $query = $this->db->query($sql);
      return $query->result()[0];
    }

    function get_laporan_realisasi_kegiatan_tabel_belanja($bulan_pelaporan,$kode_giat)
    {
      $sql = '
        SELECT
          b.kode_rek_belanja,
          b.jenis_kegiatan,
          b.nama_belanja,
          b.pagu_giat,
          b.kf_'.$bulan_pelaporan.' AS realisasi_fisik,
          b.kk_'.$bulan_pelaporan.' AS realisasi_keuangan
        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        WHERE a.kode_giat = "'.$kode_giat.'"
        ORDER BY jenis_kegiatan DESC, kode_rek_belanja';
      $query = $this->db->query($sql);
      return $query->result();
    }

    function get_laporan_realisasi_kegiatan_detail($kode_giat)
    {
      $sql_str = '
          DROP TEMPORARY TABLE IF EXISTS total_anggaran_kegiatan;
          CREATE TEMPORARY TABLE total_anggaran_kegiatan AS
          SELECT 
            a.kode_giat,
            a.nama_giat,
            SUM(b.pagu_giat) AS total_pagu_anggaran
          FROM kegiatan AS a
          JOIN belanja AS b ON a.kode_giat = b.kode_giat
          WHERE a.kode_giat = "'.$kode_giat.'";

          DROP TEMPORARY TABLE IF EXISTS total_realisasi_kegiatan;
          CREATE TEMPORARY TABLE total_realisasi_kegiatan AS
          SELECT
            c.*,

            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_1 ) AS realisasi_fisik_1 ,
            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_2 ) AS realisasi_fisik_2 ,
            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_3 ) AS realisasi_fisik_3 ,
            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_4 ) AS realisasi_fisik_4 ,
            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_5 ) AS realisasi_fisik_5 ,
            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_6 ) AS realisasi_fisik_6 ,
            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_7 ) AS realisasi_fisik_7 ,
            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_8 ) AS realisasi_fisik_8 ,
            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_9 ) AS realisasi_fisik_9 ,
            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_10) AS realisasi_fisik_10,
            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_11) AS realisasi_fisik_11,
            SUM((b.pagu_giat / c.total_pagu_anggaran) * b.kf_12) AS realisasi_fisik_12,

            SUM(b.kk_1 ) AS realisasi_keuangan_1 , 
            SUM(b.kk_2 ) AS realisasi_keuangan_2 , 
            SUM(b.kk_3 ) AS realisasi_keuangan_3 , 
            SUM(b.kk_4 ) AS realisasi_keuangan_4 , 
            SUM(b.kk_5 ) AS realisasi_keuangan_5 ,  
            SUM(b.kk_6 ) AS realisasi_keuangan_6 , 
            SUM(b.kk_7 ) AS realisasi_keuangan_7 , 
            SUM(b.kk_8 ) AS realisasi_keuangan_8 , 
            SUM(b.kk_9 ) AS realisasi_keuangan_9 , 
            SUM(b.kk_10) AS realisasi_keuangan_10, 
            SUM(b.kk_11) AS realisasi_keuangan_11, 
            SUM(b.kk_12) AS realisasi_keuangan_12,

            (SUM(b.kk_1 )/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_1 , 
            (SUM(b.kk_2 )/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_2 , 
            (SUM(b.kk_3 )/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_3 , 
            (SUM(b.kk_4 )/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_4 , 
            (SUM(b.kk_5 )/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_5 ,  
            (SUM(b.kk_6 )/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_6 , 
            (SUM(b.kk_7 )/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_7 , 
            (SUM(b.kk_8 )/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_8 , 
            (SUM(b.kk_9 )/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_9 , 
            (SUM(b.kk_10)/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_10, 
            (SUM(b.kk_11)/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_11, 
            (SUM(b.kk_12)/c.total_pagu_anggaran)*100 AS realisasi_keuangan_persen_12 
            
            
          FROM kegiatan AS a
          JOIN belanja AS b ON a.kode_giat = b.kode_giat
          JOIN total_anggaran_kegiatan AS c ON a.kode_giat = c.kode_giat
          WHERE a.kode_giat = "'.$kode_giat.'"; 

          SELECT * FROM total_realisasi_kegiatan
        ';
      $sql_arr = explode(';', $sql_str);
      foreach ($sql_arr as $sql){
        $query = $this->db->query($sql);
      }         
      return $query->result()[0];
    }

    function get_laporan_jenis_pengadaan($kode_pd)
    {
      $sql = '
        SELECT
          a.nip_pptk,
          c.nama_p,
          c.jabat_p,
          c.hp_p,
          c.foto_p,
          COUNT(b.jenis_kegiatan) AS total_paket_pengadaan,
          SUM(IF(b.jenis_pengadaan="Barang",1,0)) AS total_barang,
          SUM(IF(b.jenis_pengadaan="Konstruksi",1,0)) AS total_konstruksi,
          SUM(IF(b.jenis_pengadaan="Konsultan",1,0)) AS total_konsultan,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya",1,0)) AS total_lainnya
          FROM kegiatan AS a
          JOIN belanja AS b ON a.kode_giat = b.kode_giat
          JOIN pejabat AS c ON a.nip_pptk = c.nip_p
          JOIN program AS d ON a.kode_prog = d.kode_prog
          WHERE
          d.kode_pd = "'.$kode_pd.'" AND
          b.jenis_kegiatan = "pengadaan"        
          GROUP BY a.nip_pptk
        ';
      $query = $this->db->query($sql);
      return $query->result();
    }    

    function get_laporan_jenis_pengadaan_total($kode_pd)
    {
      $sql = '
        SELECT
          COUNT(DISTINCT a.nip_pptk) AS jumlah_pptk,
          COUNT(b.jenis_kegiatan) AS total_paket_pengadaan,
          SUM(IF(b.jenis_pengadaan="Barang",1,0)) AS total_barang,
          SUM(IF(b.jenis_pengadaan="Konstruksi",1,0)) AS total_konstruksi,
          SUM(IF(b.jenis_pengadaan="Konsultan",1,0)) AS total_konsultan,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya",1,0)) AS total_lainnya
          FROM kegiatan AS a
          JOIN belanja AS b ON a.kode_giat = b.kode_giat
          JOIN pejabat AS c ON a.nip_pptk = c.nip_p
          JOIN program AS d ON a.kode_prog = d.kode_prog
          WHERE
          d.kode_pd = "'.$kode_pd.'" AND
          b.jenis_kegiatan = "pengadaan"        
        ';
      $query = $this->db->query($sql);
      return $query->result()[0];
    }     

    function get_laporan_jenis_pengadaan_detail($kode_pd,$nip_pptk)
    {
      $sql = '
        SELECT
          COUNT(a.nip_pptk) AS jumlah_pptk,
          c.nama_p,
          c.jabat_p,
          c.hp_p,
          c.foto_p,
          COUNT(b.jenis_kegiatan) AS total_paket_pengadaan,
          SUM(b.pagu_giat) AS total_pagu_pengadaan,
          SUM(IF(b.jenis_pengadaan="Barang",1,0)) AS total_barang,
          SUM(IF(b.jenis_pengadaan="Konstruksi",1,0)) AS total_konstruksi,
          SUM(IF(b.jenis_pengadaan="Konsultan",1,0)) AS total_konsultan,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya",1,0)) AS total_lainnya
          FROM kegiatan AS a
          JOIN belanja AS b ON a.kode_giat = b.kode_giat
          JOIN pejabat AS c ON a.nip_pptk = c.nip_p
          JOIN program AS d ON a.kode_prog = d.kode_prog
          WHERE
          d.kode_pd = "'.$kode_pd.'" AND
          b.jenis_kegiatan = "pengadaan" AND
          a.nip_pptk = "'.$nip_pptk.'"       
        ';
      $query = $this->db->query($sql);
      return $query->result()[0];
    }     

    function get_laporan_jenis_pengadaan_detail_tabel($kode_pd,$nip_pptk)
    {
      $sql = '
        SELECT
          a.kode_giat,
          a.nama_giat,
          b.kode_rek_belanja,
          b.nama_belanja, 
          b.nama_paket_pengadaan, 
          b.pagu_giat,
          b.jenis_pengadaan,
          b.nip_ppk,
          c.nama_p,
          c.jabat_p,
          c.hp_p,
          c.foto_p         
          FROM kegiatan AS a
          JOIN belanja AS b ON a.kode_giat = b.kode_giat
          JOIN pejabat AS c ON b.nip_ppk = c.nip_p
          JOIN program AS d ON a.kode_prog = d.kode_prog
          WHERE
          d.kode_pd = "'.$kode_pd.'" AND
          b.jenis_kegiatan = "pengadaan" AND
          a.nip_pptk = "'.$nip_pptk.'"       
        ';
      $query = $this->db->query($sql);
      return $query->result();
    }       

    function get_laporan_metode_pemilihan_penyedia_barang($kode_pd)
    {
      $sql = '
        SELECT
        b.jenis_pengadaan,
        a.nip_pptk,
        c.nama_p,
        c.jabat_p,
        c.hp_p,
        c.foto_p,
        SUM(IF(b.metode_pemilihan_peny="LU",1,0)) AS barang_LU,
        SUM(IF(b.metode_pemilihan_peny="LS",1,0)) AS barang_LS,
        SUM(IF(b.metode_pemilihan_peny="PL",1,0)) AS barang_PL,
        SUM(IF(b.metode_pemilihan_peny="PK",1,0)) AS barang_PK,
        SUM(IF(b.metode_pemilihan_peny="SY",1,0)) AS barang_SY
        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN pejabat AS c ON a.nip_pptk = c.nip_p
        JOIN program AS d ON a.kode_prog = d.kode_prog
        WHERE
        d.kode_pd = "'.$kode_pd.'" AND
        b.jenis_kegiatan = "pengadaan" AND   
        b.jenis_pengadaan = "Barang"     
        GROUP BY a.nip_pptk
        ORDER BY a.nip_pptk;
        ';
      $query = $this->db->query($sql);
      return $query->result();
    } 

    function get_laporan_metode_pemilihan_penyedia_konstruksi($kode_pd)
    {
      $sql = '
        SELECT
        b.jenis_pengadaan,
        a.nip_pptk,
        c.nama_p,
        c.jabat_p,
        c.hp_p,
        c.foto_p,
        SUM(IF(b.metode_pemilihan_peny="LU",1,0)) AS konstruksi_LU,
        SUM(IF(b.metode_pemilihan_peny="LT",1,0)) AS konstruksi_LT,
        SUM(IF(b.metode_pemilihan_peny="PML",1,0)) AS konstruksi_PML,
        SUM(IF(b.metode_pemilihan_peny="PK",1,0)) AS konstruksi_PK,
        SUM(IF(b.metode_pemilihan_peny="PL",1,0)) AS konstruksi_PL
        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN pejabat AS c ON a.nip_pptk = c.nip_p
        JOIN program AS d ON a.kode_prog = d.kode_prog
        WHERE
        d.kode_pd = "'.$kode_pd.'" AND
        b.jenis_kegiatan = "pengadaan" AND   
        b.jenis_pengadaan = "Konstruksi"     
        GROUP BY a.nip_pptk
        ORDER BY a.nip_pptk;
        ';
      $query = $this->db->query($sql);
      return $query->result();
    }     

    function get_laporan_metode_pemilihan_penyedia_konsultan($kode_pd)
    {
      $sql = '
        SELECT
        b.jenis_pengadaan,
        a.nip_pptk,
        c.nama_p,
        c.jabat_p,
        c.hp_p,
        c.foto_p,
        SUM(IF(b.metode_pemilihan_peny="SU",1,0)) AS konsultan_SU,
        SUM(IF(b.metode_pemilihan_peny="SS",1,0)) AS konsultan_SS,
        SUM(IF(b.metode_pemilihan_peny="PK",1,0)) AS konsultan_PK,
        SUM(IF(b.metode_pemilihan_peny="PL",1,0)) AS konsultan_PL,
        SUM(IF(b.metode_pemilihan_peny="SY",1,0)) AS konsultan_SY
        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN pejabat AS c ON a.nip_pptk = c.nip_p
        JOIN program AS d ON a.kode_prog = d.kode_prog
        WHERE
        d.kode_pd = "'.$kode_pd.'" AND
        b.jenis_kegiatan = "pengadaan" AND   
        b.jenis_pengadaan = "Konsultan"     
        GROUP BY a.nip_pptk
        ORDER BY a.nip_pptk;
        ';
      $query = $this->db->query($sql);
      return $query->result();
    }

    function get_laporan_metode_pemilihan_penyedia_jasa_lainnya($kode_pd)
    {
      $sql = '
        SELECT
        b.jenis_pengadaan,
        a.nip_pptk,
        c.nama_p,
        c.jabat_p,
        c.hp_p,
        c.foto_p,
        SUM(IF(b.metode_pemilihan_peny="LU",1,0)) AS jasa_lainnya_LU,
        SUM(IF(b.metode_pemilihan_peny="LS",1,0)) AS jasa_lainnya_LS,
        SUM(IF(b.metode_pemilihan_peny="PK",1,0)) AS jasa_lainnya_PK,
        SUM(IF(b.metode_pemilihan_peny="PL",1,0)) AS jasa_lainnya_PL,
        SUM(IF(b.metode_pemilihan_peny="SY",1,0)) AS jasa_lainnya_SY
        FROM kegiatan AS a
        JOIN belanja AS b ON a.kode_giat = b.kode_giat
        JOIN pejabat AS c ON a.nip_pptk = c.nip_p
        JOIN program AS d ON a.kode_prog = d.kode_prog
        WHERE
        d.kode_pd = "'.$kode_pd.'" AND
        b.jenis_kegiatan = "pengadaan" AND   
        b.jenis_pengadaan = "Jasa lainnya"     
        GROUP BY a.nip_pptk
        ORDER BY a.nip_pptk;
        ';
      $query = $this->db->query($sql);
      return $query->result();
    }    

    function get_laporan_metode_pemilihan_penyedia_detail_pptk($kode_pd,$nip_pptk)
    {
      $sql = '
        SELECT
          c.nama_p,
          c.jabat_p,
          c.hp_p,
          c.foto_p,
          COUNT(b.jenis_kegiatan) AS total_paket_pengadaan,
          SUM(b.pagu_giat) AS total_pagu_pengadaan,

          SUM(IF(b.jenis_pengadaan="Barang",1,0)) AS total_barang,
          SUM(IF(b.jenis_pengadaan="Barang",b.pagu_giat,0)) AS pagu_total_barang,
          SUM(IF(b.jenis_pengadaan="Barang" AND b.metode_pemilihan_peny="LU",1,0)) AS barang_LU,
          SUM(IF(b.jenis_pengadaan="Barang" AND b.metode_pemilihan_peny="LU",b.pagu_giat,0)) AS pagu_barang_LU,
          SUM(IF(b.jenis_pengadaan="Barang" AND b.metode_pemilihan_peny="LS",1,0)) AS barang_LS,
          SUM(IF(b.jenis_pengadaan="Barang" AND b.metode_pemilihan_peny="LS",b.pagu_giat,0)) AS pagu_barang_LS,
          SUM(IF(b.jenis_pengadaan="Barang" AND b.metode_pemilihan_peny="PL",1,0)) AS barang_PL,
          SUM(IF(b.jenis_pengadaan="Barang" AND b.metode_pemilihan_peny="PL",b.pagu_giat,0)) AS pagu_barang_PL,
          SUM(IF(b.jenis_pengadaan="Barang" AND b.metode_pemilihan_peny="PK",1,0)) AS barang_PK,
          SUM(IF(b.jenis_pengadaan="Barang" AND b.metode_pemilihan_peny="PK",b.pagu_giat,0)) AS pagu_barang_PK,
          SUM(IF(b.jenis_pengadaan="Barang" AND b.metode_pemilihan_peny="SY",1,0)) AS barang_SY,
          SUM(IF(b.jenis_pengadaan="Barang" AND b.metode_pemilihan_peny="SY",b.pagu_giat,0)) AS pagu_barang_SY,

          SUM(IF(b.jenis_pengadaan="Konstruksi",1,0)) AS total_konstruksi,
          SUM(IF(b.jenis_pengadaan="Konstruksi",b.pagu_giat,0)) AS pagu_total_konstruksi,
          SUM(IF(b.jenis_pengadaan="Konstruksi" AND b.metode_pemilihan_peny="LU",1,0)) AS konstruksi_LU,
          SUM(IF(b.jenis_pengadaan="Konstruksi" AND b.metode_pemilihan_peny="LU",b.pagu_giat,0)) AS pagu_konstruksi_LU,
          SUM(IF(b.jenis_pengadaan="Konstruksi" AND b.metode_pemilihan_peny="LT",1,0)) AS konstruksi_LT,
          SUM(IF(b.jenis_pengadaan="Konstruksi" AND b.metode_pemilihan_peny="LT",b.pagu_giat,0)) AS pagu_konstruksi_LT,
          SUM(IF(b.jenis_pengadaan="Konstruksi" AND b.metode_pemilihan_peny="PML",1,0)) AS konstruksi_PML,
          SUM(IF(b.jenis_pengadaan="Konstruksi" AND b.metode_pemilihan_peny="PML",b.pagu_giat,0)) AS pagu_konstruksi_PML,
          SUM(IF(b.jenis_pengadaan="Konstruksi" AND b.metode_pemilihan_peny="PK",1,0)) AS konstruksi_PK,
          SUM(IF(b.jenis_pengadaan="Konstruksi" AND b.metode_pemilihan_peny="PK",b.pagu_giat,0)) AS pagu_konstruksi_PK,
          SUM(IF(b.jenis_pengadaan="Konstruksi" AND b.metode_pemilihan_peny="PL",1,0)) AS konstruksi_PL,
          SUM(IF(b.jenis_pengadaan="Konstruksi" AND b.metode_pemilihan_peny="PL",b.pagu_giat,0)) AS pagu_konstruksi_PL,

          SUM(IF(b.jenis_pengadaan="Konsultan",1,0)) AS total_konsultan,
          SUM(IF(b.jenis_pengadaan="Konsultan",b.pagu_giat,0)) AS pagu_total_konsultan,
          SUM(IF(b.jenis_pengadaan="Konsultan" AND b.metode_pemilihan_peny="SU",1,0)) AS konsultan_SU,
          SUM(IF(b.jenis_pengadaan="Konsultan" AND b.metode_pemilihan_peny="SS",1,0)) AS konsultan_SS,
          SUM(IF(b.jenis_pengadaan="Konsultan" AND b.metode_pemilihan_peny="PK",1,0)) AS konsultan_PK,
          SUM(IF(b.jenis_pengadaan="Konsultan" AND b.metode_pemilihan_peny="PL",1,0)) AS konsultan_PL,
          SUM(IF(b.jenis_pengadaan="Konsultan" AND b.metode_pemilihan_peny="SY",1,0)) AS konsultan_SY,
          SUM(IF(b.jenis_pengadaan="Konsultan" AND b.metode_pemilihan_peny="SU",b.pagu_giat,0)) AS pagu_konsultan_SU,
          SUM(IF(b.jenis_pengadaan="Konsultan" AND b.metode_pemilihan_peny="SS",b.pagu_giat,0)) AS pagu_konsultan_SS,
          SUM(IF(b.jenis_pengadaan="Konsultan" AND b.metode_pemilihan_peny="PK",b.pagu_giat,0)) AS pagu_konsultan_PK,
          SUM(IF(b.jenis_pengadaan="Konsultan" AND b.metode_pemilihan_peny="PL",b.pagu_giat,0)) AS pagu_konsultan_PL,
          SUM(IF(b.jenis_pengadaan="Konsultan" AND b.metode_pemilihan_peny="SY",b.pagu_giat,0)) AS pagu_konsultan_SY,

          SUM(IF(b.jenis_pengadaan="Jasa lainnya",1,0)) AS total_jasa_lainnya,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya",b.pagu_giat,0)) AS pagu_total_jasa_lainnya,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya" AND b.metode_pemilihan_peny="LU",1,0)) AS jasa_lainnya_LU,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya" AND b.metode_pemilihan_peny="LS",1,0)) AS jasa_lainnya_LS,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya" AND b.metode_pemilihan_peny="PK",1,0)) AS jasa_lainnya_PK,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya" AND b.metode_pemilihan_peny="PL",1,0)) AS jasa_lainnya_PL,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya" AND b.metode_pemilihan_peny="SY",1,0)) AS jasa_lainnya_SY,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya" AND b.metode_pemilihan_peny="LU",b.pagu_giat,0)) AS pagu_jasa_lainnya_LU,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya" AND b.metode_pemilihan_peny="LS",b.pagu_giat,0)) AS pagu_jasa_lainnya_LS,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya" AND b.metode_pemilihan_peny="PK",b.pagu_giat,0)) AS pagu_jasa_lainnya_PK,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya" AND b.metode_pemilihan_peny="PL",b.pagu_giat,0)) AS pagu_jasa_lainnya_PL,
          SUM(IF(b.jenis_pengadaan="Jasa lainnya" AND b.metode_pemilihan_peny="SY",b.pagu_giat,0)) AS pagu_jasa_lainnya_SY

          FROM kegiatan AS a
          JOIN belanja AS b ON a.kode_giat = b.kode_giat
          JOIN pejabat AS c ON a.nip_pptk = c.nip_p
          JOIN program AS d ON a.kode_prog = d.kode_prog
          WHERE
          d.kode_pd = "'.$kode_pd.'" AND
          b.jenis_kegiatan = "pengadaan" AND
          a.nip_pptk = "'.$nip_pptk.'"       
        ';
      $query = $this->db->query($sql);
      return $query->result()[0];
    }        

    function get_laporan_metode_pemilihan_penyedia_detail_pptk_tabel($kode_pd,$nip_pptk)
    {
      $sql = '
        SELECT
          a.kode_giat,
          a.nama_giat,
          b.kode_rek_belanja,
          b.nama_belanja, 
          b.nama_paket_pengadaan, 
          b.pagu_giat,
          b.jenis_pengadaan,
          b.metode_pemilihan_peny,
          b.nip_ppk,
          c.nama_p,
          c.jabat_p,
          c.hp_p,
          c.foto_p         
          FROM kegiatan AS a
          JOIN belanja AS b ON a.kode_giat = b.kode_giat
          JOIN pejabat AS c ON b.nip_ppk = c.nip_p
          JOIN program AS d ON a.kode_prog = d.kode_prog
          WHERE
          d.kode_pd = "'.$kode_pd.'" AND
          b.jenis_kegiatan = "pengadaan" AND
          a.nip_pptk = "'.$nip_pptk.'"
          ORDER BY b.jenis_pengadaan      
        ';
      $query = $this->db->query($sql);
      return $query->result();
    } 

}
