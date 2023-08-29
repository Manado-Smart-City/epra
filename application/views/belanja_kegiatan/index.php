<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
            <label class="control-label"><i class="fa fa-cube"></i> Program: <?php echo $program['nama_prog']; ?></label>
            <div class="box-tools">
                <a href="<?php echo site_url('belanja/index');?>" class="btn btn-primary btn-sm">Kembali ke Daftar Program</a>
            </div>
        </div>

        <div class="box box-solid">
            <div class="box-header">
                <h4 class="box-title">Pilihan Kegiatan...</h4>
            </div>

            <div class="box-body no-padding">
                <table class="table table-bordered table-striped" id=<?php echo ($jumlah_kegiatan < 11 ? '"tabel-data-limited"' : '"tabel-data"');?>><thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Kegiatan</th>
                        <th>Nama Kegiatan</th>
                        <th>Pagu (Rp.)</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=0 ; ?>
                    <?php foreach($kegiatan as $p){ ?>
                    <tr>
                        <?php $no++; ?>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?php echo $p[ 'kode_giat']; ?>
                        </td>
                        <td>
                            <?php echo $p[ 'nama_giat']; ?>
                        </td>
                        <td>
                            <?php echo number_format($p['pagu_giat']); ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('belanja/index3/'.$p['kode_giat']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Daftar Belanja Swakelola dan Pengadaan</a>

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
