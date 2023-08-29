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
		<?php echo form_open_multipart('pd/edit/'.$pd['kode_pd'],array("class"=>"form-horizontal")); ?>
		<div class="box">
	   		<div class='box-header with-border'>
	      		<h4 class="box-title">Perangkat Daerah</h4>
	      </div><!-- /.box-header -->
	      <div class='box-body'>
				    <div class="form-group">
					       <label for="kode_pd" class="col-md-2 control-label">Kode PD.</label>
					       <div class="col-md-5">
						         <input type="text" name="kode_pd" value="<?php echo ($this->input->post('kode_pd') ? $this->input->post('kode_pd') : $pd['kode_pd']); ?>" class="form-control" id="kode_pd" placeholder="Wajib diisi dan kode harus unik" disabled/>
					       </div>
				    </div>	      	
	        		<div class="form-group">	        		
				         <label for="nama_pd" class="col-md-2 control-label">Nama PD.</label>
				         <div class="col-md-10">
					           <input type="text" name="nama_pd" value="<?php echo ($this->input->post('nama_pd') ? $this->input->post('nama_pd') : $pd['nama_pd']); ?>" class="form-control" id="nama_pd" placeholder="Wajib diisi"/>
			           </div>
				    </div>
	        		<div class="form-group">	        		
				         <label for="alamat_pd" class="col-md-2 control-label">Alamat PD.</label>
				         <div class="col-md-10">
					           <input type="text" name="alamat_pd" value="<?php echo ($this->input->post('alamat_pd') ? $this->input->post('alamat_pd') : $pd['alamat_pd']); ?>" class="form-control" id="alamat_pd" placeholder=""/>
			           </div>
				    </div>				    
					<div class="form-group">
						<label for="kode_up" class="col-md-2 control-label">Kode Urusan</label>
						<div class="col-md-5">
							<input type="text" name="kode_up" value="<?php echo ($this->input->post('kode_up') ? $this->input->post('kode_up') : $pd['kode_up']); ?>" class="form-control" id="kode_up"/>
						</div>
					</div>	
					<div class="form-group">
						<label for="nip_kepala" class="col-md-2 control-label">NIP Kepala</label>
						<div class="col-md-5">
							<input type="text" name="nip_kepala" value="<?php echo ($this->input->post('nip_kepala') ? $this->input->post('nip_kepala') : $pd['nip_kepala']); ?>" class="form-control" id="nip_kepala"/>
						</div>
					</div>									    
					<div class="form-group">
						<label for="kode_prog_btl" class="col-md-2 control-label">Kode Program BTL</label>
						<div class="col-md-5">
							<input type="text" name="kode_prog_btl" value="<?php echo ($this->input->post('kode_prog_btl') ? $this->input->post('kode_prog_btl') : $pd['kode_prog_btl']); ?>" class="form-control" id="kode_prog_btl"/>
						</div>
					</div>

					<div class="form-group">
						<label for="kode_giat_btl" class="col-md-2 control-label">Kode Kegiatan BTL</label>
						<div class="col-md-5">
							<input type="text" name="kode_giat_btl" value="<?php echo ($this->input->post('kode_giat_btl') ? $this->input->post('kode_giat_btl') : $pd['kode_giat_btl']); ?>" class="form-control" id="kode_giat_btl"/>
						</div>
					</div>

					<div class="form-group">
						<label for="keterangan_pagu_1" class="col-md-2 control-label">Keterangan Pagu</label>
						<div class="col-md-5">
							<div class="col-md-2">
								Januari
							</div>	
							<div class="col-md-10">							
							<input type="text" name="keterangan_pagu_1" value="<?php echo ($this->input->post('keterangan_pagu_1') ? $this->input->post('keterangan_pagu_1') : $pd['keterangan_pagu_1']); ?>" class="form-control" id="1" onkeyup="isiKeteranganSisa(this.value,this.id);"/>
							</div>
						</div>
						<div class="col-md-5">
							<div class="col-md-2">
								Juli
							</div>	
							<div class="col-md-10">
							<input type="text" name="keterangan_pagu_7" value="<?php echo ($this->input->post('keterangan_pagu_7') ? $this->input->post('keterangan_pagu_7') : $pd['keterangan_pagu_7']); ?>" class="form-control" id="7" onkeyup="isiKeteranganSisa(this.value,this.id)"/>
							</div>
						</div>
					</div>
				

					<div class="form-group">
						<label for="keterangan_pagu_2" class="col-md-2 control-label"></label>
						<div class="col-md-5">
							<div class="col-md-2">
								Februari
							</div>	
							<div class="col-md-10">							
							<input type="text" name="keterangan_pagu_2" value="<?php echo ($this->input->post('keterangan_pagu_2') ? $this->input->post('keterangan_pagu_2') : $pd['keterangan_pagu_2']); ?>" class="form-control" id="2" onkeyup="isiKeteranganSisa(this.value,this.id)"/>
							</div>
						</div>
						<div class="col-md-5">
							<div class="col-md-2">
								Agustus
							</div>	
							<div class="col-md-10">
							<input type="text" name="keterangan_pagu_8" value="<?php echo ($this->input->post('keterangan_pagu_8') ? $this->input->post('keterangan_pagu_8') : $pd['keterangan_pagu_8']); ?>" class="form-control" id="8" onkeyup="isiKeteranganSisa(this.value,this.id)"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="keterangan_pagu_3" class="col-md-2 control-label"></label>
						<div class="col-md-5">
							<div class="col-md-2">
								Maret
							</div>	
							<div class="col-md-10">							
							<input type="text" name="keterangan_pagu_3" value="<?php echo ($this->input->post('keterangan_pagu_3') ? $this->input->post('keterangan_pagu_3') : $pd['keterangan_pagu_3']); ?>" class="form-control" id="3"  onkeyup="isiKeteranganSisa(this.value,this.id)"/>
							</div>
						</div>
						<div class="col-md-5">
							<div class="col-md-2">
								September
							</div>	
							<div class="col-md-10">
							<input type="text" name="keterangan_pagu_9" value="<?php echo ($this->input->post('keterangan_pagu_9') ? $this->input->post('keterangan_pagu_9') : $pd['keterangan_pagu_9']); ?>" class="form-control" id="9"  onkeyup="isiKeteranganSisa(this.value,this.id)"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="keterangan_pagu_4" class="col-md-2 control-label"></label>
						<div class="col-md-5">
							<div class="col-md-2">
								April
							</div>	
							<div class="col-md-10">							
							<input type="text" name="keterangan_pagu_4" value="<?php echo ($this->input->post('keterangan_pagu_4') ? $this->input->post('keterangan_pagu_4') : $pd['keterangan_pagu_4']); ?>" class="form-control" id="4"  onkeyup="isiKeteranganSisa(this.value,this.id)"/>
							</div>
						</div>
						<div class="col-md-5">
							<div class="col-md-2">
								Oktober
							</div>	
							<div class="col-md-10">
							<input type="text" name="keterangan_pagu_10" value="<?php echo ($this->input->post('keterangan_pagu_10') ? $this->input->post('keterangan_pagu_10') : $pd['keterangan_pagu_10']); ?>" class="form-control" id="10" onkeyup="isiKeteranganSisa(this.value,this.id)"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="keterangan_pagu_5" class="col-md-2 control-label"></label>
						<div class="col-md-5">
							<div class="col-md-2">
								Mei
							</div>	
							<div class="col-md-10">							
							<input type="text" name="keterangan_pagu_5" value="<?php echo ($this->input->post('keterangan_pagu_5') ? $this->input->post('keterangan_pagu_5') : $pd['keterangan_pagu_5']); ?>" class="form-control" id="5" onkeyup="isiKeteranganSisa(this.value,this.id)"/>
							</div>
						</div>
						<div class="col-md-5">
							<div class="col-md-2">
								November
							</div>	
							<div class="col-md-10">
							<input type="text" name="keterangan_pagu_11" value="<?php echo ($this->input->post('keterangan_pagu_11') ? $this->input->post('keterangan_pagu_11') : $pd['keterangan_pagu_11']); ?>" class="form-control" id="11" onkeyup="isiKeteranganSisa(this.value,this.id)"/>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label for="keterangan_pagu_6" class="col-md-2 control-label"></label>
						<div class="col-md-5">
							<div class="col-md-2">
								Juni
							</div>	
							<div class="col-md-10">							
							<input type="text" name="keterangan_pagu_6" value="<?php echo ($this->input->post('keterangan_pagu_6') ? $this->input->post('keterangan_pagu_6') : $pd['keterangan_pagu_6']); ?>" class="form-control" id="6" onkeyup="isiKeteranganSisa(this.value,this.id)"/>
							</div>/
						</div>
						<div class="col-md-5">
							<div class="col-md-2">
								Desember
							</div>	
							<div class="col-md-10">
							<input type="text" name="keterangan_pagu_12" value="<?php echo ($this->input->post('keterangan_pagu_12') ? $this->input->post('keterangan_pagu_12') : $pd['keterangan_pagu_12']); ?>" class="form-control" id="12" onkeyup="isiKeteranganSisa(this.value,this.id)"/>
							</div>
						</div>
					</div>



			  </div><!-- /.box-body -->
		</div><!-- /.box -->



	        	<div class="form-group">
	      			<div class="col-md-8"></div>
  	  				<div class="col-md-2">
              	<button class="btn btn-default">
              		<a href="<?php echo site_url('pd');?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
              	</button>
  	          </div>
  	  				<div class="col-md-2">
                <input type="hidden" name="kode_pd" value="<?php echo $pd['kode_pd']; ?>">
              	<button type="submit" class="btn btn-success">
              		<i class="fa fa-check"></i> Simpan
              	</button>
  	           </div>
	        	</div>


        <?php echo form_close(); ?>
    </div>
</div>
<script type="text/javascript">
function isiKeteranganSisa(keterangan,bulan) {   
	var bulan_int = parseInt(bulan);  	
	//var bulan_str = bulan_int.toString();
	// alert(document.getElementById("2").value + " " + bulan_str);
	// document.getElementById(bulan+1.toString).value = "test";	
	for (i = bulan_int+1; i <= 12; i++) {
	  document.getElementById(i.toString()).value = keterangan;
	}    
};
</script>