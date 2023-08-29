<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listing</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('belanja_swa/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>Kode Rek Belanja</th>
						<th>Nama Belanja</th>
						<th>Nama Giat Swa</th>
						<th>Pagu Giat Swa</th>
						<th>Lokasi Giat Swa</th>
						<th>Lokasi Giat Swa Spe</th>
						<th>Jenis Belanja Swa</th>
						<th>Volume Belanja Swa</th>
						<th>Deskripsi Belanja Swa</th>
						<th>Usulan Dari</th>
						<th>Nama Pengusul</th>
						<th>Update Tgl</th>
						<th>Update Oleh</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($belanja_swa as $b){ ?>
                    <tr>
						<td><?php echo $b['kode_rek_belanja']; ?></td>
						<td><?php echo $b['nama_belanja']; ?></td>
						<td><?php echo $b['nama_giat_swa']; ?></td>
						<td><?php echo $b['pagu_giat_swa']; ?></td>
						<td><?php echo $b['lokasi_giat_swa']; ?></td>
						<td><?php echo $b['lokasi_giat_swa_spe']; ?></td>
						<td><?php echo $b['jenis_belanja_swa']; ?></td>
						<td><?php echo $b['volume_belanja_swa']; ?></td>
						<td><?php echo $b['deskripsi_belanja_swa']; ?></td>
						<td><?php echo $b['usulan_dari']; ?></td>
						<td><?php echo $b['nama_pengusul']; ?></td>
						<td><?php echo $b['update_tgl']; ?></td>
						<td><?php echo $b['update_oleh']; ?></td>
						<td>
                            <a href="<?php echo site_url('belanja_swa/edit/'.$b['kode_rek_belanja']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('belanja_swa/remove/'.$b['kode_rek_belanja']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
