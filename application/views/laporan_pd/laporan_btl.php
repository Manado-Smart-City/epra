<!DOCTYPE html>
<html>
<title>Laporan Perangkat Daerah</title>
<body>

<h3 align="center">PEMERINTAH KOTA MANADO<br>      
EVALUASI DAN PENGAWASAN REALISASI ANGGARAN (EPRA)<br>     
LAPORAN BELANJA TAK LANGSUNG PERANGKAT DAERAH</h3>
<br><br>
<h3><?php echo $pd["nama_pd"]; ?></h3>
s/d Bulan <?php echo $nama_bulan_ini; ?> 
<br><br>
<table>
  <tr>
    <td>Anggaran Belanja Tak Langsung (BTL)</td>
    <td width="20px">:</td>
    <td align="right"><?php echo "Rp.".number_format($total_anggaran_btl,0); ?></td>
  </tr>
  <tr>
    <td>Persentase BTL dari Total Anggaran</td>
    <td>:</td>
    <td align="left"><?php echo number_format($persentase_btl,2); ?>%</td>
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
    <td align="center" width="200px"><?php echo number_format($realisasi_pd["btl_target_fisik_".$bulan_ini],2); ?>%</td>
    <td align="center" width="200px"><?php echo number_format($realisasi_pd["btl_realisasi_fisik_".$bulan_ini],2); ?>%</td>  
  </tr>
  <tr>
    <td>Keuangan</td>
    <td align="center">
      <?php echo number_format($realisasi_pd["btl_target_keuangan_persen_".$bulan_ini],2); ?>% <br>
      Rp. <?php echo number_format($realisasi_pd["btl_target_keuangan_".$bulan_ini],0); ?>
    </td>
    <td align="center">
      <?php echo number_format($realisasi_pd["btl_realisasi_keuangan_persen_".$bulan_ini],2); ?>% <br>
      Rp. <?php echo number_format($realisasi_pd["btl_realisasi_keuangan_".$bulan_ini],0); ?>
    </td>  
  </tr>
</table>

</body>
</html>