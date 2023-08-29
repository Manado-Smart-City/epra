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
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Edit Belanja Tidak Langsung</h3>
            </div>
			
			<?php echo form_open('belanjabtl/edit/'.$belanja['kode_rek_belanja'],array("class"=>"form-horizontal")); ?>

				<div class="box-body">

					<div class="form-group">
						<label for="kode_rek_belanja" class="col-md-2 control-label">Kode Rekening</label>
						<div class="col-md-5">
							<input type="text" name="kode_rek_belanja" value="<?php echo ($this->input->post('kode_rek_belanja') ? $this->input->post('kode_rek_belanja') : $belanja['kode_rek_belanja']); ?>" class="form-control" id="kode_rek_belanja" readonly />
						</div>
					</div>

					<div class="form-group">
						<label for="nama_belanja" class="col-md-2 control-label">Nama Belanja</label>
						<div class="col-md-10">
							<input type="text" name="nama_belanja" value="<?php echo ($this->input->post('nama_belanja') ? $this->input->post('nama_belanja') : $belanja['nama_belanja']); ?>" class="form-control" id="nama_belanja" />
						</div>
					</div>

					<div class="form-group">
						<label for="pagu_giat" class="col-md-2 control-label">Pagu (Rp.)</label>
						<div class="col-md-5">
							<input type="text" name="pagu_giat" value="<?php echo ($this->input->post('pagu_giat') ? $this->input->post('pagu_giat') : $belanja['pagu_giat']); ?>" class="form-control" id="pagu_giat" />
						</div>
					</div>


				<div class="box-footer">
                	<div class="form-group">
              			<div class="col-md-8"></div>
					      <div class="col-md-2">
					        <button type="button" class="btn btn-default">
					          <a href="<?php echo site_url('belanjabtl/index/'); ?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
					        </button>
					      </div>              			
          				<div class="col-md-2" align="right">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Simpan
							</button>
						</div>
					</div>
		        </div>
				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>