<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header with-border">                
      <h3 class="box-title">1. Data Umum</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <dl class="dl-horizontal">
        <dt></dt><dd></dd>
        <dt>Kode Rekening Belanja:</dt><dd><?php echo $belanja['kode_rek_belanja']; ?></dd>
        <dt>Nama Belanja:</dt><dd><?php echo $belanja['nama_belanja']; ?></dd>
        <dt>Nama Sub Kegiatan Swakelola:</dt><dd><?php echo $belanja['nama_giat_swa']; ?></dd>
        <dt>Pagu:</dt><dd><?php echo "Rp.".number_format($belanja['pagu_giat'],0); ?></dd>
        <?php 
          if ($belanja['bulan_pelaksanaan_mulai'] == 0 || $belanja['bulan_pelaksanaan_selesai'] == 0){
        ?>
        <dt>Bulan Pelaksanaan:</dt><dd><?php echo "Bulan Pelaksanaan belum ditentukan"; ?></dd>
        <?php 
          } else {          
        ?>                
        <dt>Bulan Pelaksanaan:</dt><dd><?php echo $bulan[$belanja['bulan_pelaksanaan_mulai']]." s/d ".$bulan[$belanja['bulan_pelaksanaan_selesai']]; ?></dd>
        <?php 
          }         
        ?>         
        <dt>Lokasi:</dt><dd><?php echo $belanja['lokasi_giat']; ?></dd>
        <dt>Lokasi Spesifik:</dt><dd><?php echo $belanja['lokasi_spesifik']; ?></dd>
        <dt>Peta:</dt><dd>
        <?php 
          if (empty($belanja['lokasi_lintang'] && $belanja['lokasi_bujur'])) { 
            echo "<i>Koordinat belum ditentukan.</i>"; 
          } else {
            echo "<div id='peta' style='height: 400px; width: 100%;'></div>";
          }          
        ?></dd>   
        <dt>Jenis Belanja:</dt><dd><?php echo $belanja['jenis_belanja']; ?></dd>     
        <dt>Volume Belanja:</dt><dd><?php echo $belanja['volume_belanja']; ?></dd>     
        <dt>Deskripsi Belanja:</dt><dd><?php echo $belanja['deskripsi_belanja']; ?></dd>    
        <dt>File dokumen KAK:</dt><dd><?php echo $belanja['file_dokumen_kak']; ?></dd> 
        <dt>Usulan kegiatan dari:</dt><dd><?php echo $belanja['usulan_dari']; ?></dd>
      </dl>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- ./col -->

<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header with-border">                
      <h3 class="box-title">2. Realisasi</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
<!--                 <dl class="dl-horizontal">
        <dt></dt><dd></dd>
        <dt>Realisasi:</dt>
        <dd> -->
          <table class="table table-bordered table-striped"> 
            <thead>
              <tr>
                  <th width="30px">No.</th>                            
                  <th>Bulan</th>
                  <th width="250px">Realisasi Fisik</th>
                  <th width="250px">Realisasi Keuangan</th>
              </tr>
            </thead>    
            <tbody>          
              <tr>
                  <td align="center">1</td>
                  <td align="center">Januari</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_1'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_1'],0)." (".number_format(($belanja['kk_1']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr>   

              <tr>
                  <td align="center">2</td>
                  <td align="center">Februari</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_2'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_2'],0)." (".number_format(($belanja['kk_2']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr>

              <tr>
                  <td align="center">3</td>
                  <td align="center">Maret</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_3'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_3'],0)." (".number_format(($belanja['kk_3']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr>         

              <tr>
                  <td align="center">4</td>
                  <td align="center">April</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_4'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_4'],0)." (".number_format(($belanja['kk_4']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr> 

              <tr>
                  <td align="center">5</td>
                  <td align="center">Mei</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_5'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_5'],0)." (".number_format(($belanja['kk_5']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr> 

              <tr>
                  <td align="center">6</td>
                  <td align="center">Juni</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_6'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_6'],0)." (".number_format(($belanja['kk_6']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr> 

              <tr>
                  <td align="center">7</td>
                  <td align="center">Juli</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_7'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_7'],0)." (
                    ".number_format(($belanja['kk_7']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr> 

              <tr>
                  <td align="center">8</td>
                  <td align="center">Agustus</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_8'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_8'],0)." (".number_format(($belanja['kk_8']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr> 

              <tr>
                  <td align="center">9</td>
                  <td align="center">September</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_9'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_9'],0)." (".number_format(($belanja['kk_9']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr> 

              <tr>
                  <td align="center">10</td>
                  <td align="center">Oktober</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_10'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_10'],0)." (".number_format(($belanja['kk_10']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr> 

              <tr>
                  <td align="center">11</td>
                  <td align="center">November</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_11'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_11'],0)." (".number_format(($belanja['kk_11']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr> 

              <tr>
                  <td align="center">12</td>
                  <td align="center">Desember</td>
                  <td align="center" valign="center"><?php echo number_format($belanja['kf_12'],2)." %"; ?></td>
                  <td align="center"><?php echo "Rp. ".number_format($belanja['kk_12'],0)." (".number_format(($belanja['kk_12']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
              </tr> 

            </tbody> 
          </table>                     
<!--                   </dd>
      </dl> -->
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- ./col -->  
<script>
  function initMap() {
    var posisi = {lat: <?php echo $belanja['lokasi_lintang']; ?>, lng: <?php echo $belanja['lokasi_bujur']; ?>};
    var map = new google.maps.Map(document.getElementById('peta'), {
      zoom: 15,
      center: posisi
    });
    var marker = new google.maps.Marker({
      position: posisi,
      map: map
    });
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBT-oWuNKPjOaT3ASsz9GsHLhX-BpDTwF4&callback=initMap">
</script>       