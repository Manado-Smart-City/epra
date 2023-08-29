<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Pegawai</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('pejabat/add'); ?>" class="btn btn-success btn-sm">Tambah Pegawai</a>
                </div>
            </div>

            <div class="box-body no-padding">
                <table id="tabel-data" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0 ; ?>
                        <?php foreach($pejabat as $p){ ?>
                        <tr>
                            <?php $no++; ?>
                            <td align="center">
                                <?php echo $no; ?>
                            </td>
                            <td align="center">
                                <?php echo $p[ 'nip_p']; ?>
                            </td>
                            <td>
                                <?php echo '<a href="'.site_url( 'pejabat/view/'.$p[ 'nip_p']). '">'.$p[ 'nama_p']. '</a>'; ?>
                            </td>
                            <td>
                                <?php echo $p[ 'jabat_p']; ?>
                            </td>
                            <td align="center">
                                <a href="<?php echo site_url('pejabat/edit/'.$p['nip_p']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                <a href="<?php echo site_url('pejabat/remove/'.$p['nip_p']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>                    
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
