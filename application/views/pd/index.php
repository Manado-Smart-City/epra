<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Perangkat Daerah</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('pd/add'); ?>" class="btn btn-success btn-sm">Tambah Perangkat Daerah</a>
                </div>
            </div>

            <div class="box-body no-padding">
                <table id="tabel-data-full" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th>Kode PD.</th>
                            <th>Nama Perangkat Daerah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=0 ; ?>
                    <?php foreach($pd as $p){ ?>
                    <tr>
                        <?php $no++; ?>
                        <td style="text-align: center;">
                            <?php echo $no; ?>
                        </td>
                        <td style="text-align: center;">
                            <?php echo $p[ 'kode_pd']; ?>
                        </td>
                        <td>
                            <?php echo '<a href="'.site_url( 'pd/view/'.$p[ 'kode_pd']). '">'.$p[ 'nama_pd']. '</a>'; ?>
                        </td>
                        <td style="text-align: center;">
                            <a href="<?php echo site_url('pd/edit/'.$p['kode_pd']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="<?php echo site_url('pd/remove/'.$p['kode_pd']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table><br>
            </div>
        </div>
    </div>
</div> 
