<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Edit</h3>
            </div>
			
			<?php echo form_open('belanja_swa/edit/'.$belanja_swa['kode_rek_belanja'],array("class"=>"form-horizontal")); ?>

				<div class="box-body">
					<div class="form-group">
						<label for="nama_belanja" class="col-md-4 control-label">Nama Belanja</label>
						<div class="col-md-8">
							<input type="text" name="nama_belanja" value="<?php echo ($this->input->post('nama_belanja') ? $this->input->post('nama_belanja') : $belanja_swa['nama_belanja']); ?>" class="form-control" id="nama_belanja" />
						</div>
					</div>
					<div class="form-group">
						<label for="nama_giat_swa" class="col-md-4 control-label">Nama Giat Swa</label>
						<div class="col-md-8">
							<input type="text" name="nama_giat_swa" value="<?php echo ($this->input->post('nama_giat_swa') ? $this->input->post('nama_giat_swa') : $belanja_swa['nama_giat_swa']); ?>" class="form-control" id="nama_giat_swa" />
						</div>
					</div>
					<div class="form-group">
						<label for="pagu_giat_swa" class="col-md-4 control-label">Pagu Giat Swa</label>
						<div class="col-md-8">
							<input type="text" name="pagu_giat_swa" value="<?php echo ($this->input->post('pagu_giat_swa') ? $this->input->post('pagu_giat_swa') : $belanja_swa['pagu_giat_swa']); ?>" class="form-control" id="pagu_giat_swa" />
						</div>
					</div>
					<div class="form-group">
						<label for="lokasi_giat_swa" class="col-md-4 control-label">Lokasi Giat Swa</label>
						<div class="col-md-8">
							<input type="text" name="lokasi_giat_swa" value="<?php echo ($this->input->post('lokasi_giat_swa') ? $this->input->post('lokasi_giat_swa') : $belanja_swa['lokasi_giat_swa']); ?>" class="form-control" id="lokasi_giat_swa" />
						</div>
					</div>
					<div class="form-group">
						<label for="lokasi_giat_swa_spe" class="col-md-4 control-label">Lokasi Giat Swa Spe</label>
						<div class="col-md-8">
							<input type="text" name="lokasi_giat_swa_spe" value="<?php echo ($this->input->post('lokasi_giat_swa_spe') ? $this->input->post('lokasi_giat_swa_spe') : $belanja_swa['lokasi_giat_swa_spe']); ?>" class="form-control" id="lokasi_giat_swa_spe" />
						</div>
					</div>
					<div class="form-group">
						<label for="jenis_belanja_swa" class="col-md-4 control-label">Jenis Belanja Swa</label>
						<div class="col-md-8">
							<input type="text" name="jenis_belanja_swa" value="<?php echo ($this->input->post('jenis_belanja_swa') ? $this->input->post('jenis_belanja_swa') : $belanja_swa['jenis_belanja_swa']); ?>" class="form-control" id="jenis_belanja_swa" />
						</div>
					</div>
					<div class="form-group">
						<label for="volume_belanja_swa" class="col-md-4 control-label">Volume Belanja Swa</label>
						<div class="col-md-8">
							<input type="text" name="volume_belanja_swa" value="<?php echo ($this->input->post('volume_belanja_swa') ? $this->input->post('volume_belanja_swa') : $belanja_swa['volume_belanja_swa']); ?>" class="form-control" id="volume_belanja_swa" />
						</div>
					</div>
					<div class="form-group">
						<label for="deskripsi_belanja_swa" class="col-md-4 control-label">Deskripsi Belanja Swa</label>
						<div class="col-md-8">
							<input type="text" name="deskripsi_belanja_swa" value="<?php echo ($this->input->post('deskripsi_belanja_swa') ? $this->input->post('deskripsi_belanja_swa') : $belanja_swa['deskripsi_belanja_swa']); ?>" class="form-control" id="deskripsi_belanja_swa" />
						</div>
					</div>
					<div class="form-group">
						<label for="usulan_dari" class="col-md-4 control-label">Usulan Dari</label>
						<div class="col-md-8">
							<input type="text" name="usulan_dari" value="<?php echo ($this->input->post('usulan_dari') ? $this->input->post('usulan_dari') : $belanja_swa['usulan_dari']); ?>" class="form-control" id="usulan_dari" />
						</div>
					</div>
					<div class="form-group">
						<label for="nama_pengusul" class="col-md-4 control-label">Nama Pengusul</label>
						<div class="col-md-8">
							<input type="text" name="nama_pengusul" value="<?php echo ($this->input->post('nama_pengusul') ? $this->input->post('nama_pengusul') : $belanja_swa['nama_pengusul']); ?>" class="form-control" id="nama_pengusul" />
						</div>
					</div>
					<div class="form-group">
						<label for="update_tgl" class="col-md-4 control-label">Update Tgl</label>
						<div class="col-md-8">
							<input type="text" name="update_tgl" value="<?php echo ($this->input->post('update_tgl') ? $this->input->post('update_tgl') : $belanja_swa['update_tgl']); ?>" class="form-control" id="update_tgl" />
						</div>
					</div>
					<div class="form-group">
						<label for="update_oleh" class="col-md-4 control-label">Update Oleh</label>
						<div class="col-md-8">
							<input type="text" name="update_oleh" value="<?php echo ($this->input->post('update_oleh') ? $this->input->post('update_oleh') : $belanja_swa['update_oleh']); ?>" class="form-control" id="update_oleh" />
						</div>
					</div>
				</div>

				<div class="box-footer">
                	<div class="form-group">
              			<div class="col-md-4"></div>
          				<div class="col-md-8">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Save
							</button>
						</div>
					</div>
		        </div>
				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>