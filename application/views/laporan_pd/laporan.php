<!DOCTYPE html>
<html>
<title>Laporan Perangkat Daerah</title>
<body>

<h3 align="center">PEMERINTAH KOTA MANADO<br>      
EVALUASI DAN PENGAWASAN REALISASI ANGGARAN (EPRA)<br>     
LAPORAN TOTAL ANGGARAN PERANGKAT DAERAH</h3>
<br><br>
<h3><?php echo $pd["nama_pd"]; ?></h3>
s/d Bulan <?php echo $nama_bulan_ini; ?> 
<br><br>
<table>
  <tr>
    <td>Total Anggaran</td>
    <td>: Rp. </td>
    <td align="right"><?php echo number_format($total_anggaran,0); ?></td>
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
    <td align="center" width="200px"><?php echo number_format($realisasi_pd["total_target_fisik_".$bulan_ini],2); ?>%</td>
    <td align="center" width="200px"><?php echo number_format($realisasi_pd["total_realisasi_fisik_".$bulan_ini],2); ?>%</td>  
  </tr>
  <tr>
    <td>Keuangan</td>
    <td align="center">
      <?php echo number_format($realisasi_pd["total_target_keuangan_persen_".$bulan_ini],2); ?>% <br>
      Rp. <?php echo number_format($realisasi_pd["total_target_keuangan_".$bulan_ini],0); ?>
    </td>
    <td align="center">
      <?php echo number_format($realisasi_pd["total_realisasi_keuangan_persen_".$bulan_ini],2); ?>% <br>
      Rp. <?php echo number_format($realisasi_pd["total_realisasi_keuangan_".$bulan_ini],0); ?>
    </td>  
  </tr>
</table>

</body>
</html>