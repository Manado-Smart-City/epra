<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Pengumuman</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('pengumuman/add'); ?>" class="btn btn-success btn-sm">Tambah</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered tabel-data">
                    <thead>
                    <tr>
						<th>No.</th>
						<th>Judul Pengumuman</th>
                        <th>Tgl. Buat/Update</th>
						<th>Aksi</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; ?>
                    <?php foreach($pengumuman as $d){ ?>
                    <tr>
                        <td align="center"><?php echo $no+1; $no++;?></td>
						<td align='left'><?php echo $d['judul']; ?></td>
                        <td align='center'>
                        <?php 
                            $fromMYSQL = $d['update_tgl'];
                            $hari_indo = array(
                                "Mon" => "Senin",
                                "Tue" => "Selasa",
                                "Wed" => "Rabu",
                                "Thu" => "Kamis",
                                "Fri" => "Jumat",
                                "Sat" => "Sabtu",
                                "Sun" => "Minggu",
                            );
                            $hari = $hari_indo[date("D", strtotime($fromMYSQL))];
                            echo $hari.", ".date("d/m/Y, H:i:s", strtotime($fromMYSQL));
                        ?>
                        </td>        
                        <td align="center">
                          <a href="<?php echo site_url('pengumuman/view/'.$d['id_pengumuman']); ?>" class="btn btn-info btn-xs"><span class="fa fa-eye"></span> Tampil</a> 
                          <a href="<?php echo site_url('pengumuman/edit/'.$d['id_pengumuman']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                          <a href="<?php echo site_url('pengumuman/remove/'.$d['id_pengumuman']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
