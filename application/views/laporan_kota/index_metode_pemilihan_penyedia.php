  <div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-solid">    
                <div class="box-header">
                    <h3 class="box-title">Laporan Metode Pemilihan Penyedia</h3>
                </div>
                <div class="box-body">

                <h4>1. Pengadaan Barang</h4>
                  <table id="" class="table table-bordered table-striped"> 
                    <thead>
                        <tr>
                            <th width="10px" rowspan="2">No.</th>                            
                            <th rowspan="2">Nama PPTK</th>
                            <th width="100px">Lelang Umum</th>
                            <th width="100px">Lelang Sederhana</th>
                            <th width="100px">Pengadaan Langsung</th>
                            <th width="100px">Penunjukkan Langsung</th>
                            <th width="100px">Sayembara/<br>Kontes</th>
                        </tr>
                            <th width="100px" style="font-size: 10px;">> 5 Milyar</th>
                            <th width="100px" style="font-size: 10px;">200 juta s/d 5 Milyar</th>
                            <th width="100px" style="font-size: 10px;">< 200 juta</th>
                            <th width="100px" style="font-size: 10px;">Tanpa batasan nilai, keadaan tertentu, barang khusus</th>
                            <th width="100px" style="font-size: 10px;"></th>                        
                        <tr>                            
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>
                    <?php 
                    if (empty($laporan_metode_pemilihan_penyedia_barang)){
                      echo "<tr><td colspan=7 align='center'> Tidak ada data </td></tr>";
                    } else {                    
                      foreach($laporan_metode_pemilihan_penyedia_barang as $p){ ?>                  
                      <tr>
                          <?php $no++; ?>
                          <td align="center">
                              <?php echo $no; ?>
                          </td>
                          <td>
                            <div class="box-pejabat box-widget widget-user-2">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header">
                                <div class="widget-user-image">
                                  <?php echo '<img src="'.site_url('uploads/pd/pejabat/')."/".$p->foto_p.'" style="width: 60px">'; ?>
                                </div><!-- /.widget-user-image -->
                                <h3 class="widget-user-username"><a href="<?php echo site_url('/laporan/index_metode_pemilihan_penyedia_detail_pptk/2017/'.$p->nip_pptk)?>"><?php echo $p->nama_p; ?></a></h3>
                                <h5 class="widget-user-desc">
                                    NIP: <?php echo $p->nip_pptk; ?> , No.HP: <?php echo $p->hp_p; ?> <br>
                                    Jabatan: <?php echo $p->jabat_p; ?>
                                </h5>
                              </div>
                            </div><!-- /.widget-user -->
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->barang_LU;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->barang_LS;
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->barang_PL;
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->barang_PK;
                              ?>                               
                          </td>                          
                          <td align="center">
                              <?php 
                                  echo $p->barang_SY;
                              ?>                               
                          </td>                          
                      </tr>
                    <?php } } ?>
                    </tbody>                     
                  </table><br><br>

                <h4>2. Pengadaan Pekerjaan Konstruksi</h4>
                  <table id="" class="table table-bordered table-striped"> 
                    <thead>
                        <tr>
                            <th width="10px" rowspan="2">No.</th>                            
                            <th rowspan="2">Nama PPTK</th>
                            <th width="100px">Pelelangan Umum</th>
                            <th width="100px">Pelelangan Terbatas</th>
                            <th width="100px">Pemilihan Langsung</th>
                            <th width="100px">Penunjukkan Langsung</th>
                            <th width="100px">Pengadaan Langsung</th>
                        </tr>
                            <th width="100px" style="font-size: 10px;">> 5 Milyar</th>
                            <th width="100px" style="font-size: 10px;">200 juta Konstruksi kompleks</th>
                            <th width="100px" style="font-size: 10px;">200 juta s/d 5 Milyar</th>
                            <th width="100px" style="font-size: 10px;">Tanpa batasan nilai, keadaan tertentu, konstruksi khusus</th>
                            <th width="100px" style="font-size: 10px;">< 200 juta</th>                        
                        <tr>                            
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>
                    <?php 
                    if (empty($laporan_metode_pemilihan_penyedia_konstruksi)){
                      echo "<tr><td colspan=7 align='center'> Tidak ada data </td></tr>";
                    } else {  
                    foreach($laporan_metode_pemilihan_penyedia_konstruksi as $p){ ?>                  
                      <tr>
                          <?php $no++; ?>
                          <td align="center">
                              <?php echo $no; ?>
                          </td>
                          <td>
                            <div class="box-pejabat box-widget widget-user-2">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header">
                                <div class="widget-user-image">
                                  <?php echo '<img src="'.site_url('uploads/pd/pejabat/')."/".$p->foto_p.'" style="width: 60px">'; ?>
                                </div><!-- /.widget-user-image -->
                                <h3 class="widget-user-username"><a href="<?php echo site_url('/laporan/index_metode_pemilihan_penyedia_detail_pptk/2017/'.$p->nip_pptk)?>"><?php echo $p->nama_p; ?></a></h3>
                                <h5 class="widget-user-desc">
                                    NIP: <?php echo $p->nip_pptk; ?> , No.HP: <?php echo $p->hp_p; ?> <br>
                                    Jabatan: <?php echo $p->jabat_p; ?>
                                </h5>
                              </div>
                            </div><!-- /.widget-user -->
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->konstruksi_LU;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->konstruksi_LT;
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->konstruksi_PML;
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->konstruksi_PK;
                              ?>                               
                          </td>                          
                          <td align="center">
                              <?php 
                                  echo $p->konstruksi_PL;
                              ?>                               
                          </td>                          
                      </tr>
                    <?php } }?>
                    </tbody>                     
                  </table><br><br>

                  <h4>3. Pengadaan Jasa Konsultansi</h4>
                  <table id="" class="table table-bordered table-striped"> 
                    <thead>
                        <tr>
                            <th width="10px" rowspan="2">No.</th>                            
                            <th rowspan="2">Nama PPTK</th>
                            <th width="100px">Seleksi Umum</th>
                            <th width="100px">Seleksi Sederhana</th>
                            <th width="100px">Penunjukkan Langsung</th>
                            <th width="100px">Pengadaan Langsung</th>
                            <th width="100px">Sayembara</th>
                        </tr>
                            <th width="100px" style="font-size: 10px;">> 200 juta</th>
                            <th width="100px" style="font-size: 10px;">50 juta s/d < 200 juta</th>
                            <th width="100px" style="font-size: 10px;">Tanpa batasan nilai, keadaan tertentu, konsultasi khusus</th>
                            <th width="100px" style="font-size: 10px;">< 50 juta</th>
                            <th width="100px" style="font-size: 10px;"></th>                        
                        <tr>                            
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>
                    <?php 
                    if (empty($laporan_metode_pemilihan_penyedia_konsultan)){
                      echo "<tr><td colspan=7 align='center'> Tidak ada data </td></tr>";
                    } else {  
                    foreach($laporan_metode_pemilihan_penyedia_konsultan as $p){ ?>                  
                      <tr>
                          <?php $no++; ?>
                          <td align="center">
                              <?php echo $no; ?>
                          </td>
                          <td>
                            <div class="box-pejabat box-widget widget-user-2">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header">
                                <div class="widget-user-image">
                                  <?php echo '<img src="'.site_url('uploads/pd/pejabat/')."/".$p->foto_p.'" style="width: 60px">'; ?>
                                </div><!-- /.widget-user-image -->
                                <h3 class="widget-user-username"><a href="<?php echo site_url('/laporan/index_metode_pemilihan_penyedia_detail_pptk/2017/'.$p->nip_pptk)?>"><?php echo $p->nama_p; ?></a></h3>
                                <h5 class="widget-user-desc">
                                    NIP: <?php echo $p->nip_pptk; ?> , No.HP: <?php echo $p->hp_p; ?> <br>
                                    Jabatan: <?php echo $p->jabat_p; ?>
                                </h5>
                              </div>
                            </div><!-- /.widget-user -->
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->konsultan_SU;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->konsultan_SS;
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->konsultan_PK;
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->konsultan_PL;
                              ?>                               
                          </td>                          
                          <td align="center">
                              <?php 
                                  echo $p->konsultan_SY;
                              ?>                               
                          </td>                          
                      </tr>
                    <?php } } ?>
                    </tbody>                     
                  </table><br><br>

                  <h4>4. Jasa Lainnya</h4>
                  <table id="" class="table table-bordered table-striped"> 
                    <thead>
                        <tr>
                            <th width="10px" rowspan="2">No.</th>                            
                            <th rowspan="2">Nama PPTK</th>
                            <th width="100px">Lelang Umum</th>
                            <th width="100px">Lelang Sederhana</th>
                            <th width="100px">Penunjukkan Langsung</th>
                            <th width="100px">Pengadaan Langsung</th>
                            <th width="100px">Sayembara</th>
                        </tr>
                            <th width="100px" style="font-size: 10px;">> 5 milyar</th>
                            <th width="100px" style="font-size: 10px;">200 juta s/d < 5 milyar</th>
                            <th width="100px" style="font-size: 10px;">Tanpa batasan nilai, keadaan tertentu, konsultasi khusus</th>
                            <th width="100px" style="font-size: 10px;">< 200 juta</th>
                            <th width="100px" style="font-size: 10px;">Kreativitas, Inovasi, tidak ada harga satuan</th>                        
                        <tr>                            
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>
                    <?php 
                    if (empty($laporan_metode_pemilihan_penyedia_jasa_lainnya)){
                      echo "<tr><td colspan=7 align='center'> Tidak ada data </td></tr>";
                    } else {  
                    foreach($laporan_metode_pemilihan_penyedia_jasa_lainnya as $p){ ?>                  
                      <tr>
                          <?php $no++; ?>
                          <td align="center">
                              <?php echo $no; ?>
                          </td>
                          <td>
                            <div class="box-pejabat box-widget widget-user-2">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header">
                                <div class="widget-user-image">
                                  <?php echo '<img src="'.site_url('uploads/pd/pejabat/')."/".$p->foto_p.'" style="width: 60px">'; ?>
                                </div><!-- /.widget-user-image -->
                                <h3 class="widget-user-username"><a href="<?php echo site_url('/laporan/index_metode_pemilihan_penyedia_detail_pptk/2017/'.$p->nip_pptk)?>"><?php echo $p->nama_p; ?></a></h3>
                                <h5 class="widget-user-desc">
                                    NIP: <?php echo $p->nip_pptk; ?> , No.HP: <?php echo $p->hp_p; ?> <br>
                                    Jabatan: <?php echo $p->jabat_p; ?>
                                </h5>
                              </div>
                            </div><!-- /.widget-user -->
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->jasa_lainnya_LU;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->jasa_lainnya_LS;
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->jasa_lainnya_PK;
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->jasa_lainnya_PL;
                              ?>                               
                          </td>                          
                          <td align="center">
                              <?php 
                                  echo $p->jasa_lainnya_SY;
                              ?>                               
                          </td>                          
                      </tr>
                    <?php } } ?>
                    </tbody>                     
                  </table><br><br>

                </div>    
            </div>    
        </div>
    </div>
</div>