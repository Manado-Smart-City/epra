<div class="row">
    <div class="col-md-12">
      <?php
        // Jika ada pesan sukses/kesalahan
        if (isset($success)){
          if ($success){
            echo '<div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Sukses!</h4>'.$message.
                 '</div>';
          } else {
            echo '<div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Terjadi kesalahan!</h4>'.$message.
                 '</div>';
          }
        }
       ?>
		<?php echo form_open_multipart('belanja/add_swakelola/'.$kode_giat,array("class"=>"form-horizontal")); ?>
		<div class="box">
	   		<div class='box-header with-border'>
	      		<h4 class="box-title">Tambah Kegiatan Swakelola</h4>
	      </div><!-- /.box-header -->
	      <div class='box-body'>

	        	<div class="form-group">
				         <label for="nama_giat_swa" class="col-md-2 control-label">Nama Kegiatan Swakelola</label>
				         <div class="col-md-10">
					           <input type="text" name="nama_giat_swa" value="<?php echo $this->input->post('nama_giat_swa'); ?>" class="form-control" id="nama_giat_swa" placeholder="Wajib diisi"/>
                     <?php echo form_error('nama_giat_swa'); ?>
			           </div>
				    </div>

				    <div class="form-group">
					       <label for="kode_rek_belanja" class="col-md-2 control-label">Kode Rekening Belanja</label>
					       <div class="col-md-5">
						         <input type="text" name="kode_rek_belanja" value="<?php echo $this->input->post('kode_rek_belanja'); ?>" class="form-control" id="kode_rek_belanja" placeholder="Wajib diisi sesuai kode rekening terakhir/paling rinci di DPA" />
                     <?php echo form_error('kode_rek_belanja'); ?>
					       </div>
				    </div>

            <div class="form-group">
					       <label for="pagu_giat" class="col-md-2 control-label">Pagu</label>
					       <div class="col-md-5">
                    <div class="input-group">
                       <span class="input-group-addon">Rp.</span>                   
  						         <input type="text" name="pagu_giat" value="<?php echo $this->input->post('pagu_giat'); ?>" class="form-control" id="pagu_giat" placeholder="" />
                       <?php echo form_error('pagu_giat'); ?>
                    </div>
					       </div>
				    </div>

            <div class="form-group">
                 <label for="lokasi_giat" class="col-md-2 control-label">Lokasi</label>
                 <div class="col-md-10">
                     <input type="text" name="lokasi_giat" value="<?php echo $this->input->post('lokasi_giat'); ?>" class="form-control" id="lokasi_giat" placeholder="" />
                     <?php echo form_error('lokasi_giat'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="lokasi_spesifik" class="col-md-2 control-label">Lokasi Spesifik</label>
                 <div class="col-md-10">
                     <input type="text" name="lokasi_spesifik" value="<?php echo $this->input->post('lokasi_spesifik'); ?>" class="form-control" id="lokasi_spesifik" placeholder="" />
                     <?php echo form_error('lokasi_spesifik'); ?>
                 </div>
            </div>

            <div class="form-group">
              <label for="jenis_belanja" class="col-md-2 control-label">Jenis Belanja</label>
              <div class="col-md-5">
                <?php 
                    $pilihan_jenis_belanja = array('Belanja Barang/Jasa' => 'Belanja Barang/Jasa', 
                                                 'Belanja Pegawai' => 'Belanja Pegawai', 
                                                 'Belanja Modal' => 'Belanja Modal', );
                    echo form_dropdown('jenis_belanja', $pilihan_jenis_belanja,'','class="form-control"'); 
                ?>
              </div>
            </div>           

            <div class="form-group">
                 <label for="volume_belanja" class="col-md-2 control-label">Volume Belanja</label>
                 <div class="col-md-5">
                     <input type="text" name="volume_belanja" value="<?php echo $this->input->post('volume_belanja'); ?>" class="form-control" id="volume_belanja" placeholder="" />
                     <?php echo form_error('volume_belanja'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="deskripsi_belanja" class="col-md-2 control-label">Deskripsi Belanja</label>
                 <div class="col-md-10">
                     <input type="text" name="deskripsi_belanja" value="<?php echo $this->input->post('deskripsi_belanja'); ?>" class="form-control" id="deskripsi_belanja" placeholder="" />
                     <?php echo form_error('deskripsi_belanja'); ?>
                 </div>
            </div>

            <div class="form-group">
              <label for="file_dokumen_kak" class="col-md-2 control-label">Dokumen KAK/TOR</label>
              <div class="col-md-5">
                <input type="file" name="file_dokumen_kak" value="<?php echo $this->input->post('file_dokumen_kak'); ?>" class="form-control" id="file_dokumen_kak" />
                <p class="help-block">File dokumen harus dalam format DOC atau PDF</p>
              </div>
            </div>            

            <div class="form-group">
              <label for="usulan_dari" class="col-md-2 control-label">Usulan Kegiatan dari</label>
              <div class="col-md-5">
                <?php 
                    $pilihan_usulan_dari = array('Musrenbang' => 'Musrenbang', 
                                                 'DPRD' => 'DPRD', 
                                                 'Provinsi' => 'Provinsi', 
                                                 'Pemkot' => 'Pemkot', 
                                                 'PD ybs' => 'PD ybs', 
                                                 'Lain-lain' => 'Lain-lain', );
                    echo form_dropdown('usulan_dari', $pilihan_usulan_dari,'','class="form-control"'); 
                ?>
              </div>
            </div>

			  </div><!-- /.box-body -->
		</div><!-- /.box -->

  	<div class="form-group">
			<div class="col-md-8"></div>
			<div class="col-md-2">
      	<button type="button" class="btn btn-default">
      		<a href="<?php echo site_url('belanja/index3/'.$kode_giat);?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
      	</button>
      </div>
			<div class="col-md-2">
        <input type="hidden" name="kode_giat" value="<?php echo $kode_giat; ?>">
      	<button type="submit" class="btn btn-success">
      		<i class="fa fa-check"></i> Simpan
      	</button>
       </div>
  	</div>


        <?php echo form_close(); ?>
    </div>
</div>
