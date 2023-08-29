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
        <dt>Nama Paket Pengadaan:</dt><dd><?php echo $belanja['nama_paket_pengadaan']; ?></dd>
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
        <dt>Usulan kegiatan dari:</dt><dd><?php echo $belanja['usulan_dari']; ?></dd>
        <dt>File dokumen KAK:</dt><dd><?php echo $belanja['file_dokumen_kak']; ?></dd>
        <dt>PPK:</dt>
        <dd>             
          <?php 
            echo '<div class="col-md-2">';
            echo '<img src="'.site_url('uploads/pd/pejabat/')."/".$belanja["foto_ppk"].'" onerror="this.src=&#39;' .site_url('uploads/pd/pejabat/no-pict.jpg').'&#39;;" width="100px">';
            echo "</div>";
            echo '<div class="col-md-6">';
            echo "NIP: ".$belanja['nip_ppk']."<br>";
            echo "Nama: ".$belanja['nama_ppk']."<br>"; 
            echo "Alamat: ".$belanja['alamat_ppk']."<br>"; 
            echo "Email: ".$belanja['email_ppk']."<br>"; 
            echo "HP: ".$belanja['hp_ppk']; 
            echo "</div>";
          ?>
        </dd>
        <dt>Pejabat Pengadaan:</dt>
        <dd>             
          <?php 
            echo '<div class="col-md-2">';
            echo '<img src="'.site_url('uploads/pd/pejabat/')."/".$belanja["foto_pp"].'" onerror="this.src=&#39;' .site_url('uploads/pd/pejabat/no-pict.jpg').'&#39;;" width="100px">';
            echo "</div>";
            echo '<div class="col-md-6">';
            echo "NIP: ".$belanja['nip_pp']."<br>";
            echo "Nama: ".$belanja['nama_pp']."<br>"; 
            echo "Alamat: ".$belanja['alamat_pp']."<br>"; 
            echo "Email: ".$belanja['email_pp']."<br>"; 
            echo "HP: ".$belanja['hp_pp']; 
            echo "</div>";                      
          ?>
        </dd>             
        <dt>Jenis Pengadaan:</dt><dd><?php echo $belanja['jenis_pengadaan']; ?></dd>     
        <dt>Metode Pemilihan <br>Penyedia:</dt><dd><?php echo $belanja['metode_pemilihan_peny']; ?></dd>     
        <dt>Jenis Belanja:</dt><dd><?php echo $belanja['jenis_belanja']; ?></dd>     
        <dt>Volume:</dt><dd><?php echo $belanja['volume_belanja']; ?></dd>     
        <dt>Harga Perkiraan Sendiri:</dt><dd><?php echo "Rp. ".number_format($belanja['hps'],0); ?></dd>
      </dl>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- ./col -->

<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header with-border">                
      <h3 class="box-title">2. Penyedia</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <dl class="dl-horizontal">
        <dt></dt><dd></dd>
        <dt>Nama Penyedia:</dt><dd><?php echo $belanja['nama_peny']; ?></dd>
        <dt>Nama Direktur:</dt><dd><?php echo $belanja['nama_direktur']; ?></dd>
        <dt>Alamat Penyedia:</dt><dd><?php echo $belanja['alamat_peny']; ?></dd>
        <dt>Kualifikasi Penyedia:</dt><dd><?php echo $belanja['kualifikasi_peny']; ?></dd>
        <dt>Nomor Kontrak:</dt><dd><?php echo $belanja['nomor_kontrak']; ?></dd>
        <dt>Tanggal Kontrak:</dt><dd>
        <?php 
          if ($belanja['tanggal_kontrak'] == "dd/mm/yyyy") {
            $belanja['tanggal_kontrak'] = "-";
          }                  
          echo $belanja['tanggal_kontrak']; 
        ?></dd>
        <dt>Jangka Waktu Kontrak:</dt><dd><?php echo $belanja['jangka_waktu_kontrak']; ?></dd>
        <dt>Tanggal Mulai/Selesai <br>Kontrak:</dt>
        <dd>
        <?php 
          if ($belanja['tanggal_mulai_kontrak'] == "dd/mm/yyyy") {
            $belanja['tanggal_mulai_kontrak'] = "-";
          }
          if ($belanja['tanggal_selesai_kontrak'] == "dd/mm/yyyy") {
            $belanja['tanggal_selesai_kontrak'] = "-";
          }                    
          echo $belanja['tanggal_mulai_kontrak']." s/d ".$belanja['tanggal_selesai_kontrak']; 
        ?>
        </dd>
        <dt>Nilai Kontrak:</dt><dd><?php echo "Rp. ".number_format($belanja['nilai_kontrak'],0); ?></dd> 
        <dt>File dokumen Kontrak:</dt><dd><?php echo $belanja['file_dokumen_kontrak']; ?></dd>                
      </dl>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- ./col -->

<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header with-border">                
      <h3 class="box-title">3. Realisasi</h3>
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

<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header with-border">                
      <h3 class="box-title">4. Pemeriksa</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <dl class="dl-horizontal">
        <dt></dt><dd></dd>
        <dt>Nomor PPHP/PHO:</dt><dd><?php echo $belanja['nomor_pphp']; ?></dd>
        <dt>Tanggal PPHP/PHO:</dt><dd>
        <?php 
          if ($belanja['tanggal_pphp'] == "dd/mm/yyyy") {
            $belanja['tanggal_pphp'] = "-";
          }                  
          echo $belanja['tanggal_pphp']; 
        ?></dd>         
        <dt>Tim PPHP/PHO:</dt><dd>  
        <?php
          if (empty($pphp)){
            echo "<i>Data belum dimasukkan</i>";
          }  else {
        ?>     
          <table class="table table-bordered table-striped">
              <tr>
                  <th width="10px" align="center">No.</th>
                  <th align="center">NIP</th>
                  <th align="center">Nama</th>
                  <th align="center">Perangkat Daerah</th>
              </tr>
              <?php $no=0 ; ?>
              <?php foreach($pphp as $p){ ?>
              <tr>
                  <?php $no++; ?>
                  <td align="center">
                      <?php echo $no; ?>
                  </td>
                  <td align="center">
                      <?php echo $p['nip_pphp']; ?>
                  </td>
                  <td>
                      <?php echo $p['nama_p']; ?>
                  </td>
                  <td>
                      <?php echo $p['nama_pd']; ?>
                  </td>                                               
              </tr>
              <?php } ?>                                  
          </table>
          <?php } ?> 
        </dd> 
        <dt>Hasil Pemeriksaan:</dt><dd>  
        <?php
          if (empty($hasil_pemeriksaan)){
            echo "<i>Data belum dimasukkan</i>";
          }  else {
        ?>     
          <table class="table table-bordered table-striped">
              <tr>
                  <th width="10px" align="center">No.</th>
                  <th align="center" width="150px">Tanggal</th>
                  <th align="center" width="250px">Berita Acara</th>
                  <th align="center">Hasil Pemeriksaan</th>
              </tr>
              <?php $no=0 ; ?>
              <?php foreach($hasil_pemeriksaan as $p){ ?>
              <tr>
                  <?php $no++; ?>
                  <td align="center">
                      <?php echo $no; ?>
                  </td>
                  <td align="center">
                    <?php 
                      if ($belanja['tanggal_pemeriksaan'] == "dd/mm/yyyy") {
                        $belanja['tanggal_pemeriksaan'] = "-";
                      }                  
                      echo $belanja['tanggal_pemeriksaan']; 
                    ?>                                                              
                  </td>
                  <td>
                      <?php 
                        echo "Nomor BAP: ".$p['nomor_berita_acara_pemeriksaan']."<br>"; 
                        if (!empty($p['file_berita_acara_pemeriksaan'])) {
                                      echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$p['file_berita_acara_pemeriksaan']).'" class="view-pdf">'.$p['file_berita_acara_pemeriksaan'].'</a>'; 
                        }
                      ?>
                  </td>
                  <td>
                      <?php echo $p['hasil_pemeriksaan']; ?>
                  </td>                                               
              </tr>
              <?php } ?>                                  
          </table>
          <?php } ?> 
        </dd> 
     
      </dl>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- ./col -->

<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header with-border">                
      <h3 class="box-title">5. Konsultan</h3>
    </div><!-- /.box-header -->
    <div class="box-body">

          <table class="table table-bordered table-striped"> 
            <thead>
              <tr>
                  <th width="30px">No.</th>                            
                  <th width="100px">Data</th>
                  <th width="250px">Konsultan/Tim Perencanaan</th>
                  <th width="250px">Konsultan/Tim Pengawasan</th>
              </tr>
            </thead>    
            <tbody>          
              <tr>
                  <td align="center">1</td>
                  <td><strong>Nama Paket/Kegiatan</strong></td>
                  <td><?php echo $belanja['konsultan_perencanaan_nama_paket']; ?></td>
                  <td><?php echo $belanja['konsultan_pengawasan_nama_paket']; ?></td>
              </tr>  
              <tr>
                  <td align="center">2</td>
                  <td><strong>Penyedia/Tim/Perorangan</strong></td>
                  <td><?php echo "Nama: ".$belanja['konsultan_perencanaan_nama_penyedia']."<br>"."Alamat: ".$belanja['konsultan_perencanaan_alamat']; ?></td>
                  <td><?php echo "Nama: ".$belanja['konsultan_pengawasan_nama_penyedia']."<br>"."Alamat: ".$belanja['konsultan_pengawasan_alamat']; ?></td>
              </tr>            
              <tr>
                  <td align="center">3</td>
                  <td><strong>Pimpinan</strong></td>
                  <td><?php echo "Nama: ".$belanja['konsultan_perencanaan_nama_pimpinan']."<br>"."Alamat: ".$belanja['konsultan_perencanaan_alamat_pimpinan']; ?></td>
                  <td><?php echo "Nama: ".$belanja['konsultan_pengawasan_nama_pimpinan']."<br>"."Alamat: ".$belanja['konsultan_pengawasan_alamat_pimpinan']; ?></td>
              </tr>          
              <tr>
                  <td align="center">4</td>
                  <td><strong>Nilai Kontrak</strong></td>
                  <td><?php echo "Rp. ".number_format($belanja['konsultan_perencanaan_nilai_kontrak'],0); ?></td>
                  <td><?php echo "Rp. ".number_format($belanja['konsultan_pengawasan_nilai_kontrak'],0); ?></td>
              </tr>    
              <tr>
                  <td align="center">5</td>
                  <td><strong>File Kontrak</strong></td>
                  <td>
                    <?php 
                        if (!empty($p['file_berita_acara_pemeriksaan'])) {
                                      echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$p['konsultan_perencanaan_file_dokumen_kontrak']).'" class="view-pdf">'.$p['konsultan_perencanaan_file_dokumen_kontrak'].'</a>'; 
                        }                              
                    ?>
                  </td>
                  <td>
                    <?php 
                        if (!empty($p['file_berita_acara_pemeriksaan'])) {
                                      echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$p['konsultan_pengawasan_file_dokumen_kontrak']).'" class="view-pdf">'.$p['konsultan_pengawasan_file_dokumen_kontrak'].'</a>'; 
                        }                              
                    ?>
                  </td>                            
              </tr>                                                                           
            </tbody>
          </table>
      </dl>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- ./col -->

<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header with-border">                
      <h3 class="box-title">6. Pengguna</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <dl class="dl-horizontal">
        <dt></dt><dd></dd>
        <dt>Pengguna/Penerima:</dt><dd><?php echo $belanja['pengguna_penerima']; ?></dd>
        <dt>Alamat Pengguna/<br>Penerima:</dt><dd><?php echo $belanja['alamat_pengguna_penerima']; ?></dd>
        <dt>Sudah dimanfaatkan?:</dt><dd>
        <?php 
          if ($belanja['pilihan_sudah_dimanfaatkan'] == "sudah"){
            echo "Sudah";
            if (!empty($belanja['sudah_dimanfaatkan_sejak']) && ($belanja['sudah_dimanfaatkan_sejak'] <> "dd/mm/yyyy")) {
              echo ", sejak ".$belanja['sudah_dimanfaatkan_sejak']; 
            }
          } elseif ($belanja['pilihan_sudah_dimanfaatkan'] == "belum") {
            echo "Belum";
            if (!empty($belanja['belum_dimanfaatkan_karena'])) {
              echo ", karena ".$belanja['belum_dimanfaatkan_karena']; 
            }
          } else {
            echo "-";
          }
        ?></dd>
     
      </dl>
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