<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listing</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('kegiatan/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>Kode Giat</th>
						<th>Nama Giat</th>
						<th>Kode Prog</th>
						<th>Nip Pptk</th>
						<th>Pagu Giat</th>
						<th>Tahun Giat</th>
						<th>Tf 1</th>
						<th>Tf 2</th>
						<th>Tf 3</th>
						<th>Tf 4</th>
						<th>Tf 5</th>
						<th>Tf 6</th>
						<th>Tf 7</th>
						<th>Tf 8</th>
						<th>Tf 9</th>
						<th>Tf 10</th>
						<th>Tf 11</th>
						<th>Tf 12</th>
						<th>Rf 1</th>
						<th>Rf 2</th>
						<th>Rf 3</th>
						<th>Rf 4</th>
						<th>Rf 5</th>
						<th>Rf 6</th>
						<th>Rf 7</th>
						<th>Rf 8</th>
						<th>Rf 9</th>
						<th>Rf 10</th>
						<th>Rf 11</th>
						<th>Rf 12</th>
						<th>Tk 1</th>
						<th>Tk 2</th>
						<th>Tk 3</th>
						<th>Tk 4</th>
						<th>Tk 5</th>
						<th>Tk 6</th>
						<th>Tk 7</th>
						<th>Tk 8</th>
						<th>Tk 9</th>
						<th>Tk 10</th>
						<th>Tk 11</th>
						<th>Tk 12</th>
						<th>Rk 1</th>
						<th>Rk 2</th>
						<th>Rk 3</th>
						<th>Rk 4</th>
						<th>Rk 5</th>
						<th>Rk 6</th>
						<th>Rk 7</th>
						<th>Rk 8</th>
						<th>Rk 9</th>
						<th>Rk 10</th>
						<th>Rk 11</th>
						<th>Rk 12</th>
						<th>Update Tgl</th>
						<th>Update Oleh</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($kegiatan as $k){ ?>
                    <tr>
						<td><?php echo $k['kode_giat']; ?></td>
						<td><?php echo $k['nama_giat']; ?></td>
						<td><?php echo $k['kode_prog']; ?></td>
						<td><?php echo $k['nip_pptk']; ?></td>
						<td><?php echo $k['pagu_giat']; ?></td>
						<td><?php echo $k['tahun_giat']; ?></td>
						<td><?php echo $k['tf_1']; ?></td>
						<td><?php echo $k['tf_2']; ?></td>
						<td><?php echo $k['tf_3']; ?></td>
						<td><?php echo $k['tf_4']; ?></td>
						<td><?php echo $k['tf_5']; ?></td>
						<td><?php echo $k['tf_6']; ?></td>
						<td><?php echo $k['tf_7']; ?></td>
						<td><?php echo $k['tf_8']; ?></td>
						<td><?php echo $k['tf_9']; ?></td>
						<td><?php echo $k['tf_10']; ?></td>
						<td><?php echo $k['tf_11']; ?></td>
						<td><?php echo $k['tf_12']; ?></td>
						<td><?php echo $k['rf_1']; ?></td>
						<td><?php echo $k['rf_2']; ?></td>
						<td><?php echo $k['rf_3']; ?></td>
						<td><?php echo $k['rf_4']; ?></td>
						<td><?php echo $k['rf_5']; ?></td>
						<td><?php echo $k['rf_6']; ?></td>
						<td><?php echo $k['rf_7']; ?></td>
						<td><?php echo $k['rf_8']; ?></td>
						<td><?php echo $k['rf_9']; ?></td>
						<td><?php echo $k['rf_10']; ?></td>
						<td><?php echo $k['rf_11']; ?></td>
						<td><?php echo $k['rf_12']; ?></td>
						<td><?php echo $k['tk_1']; ?></td>
						<td><?php echo $k['tk_2']; ?></td>
						<td><?php echo $k['tk_3']; ?></td>
						<td><?php echo $k['tk_4']; ?></td>
						<td><?php echo $k['tk_5']; ?></td>
						<td><?php echo $k['tk_6']; ?></td>
						<td><?php echo $k['tk_7']; ?></td>
						<td><?php echo $k['tk_8']; ?></td>
						<td><?php echo $k['tk_9']; ?></td>
						<td><?php echo $k['tk_10']; ?></td>
						<td><?php echo $k['tk_11']; ?></td>
						<td><?php echo $k['tk_12']; ?></td>
						<td><?php echo $k['rk_1']; ?></td>
						<td><?php echo $k['rk_2']; ?></td>
						<td><?php echo $k['rk_3']; ?></td>
						<td><?php echo $k['rk_4']; ?></td>
						<td><?php echo $k['rk_5']; ?></td>
						<td><?php echo $k['rk_6']; ?></td>
						<td><?php echo $k['rk_7']; ?></td>
						<td><?php echo $k['rk_8']; ?></td>
						<td><?php echo $k['rk_9']; ?></td>
						<td><?php echo $k['rk_10']; ?></td>
						<td><?php echo $k['rk_11']; ?></td>
						<td><?php echo $k['rk_12']; ?></td>
						<td><?php echo $k['update_tgl']; ?></td>
						<td><?php echo $k['update_oleh']; ?></td>
						<td>
                            <a href="<?php echo site_url('kegiatan/edit/'.$k['kode_giat']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kegiatan/remove/'.$k['kode_giat']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
