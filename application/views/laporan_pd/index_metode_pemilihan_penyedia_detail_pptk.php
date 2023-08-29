  <div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-solid">    
                <div class="box-header">
                    <h3 class="box-title">Laporan Metode Pemilihan Penyedia :: Detail PPTK</h3>
                </div>
                <div class="box-body">

                  <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header">
                        <div class="widget-user-image">
                          <?php echo '<img class="img-circle" src="'.site_url('uploads/pd/pejabat/')."/".$laporan_metode_pemilihan_penyedia_detail_pptk->foto_p.'" width="75px">'; ?>
                        </div><!-- /.widget-user-image -->
                        <h3 class="widget-user-username"><?php echo $laporan_metode_pemilihan_penyedia_detail_pptk->nama_p; ?></h3>
                        <h5 class="widget-user-desc"><?php echo $laporan_metode_pemilihan_penyedia_detail_pptk->jabat_p; ?></h5>
                      </div>
                    </div><!-- /.widget-user -->
                  </div><!-- /.col -->

                  <h4>1. REKAPITULASI</h4>

                  <table id="" class="table table-bordered table-striped"> 
                    <thead>
                        <tr>
                            <th width="10px" rowspan="2">No.</th>                            
                            <th colspan="3">Jenis Pengadaan</th>
                            <th colspan="3">Metode Pemilihan Penyedia</th>
                        </tr>
                        <tr>    
                            <th>Jenis</th>
                            <th>Jumlah Paket</th>
                            <th>Pagu</th>                                                        
                            <th>Metode</th>
                            <th>Jumlah Paket</th>                                               
                            <th>Pagu</th>   
                        </tr>
                    </thead>    
                    <tbody>

                      <tr>
                          <td align="center" rowspan="5">
                              <?php echo "1"; ?>
                          </td>
                          <td align="center" rowspan="5">Pengadaan Barang</td>
                          <td align="center" rowspan="5">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->total_barang;                               
                              ?>                               
                          </td>
                          <td align="center" rowspan="5">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_total_barang,0);                               
                              ?>                               
                          </td>                          
                          <td>Lelang Umum (LU)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->barang_LU;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_barang_LU,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Lelang Sederhana (LS)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->barang_LS;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_barang_LS,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Pengadaan Langsung (PL)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->barang_PL;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_barang_PL,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Penunjukan Langsung (PK)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->barang_PK;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_barang_PK,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Sayembara/Kontes (SY)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->barang_SY;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_barang_SY,0);                               
                              ?>                               
                          </td>                          
                      </tr>


                      <tr>
                          <td align="center" rowspan="5">
                              <?php echo "2"; ?>
                          </td>
                          <td align="center" rowspan="5">Pengadaan Pekerjaan Konstruksi</td>
                          <td align="center" rowspan="5">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->total_konstruksi;                               
                              ?>                               
                          </td>
                          <td align="center" rowspan="5">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_total_konstruksi,0);                               
                              ?>                               
                          </td>            
                          <td>Pelelangan Umum (LU)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->konstruksi_LU;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_konstruksi_LU,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Pelelangan Terbatas (LT)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->konstruksi_LT;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_konstruksi_LT,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Pemilihan Langsung (PML)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->konstruksi_PML;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_konstruksi_PML,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Penunjukan Langsung (PK)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->konstruksi_PK;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_konstruksi_PK,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Pengadaan Langsung (PL)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->konstruksi_PL;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_konstruksi_PL,0);                               
                              ?>                               
                          </td>                          
                      </tr>


                      <tr>
                          <td align="center" rowspan="5">
                              <?php echo "3"; ?>
                          </td>
                          <td align="center" rowspan="5">Pengadaan Jasa Konsultasi</td>
                          <td align="center" rowspan="5">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->total_konsultan;                               
                              ?>                               
                          </td>
                          <td align="center" rowspan="5">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_total_konsultan,0);                               
                              ?>                               
                          </td>            


                          <td>Seleksi Umum (SU)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->konsultan_SU;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_konsultan_SU,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Seleksi Sederhana (SS)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->konsultan_SS;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_konsultan_SS,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Penunjukan Langsung (PK)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->konsultan_PK;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_konsultan_PK,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Pengadaan Langsung (PL)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->konsultan_PL;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_konsultan_PL,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Sayembara (SY)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->konsultan_SY;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_konsultan_SY,0);                               
                              ?>                               
                          </td>                          
                      </tr>


                      <tr>
                          <td align="center" rowspan="5">
                              <?php echo "4"; ?>
                          </td>
                          <td align="center" rowspan="5">Jasa lainnya</td>
                          <td align="center" rowspan="5">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->total_jasa_lainnya;                               
                              ?>                               
                          </td>
                          <td align="center" rowspan="5">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_total_jasa_lainnya,0);                               
                              ?>                               
                          </td>                           

                          <td>Lelang Umum (LU)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->jasa_lainnya_LU;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_jasa_lainnya_LU,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Lelang Sederhana (LS)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->jasa_lainnya_LS;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_jasa_lainnya_LS,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Penunjukan Langsung (PK)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->jasa_lainnya_PK;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_jasa_lainnya_PK,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Pengadaan Langsung (PL)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->jasa_lainnya_PL;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_jasa_lainnya_PL,0);                               
                              ?>                               
                          </td>                          
                      </tr>
                      <tr>    
                          <td>Sayembara/Kontes (SY)</td>
                          <td align="center">
                              <?php 
                                  echo $laporan_metode_pemilihan_penyedia_detail_pptk->jasa_lainnya_SY;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($laporan_metode_pemilihan_penyedia_detail_pptk->pagu_jasa_lainnya_SY,0);                               
                              ?>                               
                          </td>                          
                      </tr>



                    </tbody>                     
                  </table><br><br>

                  <h4>2. RINCIAN PAKET PENGADAAN</h4>

                  <table id="" class="table table-bordered table-striped"> 
                    <thead>
                        <tr>
                            <th width="10px" rowspan="2">No.</th>                            
                            <th width="250px">Kegiatan & Belanja</th>
                            <th>Paket Pengadaan & PPK</th>
                            <th>Jenis Pengadaan</th>
                            <th>Metode Pemilihan Penyedia</th>
                            <th>Pagu </th>
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>
                    <?php foreach($laporan_metode_pemilihan_penyedia_detail_pptk_tabel as $p){ ?>                  
                      <tr>
                          <?php $no++; ?>
                          <td align="center">
                              <?php echo $no; ?>
                          </td>
                          <td align="left">
                              <?php 
                                  echo "<h4>Kegiatan:</h4>";
                                  echo $p->kode_giat."<br>".$p->nama_giat; 
                                  echo "<h4>Belanja:</h4>";
                                  echo '<a href="'.site_url('laporan_pd/index_metode_pemilihan_penyedia_detail_pengadaan/'.$tahun_anggaran.'/'.$kode_pd.'/'.$p->kode_rek_belanja.'">'.$p->kode_rek_belanja."<br>".$p->nama_belanja.'</a> '); 

                              ?>                               
                          </td>
                          <td>
                              <?php 
                                  echo "<h4>Paket Pengadaan:</h4>";
                                  echo '<a href="'.site_url('laporan_pd/index_metode_pemilihan_penyedia_detail_pengadaan/'.$tahun_anggaran.'/'.$kode_pd.'/'.$p->kode_rek_belanja.'">'.$p->nama_paket_pengadaan.'</a> ');
                                  echo "<h4>PPK:</h4>";
                              ?>                             

                            <div class="box-pejabat box-widget widget-user-2">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header" style="padding-top: 0px; padding-bottom: 0px;">
                                <div class="widget-user-image">
                                  <?php echo '<img src="'.site_url('uploads/pd/pejabat/')."/".$p->foto_p.'" style="width: 60px">'; ?>
                                </div><!-- /.widget-user-image -->
                                <h3 class="widget-user-username"><?php echo $p->nama_p; ?></h3>
                                <h5 class="widget-user-desc">
                                    NIP: <?php echo $p->nip_ppk; ?>, No.HP: <?php echo $p->hp_p; ?> <br>
                                    <?php echo $p->jabat_p; ?>
                                </h5>
                              </div>
                            </div><!-- /.widget-user -->
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->jenis_pengadaan;
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->metode_pemilihan_peny;
                              ?>                               
                          </td>                          
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($p->pagu_giat,0);
                              ?>                               
                          </td>                                                  
                      </tr>
                    <?php } ?>
                    </tbody>                     
                  </table>

                </div>    
            </div>    
        </div>
    </div>
</div>