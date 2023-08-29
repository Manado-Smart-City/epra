<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-solid">    
                <div class="box-header">
                    <h3 class="box-title">Laporan Belanja Perangkat Daerah</h3>
                </div>
                <div class="box-body">

                    <!-- Small boxes (Stat box) -->
                    <div class="col-md-4">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo "Rp. ".number_format($total_anggaran); ?></h3>
                          <p>Total Anggaran</p>
                        </div>
                      </div>
                    </div><!-- ./col -->

                    <div class="col-md-4">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo "Rp. ".number_format($total_anggaran_bl); ?></h3>
                          <p>Total Anggaran Belanja</p>
                        </div>
                      </div>
                    </div><!-- ./col --> 


                    <div class="col-md-4">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo number_format(($total_anggaran_bl / $total_anggaran) * 100,2)."%"; ?></h3>
                          <p>Persentase Anggaran Belanja</p>
                        </div>
                      </div>
                    </div><!-- ./col -->

                    <div class="col-md-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3><?php echo $jumlah_program; ?></h3>
                          <p>Jumlah Program</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-cube"></i>
                        </div>
                      </div>
                    </div><!-- ./col -->

                    <div class="col-md-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3><?php echo $jumlah_kegiatan; ?></h3>
                          <p>Jumlah Kegiatan</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-cubes"></i>
                        </div>
                      </div>
                    </div><!-- ./col -->

                    <div class="col-md-4">
                      <!-- small box -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3><?php echo $jumlah_belanja; ?></h3>
                          <p>Jumlah Belanja</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-money"></i>
                        </div>
                      </div>
                    </div><!-- ./col -->

                    <div class="col-md-4">
                      <!-- small box -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3><?php echo $jumlah_belanja_swakelola; ?></h3>
                          <p>Jumlah Belanja Swakelola</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-money"></i>
                        </div>
                      </div>
                    </div><!-- ./col -->

                    <div class="col-md-4">
                      <!-- small box -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3><?php echo $jumlah_belanja_pengadaan; ?></h3>
                          <p>Jumlah Belanja Pengadaan</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-money"></i>
                        </div>
                      </div>
                    </div><!-- ./col -->

                    <div class="col-md-12">
                        <!-- AREA CHART -->
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title"><?php echo "Target dan Realisasi Fisik Belanja Langsung per Bulan ".$nama_bulan_ini; ?></h3>
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
                                    <?php echo number_format($realisasi_pd["bl_target_fisik_".$bulan_ini],2); ?>%
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
                                    <?php echo number_format($realisasi_pd["bl_realisasi_fisik_".$bulan_ini],2); ?>%
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
                            <h3 class="box-title"><?php echo "Target dan Realisasi Keuangan Belanja Langsung per Bulan ".$nama_bulan_ini; ?></h3>
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
                                    <?php echo number_format($realisasi_pd["bl_target_keuangan_persen_".$bulan_ini],2); ?>%
                                    <div class="persen-kecil nilai-uang">
                                    <?php echo "Rp.".number_format($realisasi_pd["bl_target_keuangan_".$bulan_ini],0); ?>
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
                                    <?php echo number_format($realisasi_pd["bl_realisasi_keuangan_persen_".$bulan_ini],2); ?>%
                                    <div class="persen-kecil nilai-uang">
                                    <?php echo "Rp.".number_format($realisasi_pd["bl_realisasi_keuangan_".$bulan_ini],0); ?>
                                    </div>        
                                  </div>
                                </div>
                              </div><!-- ./col --> 

                            <div class="col-md-12">
                                <canvas id="chart_keuangan" height="150px"></canvas>                                
                            </div><!-- ./col -->                           

                          </div><!-- /.box-body -->

                          <div class="col-md-12">
                            <br><br>
                            <p align="right"><button type="submit" onclick="window.open('<?php echo site_url('laporan_pd/index_bl/2018/'.$pd['kode_pd'].'/TRUE') ?>');"><img src="<?php echo site_url('resources/img/printer.png');?>" height="20" style="margin-bottom: 5px; margin-top: 5px; margin-right: 5px; "/>Cetak laporan</button></p>
                            <br>
                          </div>

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
            number_format($realisasi_pd['bl_target_fisik_1'],2).",".
            number_format($realisasi_pd['bl_target_fisik_2'],2).",".
            number_format($realisasi_pd['bl_target_fisik_3'],2).",".
            number_format($realisasi_pd['bl_target_fisik_4'],2).",".
            number_format($realisasi_pd['bl_target_fisik_5'],2).",".
            number_format($realisasi_pd['bl_target_fisik_6'],2).",".
            number_format($realisasi_pd['bl_target_fisik_7'],2).",".
            number_format($realisasi_pd['bl_target_fisik_8'],2).",".
            number_format($realisasi_pd['bl_target_fisik_9'],2).",".
            number_format($realisasi_pd['bl_target_fisik_10'],2).",".
            number_format($realisasi_pd['bl_target_fisik_11'],2).",".
            number_format($realisasi_pd['bl_target_fisik_12'],2); ?> ],
          backgroundColor: 'rgba(255, 206, 86, 0.7)',
          borderColor: 'rgba(255, 206, 86, 1)',
          borderWidth: 1
      },
      {
          label: '% Realisasi Fisik',
          data: [ <?php echo 
            number_format($realisasi_pd['bl_realisasi_fisik_1'],2).",".
            number_format($realisasi_pd['bl_realisasi_fisik_2'],2).",".
            number_format($realisasi_pd['bl_realisasi_fisik_3'],2).",".
            number_format($realisasi_pd['bl_realisasi_fisik_4'],2).",".
            number_format($realisasi_pd['bl_realisasi_fisik_5'],2).",".
            number_format($realisasi_pd['bl_realisasi_fisik_6'],2).",".
            number_format($realisasi_pd['bl_realisasi_fisik_7'],2).",".
            number_format($realisasi_pd['bl_realisasi_fisik_8'],2).",".
            number_format($realisasi_pd['bl_realisasi_fisik_9'],2).",".
            number_format($realisasi_pd['bl_realisasi_fisik_10'],2).",".
            number_format($realisasi_pd['bl_realisasi_fisik_11'],2).",".
            number_format($realisasi_pd['bl_realisasi_fisik_12'],2); ?> ],
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
            number_format($realisasi_pd['bl_target_keuangan_persen_1'],2).",".
            number_format($realisasi_pd['bl_target_keuangan_persen_2'],2).",".
            number_format($realisasi_pd['bl_target_keuangan_persen_3'],2).",".
            number_format($realisasi_pd['bl_target_keuangan_persen_4'],2).",".
            number_format($realisasi_pd['bl_target_keuangan_persen_5'],2).",".
            number_format($realisasi_pd['bl_target_keuangan_persen_6'],2).",".
            number_format($realisasi_pd['bl_target_keuangan_persen_7'],2).",".
            number_format($realisasi_pd['bl_target_keuangan_persen_8'],2).",".
            number_format($realisasi_pd['bl_target_keuangan_persen_9'],2).",".
            number_format($realisasi_pd['bl_target_keuangan_persen_10'],2).",".
            number_format($realisasi_pd['bl_target_keuangan_persen_11'],2).",".
            number_format($realisasi_pd['bl_target_keuangan_persen_12'],2); ?> ],
          backgroundColor: 'rgba(255, 206, 86, 0.7)',
          borderColor: 'rgba(255, 206, 86, 1)',
          borderWidth: 1
      },
      {
          label: '% Realisasi Keuangan',
          data: [ <?php echo 
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_1'],2).",".
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_2'],2).",".
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_3'],2).",".
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_4'],2).",".
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_5'],2).",".
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_6'],2).",".
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_7'],2).",".
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_8'],2).",".
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_9'],2).",".
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_10'],2).",".
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_11'],2).",".
            number_format($realisasi_pd['bl_realisasi_keuangan_persen_12'],2); ?> ],
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
              text: <?php echo "'Target dan Realisasi Fisik Belanja Langsung per Bulan ".$nama_bulan_ini."'"; ?>
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
              text: <?php echo "'Target dan Realisasi Keuangan Belanja Langsung per Bulan ".$nama_bulan_ini."'"; ?>
          },
          legend: {
              display: true
          }                
      }
  });                    
</script>  
