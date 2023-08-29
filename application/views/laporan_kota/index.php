<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-solid">    
                <div class="box-header">
                    <h3 class="box-title">Laporan Total Anggaran Kota</h3>
                </div>
                <div class="box-body">
                
                <!-- Small boxes (Stat box) -->
                    <div class="col-md-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo "Rp. ".number_format($total_kota["anggaran_total_kota"]); ?></h3>
                          <p><b>Total Anggaran</b></p>
                        </div>
                      </div>

                    </div><!-- ./col -->

                              

                    <div class="col-md-12">
                        <!-- AREA CHART -->
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title"><?php echo "Target dan Realisasi Fisik per Bulan ".$nama_bulan_ini; ?></h3>
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
                                    <?php echo number_format($total_kota["target_fisik_kota_".$bulan_ini],2); ?>%
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
                                    <?php echo number_format($total_kota["realisasi_fisik_kota_".$bulan_ini],2); ?>%
                                  </div>
                                </div>
                              </div><!-- ./col -->  

                              <div class="chart">
                                <canvas id="chart_fisik"></canvas>
                              </div>

                              <br>
                              <div class="col-md-12">                                   
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th width="80px">% FISIK</th>
                                      <th width="50px">Jan</th>
                                      <th width="50px">Feb</th>
                                      <th width="50px">Mar</th>
                                      <th width="50px">Apr</th>
                                      <th width="50px">Mei</th>
                                      <th width="50px">Jun</th>
                                      <th width="50px">Jul</th>
                                      <th width="50px">Agu</th>
                                      <th width="50px">Sep</th>
                                      <th width="50px">Okt</th>
                                      <th width="50px">Nov</th>
                                      <th width="50px">Des</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th>Target</th>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_1'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_2'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_3'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_4'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_5'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_6'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_7'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_8'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_9'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_10'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_11'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_fisik_kota_12'],2); ?></td>
                                    </tr>
                                    <tr>
                                      <th>Realisasi</th>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_1'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_2'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_3'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_4'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_5'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_6'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_7'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_8'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_9'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_10'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_11'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_fisik_kota_12'],2); ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>

                          
                          </div><!-- /.box-body -->                            
                        </div><!-- /.box -->                        
                    </div><!-- ./col -->                    




                    <div class="col-md-12">
                        <!-- AREA CHART -->
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title"><?php echo "Target dan Realisasi Keuangan per Bulan ".$nama_bulan_ini; ?></h3>
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
                                    <?php echo number_format($total_kota["target_keuangan_kota_persen_".$bulan_ini],2); ?>%
                                    <div class="persen-kecil nilai-uang">
                                    <?php echo "Rp.".number_format($total_kota["target_keuangan_kota_".$bulan_ini],0); ?>
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
                                    <?php echo number_format($total_kota["realisasi_keuangan_kota_persen_".$bulan_ini],2); ?>%
                                    <div class="persen-kecil nilai-uang">
                                    <?php echo "Rp.".number_format($total_kota["realisasi_keuangan_kota_".$bulan_ini],0); ?>    
                                    </div>        
                                  </div>
                                </div>
                              </div><!-- ./col -->  

                            <div class="col-md-12">
                                <canvas id="chart_keuangan" height="150px"></canvas>
                            </div><!-- ./col --> 

                              
                              <div class="col-md-12">                                   
                                <br>
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th width="80px">% KEUANGAN</th>
                                      <th width="50px">Jan</th>
                                      <th width="50px">Feb</th>
                                      <th width="50px">Mar</th>
                                      <th width="50px">Apr</th>
                                      <th width="50px">Mei</th>
                                      <th width="50px">Jun</th>
                                      <th width="50px">Jul</th>
                                      <th width="50px">Agu</th>
                                      <th width="50px">Sep</th>
                                      <th width="50px">Okt</th>
                                      <th width="50px">Nov</th>
                                      <th width="50px">Des</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th>Target</th>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_1'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_2'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_3'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_4'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_5'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_6'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_7'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_8'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_9'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_10'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_11'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['target_keuangan_kota_persen_12'],2); ?></td>
                                    </tr>
                                    <tr>
                                      <th>Realisasi</th>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_1'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_2'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_3'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_4'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_5'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_6'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_7'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_8'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_9'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_10'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_11'],2); ?></td>
                                      <td align="center"><?php echo number_format($total_kota['realisasi_keuangan_kota_persen_12'],2); ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>                            

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
            number_format($total_kota['target_fisik_kota_1'],2).",".
            number_format($total_kota['target_fisik_kota_2'],2).",".
            number_format($total_kota['target_fisik_kota_3'],2).",".
            number_format($total_kota['target_fisik_kota_4'],2).",".
            number_format($total_kota['target_fisik_kota_5'],2).",".
            number_format($total_kota['target_fisik_kota_6'],2).",".
            number_format($total_kota['target_fisik_kota_7'],2).",".
            number_format($total_kota['target_fisik_kota_8'],2).",".
            number_format($total_kota['target_fisik_kota_9'],2).",".
            number_format($total_kota['target_fisik_kota_10'],2).",".
            number_format($total_kota['target_fisik_kota_11'],2).",".
            number_format($total_kota['target_fisik_kota_12'],2); ?> ],
          backgroundColor: 'rgba(255, 206, 86, 0.7)',
          borderColor: 'rgba(255, 206, 86, 1)',
          borderWidth: 1
      },
      {
          label: '% Realisasi Fisik',
          data: [ <?php echo 
            number_format($total_kota['realisasi_fisik_kota_1'],2).",".
            number_format($total_kota['realisasi_fisik_kota_2'],2).",".
            number_format($total_kota['realisasi_fisik_kota_3'],2).",".
            number_format($total_kota['realisasi_fisik_kota_4'],2).",".
            number_format($total_kota['realisasi_fisik_kota_5'],2).",".
            number_format($total_kota['realisasi_fisik_kota_6'],2).",".
            number_format($total_kota['realisasi_fisik_kota_7'],2).",".
            number_format($total_kota['realisasi_fisik_kota_8'],2).",".
            number_format($total_kota['realisasi_fisik_kota_9'],2).",".
            number_format($total_kota['realisasi_fisik_kota_10'],2).",".
            number_format($total_kota['realisasi_fisik_kota_11'],2).",".
            number_format($total_kota['realisasi_fisik_kota_12'],2); ?> ],
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
            number_format($total_kota['target_keuangan_kota_persen_1'],2).",".
            number_format($total_kota['target_keuangan_kota_persen_2'],2).",".
            number_format($total_kota['target_keuangan_kota_persen_3'],2).",".
            number_format($total_kota['target_keuangan_kota_persen_4'],2).",".
            number_format($total_kota['target_keuangan_kota_persen_5'],2).",".
            number_format($total_kota['target_keuangan_kota_persen_6'],2).",".
            number_format($total_kota['target_keuangan_kota_persen_7'],2).",".
            number_format($total_kota['target_keuangan_kota_persen_8'],2).",".
            number_format($total_kota['target_keuangan_kota_persen_9'],2).",".
            number_format($total_kota['target_keuangan_kota_persen_10'],2).",".
            number_format($total_kota['target_keuangan_kota_persen_11'],2).",".
            number_format($total_kota['target_keuangan_kota_persen_12'],2); ?> ],
          backgroundColor: 'rgba(255, 206, 86, 0.7)',
          borderColor: 'rgba(255, 206, 86, 1)',
          borderWidth: 1
      },
      {
          label: '% Realisasi Keuangan',
          data: [ <?php echo 
            number_format($total_kota['realisasi_keuangan_kota_persen_1'],2).",".
            number_format($total_kota['realisasi_keuangan_kota_persen_2'],2).",".
            number_format($total_kota['realisasi_keuangan_kota_persen_3'],2).",".
            number_format($total_kota['realisasi_keuangan_kota_persen_4'],2).",".
            number_format($total_kota['realisasi_keuangan_kota_persen_5'],2).",".
            number_format($total_kota['realisasi_keuangan_kota_persen_6'],2).",".
            number_format($total_kota['realisasi_keuangan_kota_persen_7'],2).",".
            number_format($total_kota['realisasi_keuangan_kota_persen_8'],2).",".
            number_format($total_kota['realisasi_keuangan_kota_persen_9'],2).",".
            number_format($total_kota['realisasi_keuangan_kota_persen_10'],2).",".
            number_format($total_kota['realisasi_keuangan_kota_persen_11'],2).",".
            number_format($total_kota['realisasi_keuangan_kota_persen_12'],2); ?> ],
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
            <?php echo number_format(($total_kota["anggaran_bl_kota"] / $total_kota["anggaran_total_kota"]) * 100,2); ?>, 
            <?php echo number_format(($total_kota["anggaran_btl_kota"] / $total_kota["anggaran_total_kota"]) * 100,2); ?>
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