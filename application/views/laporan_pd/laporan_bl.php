<!DOCTYPE html>
<html>
<title>Laporan Perangkat Daerah</title>
<body>

<h3 align="center">PEMERINTAH KOTA MANADO<br>      
EVALUASI DAN PENGAWASAN REALISASI ANGGARAN (EPRA)<br>     
LAPORAN BELANJA LANGSUNG PERANGKAT DAERAH</h3>
<br><br>
<h3><?php echo $pd["nama_pd"]; ?></h3>
s/d Bulan <?php echo $nama_bulan_ini; ?> 
<br><br>
<table>
  <tr>
    <td>Total Anggaran</td>
    <td width="20px">:</td>
    <td align="right"><?php echo "Rp.".number_format($total_anggaran_bl,0); ?></td>
  </tr>
<!--  <tr>
    <td>Persentase BL dari Total Anggaran</td>
    <td>:</td>
    <td align="left"><?php echo number_format($persentase_bl,2); ?>%</td>
  </tr>
-->
  <tr>
    <td>Jumlah Program</td>
    <td>:</td>
    <td align="left"><?php echo $jumlah_program; ?></td>
  </tr>
  <tr>
    <td>Jumlah Sub Kegiatan</td>
    <td>:</td>
    <td align="left"><?php echo $jumlah_kegiatan; ?></td>
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
    <td align="center" width="200px"><?php echo number_format($realisasi_pd["bl_target_fisik_".$bulan_ini],2); ?>%</td>
    <td align="center" width="200px"><?php echo number_format($realisasi_pd["bl_realisasi_fisik_".$bulan_ini],2); ?>%</td>  
  </tr>
  <tr>
    <td>Keuangan</td>
    <td align="center">
      <?php echo number_format($realisasi_pd["bl_target_keuangan_persen_".$bulan_ini],2); ?>% <br>
      Rp. <?php echo number_format($realisasi_pd["bl_target_keuangan_".$bulan_ini],0); ?>
    </td>
    <td align="center">
      <?php echo number_format($realisasi_pd["bl_realisasi_keuangan_persen_".$bulan_ini],2); ?>% <br>
      Rp. <?php echo number_format($realisasi_pd["bl_realisasi_keuangan_".$bulan_ini],0); ?>
    </td>  
  </tr>
</table>

</body>
</html>
