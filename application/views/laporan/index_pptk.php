  <div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-solid">    
                <div class="box-header">
                    <h3 class="box-title">Laporan Kinerja PPTK</h3>
                </div>
                <div class="box-body">

                    <!-- Small boxes (Stat box) -->
                    <div class="col-md-4">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo $laporan_kinerja_pptk_total->jumlah_pptk; ?></h3>
                          <p><b>Jumlah PPTK</b></p>
                        </div>
                      </div>
                    </div><!-- ./col -->

                    <div class="col-md-4">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo $laporan_kinerja_pptk_total->jumlah_kegiatan; ?></h3>
                          <p><b>Jumlah Kegiatan</b></p>
                        </div>
                      </div>
                    </div><!-- ./col -->

                    <div class="col-md-4">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo "Rp. ".number_format($laporan_kinerja_pptk_total->anggaran_yang_dikelola); ?></h3>
                          <p><b>Pagu Anggaran</b></p>
                        </div>
                      </div>
                    </div><!-- ./col -->                  

                  <div class="col-md-6">
                    <div class="box box-success" style="border: 1px solid #c0c6d8;">
                      <div class="box-header with-border bg-green">
                        <h3 class="box-title">PPTK dengan kinerja tertinggi</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body">

                          <h4><u>Berdasarkan realisasi fisik:</u></h4>
                          <!-- Widget: user widget style 1 -->
                          <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header">
                              <div class="widget-user-image">
                                <?php echo '<img class="img-circle" src="'.site_url('uploads/pd/pejabat/')."/".$laporan_kinerja_pptk["tertinggi_fisik"]->foto_p.'" width="75px">'; ?>
                              </div><!-- /.widget-user-image -->
                              <h3 class="widget-user-username"><a href="<?php echo site_url('/laporan/index_pptk_daftar_kegiatan/2017/'.$laporan_kinerja_pptk["tertinggi_fisik"]->nip_pptk)?>"><?php echo $laporan_kinerja_pptk["tertinggi_fisik"]->nama_p; ?></a></h3>
                              <h5 class="widget-user-desc"><?php echo $laporan_kinerja_pptk["tertinggi_fisik"]->jabat_p; ?></h5>
                            </div>
                            <div class="box-footer no-padding">
                              <ul class="nav nav-stacked">
                                <li><a href="#">Pagu anggaran yang dikelola 
                                  <span class="pull-right badge bg-blue">
                                  <?php echo "Rp. ".number_format($laporan_kinerja_pptk["tertinggi_fisik"]->anggaran_yang_dikelola,0); ?>
                                  </span></a></li>
                                <li><a href="#">Realisasi Fisik bulan <?php echo $nama_bulan_ini; ?> <span class="pull-right badge bg-green"><?php echo number_format($laporan_kinerja_pptk["tertinggi_fisik"]->{"realisasi_fisik_".$bulan_ini},2); ?> %</span></a></li>                          
                              </ul>
                            </div>
                          </div><!-- /.widget-user -->

                          <h4><u>Berdasarkan realisasi keuangan:</u></h4>
                          <!-- Widget: user widget style 1 -->
                          <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header">
                              <div class="widget-user-image">
                                <?php echo '<img class="img-circle" src="'.site_url('uploads/pd/pejabat/')."/".$laporan_kinerja_pptk["tertinggi_keuangan"]->foto_p.'" width="75px">'; ?>
                              </div><!-- /.widget-user-image -->
                              <h3 class="widget-user-username"><a href="<?php echo site_url('/laporan/index_pptk_daftar_kegiatan/2017/'.$laporan_kinerja_pptk["tertinggi_keuangan"]->nip_pptk)?>"><?php echo $laporan_kinerja_pptk["tertinggi_keuangan"]->nama_p; ?></a></h3>
                              <h5 class="widget-user-desc"><?php echo $laporan_kinerja_pptk["tertinggi_keuangan"]->jabat_p; ?></h5>
                            </div>
                            <div class="box-footer no-padding">
                              <ul class="nav nav-stacked">
                                <li><a href="#">Pagu anggaran yang dikelola 
                                  <span class="pull-right badge bg-blue">
                                  <?php echo "Rp. ".number_format($laporan_kinerja_pptk["tertinggi_keuangan"]->anggaran_yang_dikelola,0); ?>
                                  </span></a></li>
                                <li><a href="#">Realisasi Keuangan bulan <?php echo $nama_bulan_ini; ?> <span class="pull-right badge bg-green">
                                  <?php echo "Rp.".number_format($laporan_kinerja_pptk["tertinggi_keuangan"]->{"realisasi_keuangan_".$bulan_ini})."<br>"."(".number_format($laporan_kinerja_pptk["tertinggi_keuangan"]->{"realisasi_keuangan_persen_".$bulan_ini},2); ?>%)</span></a><br></li>                          
                              </ul>
                            </div>
                          </div><!-- /.widget-user -->

                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div><!-- /.col -->


                  <div class="col-md-6">
                    <div class="box box-success" style="border: 1px solid #c0c6d8;">
                      <div class="box-header with-border bg-red">
                        <h3 class="box-title">PPTK dengan kinerja terendah</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body">

                          <h4><u>Berdasarkan realisasi fisik:</u></h4>
                          <!-- Widget: user widget style 1 -->
                          <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header">
                              <div class="widget-user-image">
                                <?php echo '<img class="img-circle" src="'.site_url('uploads/pd/pejabat/')."/".$laporan_kinerja_pptk["terendah_fisik"]->foto_p.'" width="75px">'; ?>
                              </div><!-- /.widget-user-image -->
                              <h3 class="widget-user-username"><a href="<?php echo site_url('/laporan/index_pptk_daftar_kegiatan/2017/'.$laporan_kinerja_pptk["terendah_fisik"]->nip_pptk)?>"><?php echo $laporan_kinerja_pptk["terendah_fisik"]->nama_p; ?></a></h3>
                              <h5 class="widget-user-desc"><?php echo $laporan_kinerja_pptk["terendah_fisik"]->jabat_p; ?></h5>
                            </div>
                            <div class="box-footer no-padding">
                              <ul class="nav nav-stacked">
                                <li><a href="#">Pagu anggaran yang dikelola 
                                  <span class="pull-right badge bg-blue">
                                  <?php echo "Rp. ".number_format($laporan_kinerja_pptk["terendah_fisik"]->anggaran_yang_dikelola,0); ?>
                                  </span></a></li>
                                <li><a href="#">Realisasi Fisik bulan <?php echo $nama_bulan_ini; ?> <span class="pull-right badge bg-green"><?php echo number_format($laporan_kinerja_pptk["terendah_fisik"]->{"realisasi_fisik_".$bulan_ini},2); ?> %</span></a></li>                          
                              </ul>
                            </div>
                          </div><!-- /.widget-user -->

                          <h4><u>Berdasarkan realisasi keuangan:</u></h4>
                          <!-- Widget: user widget style 1 -->
                          <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header">
                              <div class="widget-user-image">
                                <?php echo '<img class="img-circle" src="'.site_url('uploads/pd/pejabat/')."/".$laporan_kinerja_pptk["terendah_keuangan"]->foto_p.'" width="75px">'; ?>
                              </div><!-- /.widget-user-image -->
                              <h3 class="widget-user-username"><a href="<?php echo site_url('/laporan/index_pptk_daftar_kegiatan/2017/'.$laporan_kinerja_pptk["terendah_keuangan"]->nip_pptk)?>"><?php echo $laporan_kinerja_pptk["terendah_keuangan"]->nama_p; ?></a></h3>
                              <h5 class="widget-user-desc"><?php echo $laporan_kinerja_pptk["terendah_keuangan"]->jabat_p; ?></h5>
                            </div>
                            <div class="box-footer no-padding">
                              <ul class="nav nav-stacked">
                                <li><a href="#">Pagu anggaran yang dikelola 
                                  <span class="pull-right badge bg-blue">
                                  <?php echo "Rp. ".number_format($laporan_kinerja_pptk["terendah_keuangan"]->anggaran_yang_dikelola,0); ?>
                                  </span></a></li>
                                <li><a href="#">Realisasi Keuangan bulan <?php echo $nama_bulan_ini; ?> <span class="pull-right badge bg-green">
                                  <?php echo "Rp.".number_format($laporan_kinerja_pptk["terendah_keuangan"]->{"realisasi_keuangan_".$bulan_ini})."<br>"."(".number_format($laporan_kinerja_pptk["tertinggi_keuangan"]->{"realisasi_keuangan_persen_".$bulan_ini},2); ?>%)</span></a><br></li>                          
                              </ul>
                            </div>
                          </div><!-- /.widget-user -->

                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div><!-- /.col -->

                  <table id="" class="table table-bordered table-striped tabel-data-pptk"> 
                    <thead>
                        <tr>
                            <th width="10px">No.</th>                            
                            <th width="450px">Nama PPTK</th>
                            <th>Pagu Anggaran</th>
                            <th>Realisasi Fisik</th>
                            <th>Realisasi Keuangan</th>
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>
                    <?php foreach($laporan_kinerja_pptk["tabel_kinerja_pptk"] as $p){ ?>                  
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
                                <h3 class="widget-user-username"><a href="<?php echo site_url('/laporan/index_pptk_daftar_kegiatan/2017/'.$p->nip_pptk)?>"><?php echo $p->nama_p; ?></a></h3>
                                <h5 class="widget-user-desc">
                                    NIP: <?php echo $p->nip_pptk; ?> , No.HP: <?php echo $p->hp_p; ?> <br>
                                    Jabatan: <?php echo $p->jabat_p; ?>
                                </h5>
                              </div>
                            </div><!-- /.widget-user -->
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($p->anggaran_yang_dikelola,0);                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo number_format($p->{"realisasi_fisik_".$bulan_ini},2)."%";                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($p->{"realisasi_keuangan_".$bulan_ini})."<br>(".number_format($p->{"realisasi_keuangan_persen_".$bulan_ini},2)."%".")";                               
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
 