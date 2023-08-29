<div class="row">
  <div class="col-md-12">
    <div class="box">

        <div class="box-header with-border">
            <label class="control-label"><i class="fa fa-cube"></i> Program: <i><?php echo $program['nama_prog']; ?></i></label>
            <div class="box-tools">
                <a href="<?php echo site_url('program/index');?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Program</a>
            </div>
        </div>
        <div class="box-header with-border">
            <label class="control-label"><i class="fa fa-cubes"></i> Kegiatan: <i><?php echo $kegiatan['nama_giat']; ?></i></label>
            <div class="box-tools">
                <a href="<?php echo site_url('kegiatan/index/'.$program['kode_prog']);?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Kegiatan</a>
            </div>
        </div><br>


        <div class='box-header with-border'>
            <h4 class="box-title">Tampil Kegiatan Belanja Swakelola</h4>
            <div class="box-tools">
                <a href="<?php echo site_url('belanja/index/'.$belanja['kode_giat']);?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Belanja</a>
            </div>            
        </div><!-- /.box-header -->
        <div class='box-body'>

          <div class="col-md-12">
            <div class="box box-solid">
              <div class="box-header with-border">                
                <h3 class="box-title">1. Data Umum</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <dl class="dl-horizontal">
                  <dt></dt><dd></dd>
                  <dt>Kode Rekening Belanja:</dt><dd><?php echo $belanja['kode_rek_belanja']; ?></dd>
                  <dt>Nama Belanja:</dt><dd><?php echo $belanja['nama_belanja']; ?></dd>
                  <dt>Nama Kegiatan Swakelola:</dt><dd><?php echo $belanja['nama_giat_swa']; ?></dd>
                  <dt>Pagu:</dt><dd><?php echo "Rp.".number_format($belanja['pagu_giat'],0); ?></dd>
                  <dt>Bulan Pelaksanaan:</dt><dd><?php echo $bulan[$belanja['bulan_pelaksanaan_mulai']]." s/d ".$bulan[$belanja['bulan_pelaksanaan_selesai']]; ?></dd>
                  <dt>Lokasi:</dt><dd><?php echo $belanja['lokasi_giat']; ?></dd>
                  <dt>Lokasi Spesifik:</dt><dd><?php echo $belanja['lokasi_spesifik']; ?></dd>
                  <dt>Peta:</dt><dd>
                  <?php 
                    if (empty($belanja['lokasi_lintang'] && $belanja['lokasi_bujur'])) { 
                      echo "<i>Koordinat belum ditentukan.</i>";
                    } 
                  ?></dd>   
                  <dt>Jenis Belanja:</dt><dd><?php echo $belanja['jenis_belanja']; ?></dd>     
                  <dt>Volume Belanja:</dt><dd><?php echo $belanja['volume_belanja']; ?></dd>     
                  <dt>Deskripsi Belanja:</dt><dd><?php echo $belanja['deskripsi_belanja']; ?></dd>    
                  <dt>File dokumen KAK:</dt><dd><?php echo $belanja['file_dokumen_kak']; ?></dd> 
                  <dt>Usulan kegiatan dari:</dt><dd><?php echo $belanja['usulan_dari']; ?></dd>
                </dl>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- ./col -->

          <div class="col-md-12">
            <div class="box box-solid">
              <div class="box-header with-border">                
                <h3 class="box-title">2. Realisasi</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
<!--                 <dl class="dl-horizontal">
                  <dt></dt><dd></dd>
                  <dt>Realisasi:</dt>
                  <dd> -->
                    <table class="table table-bordered table-striped"> 
                      <thead>
                        <tr>
                            <th width="30px">No.</th>                            
                            <th>Bulan</th>
                            <th width="250px">Realisasi Fisik</th>
                            <th width="250px">Realisasi Keuangan</th>
                        </tr>
                      </thead>    
                      <tbody>          
                        <tr>
                            <td align="center">1</td>
                            <td align="center">Januari</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_1'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_1'],0)." (".number_format(($belanja['kk_1']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr>   

                        <tr>
                            <td align="center">2</td>
                            <td align="center">Februari</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_2'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_2'],0)." (".number_format(($belanja['kk_2']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr>

                        <tr>
                            <td align="center">3</td>
                            <td align="center">Maret</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_3'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_3'],0)." (".number_format(($belanja['kk_3']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr>         

                        <tr>
                            <td align="center">4</td>
                            <td align="center">April</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_4'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_4'],0)." (".number_format(($belanja['kk_4']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr> 

                        <tr>
                            <td align="center">5</td>
                            <td align="center">Mei</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_5'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_5'],0)." (".number_format(($belanja['kk_5']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr> 

                        <tr>
                            <td align="center">6</td>
                            <td align="center">Juni</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_6'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_6'],0)." (".number_format(($belanja['kk_6']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr> 

                        <tr>
                            <td align="center">7</td>
                            <td align="center">Juli</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_7'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_7'],0)." (
                              ".number_format(($belanja['kk_7']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr> 

                        <tr>
                            <td align="center">8</td>
                            <td align="center">Agustus</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_8'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_8'],0)." (".number_format(($belanja['kk_8']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr> 

                        <tr>
                            <td align="center">9</td>
                            <td align="center">September</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_9'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_9'],0)." (".number_format(($belanja['kk_9']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr> 

                        <tr>
                            <td align="center">10</td>
                            <td align="center">Oktober</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_10'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_10'],0)." (".number_format(($belanja['kk_10']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr> 

                        <tr>
                            <td align="center">11</td>
                            <td align="center">November</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_11'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_11'],0)." (".number_format(($belanja['kk_11']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr> 

                        <tr>
                            <td align="center">12</td>
                            <td align="center">Desember</td>
                            <td align="center" valign="center"><?php echo number_format($belanja['kf_12'],2)." %"; ?></td>
                            <td align="center"><?php echo "Rp. ".number_format($belanja['kk_12'],0)." (".number_format(($belanja['kk_12']/$belanja['pagu_giat'])*100,2)." %)"; ?></td>
                        </tr> 

                      </tbody> 
                    </table>                     
<!--                   </dd>
                </dl> -->
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- ./col -->        

        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="form-group">
      <div class="col-md-8"></div>
      <div class="col-md-2">
        <button type="button" class="btn btn-default">
          <a href="<?php echo site_url('belanja/index/'.$belanja['kode_giat']);?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
        </button>
      </div>
      <div class="col-md-2">
        <input type="hidden" name="kode_giat" value="<?php echo $belanja['kode_giat']; ?>">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-check"></i> Simpan
        </button>
       </div>
    </div>
        <?php echo form_close(); ?>
    </div>
    <br><br>

</div>
