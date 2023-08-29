SELECT
  @jumlah_pptk := COUNT(DISTINCT a.nip_pptk) AS jumlah_pptk,
  @anggaran_yang_dikelola := SUM(b.pagu_giat) AS anggaran_yang_dikelola,
  @jumlah_kegiatan := COUNT(DISTINCT a.kode_giat) AS jumlah_kegiatan
FROM kegiatan AS a
JOIN belanja AS b ON a.kode_giat = b.kode_giat
JOIN program AS d ON a.kode_prog = d.kode_prog
WHERE
  d.kode_pd = "1.01.100" AND
  a.kode_giat <> "1.01.100.1.01.0.0";

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
  c.kode_pd = "1.01.100" AND
  a.kode_giat <> "1.01.100.1.01.0.0" AND 
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
  c.kode_pd = "1.01.100" AND
  a.kode_giat <> "1.01.100.1.01.0.0"
GROUP BY
  a.nip_pptk;

SELECT * FROM daftar_realisasi_pptk;  