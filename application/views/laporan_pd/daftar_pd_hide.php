  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box box-solid">    
          <div class="box-header">
            <h3 class="box-title">Daftar Perangkat Daerah</h3>
          </div>
          <div class="box-body">         

            <div class="col-md-12" style="padding-left: 0px;">
              <!-- Small boxes (Stat box) -->
              <div class="col-md-6">

                <!-- small box -->
                <div class="small-box bg-blue">
                  <div class="inner">
                    <h3><?php echo "53"; ?></h3>
                    <p>Jumlah Perangkat Daerah</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-bank"></i>
                  </div>                        
                </div>

                <div class="col-md-6"  style="padding-left: 0px;">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>21</h3>
                      <p>Dinas-dinas</p>
                    </div>
                  </div>
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>12</h3>
                      <p>Setda dan Bagian-Bagian</p>
                    </div>
                  </div>
                </div><!-- ./col -->    

                <div class="col-md-6"  style="padding-right: 0px;">  
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>9</h3>
                      <p>Lembaga Teknis</p>
                    </div>
                  </div>
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3>11</h3>
                      <p>Kecamatan</p>
                    </div>
                  </div>
                </div><!-- ./col -->    

              </div><!-- ./col -->                      

              <div class="col-md-6">
                <canvas id="chart_pie" height="210px"></canvas>
              </div><!-- ./col -->                

            </div><!-- ./col -->                    

  

            <div class="col-md-12">

              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <!-- <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Dinas, Badan dan Lembaga Teknis</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Setda/Bagian</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Kecamatan</a></li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul> -->
                <div class="tab-content">

                 <!-- <div class="tab-pane active" id="tab_1">
                    <table>
                      <tr>
                        <td width="49%" valign="top">

                          <h4 class="box-title">5 Dinas, Badan dan Lembaga Teknis dengan kinerja tertinggi</h4>
                          <table id="" class="table table-bordered table-striped tabel-data-pd">
                            <tr>
                              <th>No.</th>
                              <th width="40%">Perangkat Daerah</th>
                              <th>Pagu Total</th>
                              <th>Realisasi Fisik</th>
                              <th>Realisasi Keuangan</th>
                            </tr>
                          <?php
                              $no = 1; 
                              foreach ($realisasi_keuangan_5_tertinggi_dinas as $realisasi_keuangan_tertinggi_dinas) {
                                echo "<tr>";
                                echo "<td align=center>".$no."</td>";
                                echo "<td>".
                                        "<a href='".
                                        site_url('laporan_pd/index/'.$tahun_anggaran.'/'.$realisasi_keuangan_tertinggi_dinas["kode_pd"]).
                                        "'>".
                                        $realisasi_keuangan_tertinggi_dinas["nama_pd"].
                                        "</a>".
                                      "</td>";
                                echo "<td align=center>Rp. ".number_format($realisasi_keuangan_tertinggi_dinas["anggaran_total"])."</td>";
                                echo "<td align=center>".number_format($realisasi_keuangan_tertinggi_dinas["total_realisasi_fisik_".$bulan_ini],2)."%</td>";
                                echo "<td align=center>".
                                        number_format($realisasi_keuangan_tertinggi_dinas["total_realisasi_keuangan_persen_".$bulan_ini],2).
                                        " %<br>(Rp.".
                                        number_format($realisasi_keuangan_tertinggi_dinas["total_realisasi_keuangan_".$bulan_ini]).") ".
                                     "</td>";
                                echo "</tr>";
                                $no++;
                              }
                          ?>
                          </table>  

                          <h4 class="box-title">5 Dinas, Badan dan Lembaga Teknis dengan kinerja terendahh</h4>
                          <table id="" class="table table-bordered table-striped tabel-data-pd">
                            <tr>
                              <th>No.</th>
                              <th width="40%">Perangkat Daerah</th>
                              <th>Pagu Total</th>
                              <th>Realisasi Fisik</th>
                              <th>Realisasi Keuangan</th>
                            </tr>
                          <?php
                              $no = 1; 
                              foreach ($realisasi_keuangan_5_terendah_dinas as $realisasi_keuangan_terendah_dinas) {
                                echo "<tr>";
                                echo "<td align=center>".$no."</td>";
                                echo "<td>".
                                        "<a href='".
                                        site_url('laporan_pd/index/'.$tahun_anggaran.'/'.$realisasi_keuangan_terendah_dinas["kode_pd"]).
                                        "'>".
                                        $realisasi_keuangan_terendah_dinas["nama_pd"].
                                        "</a>".
                                      "</td>";
                                echo "<td align=center>Rp. ".number_format($realisasi_keuangan_terendah_dinas["anggaran_total"])."</td>";
                                echo "<td align=center>".number_format($realisasi_keuangan_terendah_dinas["total_realisasi_fisik_".$bulan_ini],2)."%</td>";
                                echo "<td align=center>".
                                        number_format($realisasi_keuangan_terendah_dinas["total_realisasi_keuangan_persen_".$bulan_ini],2).
                                        " %<br>(Rp.".
                                        number_format($realisasi_keuangan_terendah_dinas["total_realisasi_keuangan_".$bulan_ini]).") ".
                                     "</td>";
                                echo "</tr>";
                                $no++;
                              }
                          ?>
                          </table>  

                        </td>  
                      </tr>
                    </table>
                  </div>--><!-- /.tab-pane -->


                  <div class="tab-pane" id="tab_2">
                    <table>
                      <tr>
                        <td width="49%" valign="top">

                          <h4 class="box-title">5 Setda/Bagian dengan kinerja tertinggi</h4>
                          <table id="" class="table table-bordered table-striped tabel-data-pd">
                            <tr>
                              <th>No.</th>
                              <th width="40%">Perangkat Daerah</th>
                              <th>Pagu Total</th>
                              <th>Realisasi Fisik</th>
                              <th>Realisasi Keuangan</th>
                            </tr>
                          <?php
                              $no = 1; 
                              foreach ($realisasi_keuangan_5_tertinggi_setda as $realisasi_keuangan_tertinggi_setda) {
                                echo "<tr>";
                                echo "<td align=center>".$no."</td>";
                                echo "<td>".
                                        "<a href='".
                                        site_url('laporan_pd/index/'.$tahun_anggaran.'/'.$realisasi_keuangan_tertinggi_setda["kode_pd"]).
                                        "'>".
                                        $realisasi_keuangan_tertinggi_setda["nama_pd"].
                                        "</a>".
                                      "</td>";
                                echo "<td align=center>Rp. ".number_format($realisasi_keuangan_tertinggi_setda["anggaran_total"])."</td>";
                                echo "<td align=center>".number_format($realisasi_keuangan_tertinggi_setda["total_realisasi_fisik_".$bulan_ini],2)."%</td>";
                                echo "<td align=center>".
                                        number_format($realisasi_keuangan_tertinggi_setda["total_realisasi_keuangan_persen_".$bulan_ini],2).
                                        " %<br>(Rp.".
                                        number_format($realisasi_keuangan_tertinggi_setda["total_realisasi_keuangan_".$bulan_ini]).") ".
                                     "</td>";
                                echo "</tr>";
                                $no++;
                              }
                          ?>
                          </table>  

                          <h4 class="box-title">5 Setda/Bagian dengan kinerja terendah</h4>
                          <table id="" class="table table-bordered table-striped tabel-data-pd">
                            <tr>
                              <th>No.</th>
                              <th width="40%">Perangkat Daerah</th>
                              <th>Pagu Total</th>
                              <th>Realisasi Fisik</th>
                              <th>Realisasi Keuangan</th>
                            </tr>
                          <?php
                              $no = 1; 
                              foreach ($realisasi_keuangan_5_terendah_setda as $realisasi_keuangan_terendah_setda) {
                                echo "<tr>";
                                echo "<td align=center>".$no."</td>";
                                echo "<td>".
                                        "<a href='".
                                        site_url('laporan_pd/index/'.$tahun_anggaran.'/'.$realisasi_keuangan_terendah_setda["kode_pd"]).
                                        "'>".
                                        $realisasi_keuangan_terendah_setda["nama_pd"].
                                        "</a>".
                                      "</td>";
                                echo "<td align=center>Rp. ".number_format($realisasi_keuangan_terendah_setda["anggaran_total"])."</td>";
                                echo "<td align=center>".number_format($realisasi_keuangan_terendah_setda["total_realisasi_fisik_".$bulan_ini],2)."%</td>";
                                echo "<td align=center>".
                                        number_format($realisasi_keuangan_terendah_setda["total_realisasi_keuangan_persen_".$bulan_ini],2).
                                        " %<br>(Rp.".
                                        number_format($realisasi_keuangan_terendah_setda["total_realisasi_keuangan_".$bulan_ini]).") ".
                                     "</td>";
                                echo "</tr>";
                                $no++;
                              }
                          ?>
                          </table>  

                        </td>  
                      </tr>
                    </table>
                  </div><!-- /.tab-pane -->


                  <div class="tab-pane" id="tab_3">
                    <table>
                      <tr>
                        <td width="49%" valign="top">

                          <h4 class="box-title">5 Kecamatan dengan kinerja tertinggi</h4>
                          <table id="" class="table table-bordered table-striped tabel-data-pd">
                            <tr>
                              <th>No.</th>
                              <th width="40%">Perangkat Daerah</th>
                              <th>Pagu Total</th>
                              <th>Realisasi Fisik</th>
                              <th>Realisasi Keuangan</th>
                            </tr>
                          <?php
                              $no = 1; 
                              foreach ($realisasi_keuangan_5_tertinggi_kecamatan as $realisasi_keuangan_tertinggi_kecamatan) {
                                echo "<tr>";
                                echo "<td align=center>".$no."</td>";
                                echo "<td>".
                                        "<a href='".
                                        site_url('laporan_pd/index/'.$tahun_anggaran.'/'.$realisasi_keuangan_tertinggi_kecamatan["kode_pd"]).
                                        "'>".
                                        $realisasi_keuangan_tertinggi_kecamatan["nama_pd"].
                                        "</a>".
                                      "</td>";
                                echo "<td align=center>Rp. ".number_format($realisasi_keuangan_tertinggi_kecamatan["anggaran_total"])."</td>";
                                echo "<td align=center>".number_format($realisasi_keuangan_tertinggi_kecamatan["total_realisasi_fisik_".$bulan_ini],2)."%</td>";
                                echo "<td align=center>".
                                        number_format($realisasi_keuangan_tertinggi_kecamatan["total_realisasi_keuangan_persen_".$bulan_ini],2).
                                        " %<br>(Rp.".
                                        number_format($realisasi_keuangan_tertinggi_kecamatan["total_realisasi_keuangan_".$bulan_ini]).") ".
                                     "</td>";
                                echo "</tr>";
                                $no++;
                              }
                          ?>
                          </table>  

                          <h4 class="box-title">5 Kecamatan dengan kinerja terendah</h4>
                          <table id="" class="table table-bordered table-striped tabel-data-pd">
                            <tr>
                              <th>No.</th>
                              <th width="40%">Perangkat Daerah</th>
                              <th>Pagu Total</th>
                              <th>Realisasi Fisik</th>
                              <th>Realisasi Keuangan</th>
                            </tr>
                          <?php
                              $no = 1; 
                              foreach ($realisasi_keuangan_5_terendah_kecamatan as $realisasi_keuangan_terendah_kecamatan) {
                                echo "<tr>";
                                echo "<td align=center>".$no."</td>";
                                echo "<td>".
                                        "<a href='".
                                        site_url('laporan_pd/index/'.$tahun_anggaran.'/'.$realisasi_keuangan_terendah_kecamatan["kode_pd"]).
                                        "'>".
                                        $realisasi_keuangan_terendah_kecamatan["nama_pd"].
                                        "</a>".
                                      "</td>";
                                echo "<td align=center>Rp. ".number_format($realisasi_keuangan_terendah_kecamatan["anggaran_total"])."</td>";
                                echo "<td align=center>".number_format($realisasi_keuangan_terendah_kecamatan["total_realisasi_fisik_".$bulan_ini],2)."%</td>";
                                echo "<td align=center>".
                                        number_format($realisasi_keuangan_terendah_kecamatan["total_realisasi_keuangan_persen_".$bulan_ini],2).
                                        " %<br>(Rp.".
                                        number_format($realisasi_keuangan_terendah_kecamatan["total_realisasi_keuangan_".$bulan_ini]).") ".
                                     "</td>";
                                echo "</tr>";
                                $no++;
                              }
                          ?>
                          </table>  

                        </td>  
                      </tr>
                    </table>
                  </div><!-- /.tab-pane -->


                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->                                               


            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_4" data-toggle="tab">Total</a></li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_4">

                      <table id="" class="table table-bordered table-striped tabel-data-pd"> 
                        <thead>
                          <tr>
                            <th rowspan="2" width="10px">No.</th>                            
                            <th rowspan="2" >Nama PD<br>Pagu Anggaran</th>
                            <th colspan="2">FISIK (<?php echo $nama_bulan_ini; ?>)</th>
                            <th colspan="2">KEUANGAN (<?php echo $nama_bulan_ini; ?>)</th>
                          </tr>
                          <tr>
                            <th width="100px">Target</th>
                            <th width="100px">Realisasi</th>
                            <th width="120px">Target</th>
                            <th width="120px">Realisasi</th>
                          </tr>                        
                        </thead>    
                        <tbody>
                          <?php $no=0 ; ?>
                          <?php foreach($daftar_pd as $p){ 
                            if (
                                  $p["kode_pd"] <> "4.04.100" AND 
                                  $p["kode_pd"] <> "4.01.100" AND 
                                  $p["kode_pd"] <> "4.01.200" AND
                                  $p["kode_pd"] <> "4.01.300"
                               ) { ?>                  
                          <tr>
                            <?php $no++; ?>
                            <td align="center">
                              <?php echo $no; ?>
                            </td>
                            <td>
                              <?php 
                              echo '<p style="font-size: 18px;"><a href="'.site_url('laporan_pd/index/'.$tahun_anggaran.'/'.$p["kode_pd"]).'">'.$p["nama_pd"].'</a></p>';
                              echo "<strong>Pagu Total:</strong> Rp.".number_format($p["anggaran_total"],0)."<br>";
                              ?>   
                            </td>
                            <td align="center" style="font-size: 24px;">
                              <?php 
                              echo number_format($p["total_target_fisik_".$bulan_ini],2)."%<br>";
                              ?>                               
                            </td>
                            <td align="center" data-order="<?php echo $p['total_realisasi_fisik_'.$bulan_ini]; ?>">
                              <?php 
                                echo '<p style="font-size: 24px";>';
                                echo number_format($p["total_realisasi_fisik_".$bulan_ini],2)."%<br>";
                                echo '</p>';
                                echo "<strong>Deviasi:</strong> ".number_format($p["total_deviasi_fisik_".$bulan_ini],2)."%<br>";
                              ?>                               
                            </td>                          
                            <td align="center" data-order="<?php echo $p['total_target_keuangan_persen_'.$bulan_ini]; ?>">
                              <?php 
                                echo '<p style="font-size: 24px";>';
                                echo number_format($p["total_target_keuangan_persen_".$bulan_ini],2)."%";
                                echo '</p>';
                                echo "(Rp.".number_format($p["total_target_keuangan_".$bulan_ini],0).")";                                                        
                              ?>                               
                            </td>
                            <td align="center" data-order="<?php echo $p['total_realisasi_keuangan_persen_'.$bulan_ini]; ?>">     
                              <?php 
                                echo '<p style="font-size: 24px";>';
                                echo number_format($p["total_realisasi_keuangan_persen_".$bulan_ini],2)."%<br>";
                                echo '</p>';
                                echo "(Rp.".number_format($p["total_realisasi_keuangan_".$bulan_ini],0).") <br>";                                                        
                                echo "<strong>Deviasi:</strong> ".number_format($p["total_deviasi_keuangan_persen_".$bulan_ini],2)."%<br>";
                              ?>                                                     
                            </td>  

                          </tr>
                          <?php } } ?>
                        </tbody>
                      </table>

                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
            
        </div>
      </div>
      <script src="<?php echo site_url('resources/plugins/chartjs/Chart.js');?>"></script>
      <script src="<?php echo site_url('resources/js/palette.js');?>"></script>
      <script>
      var ctx_pie = document.getElementById("chart_pie");
      var seq1 = palette('tol-dv', 15);
      var seq = seq1.concat(seq1).concat(seq1).concat(seq1).concat(seq1);
      var myPieChartData = {
        datasets: [{
          data: [
          <?php
          $no = 1;  
          foreach ($daftar_pd as $pd) {
           echo number_format(($pd["anggaran_total"] / $anggaran_total_kota) * 100,2);
           $no++;
           if ($no <= $jumlah_pd){
            echo ",";
          } 
        }
        ?>
        ],
        backgroundColor: seq
      }],

      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels: [
      <?php
      $no = 1;  
      foreach ($daftar_pd as $pd) {
       echo "'% Anggaran: ".$pd["nama_pd"]."'";
       $no++;
       if ($no <= $jumlah_pd){
        echo ",";
      } 
    }
    ?>
    ]
  };
  var myPieChart = new Chart(ctx_pie,{
    type: 'pie',
    data: myPieChartData,
    options: {   
      title: {
        display: true,
        text: <?php echo "'Persentase Anggaran per PD dari Total Anggaran Kota'"; ?>,
      },                 
      legend: {display: false }          
    }
  });                    

</script>  
