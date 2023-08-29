<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listing</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('pptk/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>Nip Pptk</th>
						<th>Nama Pptk</th>
						<th>Kode Pd</th>
						<th>Jabat Pptk</th>
						<th>Foto Pptk</th>
						<th>Update Tgl</th>
						<th>Update Oleh</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($pptk as $p){ ?>
                    <tr>
						<td><?php echo $p['nip_pptk']; ?></td>
						<td><?php echo $p['nama_pptk']; ?></td>
						<td><?php echo $p['kode_pd']; ?></td>
						<td><?php echo $p['jabat_pptk']; ?></td>
						<td><?php echo $p['foto_pptk']; ?></td>
						<td><?php echo $p['update_tgl']; ?></td>
						<td><?php echo $p['update_oleh']; ?></td>
						<td>
                            <a href="<?php echo site_url('pptk/edit/'.$p['nip_pptk']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('pptk/remove/'.$p['nip_pptk']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
