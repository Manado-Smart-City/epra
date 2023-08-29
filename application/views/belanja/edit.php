<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Edit</h3>
            </div>
			
			<?php echo form_open('belanja_peny/edit/'.$belanja_peny['kode_rek_belanja'],array("class"=>"form-horizontal")); ?>

				<div class="box-body">
					<div class="form-group">
						<label for="nama_belanja" class="col-md-4 control-label">Nama Belanja</label>
						<div class="col-md-8">
							<input type="text" name="nama_belanja" value="<?php echo ($this->input->post('nama_belanja') ? $this->input->post('nama_belanja') : $belanja_peny['nama_belanja']); ?>" class="form-control" id="nama_belanja" />
						</div>
					</div>
					<div class="form-group">
						<label for="nama_paket_pengadaan" class="col-md-4 control-label">Nama Paket Pengadaan</label>
						<div class="col-md-8">
							<input type="text" name="nama_paket_pengadaan" value="<?php echo ($this->input->post('nama_paket_pengadaan') ? $this->input->post('nama_paket_pengadaan') : $belanja_peny['nama_paket_pengadaan']); ?>" class="form-control" id="nama_paket_pengadaan" />
						</div>
					</div>
					<div class="form-group">
						<label for="pagu_giat_peny" class="col-md-4 control-label">Pagu Giat Peny</label>
						<div class="col-md-8">
							<input type="text" name="pagu_giat_peny" value="<?php echo ($this->input->post('pagu_giat_peny') ? $this->input->post('pagu_giat_peny') : $belanja_peny['pagu_giat_peny']); ?>" class="form-control" id="pagu_giat_peny" />
						</div>
					</div>
					<div class="form-group">
						<label for="lokasi_giat_peny" class="col-md-4 control-label">Lokasi Giat Peny</label>
						<div class="col-md-8">
							<input type="text" name="lokasi_giat_peny" value="<?php echo ($this->input->post('lokasi_giat_peny') ? $this->input->post('lokasi_giat_peny') : $belanja_peny['lokasi_giat_peny']); ?>" class="form-control" id="lokasi_giat_peny" />
						</div>
					</div>
					<div class="form-group">
						<label for="lokasi_giat_peny_spe" class="col-md-4 control-label">Lokasi Giat Peny Spe</label>
						<div class="col-md-8">
							<input type="text" name="lokasi_giat_peny_spe" value="<?php echo ($this->input->post('lokasi_giat_peny_spe') ? $this->input->post('lokasi_giat_peny_spe') : $belanja_peny['lokasi_giat_peny_spe']); ?>" class="form-control" id="lokasi_giat_peny_spe" />
						</div>
					</div>
					<div class="form-group">
						<label for="usulan_dari" class="col-md-4 control-label">Usulan Dari</label>
						<div class="col-md-8">
							<input type="text" name="usulan_dari" value="<?php echo ($this->input->post('usulan_dari') ? $this->input->post('usulan_dari') : $belanja_peny['usulan_dari']); ?>" class="form-control" id="usulan_dari" />
						</div>
					</div>
					<div class="form-group">
						<label for="nama_pengusul" class="col-md-4 control-label">Nama Pengusul</label>
						<div class="col-md-8">
							<input type="text" name="nama_pengusul" value="<?php echo ($this->input->post('nama_pengusul') ? $this->input->post('nama_pengusul') : $belanja_peny['nama_pengusul']); ?>" class="form-control" id="nama_pengusul" />
						</div>
					</div>
					<div class="form-group">
						<label for="file_dokumen_kak" class="col-md-4 control-label">File Dokumen Kak</label>
						<div class="col-md-8">
							<input type="text" name="file_dokumen_kak" value="<?php echo ($this->input->post('file_dokumen_kak') ? $this->input->post('file_dokumen_kak') : $belanja_peny['file_dokumen_kak']); ?>" class="form-control" id="file_dokumen_kak" />
						</div>
					</div>
					<div class="form-group">
						<label for="nip_ppk" class="col-md-4 control-label">Nip Ppk</label>
						<div class="col-md-8">
							<input type="text" name="nip_ppk" value="<?php echo ($this->input->post('nip_ppk') ? $this->input->post('nip_ppk') : $belanja_peny['nip_ppk']); ?>" class="form-control" id="nip_ppk" />
						</div>
					</div>
					<div class="form-group">
						<label for="nip_pp" class="col-md-4 control-label">Nip Pp</label>
						<div class="col-md-8">
							<input type="text" name="nip_pp" value="<?php echo ($this->input->post('nip_pp') ? $this->input->post('nip_pp') : $belanja_peny['nip_pp']); ?>" class="form-control" id="nip_pp" />
						</div>
					</div>
					<div class="form-group">
						<label for="jenis_pengadaan" class="col-md-4 control-label">Jenis Pengadaan</label>
						<div class="col-md-8">
							<input type="text" name="jenis_pengadaan" value="<?php echo ($this->input->post('jenis_pengadaan') ? $this->input->post('jenis_pengadaan') : $belanja_peny['jenis_pengadaan']); ?>" class="form-control" id="jenis_pengadaan" />
						</div>
					</div>
					<div class="form-group">
						<label for="metode_pemilihan_peny" class="col-md-4 control-label">Metode Pemilihan Peny</label>
						<div class="col-md-8">
							<input type="text" name="metode_pemilihan_peny" value="<?php echo ($this->input->post('metode_pemilihan_peny') ? $this->input->post('metode_pemilihan_peny') : $belanja_peny['metode_pemilihan_peny']); ?>" class="form-control" id="metode_pemilihan_peny" />
						</div>
					</div>
					<div class="form-group">
						<label for="jenis_belanja_peny" class="col-md-4 control-label">Jenis Belanja Peny</label>
						<div class="col-md-8">
							<input type="text" name="jenis_belanja_peny" value="<?php echo ($this->input->post('jenis_belanja_peny') ? $this->input->post('jenis_belanja_peny') : $belanja_peny['jenis_belanja_peny']); ?>" class="form-control" id="jenis_belanja_peny" />
						</div>
					</div>
					<div class="form-group">
						<label for="volume_belanja_swa" class="col-md-4 control-label">Volume Belanja Swa</label>
						<div class="col-md-8">
							<input type="text" name="volume_belanja_swa" value="<?php echo ($this->input->post('volume_belanja_swa') ? $this->input->post('volume_belanja_swa') : $belanja_peny['volume_belanja_swa']); ?>" class="form-control" id="volume_belanja_swa" />
						</div>
					</div>
					<div class="form-group">
						<label for="deskripsi_belanja_swa" class="col-md-4 control-label">Deskripsi Belanja Swa</label>
						<div class="col-md-8">
							<input type="text" name="deskripsi_belanja_swa" value="<?php echo ($this->input->post('deskripsi_belanja_swa') ? $this->input->post('deskripsi_belanja_swa') : $belanja_peny['deskripsi_belanja_swa']); ?>" class="form-control" id="deskripsi_belanja_swa" />
						</div>
					</div>
					<div class="form-group">
						<label for="update_tgl" class="col-md-4 control-label">Update Tgl</label>
						<div class="col-md-8">
							<input type="text" name="update_tgl" value="<?php echo ($this->input->post('update_tgl') ? $this->input->post('update_tgl') : $belanja_peny['update_tgl']); ?>" class="form-control" id="update_tgl" />
						</div>
					</div>
					<div class="form-group">
						<label for="update_oleh" class="col-md-4 control-label">Update Oleh</label>
						<div class="col-md-8">
							<input type="text" name="update_oleh" value="<?php echo ($this->input->post('update_oleh') ? $this->input->post('update_oleh') : $belanja_peny['update_oleh']); ?>" class="form-control" id="update_oleh" />
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