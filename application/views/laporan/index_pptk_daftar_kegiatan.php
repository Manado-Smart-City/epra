  <div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-solid">    
                <div class="box-header">
                    <h3 class="box-title">Laporan Kinerja PPTK :: Daftar Sub Kegiatan</h3>
                </div>
                <div class="box-body">                

                  <div class="col-md-5">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header">
                        <div class="widget-user-image">
                          <?php echo '<img class="img-circle" src="'.site_url('uploads/pd/pejabat/')."/".$laporan_kinerja_pptk_detail->foto_p.'" width="75px">'; ?>
                        </div><!-- /.widget-user-image -->
                        <h3 class="widget-user-username"><?php echo $laporan_kinerja_pptk_detail->nama_p; ?></h3>
                        <h5 class="widget-user-desc"><?php echo $laporan_kinerja_pptk_detail->jabat_p; ?></h5>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li><a href="#">Pagu anggaran yang dikelola 
                            <span class="pull-right badge bg-blue">
                            <?php echo "Rp. ".number_format($laporan_kinerja_pptk_detail->anggaran_yang_dikelola,0); ?>
                            </span></a></li>
                          <li><a href="#">Realisasi Fisik bulan <?php echo $nama_bulan_ini; ?> <span class="pull-right badge bg-blue">
                            <?php 
                            echo number_format($laporan_kinerja_pptk_detail->{"realisasi_fisik_".$bulan_ini},2); 
                            ?> %</span></a></li>                          
                          <li><a href="#">Realisasi Keuangan bulan 
                            <?php echo $nama_bulan_ini; ?> 
                            <span class="pull-right badge bg-blue">
                            <?php echo "Rp. ".number_format($laporan_kinerja_pptk_detail->{"realisasi_keuangan_".$bulan_ini})."<br>(". number_format($laporan_kinerja_pptk_detail->{"realisasi_keuangan_persen_".$bulan_ini},2); ?>
                             %)</span></a><br></li>    
                        </ul>
                      </div>
                    </div><!-- /.widget-user -->
                  </div><!-- /.col -->

                  <div class="col-md-7">
                      <canvas id="chart_pptk" height="120px"></canvas>
                  </div><!-- ./col --> 
                  
                  <div class="col-md-12">
                    <br>
                    <table id="" class="table table-bordered table-striped tabel-data-pptk"> 
                      <thead>
                          <tr>
                              <th width="10px">No.</th>                            
                              <th width="450px">Sub Kegiatan</th>
                              <th>Pagu Anggaran</th>
                              <th>Realisasi Fisik</th>
                              <th>Realisasi Keuangan</th>
                          </tr>
                      </thead>    
                      <tbody>
                      <?php $no=0 ; ?>  
                      <?php foreach($laporan_kinerja_pptk_tabel_kegiatan as $p){ ?>                  
                        <tr>
                            <?php $no++; ?>
                            <td align="center">
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php 
                                    // untuk yang di publik, link ke belanja tidak ditampilkan (23/11/2017)
                                    echo '<a href="'.site_url('/laporan/index_pptk_detail_kegiatan/'.$tahun_anggaran.'/'.$p->kode_giat).'">'.$p->kode_giat."<br>".$p->nama_giat."</a>";                               
                                    // echo $p->kode_giat."<br>".$p->nama_giat;                               
                                ?>  
                            </td>
                            <td align="center">
                                <?php 
                                    echo "Rp. ".number_format($p->pagu_anggaran,0);                               
                                ?>                               
                            </td>
                            <td align="center">
                                <?php 
                                    echo number_format($p->{"realisasi_fisik_".$bulan_ini},2)."%";                               
                                ?>                               
                            </td>
                            <td align="center">
                                <?php 
                                    echo "Rp. ".number_format($p->{"realisasi_keuangan_".$bulan_ini},0)."<br>(".number_format($p->{"realisasi_keuangan_persen_".$bulan_ini},2)."%".")";                               
                                ?>                               
                            </td>
                        </tr>
                      <?php } ?>
                      </tbody>                     
                    </table>
                  </div><!-- ./col --> 

                </div>    
            </div>    
        </div>
    </div>
</div>
<script src="<?php echo site_url('resources/plugins/chartjs/Chart.js');?>"></script>
<script>
  var ctx_pptk = document.getElementById("chart_pptk");
  var myChartData_pptk = {
      labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
      datasets: [
      {
          label: '% Realisasi Fisik',
          data: [ 
          <?php echo 
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_1 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_2 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_3 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_4 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_5 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_6 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_7 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_8 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_9 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_10,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_11,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_fisik_12,2); 
          ?> ],
          backgroundColor: '#f5812e',
      },
      {
          label: '% Realisasi Keuangan',
          data: [ <?php echo 
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_1 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_2 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_3 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_4 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_5 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_6 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_7 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_8 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_9 ,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_10,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_11,2).",".
            number_format($laporan_kinerja_pptk_detail->realisasi_keuangan_persen_12,2) ; ?> ],
          backgroundColor: '#408eba',
      }    
      ]
  };                    
  var myChart_pptk = new Chart(ctx_pptk, {
      type: 'bar',
      data: myChartData_pptk,
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true,
                      max : 100,
                      stepSize : 20,   
                      // Include a dollar sign in the ticks
                      callback: function(value, index, values) {
                          return value + ' %';
                      }                    
                  }
              }]
          },
          title: {
              display: true,
              text: <?php echo "'Kinerja PPTK per Bulan ".$nama_bulan_ini."'"; ?>
          },
          legend: {
              display: true,
              position: 'bottom'
          }                
      }
  });                    
</script>  
