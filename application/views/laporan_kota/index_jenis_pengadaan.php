  <div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-solid">    
                <div class="box-header">
                    <h3 class="box-title">Laporan Jenis Pengadaan</h3>
                </div>
                <div class="box-body">

                  <div class="col-md-8">
                    <!-- small box -->
                    <div class="col-md-6">
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo $laporan_jenis_pengadaan_total->total_paket_pengadaan; ?></h3>
                          <p><b>Jumlah Paket Pengadaan</b></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo $laporan_jenis_pengadaan_total->jumlah_pptk; ?></h3>
                          <p><b>PPTK pengelola paket pengadaan</b></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <!-- small box -->
                      <div class="small-box" style="background: #106fae">
                        <div class="inner">
                          <h3><?php echo $laporan_jenis_pengadaan_total->total_barang; ?></h3>
                          <p><b>Barang</b></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <!-- small box -->
                      <div class="small-box" style="background: #20c1ed">
                        <div class="inner">
                          <h3><?php echo $laporan_jenis_pengadaan_total->total_konstruksi; ?></h3>
                          <p><b>Konstruksi</b></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <!-- small box -->
                      <div class="small-box"  style="background: #fd852f">
                        <div class="inner">
                          <h3><?php echo $laporan_jenis_pengadaan_total->total_konsultan; ?></h3>
                          <p><b>Konsultan</b></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <!-- small box -->
                      <div class="small-box"  style="background: #ae4710">
                        <div class="inner">
                          <h3><?php echo $laporan_jenis_pengadaan_total->total_lainnya; ?></h3>
                          <p><b>Lainnya</b></p>
                        </div>
                      </div>
                    </div>                                        
                  </div><!-- ./col -->
                  <div class="col-md-4">
                    <canvas id="chart_pie" height="220px"></canvas>
                  </div><!-- ./col -->                  

                  <table id="" class="table table-bordered table-striped"> 
                    <thead>
                        <tr>
                            <th width="10px" rowspan="2">No.</th>                            
                            <th width="450px" rowspan="2">Nama PPTK</th>
                            <th rowspan="2">Jumlah Paket Pengadaan</th>
                            <th colspan="4">Jenis Pengadaan</th>
                        </tr>
                        <tr>   
                            <th>Barang</th>
                            <th>Konstruksi</th>
                            <th>Konsultan</th>
                            <th>Lainnya</th>
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>
                    <?php foreach($laporan_jenis_pengadaan as $p){ ?>                  
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
                                <h3 class="widget-user-username"><a href="<?php echo site_url('/laporan/index_jenis_pengadaan_detail_pptk/2017/'.$p->nip_pptk)?>"><?php echo $p->nama_p; ?></a></h3>
                                <h5 class="widget-user-desc">
                                    NIP: <?php echo $p->nip_pptk; ?> , No.HP: <?php echo $p->hp_p; ?> <br>
                                    Jabatan: <?php echo $p->jabat_p; ?>
                                </h5>
                              </div>
                            </div><!-- /.widget-user -->
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->total_paket_pengadaan;                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->total_barang;
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->total_konstruksi;
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo $p->total_konsultan;
                              ?>                               
                          </td>                          
                          <td align="center">
                              <?php 
                                  echo $p->total_lainnya;
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
            <?php echo $laporan_jenis_pengadaan_total->total_barang; ?>, 
            <?php echo $laporan_jenis_pengadaan_total->total_konstruksi; ?>,
            <?php echo $laporan_jenis_pengadaan_total->total_konsultan; ?>, 
            <?php echo $laporan_jenis_pengadaan_total->total_lainnya; ?> 
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
          legend: {position: 'bottom'}          
      }
  });                    

</script>  
 