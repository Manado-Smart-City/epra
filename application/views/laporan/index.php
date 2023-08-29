<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-solid">    
                <div class="box-header">
                    <h3 class="box-title">Laporan Total Anggaran PD</h3>
                </div>
                <div class="box-body">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <img src="<?php echo site_url('uploads/pd/pejabat/'.$foto_kepala_pd);?>" alt='user image' style="width: 80px; height: 80px; padding-right: 10px; padding-bottom: 10px;" align=left>
                     <p style="font-size: 24px; line-height: 80%;"><?php echo $nama_pd; ?></p>
                     <p style="font-size: 18px; line-height: 80%;">Alamat: <?php echo $alamat_pd; ?></p>
                     <p style="font-size: 18px; line-height: 80%;">Kepala: <?php echo $kepala_pd; ?></p>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-12"><hr><br></div>
                
                <!-- Small boxes (Stat box) -->
                    <div class="col-md-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo "Rp. ".number_format($total_anggaran); ?></h3>
                          <p><b>Total Anggaran</b></p>
                        </div>
                      </div>

                    </div><!-- ./col -->

<!--                     <div class="col-md-6">
                      <canvas id="chart_pie" height="220px"></canvas>
                    </div><!-- ./col --> -->

                    <div class="col-md-12">
                        <!-- AREA CHART -->
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title"><?php echo "Target dan Realisasi Fisik PD per Bulan ".$nama_bulan_ini; ?></h3>
                            <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                          </div>
                          <div class="box-body">

                              <div class="col-md-6">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                  <div class="inner">
                                    <h3>Target Fisik</h3>
                                    <p>Persentase Target Fisik per Bulan <?php echo $nama_bulan_ini; ?></p>
                                  </div>
                                  <div class="persen-besar">
                                    <?php echo number_format($target_fisik_bulan_ini,2); ?>%
                                  </div>
                                </div>
                              </div><!-- ./col -->  

                              <div class="col-md-6">
                               <!-- small box -->
                                <div class="small-box bg-blue">
                                  <div class="inner">
                                    <h3>Realisasi Fisik</h3>
                                    <p>Persentase Realisasi Fisik per Bulan <?php echo $nama_bulan_ini; ?></p>
                                  </div>
                                  <div class="persen-besar">
                                    <?php echo number_format($realisasi_fisik_bulan_ini,2); ?>%
                                  </div>
                                </div>
                              </div><!-- ./col -->  

                              <div class="chart">
                                <canvas id="chart_fisik"></canvas>
                              </div>
                          </div><!-- /.box-body -->
                        </div><!-- /.box -->                        
                    </div><!-- ./col -->                    

                    <div class="col-md-12">
                        <!-- AREA CHART -->
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title"><?php echo "Target dan Realisasi Keuangan PD per Bulan ".$nama_bulan_ini; ?></h3>
                            <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                          </div>
                          <div class="box-body">

                              <div class="col-md-6">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                  <div class="inner">
                                    <h3>Target Keuangan</h3>
                                    <br>
                                    <p>Persentase Target Keuangan per Bulan <?php echo $nama_bulan_ini; ?></p>
                                  </div>
                                  <div class="persen-kecil">
                                    <?php echo number_format($target_keuangan_bulan_ini,2); ?>%
                                    <div class="persen-kecil nilai-uang">
                                    <?php echo "Rp.".number_format(($total_anggaran) * ($target_keuangan_bulan_ini / 100),0); ?>
                                    </div>
                                  </div>
                                </div>
                              </div><!-- ./col -->  

                              <div class="col-md-6">
                               <!-- small box -->
                                <div class="small-box bg-blue">
                                  <div class="inner">
                                    <h3>Realisasi Keuangan</h3>
                                    <br>
                                    <p>Persentase Realisasi Keuangan per Bulan <?php echo $nama_bulan_ini; ?></p>
                                  </div>
                                  <div class="persen-kecil">
                                    <?php echo number_format($realisasi_keuangan_bulan_ini,2); ?>%
                                    <div class="persen-kecil nilai-uang">
                                    <?php echo "Rp.".number_format(($total_anggaran) * ($realisasi_keuangan_bulan_ini / 100),0); ?>    
                                    </div>        
                                  </div>
                                </div>
                              </div><!-- ./col -->  

                            <div class="col-md-12">
                                <canvas id="chart_keuangan" height="150px"></canvas>
                            </div><!-- ./col --> 

                          </div><!-- /.box-body -->
                        </div><!-- /.box -->                        
                    </div><!-- ./col -->   

                </div>    
            </div>    
        </div>
    </div>
</div>
<script src="<?php echo site_url('resources/plugins/chartjs/Chart.js');?>"></script>
<script>
  var ctx_fisik = document.getElementById("chart_fisik");
  var ctx_keuangan = document.getElementById("chart_keuangan");
  var myChartData_fisik = {
      labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
      datasets: [
      {
          label: '% Target Fisik',
          data: [ <?php echo 
            number_format($laporan_realisasi['target_fisik_1'],2).",".
            number_format($laporan_realisasi['target_fisik_2'],2).",".
            number_format($laporan_realisasi['target_fisik_3'],2).",".
            number_format($laporan_realisasi['target_fisik_4'],2).",".
            number_format($laporan_realisasi['target_fisik_5'],2).",".
            number_format($laporan_realisasi['target_fisik_6'],2).",".
            number_format($laporan_realisasi['target_fisik_7'],2).",".
            number_format($laporan_realisasi['target_fisik_8'],2).",".
            number_format($laporan_realisasi['target_fisik_9'],2).",".
            number_format($laporan_realisasi['target_fisik_10'],2).",".
            number_format($laporan_realisasi['target_fisik_11'],2).",".
            number_format($laporan_realisasi['target_fisik_12'],2); ?> ],
          backgroundColor: 'rgba(255, 206, 86, 0.7)',
          borderColor: 'rgba(255, 206, 86, 1)',
          borderWidth: 1
      },
      {
          label: '% Realisasi Fisik',
          data: [ <?php echo 
            number_format($laporan_realisasi['realisasi_fisik_1'],2).",".
            number_format($laporan_realisasi['realisasi_fisik_2'],2).",".
            number_format($laporan_realisasi['realisasi_fisik_3'],2).",".
            number_format($laporan_realisasi['realisasi_fisik_4'],2).",".
            number_format($laporan_realisasi['realisasi_fisik_5'],2).",".
            number_format($laporan_realisasi['realisasi_fisik_6'],2).",".
            number_format($laporan_realisasi['realisasi_fisik_7'],2).",".
            number_format($laporan_realisasi['realisasi_fisik_8'],2).",".
            number_format($laporan_realisasi['realisasi_fisik_9'],2).",".
            number_format($laporan_realisasi['realisasi_fisik_10'],2).",".
            number_format($laporan_realisasi['realisasi_fisik_11'],2).",".
            number_format($laporan_realisasi['realisasi_fisik_12'],2); ?> ],
          backgroundColor: 'rgba(75, 192, 192, 0.7)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
      }    
      ]
  };
  var myChartData_keuangan = {
      labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
      datasets: [
      {
          label: '% Target Keuangan',
          data: [ <?php echo 
            number_format($laporan_realisasi['target_keuangan_1'],2).",".
            number_format($laporan_realisasi['target_keuangan_2'],2).",".
            number_format($laporan_realisasi['target_keuangan_3'],2).",".
            number_format($laporan_realisasi['target_keuangan_4'],2).",".
            number_format($laporan_realisasi['target_keuangan_5'],2).",".
            number_format($laporan_realisasi['target_keuangan_6'],2).",".
            number_format($laporan_realisasi['target_keuangan_7'],2).",".
            number_format($laporan_realisasi['target_keuangan_8'],2).",".
            number_format($laporan_realisasi['target_keuangan_9'],2).",".
            number_format($laporan_realisasi['target_keuangan_10'],2).",".
            number_format($laporan_realisasi['target_keuangan_11'],2).",".
            number_format($laporan_realisasi['target_keuangan_12'],2); ?> ],
          backgroundColor: 'rgba(255, 206, 86, 0.7)',
          borderColor: 'rgba(255, 206, 86, 1)',
          borderWidth: 1
      },
      {
          label: '% Realisasi Keuangan',
          data: [ <?php echo 
            number_format($laporan_realisasi['realisasi_keuangan_1'],2).",".
            number_format($laporan_realisasi['realisasi_keuangan_2'],2).",".
            number_format($laporan_realisasi['realisasi_keuangan_3'],2).",".
            number_format($laporan_realisasi['realisasi_keuangan_4'],2).",".
            number_format($laporan_realisasi['realisasi_keuangan_5'],2).",".
            number_format($laporan_realisasi['realisasi_keuangan_6'],2).",".
            number_format($laporan_realisasi['realisasi_keuangan_7'],2).",".
            number_format($laporan_realisasi['realisasi_keuangan_8'],2).",".
            number_format($laporan_realisasi['realisasi_keuangan_9'],2).",".
            number_format($laporan_realisasi['realisasi_keuangan_10'],2).",".
            number_format($laporan_realisasi['realisasi_keuangan_11'],2).",".
            number_format($laporan_realisasi['realisasi_keuangan_12'],2); ?> ],
          backgroundColor: 'rgba(75, 192, 192, 0.7)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
      }    
      ]
  };                    
  var myChart_fisik = new Chart(ctx_fisik, {
      type: 'bar',
      data: myChartData_fisik,
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true,
                      // Include a dollar sign in the ticks
                      callback: function(value, index, values) {
                          return value + ' %';
                      }                    
                  }
              }]
          },
          title: {
              display: true,
              text: <?php echo "'Target dan Realisasi Fisik per Bulan ".$nama_bulan_ini."'"; ?>
          },
          legend: {
              display: true
          }                
      }
  });
  var myChart_keuangan = new Chart(ctx_keuangan, {
      type: 'bar',
      data: myChartData_keuangan,
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true,
                      // Include a dollar sign in the ticks
                      callback: function(value, index, values) {
                          return value + ' %';
                      }                    
                  }
              }]
          },
          title: {
              display: true,
              text: <?php echo "'Target dan Realisasi Keuangan per Bulan ".$nama_bulan_ini."'"; ?>
          },
          legend: {
              display: true
          }                
      }
  });  

  var ctx_pie = document.getElementById("chart_pie");
  var myPieChartData = {
      datasets: [{
          data: [
            <?php echo number_format(($total_anggaran_bl / $total_anggaran) * 100,2); ?>, 
            <?php echo number_format(($total_anggaran_btl / $total_anggaran) * 100,2); ?>
          ],
          backgroundColor:["#0074D9","#FF851B"]
      }],

      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels: [
          '% Belanja Langsung',
          '% Belanja Tidak Langsung'
      ]
  };
  var myPieChart = new Chart(ctx_pie,{
      type: 'pie',
      data: myPieChartData,
      options: {   
          title: {
              display: true,
              text: <?php echo "'Persentase Belanja Langsung dan Tidak Langsung'"; ?>,
          },                 
          legend: {position: 'bottom'}          
      }
  });                    

</script>  