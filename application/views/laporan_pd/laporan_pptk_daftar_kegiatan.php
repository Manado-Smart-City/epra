<!DOCTYPE html>
<html>
<title>Laporan Perangkat Daerah</title>
<body>

<h3 align="center">PEMERINTAH KOTA MANADO<br>      
EVALUASI DAN PENGAWASAN REALISASI ANGGARAN (EPRA)<br>     
DAFTAR KEGIATAN PPTK PERANGKAT DAERAH</h3>

<h3 align="center"><?php echo $laporan_kinerja_pptk_detail->nama_p; ?> </h3>      

<table width="100%">
  <tr>
    <td width="75%">
      <h3><?php echo $pd["nama_pd"]; ?></h3>
      s/d Bulan <?php echo $nama_bulan_ini; ?> 
      <br><br>
      <table>
        <tr>
          <td>Pagu anggaran yang dikelola</td>
          <td width="20px">:</td>
          <td align="left">Rp.<?php echo number_format($laporan_kinerja_pptk_detail->anggaran_yang_dikelola,0); ?></td>
        </tr>
        <?php $str_realisasi_fisik = "realisasi_fisik_".$bulan_ini; ?>
        <?php $str_realisasi_keuangan = "realisasi_keuangan_".$bulan_ini; ?>
        <?php $str_realisasi_keuangan_persen = "realisasi_keuangan_persen_".$bulan_ini; ?>    
        <tr>  
          <td>Realisasi Fisik </td>
          <td>:</td>
          <td align="left"><?php echo number_format($laporan_kinerja_pptk_detail->$str_realisasi_fisik,2); ?>%</td>
        </tr> 
        <tr>  
          <td>Realisasi Keuangan </td>
          <td>:</td>
          <td align="left">
            <?php echo number_format($laporan_kinerja_pptk_detail->$str_realisasi_keuangan_persen,2); ?>% (
            Rp.<?php echo number_format($laporan_kinerja_pptk_detail->$str_realisasi_keuangan,0); ?>)
          </td>
        </tr>
      </table>
    </td>

    <td width="25%" align="right">
      <?php echo '<img src="'.site_url('uploads/pd/pejabat/')."/".$laporan_kinerja_pptk_detail->foto_p.'" width="75px">'; ?>
    </td>
  </tr>
</table>
  
<br><br>
<table border="1">
  <tr>
    <th width="20px">No.</th>
    <th align="center">Nama Sub Kegiatan</th>
    <th align="center">Pagu Anggaran</th>
    <th align="center">Realisasi Fisik</th>
    <th align="center">Realisasi Keuangan</th>
  </tr>
  <?php 
    $no = 1;
    foreach ($laporan_kinerja_pptk_tabel_kegiatan as $p) { ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $p->nama_giat; ?></td>
        <td align="center">Rp.<?php echo number_format($p->pagu_anggaran,0); ?></td>
        <td align="center"><?php echo number_format($p->$str_realisasi_fisik,2); ?>%</td>
        <td align="center">
          <?php echo number_format($p->$str_realisasi_keuangan_persen,2); ?>%<br>
          Rp.<?php echo number_format($p->$str_realisasi_keuangan,0); ?>
        </td> 
      </tr>
  <?php 
    $no++;
    } ?>
</table>

</body>
</html>
