<div class="row">
    <div class="col-md-12">
      <div class="box">   

        <?php //if ($jumlah_belanja > 0) { ?>
        <div class="box box-solid">
            <div class="box-header">
                <h4 class="box-title">Daftar Kegiatan Belanja Tidak Langsung</h4>
                <div class="box-tools">
                    <a href="<?php echo site_url('belanjabtl/add'); ?>" class="btn btn-success btn-sm">Tambah Belanja BTL</a>
                </div>
            </div>
            <div class="box-body">
                <table id="" class="table table-bordered table-striped tabel-data-limited"> 
                    <thead>
                        <tr>
                            <th width="10px">No.</th>                            
                            <th width="150px">Kode Rekening</th>
                            <th>Nama Belanja</th>
                            <th width="100px">Pagu (Rp.)</th>
                            <th width="100px">Aksi</th>
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
                           <a href="<?php echo site_url('belanjabtl/remove/'.$p['kode_rek_belanja']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total Belanja Tidak Langsung</th>                            
                            <th width="100px" style="text-align: right; padding-right: 10px;"><strong><? echo number_format($total_belanja); ?></strong></th>
                            <th width="100px"></th>
                        </tr>                        
                    </tfoot>
                </table>
            </div>
        </div>
        <?php //} ?>

      </div>
    </div>
</div>