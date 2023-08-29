<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Program</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('program/add'); ?>" class="btn btn-success btn-sm">Tambah</a>
                </div>
            </div>

            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Kode Program</th>
                        <th>Nama Program</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no=0 ; ?>
                    <?php foreach($program as $p){ ?>
                    <tr>
                        <?php $no++; ?>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?php echo $p[ 'kode_prog']; ?>
                        </td>
                        <td>
                            <?php echo '<a href="'.site_url( 'program/view/'.$p[ 'kode_prog']). '">'.$p[ 'nama_prog']. '</a>'; ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('program/edit/'.$p['kode_prog']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="<?php echo site_url('program/remove/'.$p['kode_prog']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
