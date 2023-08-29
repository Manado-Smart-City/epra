<div class="row">
    <div class="col-md-12">
        <div class="box" style="height: 100%;">
            <div class="box-header">
                
            </div>
            <div class="box-body">
                <div class="col-md-12">
            	   <img src="<?php echo site_url('resources/img/banner-epra.png'); ?>" width="100%">
                   <br><br>
                   <marquee behavior="scroll" direction="left" style="color: red;"><?php echo $running_text; ?> </marquee>
                   <br><br>
                </div>
                <div class="col-md-6">
                  <!-- Box Comment -->
                  <div class="box box-widget" style="box-shadow: none;">
                    <div class='box-header'>
                      <div class='user-block'>
                        <img src="<?php echo site_url('resources/img/gsvl.jpg');?>" alt='user image' style="width: 80px; height: 80px; padding-right: 10px; padding-bottom: 10px;">
                        <span class='username' style="font-size: 24px;">Sambutan Walikota Manado</span>
                        <span class='username'>Dr.Ir.G.S.Vicky Lumentut,S.H,M.Si,DEA.</span>
                      </div><!-- /.user-block -->
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                      <!-- post text -->
                      <p>Puji dan syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa atas dibuatnya aplikasi web yang disebut "CEO" (CerdasEPRAOnline). Aplikasi ini merupakan aplikasi yang menangani Evaluasi dan Pengawasan Realisasi Anggaran Kota Manado dan dapat diakses di alamat <a href="http://ceo.manadokota.go.id">http://ceo.manadokota.go.id</a>. Aplikasi CEO ini dimaksudkan sebagai sarana informasi untuk menjawab tuntutan tata kelola kepemerintahan yang baik (good governance) dengan harapan dapat memberikan informasi yang jelas mengenai Penyerapan Anggaran dari setiap Perangkat Daerah (PD) di lingkungan Pemerintah Kota Manado untuk dipergunakan oleh pihak-pihak yang berkepentingan. Selanjutnya, hadirnya aplikasi ini merupakan salah satu langkah strategis dalam mengedepankan transparansi dan akuntabilitas Pemerintah Kota Manado di era informasi dewasa ini. Saya mengharapkan aplikasi ini akan bermanfaat bagi masyarakat luas serta bagi Pemerintah Kota Manado sendiri.</p>
                      <br>
                      <div class="col-md-6">
                         <a href="<?php echo site_url('laporan_kota/index/2017'); ?>"><button class="btn btn-block btn-default btn-lg bg-orange">Laporan Kota</button></a>
                      </div>
                      <div class="col-md-6">
                        <a href="<?php echo site_url('laporan_pd/daftar_pd/2017'); ?>"><button class="btn btn-block btn-default btn-lg bg-olive">Laporan PD</button></a>
                      </div>

                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div><!-- /.col -->

                <div class="col-md-6">



              <!-- PRODUCT LIST -->
              <div class="box box-primary" style="border: 1px solid #d2d6de;">
                <div class="box-header">
                  <h3 class="box-title">Pengumuman:</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">

                    <?php foreach($pengumuman as $d){ ?>

                    <li class="item">
                      <div class="product-img">
                        <img src="<?php echo site_url('resources/img/announcement.png');?>" alt='user image'>
                      </div>
                      <div class="product-info">
                        <a href="<?php echo site_url('beranda/pengumuman/'.$d['id_pengumuman']);?>" class="product-title"><?php echo $d['judul']; ?></a>
                        <span class="product-description">
                        <?php 
                            $fromMYSQL = $d['update_tgl'];
                            $hari_indo = array(
                                "Mon" => "Senin",
                                "Tue" => "Selasa",
                                "Wed" => "Rabu",
                                "Thu" => "Kamis",
                                "Fri" => "Jumat",
                                "Sat" => "Sabtu",
                                "Sun" => "Minggu",
                            );
                            $hari = $hari_indo[date("D", strtotime($fromMYSQL))];
                            echo $hari.", ".date("d/m/Y, H:i:s", strtotime($fromMYSQL));
                        ?>
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <?php } ?>
                                 
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">Lihat semua...</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
                </div><!-- /.col -->        



<div class="col-md-12">
 <!-- Small boxes (Stat box) -->
                    <div class="col-md-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo "Rp. ".number_format($total_kota["anggaran_total_kota"]); ?></h3>
                          <p><b>Total Anggaran</b></p>
                        </div>
                      </div>

                      <!-- small box -->
                      <div class="small-box bg-blue">
                        <div class="inner">
                          <h3><?php echo "Rp. ".number_format($total_kota["anggaran_bl_kota"]); ?></h3>
                          <p><b>Total Anggaran Belanja Langsung</b></p>
                        </div>
                      </div>

                      <!-- small box -->
                      <div class="small-box bg-orange">
                        <div class="inner">
                          <h3><?php echo "Rp. ".number_format($total_kota["anggaran_btl_kota"]); ?></h3>
                          <p><b>Total Anggaran Belanja Tidak Langsung</b></p>
                        </div>
                      </div>

                    </div><!-- ./col -->

                    <div class="col-md-6">
                      <canvas id="chart_pie" height="220px"></canvas>
                    </div><!-- ./col -->

 </div><!-- ./col -->





           <div class="col-md-6">
              <div class="box box-success" style="border: 1px solid #c0c6d8;">
                <div class="box-header with-border bg-green">
                  <h3 class="box-title">PD dengan kinerja tertinggi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header">
                      <div class="widget-user-image">
                        <?php echo '<img class="img-circle" src="'.site_url('uploads/pd/pejabat/'.$realisasi_keuangan_tertinggi["foto_kepala"]).'" width="75px" alt="user image">'; ?>
                      </div><!-- /.widget-user-image -->
                      <h4 class="widget-user-username">
                        <a href="
                        <?php echo site_url('/laporan_pd/index/'.$tahun_anggaran.'/'.$realisasi_keuangan_tertinggi['kode_pd']); ?>
                        ">
                        <?php echo $realisasi_keuangan_tertinggi["nama_pd"]; ?>
                      </a>
                    </h4>
                    <h5 class="widget-user-desc">
                      <?php echo $realisasi_keuangan_tertinggi["jabatan_kepala"]; ?>:
                      <?php echo $realisasi_keuangan_tertinggi["nama_kepala"]; ?>
                    </h5>
                  </div>
                  <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                      <li><a href="#">Pagu anggaran total 
                        <span class="pull-right badge bg-blue">
                          <?php echo "Rp. ".number_format($realisasi_keuangan_tertinggi["anggaran_total"],0); ?>
                        </span></a></li>
                        <li><a href="#">Realisasi Keuangan bulan <?php echo $nama_bulan_ini; ?> 
                        <span class="pull-right badge bg-green">Rp.<?php echo number_format($realisasi_keuangan_tertinggi["total_realisasi_keuangan_".$bulan_ini],0); ?> 
                        (<?php echo number_format($realisasi_keuangan_tertinggi["total_realisasi_keuangan_persen_".$bulan_ini],2); ?>%)</span></a></li>
                      </ul>
                    </div>
                  </div><!-- /.widget-user -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->


            <div class="col-md-6">
              <div class="box box-success" style="border: 1px solid #c0c6d8;">
                <div class="box-header with-border bg-red">
                  <h3 class="box-title">PD dengan kinerja terendah</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header">
                      <div class="widget-user-image">
                        <?php echo '<img class="img-circle" src="'.site_url('uploads/pd/pejabat/'.$realisasi_keuangan_terendah["foto_kepala"]).'" width="75px" alt="user image">'; ?>
                      </div><!-- /.widget-user-image -->
                      <h3 class="widget-user-username">
                        <a href="
                        <?php echo site_url('/laporan_pd/index/'.$tahun_anggaran.'/'.$realisasi_keuangan_terendah['kode_pd']); ?>
                        ">
                        <?php echo $realisasi_keuangan_terendah["nama_pd"]; ?>
                      </a>
                    </h3>
                    <h5 class="widget-user-desc">
                      <?php echo $realisasi_keuangan_terendah["jabatan_kepala"]; ?>:
                      <?php echo $realisasi_keuangan_terendah["nama_kepala"]; ?>
                    </h5>
                  </div>
                  <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                      <li><a href="#">Pagu anggaran total 
                        <span class="pull-right badge bg-blue">
                          <?php echo "Rp. ".number_format($realisasi_keuangan_terendah["anggaran_total"],0); ?>
                        </span></a></li>
                        <li><a href="#">Realisasi Keuangan bulan <?php echo $nama_bulan_ini; ?> 
                          <span class="pull-right badge bg-green">Rp.<?php echo number_format($realisasi_keuangan_terendah["total_realisasi_keuangan_".$bulan_ini],0); ?> 
                            (<?php echo number_format($realisasi_keuangan_terendah["total_realisasi_keuangan_persen_".$bulan_ini],2); ?>%)</span></a></li>
                      </ul>
                    </div>
                  </div><!-- /.widget-user -->

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

            </div><!-- /.box-body -->

        </div>
    </div>
</div>
<script src="<?php echo site_url('resources/plugins/chartjs/Chart.js');?>"></script>
<script>
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