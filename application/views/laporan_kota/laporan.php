<!DOCTYPE html>
<html>
<title>Laporan Kota</title>
<body>

<h3 align="center">PEMERINTAH KOTA MANADO<br>      
EVALUASI DAN PENGAWASAN REALISASI ANGGARAN (EPRA)<br>     
LAPORAN TINGKAT KOTA</h3>
<br><br>
s/d Bulan 
<?php 
  echo $nama_bulan_ini;
?> 
<br><br>
<table>
  <tr>
    <td>Anggaran Belanja Langsung (BL)</td>
    <td>: Rp. </td>
    <td align="right"><?php echo number_format($total_kota["anggaran_bl_kota"],0); ?></td>
  </tr>
  <tr>
    <td>Anggaran Belanja Langsung (BTL)</td>
    <td>: Rp. </td>
    <td align="right"><?php echo number_format($total_kota["anggaran_btl_kota"],0); ?></td>
  </tr>
  <tr>
    <td>Total Anggaran (BL+BTL)</td>
    <td>: Rp. </td>
    <td align="right"><?php echo number_format($total_kota["anggaran_total_kota"],0); ?></td>
  </tr>
</table>  
<br><br>
<h3>REALISASI</h3>
<table border="1">
  <tr>
    <th width="100px"></th>
    <th align="center">Target</th>
    <th align="center">Realisasi</th>
  </tr>
  <tr>
    <td>Fisik</td>
    <td align="center" width="200px"><?php echo number_format($total_kota["target_fisik_kota_".$bulan_ini],2); ?>%</td>
    <td align="center" width="200px"><?php echo number_format($total_kota["realisasi_fisik_kota_".$bulan_ini],2); ?>%</td>  
  </tr>
  <tr>
    <td>Keuangan</td>
    <td align="center">
      <?php echo number_format($total_kota["target_keuangan_kota_persen_".$bulan_ini],2); ?>% <br>
      Rp. <?php echo number_format($total_kota["target_keuangan_kota_".$bulan_ini],0); ?>
    </td>
    <td align="center">
      <?php echo number_format($total_kota["realisasi_keuangan_kota_persen_".$bulan_ini],2); ?>% <br>
      Rp. <?php echo number_format($total_kota["realisasi_keuangan_kota_".$bulan_ini],0); ?>
    </td>  
  </tr>
</table>

</body>
</html>