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
		<?php echo form_open_multipart('kegiatan/add/'.$kode_prog,array("class"=>"form-horizontal")); ?>
		<div class="box">
	   		<div class='box-header with-border'>
            <label class="control-label"><i class="fa fa-cube"></i> Program: <?php echo $program['nama_prog']; ?></label>
            <div class="box-tools">
                <a href="<?php echo site_url('program/index');?>" class="btn btn-primary btn-sm">Kembali ke Daftar Program</a>
            </div>            
            <br><br>

	      		<h4 class="box-title">Tambah Sub Kegiatan Belanja Daerah</h4>
	      </div><!-- /.box-header -->
	      <div class='box-body'>

            <div class="form-group">
                 <label for="kode_giat" class="col-md-2 control-label">Kode Sub Kegiatan</label>
                 <div class="col-md-5">
                     <input type="text" name="kode_giat" value="<?php echo $this->input->post('kode_giat'); ?>" class="form-control" id="kode_giat" placeholder="Wajib diisi dengan kode yang unik sesuai DPA" />
                     <?php echo form_error('kode_giat'); ?>
                 </div>
            </div>

	        	<div class="form-group">
				         <label for="nama_giat" class="col-md-2 control-label">Nama Sub Kegiatan</label>
				         <div class="col-md-10">
					           <input type="text" name="nama_giat" value="<?php echo $this->input->post('nama_giat'); ?>" class="form-control" id="nama_giat" placeholder="Wajib diisi"/>
                     <?php echo form_error('nama_giat'); ?>
			           </div>
				    </div>

            <div class="form-group">
                 <label for="nip_pptk" class="col-md-2 control-label">PPTK</label>
                 <div class="col-md-7">
                      <?php 
                          $pilihan_nip_pptk[''] =  'Klik disini dan ketikkan NIP atau nama pejabat...';
                          foreach ($pejabat as $q) {
                            $pilihan_nip_pptk[$q['nip_p']] =  'NIP: '.$q['nip_p'].', Nama: '.$q['nama_p'];
                          }                                  
                          echo form_dropdown('nip_pptk', $pilihan_nip_pptk,[],'class="js-example-basic-single" style="width: 100%;"');
                      ?>
                     <?php echo form_error('nip_pp'); ?>
                 </div>
            </div>

            <div class="form-group">
              <label for="sumber_dana" class="col-md-2 control-label">Sumber Dana</label>
              <div class="col-md-3">
                <?php 
                    $pilihan_sumber_dana = array('APBD' => 'APBD', 
                                                 'APBD-P' => 'APBD-P', 
                                                 'APBN' => 'APBN', 
                                                 'DAK (Di-APBD-kan)' => 'DAK (Di-APBD-kan)',
                                                 'Dekon/Tugas Pembantuan' );
                    echo form_dropdown('sumber_dana', $pilihan_sumber_dana,'','class="form-control"'); 
                ?>
              </div>
            </div>


			  </div><!-- /.box-body -->
		</div><!-- /.box -->

  	<div class="form-group">
			<div class="col-md-8"></div>
			<div class="col-md-2">
      	<button type="button" class="btn btn-default">
      		<a href="<?php echo site_url('kegiatan/index/'.$kode_prog);?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
      	</button>
      </div>
			<div class="col-md-2">
        <input type="hidden" name="kode_prog" value="<?php echo $kode_prog; ?>">
      	<button type="submit" class="btn btn-success">
      		<i class="fa fa-check"></i> Simpan
      	</button>
       </div>
  	</div>


        <?php echo form_close(); ?>
    </div>
</div>
