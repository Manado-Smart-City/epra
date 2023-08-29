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
            <label class="control-label"><i class="fa fa-cubes"></i> Sub Kegiatan: <i><?php echo $kegiatan['nama_giat']; ?></i></label>
            <div class="box-tools">
                <a href="<?php echo site_url('kegiatan/index/'.$program['kode_prog']);?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Sub Kegiatan</a>
            </div>
        </div><br>    

        <?php if ($jumlah_belanja > 0) { ?>
        <div class="box box-solid">
            <div class="box-header">
                <h4 class="box-title">Daftar Belanja Daerah (belum dikonfirmasi)</h4>
            </div>
            <div class="box-body">
                <table id="" class="table table-bordered table-striped <?php echo ($jumlah_belanja < 11 ? 'tabel-data-limited' : 'tabel-data');  ?>"> 
                    <thead>
                        <tr>
                            <th width="10px">No.</th>                            
                            <th width="150px">Kode Rekening</th>
                            <th>Nama Belanja</th>
                            <th width="100px">Pagu (Rp.)</th>
                            <th width="200px">Aksi</th>
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>

                    <?php foreach($belanja as $p){ ?>
                    
                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?php echo $p[ 'kode_rek_belanja']; ?>
                        </td>
                        <td>
                            <?php 
                                echo $p[ 'nama_belanja'];                               
                            ?>                               
                        </td>
                        <td align="right">
                            <?php echo number_format($p['pagu_giat_'.$bulan_ini]); ?>
                        </td>                        
                        <td align="center">
                            <?php 
                                //echo '<button id="myBtn">Konfirmasi</button>';
                                echo '<a href="'.site_url('belanja/konfirmasi/swakelola/'.$p['kode_rek_belanja'].'" class="btn btn-success btn-xs" onclick="return confirm(\'Konfirmasi sebagai belanja Swakelola?\');"><span class="fa fa-check-circle-o"></span> Swakelola </a> '); 
                                echo '<a href="'.site_url('belanja/konfirmasi/pengadaan/'.$p['kode_rek_belanja'].'" class="btn btn-warning btn-xs" onclick="return confirm(\'Konfirmasi sebagai belanja Pengadaan?\');"><span class="fa fa-check-circle-o"></span> Pengadaan </a> '); 
                            ?>
                           <a href="<?php echo site_url('belanja/remove/'.$p['kode_rek_belanja']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total Pagu (Rp.)</th>
                            <th width="100px" style="text-align: right; padding-right: 10px;"><strong><? echo number_format($total_belanja); ?></strong></th>
                            <th width="100px"></th>
                        </tr>                        
                    </tfoot>                      
                </table>
            </div>
        </div>
        <?php } ?>


        <div class="box box-solid">
            <div class="box-header">
                <h4 class="box-title">Daftar Belanja Swakelola</h4>
                <div class="box-tools">
                    <a href="<?php echo site_url('belanja/add_swakelola/'.$kegiatan['kode_giat']); ?>" class="btn btn-success btn-sm"> Tambah Belanja Swakelola</a> 
                </div>                
            </div>
            <div class="box-body">
                <table id="" class="table table-bordered table-striped <?php echo ($jumlah_belanja_swakelola < 11 ? 'tabel-data-limited' : 'tabel-data');  ?>">
                    <thead>
                        <tr>
                            <th rowspan="2" width="10px">No.</th>                            
                            <th rowspan="2" width="350px">Kode Rekening<br>Nama Belanja Swakelola</th>
                            <th rowspan="2" width="100px">Pagu</th>
                            <th colspan="2">Realisasi</th>
                            <th rowspan="2" width="100px">Aksi</th>
                        </tr>
                        <tr>    
                            <th>Fisik</th>
                            <th>Keuangan</th>
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>

                    <?php foreach($belanja_swakelola as $p){ ?>                    
                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?php echo '<a href="'.site_url('belanja/view_swakelola/'.$p['kode_rek_belanja']).'">'.$p[ 'kode_rek_belanja']."<br>".$p[ 'nama_belanja'].'</a> '; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp.".number_format($p['pagu_giat_'.$bulan_ini]); ?>
                        </td>        
                        <td align="right">
                            <?php echo number_format($p['kf_terbesar'],2)."%"; ?>
                        </td>   
                        <td align="right">
                            <?php echo "Rp.".number_format($p['kk_terbesar']); ?>
                        </td>                                                              
                        <td align="center">
                            <?php 
                                echo '<a href="'.site_url('belanja/edit_swakelola/'.$p['kode_rek_belanja'].'" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Edit </a> '); 
                            ?>
                           <a href="<?php echo site_url('belanja/remove_jenis_belanja/'.$p['kode_rek_belanja']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Batalkan data ini?');"><span class="fa fa-trash"></span> Batal</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total Pagu (Rp.)</th>
                            <th style="text-align: right; padding-right: 10px;"><strong><? echo "Rp.".number_format($total_belanja_swakelola); ?></strong></th>                            
                            <th></th>
                            <th></th>
                            <th></th>                            
                        </tr>                        
                    </tfoot>                       
                </table>
            </div>
        </div>




        <div class="box box-solid">
            <div class="box-header">
                <h4 class="box-title">Daftar Belanja Pengadaan</h4>
                <div class="box-tools">
                    <a href="<?php echo site_url('belanja/add_pengadaan/'.$kegiatan['kode_giat']); ?>" class="btn btn-warning btn-sm"> Tambah Belanja Pengadaan</a>

                </div>                
            </div>
            <div class="box-body">
                <table id="" class="table table-bordered table-striped <?php echo ($jumlah_belanja_pengadaan < 11 ? 'tabel-data-limited' : 'tabel-data2');  ?>">
                    <thead>
                        <tr>
                            <th rowspan="2" width="10px">No.</th>                            
                            <th rowspan="2" width="350px">Kode Rekening<br>Nama Belanja Pengadaan</th>
                            <th rowspan="2" width="100px">Pagu</th>
                            <th colspan="2">Realisasi</th>
                            <th rowspan="2" width="100px">Aksi</th>
                        </tr>
                        <tr>    
                            <th>Fisik</th>
                            <th>Keuangan</th>
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>

                    <?php foreach($belanja_pengadaan as $p){ ?>
                    
                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?php echo '<a href="'.site_url('belanja/view_pengadaan/'.$p['kode_rek_belanja']).'">'.$p[ 'kode_rek_belanja']."<br>".$p[ 'nama_belanja'].'</a> '; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp.".number_format($p['pagu_giat_'.$bulan_ini]); ?>
                        </td>        
                        <td align="right">
                            <?php echo number_format($p['kf_terbesar'],2)."%"; ?>
                        </td>   
                        <td align="right">
                            <?php echo "Rp.".number_format($p['kk_terbesar']); ?>
                        </td>                                                              
                        <td align="center">
                            <?php 
                                echo '<a href="'.site_url('belanja/edit_pengadaan/'.$p['kode_rek_belanja'].'" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Edit </a> '); 
                            ?>
                           <a href="<?php echo site_url('belanja/remove_jenis_belanja/'.$p['kode_rek_belanja']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Batalkan data ini?');"><span class="fa fa-trash"></span> Batal</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total Pagu (Rp.)</th>
                            <th width="100px" style="text-align: right; padding-right: 10px;"><strong><? echo "Rp.".number_format($total_belanja_pengadaan); ?></strong></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>                        
                    </tfoot>                       
                </table>
            </div>
        </div>

      </div>
    </div>
</div>