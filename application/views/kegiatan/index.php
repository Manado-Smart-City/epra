<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box box-solid">
            <div class="box-header">
                <label class="control-label"><i class="fa fa-cube"></i> Program: <i><?php echo $program['nama_prog']; ?></i></label>
                <div class="box-tools">
                    <a href="<?php echo site_url('program/index');?>" class="btn btn-primary btn-sm">Kembali ke Daftar Program</a>
                </div>
            </div>

            <div class="box box-solid">
                <div class="box-header">
                    <h4 class="box-title">Daftar Sub Kegiatan Belanja Daerah</h4>
                    <div class="box-tools">
                        <a href="<?php echo site_url('kegiatan/add/'.$program['kode_prog']); ?>" class="btn btn-success btn-sm"> Tambah Sub Kegiatan</a>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped <?php echo ($jumlah_kegiatan < 11 ? 'tabel-data-limited' : 'tabel-data');?>">
                        <thead>
                            <tr>
                                <th width="10px">No.</th>
                                <th width="100px">Kode Sub Kegiatan</th>
                                <th>Nama Sub Kegiatan</th>
                                <th width="50px">Jumlah Belanja</th>
                                <th width="50px">Pagu (Rp.)</th>
                                <th width="170px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0 ; ?>
                            <?php foreach($kegiatan as $p){ ?>
                            <tr>
                                <?php $no++; ?>
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td align="center">
                                    <?php echo $p[ 'kode_giat']; ?>
                                </td>
                                <td>
                                    <?php echo '<a href="'.site_url( 'kegiatan/view/'.$p[ 'kode_giat']). '">'.$p[ 'nama_giat']. '</a>'; ?>
                                </td>
                                <td align="center">
                                    <?php echo $p['jlh_belanja']; ?>
                                </td>                            
                                <td align="right">
                                    <?php echo number_format($p['pagu_total']); ?>
                                </td>
                                <td align="center">
                                    <a href="<?php echo site_url('kegiatan/edit/'.$p['kode_giat']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                    <a href="<?php echo site_url('kegiatan/remove/'.$p['kode_giat']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Hapus</a>
                                    <a href="<?php echo site_url('belanja/index/'.$p['kode_giat']); ?>" class="btn btn-success btn-xs"><span class="fa fa-money"></span> Belanja</a>
                                    </td>
                            </tr>
                            <?php } ?>
                        </tbody>    
                        <tfoot>
                            <tr>
                                <th colspan="4">Total Pagu (Rp.)</th>
                                <th width="100px" style="text-align: right; padding-right: 10px;"><strong><? echo number_format($total_kegiatan); ?></strong></th>
                                <th width="100px"></th>
                            </tr>                        
                        </tfoot>                          
                    </table><br><br>
                </div>
            </div>
         </div>   
      </div>
    </div>
</div>
