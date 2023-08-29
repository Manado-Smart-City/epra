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
        <div class="box box-solid">
            <div class="box-header">
                <h4 class="box-title">Daftar Belanja</h4>
                <div class="box-tools">
                    <a href="<?php echo site_url('belanja/add_swakelola/'.$kegiatan['kode_giat']); ?>" class="btn btn-success btn-sm"> Tambah Belanja</a> 
                </div>                
            </div>
            <div class="box-body">
                <table id="<?php echo ($jumlah_belanja < 11 ? 'tabel-data-limited' : 'tabel-data');  ?>" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10px">No.</th>                            
                            <th width="150px">Kode Rekening</th>
                            <th>Nama Belanja</th>
                            <th width="100px">Pagu (Rp.)</th>
                            <th width="150px">Aksi</th>
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
                            <?php echo number_format($p['pagu_giat']); ?>
                        </td>                        
                        <td align="center">
                            <?php 
                                echo '<a href="'.site_url('belanja/edit_swakelola/'.$p['kode_rek_belanja'].'" class="btn btn-success btn-xs"><span class="fa fa-pencil"></span> Edit </a> '); 
                            ?>
                           <a href="<?php echo site_url('belanja/remove/'.$p['kode_rek_belanja']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Hapus</a>
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