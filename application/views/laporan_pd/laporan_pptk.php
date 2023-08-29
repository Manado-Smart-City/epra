<!DOCTYPE html>
<html>
<title>Laporan Perangkat Daerah</title>
<body>

<h3 align="center">PEMERINTAH KOTA MANADO<br>      
EVALUASI DAN PENGAWASAN REALISASI ANGGARAN (EPRA)<br>     
LAPORAN KINERJA PPTK PERANGKAT DAERAH</h3>
<br><br>
<h3><?php echo $pd["nama_pd"]; ?></h3>
s/d Bulan <?php echo $nama_bulan_ini; ?> 
<br><br>
<table>
  <tr>
    <td>Realisasi Keuangan tertinggi</td>
    <td width="20px">:</td>
    <td align="right"><?php echo $laporan_kinerja_pptk["tertinggi_keuangan"]->nama_p; ?></td>
  </tr>
  <tr>
    <td>Realisasi Fisik tertinggi</td>
    <td>:</td>
    <td align="right"><?php echo $laporan_kinerja_pptk["tertinggi_fisik"]->nama_p; ?></td>
  </tr>  
</table>  
<br><br>
<table border="1">
  <tr>
    <th width="20px">No.</th>
    <th align="center">Nama PPTK</th>
    <th align="center">Pagu Anggaran</th>
    <th align="center">Realisasi Fisik</th>
    <th align="center">Realisasi Keuangan</th>
  </tr>
  <?php 
    $no = 1;
    foreach ($laporan_kinerja_pptk["tabel_kinerja_pptk"] as $p) { ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $p->nama_p; ?></td>
        <td align="center">Rp.<?php echo number_format($p->anggaran_yang_dikelola,0); ?></td>
        <?php $str_realisasi_fisik = "realisasi_fisik_".$bulan_ini; ?>
        <?php $str_realisasi_keuangan = "realisasi_keuangan_".$bulan_ini; ?>
        <?php $str_realisasi_keuangan_persen = "realisasi_keuangan_persen_".$bulan_ini; ?>
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
