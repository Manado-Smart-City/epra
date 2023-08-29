<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-solid">    
                <div class="box-header">
                    <h3 class="box-title">Daftar Program</h3>
                    <div class="box-tools">
                        <a href="<?php echo site_url('program/add'); ?>" class="btn btn-success btn-sm">Tambah Program</a>
                    </div>
                </div>


                <div class="box-body">
                    <table id="" class="table table-striped table-bordered tabel-data">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="100px">Kode Program</th>
                                <th>Nama Program</th>
                                <th width="50px">Jumlah Sub-Kegiatan</th>
                                <th width="50px">Pagu (Rp.)</th>
                                <th width="175px">Aksi</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php $no=0 ; ?>
                            <?php foreach($program as $p){ ?>
                            <tr>
                                <?php $no++; ?>
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td align="center">
                                    <?php echo $p[ 'kode_prog']; ?>
                                </td>
                                <td>
                                    <?php echo '<a href="'.site_url( 'program/view/'.$p[ 'kode_prog']). '">'.$p[ 'nama_prog']. '</a>'; ?>
                                </td>
                                <td align="center">
                                    <?php echo $p[ 'jlh_giat']; ?>
                                </td>
                                <td align="right">
                                    <?php echo number_format($p['pagu_total']); ?>
                                </td>                            
                                <td align="center">
                                    <a href="<?php echo site_url('program/edit/'.$p['kode_prog']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                    <a href="<?php echo site_url('program/remove/'.$p['kode_prog']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Hapus</a>
                                    <a href="<?php echo site_url('kegiatan/index/'.$p['kode_prog']); ?>" class="btn btn-success btn-xs"><span class="fa fa-cubes"></span> Sub-Kegiatan</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total Pagu (Rp.)</th>
                                <th width="100px" style="text-align: right; padding-right: 10px;"><strong><? echo number_format($total_program); ?></strong></th>
                                <th width="100px"></th>
                            </tr>                        
                        </tfoot>                        
                    </table>
                    <br><br>
                </div>
            </div>    
        </div>
    </div>
</div>
