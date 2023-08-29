  <div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-solid">    
                <div class="box-header">
                    <h3 class="box-title">Laporan Jenis Pengadaan :: Detail PPTK</h3>
                </div>
                <div class="box-body">

                  <div class="col-md-6">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header">
                        <div class="widget-user-image">
                          <?php echo '<img class="img-circle" src="'.site_url('uploads/pd/pejabat/')."/".$laporan_jenis_pengadaan_detail->foto_p.'" width="75px">'; ?>
                        </div><!-- /.widget-user-image -->
                        <h3 class="widget-user-username"><?php echo $laporan_jenis_pengadaan_detail->nama_p; ?></h3>
                        <h5 class="widget-user-desc"><?php echo $laporan_jenis_pengadaan_detail->jabat_p; ?></h5>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li>
                            <a href="#">Paket pengadaan
                              <span class="pull-right badge bg-blue">
                              <?php echo $laporan_jenis_pengadaan_detail->total_paket_pengadaan; ?>
                              </span>
                            </a>
                            <a href="#" style="padding-top: 0px; padding-bottom: 0px;">- Barang
                              <span class="pull-right badge bg-blue">
                              <?php echo $laporan_jenis_pengadaan_detail->total_barang; ?>
                              </span>
                            </a>     
                            <a href="#" style="padding-top: 0px; padding-bottom: 0px;">- Konstruksi
                              <span class="pull-right badge bg-blue">
                              <?php echo $laporan_jenis_pengadaan_detail->total_konstruksi; ?>
                              </span>
                            </a>
                            <a href="#" style="padding-top: 0px; padding-bottom: 0px;">- Konsultan
                              <span class="pull-right badge bg-blue">
                              <?php echo $laporan_jenis_pengadaan_detail->total_konsultan; ?>
                              </span>
                            </a>
                            <a href="#" style="padding-top: 0px;">- Lainnya
                              <span class="pull-right badge bg-blue">
                              <?php echo $laporan_jenis_pengadaan_detail->total_lainnya; ?>
                              </span>
                            </a>        
                          </li>
                          <li><a href="#">Total pagu pengadaan
                            <span class="pull-right badge bg-blue">
                            <?php echo "Rp. ".number_format($laporan_jenis_pengadaan_detail->total_pagu_pengadaan,0); ?>
                            </span></a>
                          </li>                           
                        </ul>
                      </div>
                    </div><!-- /.widget-user -->
                  </div><!-- /.col -->




                  <div class="col-md-6">
                    <canvas id="chart_pie" height="160px"></canvas>
                  </div><!-- ./col -->                  

                  <table id="" class="table table-bordered table-striped"> 
                    <thead>
                        <tr>
                            <th width="10px" rowspan="2">No.</th>                            
                            <th width="250px">Kegiatan & Belanja</th>
                            <th>Paket Pengadaan & PPK</th>
                            <th>Jenis Pengadaan</th>
                            <th>Pagu </th>
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>
                    <?php foreach($laporan_jenis_pengadaan_detail_tabel as $p){ ?>                  
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
                                  echo '<a href="'.site_url('laporan/index_jenis_pengadaan_detail_pengadaan/2017/'.$p->kode_rek_belanja.'">'.$p->kode_rek_belanja."<br>".$p->nama_belanja.'</a> '); 

                              ?>                               
                          </td>
                          <td>
                              <?php 
                                  echo "<h4>Paket Pengadaan:</h4>";
                                  echo '<a href="'.site_url('laporan/index_jenis_pengadaan_detail_pengadaan/2017/'.$p->kode_rek_belanja.'">'.$p->nama_paket_pengadaan.'</a> ');
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
<script src="<?php echo site_url('resources/plugins/chartjs/Chart.js');?>"></script>
<script>
  var ctx_pie = document.getElementById("chart_pie");
  var myPieChartData = {
      datasets: [{
          data: [
            <?php echo $laporan_jenis_pengadaan_detail->total_barang; ?>, 
            <?php echo $laporan_jenis_pengadaan_detail->total_konstruksi; ?>,
            <?php echo $laporan_jenis_pengadaan_detail->total_konsultan; ?>, 
            <?php echo $laporan_jenis_pengadaan_detail->total_lainnya; ?> 
          ],
          backgroundColor:["#106fae","#20c1ed","#fd852f","#ae4710"]
      }],

      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels: [
          '% Barang',
          '% Konstruksi',
          '% Konsultan',
          '% Lainnya'
      ]
  };
  var myPieChart = new Chart(ctx_pie,{
      type: 'pie',
      data: myPieChartData,
      options: {   
          title: {
              display: true,
              text: <?php echo "'Persentase Jenis Pengadaan'"; ?>,
          },                 
          legend: {position: 'right'}          
      }
  });                    

</script>  
 