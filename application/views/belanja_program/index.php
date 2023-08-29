<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pilihan Program...</h3>
            </div>

            <div class="box-body no-padding">
                <table class="table table-bordered table-striped" id=<?php echo ($jumlah_program < 11 ? '"tabel-data-limited"' : '"tabel-data"');?>>
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Program</th>
                        <th>Nama Program</th>
                        <th>Jumlah Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
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
                            <?php echo $p[ 'nama_prog']; ?>
                        </td>
                        <td>
                            <?php echo $p[ 'jlh_giat']; ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('belanja/index2/'.$p['kode_prog']); ?>" class="btn btn-success btn-xs"><span class="fa fa-cubes"></span> Lihat Daftar Kegiatan</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
