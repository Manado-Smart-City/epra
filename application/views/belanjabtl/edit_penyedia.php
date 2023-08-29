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
    <?php echo form_open_multipart('belanja/edit_penyedia/'.$belanja['kode_rek_belanja'],array("class"=>"form-horizontal")); ?>
    <div class="box">
        <div class='box-header with-border'>
            <h4 class="box-title">Edit Penyedia</h4>
        </div><!-- /.box-header -->
        <div class='box-body'>

            <div class="form-group">
                 <label for="nama_paket_pengadaan" class="col-md-2 control-label">Nama Paket Pengadaan</label>
                 <div class="col-md-10">
                     <input readonly type="text" name="nama_paket_pengadaan" value="<?php echo ($this->input->post('nama_paket_pengadaan') ? $this->input->post('nama_paket_pengadaan') : $belanja['nama_paket_pengadaan']); ?>" class="form-control" id="nama_paket_pengadaan" placeholder="Wajib diisi"/>
                     <?php echo form_error('nama_paket_pengadaan'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="nama_peny" class="col-md-2 control-label">Nama Penyedia</label>
                 <div class="col-md-5">                    
                       <input type="text" name="nama_peny" value="<?php echo ($this->input->post('nama_peny') ? $this->input->post('nama_peny') : $belanja['nama_peny']); ?>" class="form-control" id="nama_peny" placeholder="" />
                       <?php echo form_error('nama_peny'); ?>                    
                 </div>
            </div>

            <div class="form-group">
                 <label for="nama_direktur" class="col-md-2 control-label">Nama Direktur</label>
                 <div class="col-md-5">
                     <input type="text" name="nama_direktur" value="<?php echo ($this->input->post('nama_direktur') ? $this->input->post('nama_direktur') : $belanja['nama_direktur']); ?>" class="form-control" id="nama_direktur" placeholder="" />
                     <?php echo form_error('nama_direktur'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="alamat_peny" class="col-md-2 control-label">Alamat Penyedia</label>
                 <div class="col-md-10">
                     <input type="text" name="alamat_peny" value="<?php echo ($this->input->post('alamat_peny') ? $this->input->post('alamat_peny') : $belanja['alamat_peny']); ?>" class="form-control" id="alamat_peny" placeholder="" />
                     <?php echo form_error('alamat_peny'); ?>
                 </div>
            </div>

            <div class="form-group">
              <label for="kualifikasi_peny" class="col-md-2 control-label">Kualifikasi Penyedia</label>
              <div class="col-md-5">
                <?php 
                    $pilihan_kualifikasi_peny = array('Musrenbang' => 'Musrenbang', 
                                                 'DPRD' => 'DPRD', 
                                                 'Provinsi' => 'Provinsi', 
                                                 'Pemkot' => 'Pemkot', 
                                                 'PD ybs' => 'PD ybs', 
                                                 'Lain-lain' => 'Lain-lain', );
                    echo form_dropdown('kualifikasi_peny', $pilihan_kualifikasi_peny,($this->input->post('kualifikasi_peny') ? $this->input->post('kualifikasi_peny') : $belanja['kualifikasi_peny']),'class="form-control"'); 
                ?>
              </div>
            </div>

            <div class="form-group">
                 <label for="nomor_kontrak" class="col-md-2 control-label">Nomor Kontrak</label>
                 <div class="col-md-5">
                     <input type="text" name="nomor_kontrak" value="<?php echo ($this->input->post('nomor_kontrak') ? $this->input->post('nomor_kontrak') : $belanja['nomor_kontrak']); ?>" class="form-control" id="nomor_kontrak" placeholder="" />
                     <?php echo form_error('nomor_kontrak'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="tanggal_kontrak" class="col-md-2 control-label">Tanggal Kontrak</label>
                 <div class="col-md-3">
                    <div class="input-group">
                     <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                     <input type="text" name="tanggal_kontrak" value="<?php echo ($this->input->post('tanggal_kontrak') ? $this->input->post('tanggal_kontrak') : $belanja['tanggal_kontrak']); ?>" class="form-control" id="tanggal_kontrak" placeholder="dd/mm/yyy" />
                     <?php echo form_error('tanggal_kontrak'); ?>
                    </div>
                 </div>
            </div>

            <div class="form-group">
                 <label for="jangka_waktu_kontrak" class="col-md-2 control-label">Jangka Waktu Kontrak</label>
                 <div class="col-md-3">
                     <input type="text" name="jangka_waktu_kontrak" value="<?php echo ($this->input->post('jangka_waktu_kontrak') ? $this->input->post('jangka_waktu_kontrak') : $belanja['jangka_waktu_kontrak']); ?>" class="form-control" id="jangka_waktu_kontrak" placeholder="Hari" /> 
                     <?php echo form_error('jangka_waktu_kontrak'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="tanggal_mulai_kontrak" class="col-md-2 control-label">Tanggal Mulai Kontrak</label>
                 <div class="col-md-3">
                 <div class="input-group">
                     <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                     <input type="text" name="tanggal_mulai_kontrak" value="<?php echo ($this->input->post('tanggal_mulai_kontrak') ? $this->input->post('tanggal_mulai_kontrak') : $belanja['tanggal_mulai_kontrak']); ?>" class="form-control" id="tanggal_mulai_kontrak" placeholder="dd/mm/yyy" />
                     <?php echo form_error('tanggal_mulai_kontrak'); ?>
                     </div>
                 </div>
            </div>

            <div class="form-group">
                 <label for="tanggal_selesai_kontrak" class="col-md-2 control-label">Tanggal Selesai Kontrak</label>
                 <div class="col-md-3">
                 <div class="input-group">
                     <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                     <input type="text" name="tanggal_selesai_kontrak" value="<?php echo ($this->input->post('tanggal_selesai_kontrak') ? $this->input->post('tanggal_selesai_kontrak') : $belanja['tanggal_selesai_kontrak']); ?>" class="form-control" id="tanggal_selesai_kontrak" placeholder="dd/mm/yyy" />
                     <?php echo form_error('tanggal_selesai_kontrak'); ?>
                     </div>
                 </div>
            </div>

            <div class="form-group">
                 <label for="nilai_kontrak" class="col-md-2 control-label">Nilai Kontrak</label>
                 <div class="col-md-5">
                    <div class="input-group">
                       <span class="input-group-addon">Rp.</span>                   
                       <input type="text" name="nilai_kontrak" value="<?php echo ($this->input->post('nilai_kontrak') ? $this->input->post('nilai_kontrak') : $belanja['nilai_kontrak']); ?>" class="form-control" id="nilai_kontrak" placeholder="" />
                       <?php echo form_error('nilai_kontrak'); ?>
                    </div>
                 </div>
            </div> 

            <div class="form-group">
              <label for="file_dokumen_kontrak" class="col-md-2 control-label">File Dokumen Kontrak</label>
              <div class="col-md-5">
                <input type="file" name="file_dokumen_kontrak" value="<?php echo ($this->input->post('file_dokumen_kontrak') ? $this->input->post('file_dokumen_kontrak') : $belanja['file_dokumen_kontrak']); ?>" class="form-control" id="file_dokumen_kontrak" />
                <p class="help-block">File dokumen harus dalam format DOC atau PDF</p>
                <?php
                  if(!$belanja['file_dokumen_kontrak']=='') {
                    echo 'File yang telah terunggah: <a href="'.site_url('uploads/belanja/pengadaan/'.$belanja['file_dokumen_kontrak']).'">'.$belanja['file_dokumen_kontrak'].'</a>'; 
                  }                              
                ?>                 
              </div>
            </div>

            <div class="form-group">
              <label for="file_foto_kontrak" class="col-md-2 control-label">Foto</label>
              <div class="col-md-5">
                <input type="file" name="file_foto_kontrak" value="<?php echo ($this->input->post('file_foto_kontrak') ? $this->input->post('file_foto_kontrak') : $belanja['file_foto_kontrak']); ?>" class="form-control" id="file_foto_kontrak" />
                <p class="help-block">File foto harus dalam format gambar (JPG, PNG, atau GIF).</p>
                <?php
                  if(!$belanja['file_foto_kontrak']=='') {
                    echo 'File yang telah terunggah: <a href="'.site_url('uploads/belanja/pengadaan/'.$belanja['file_foto_kontrak']).'">'.$belanja['file_foto_kontrak'].'</a>'; 
                  }                              
                ?>                 
              </div>
            </div>

        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="form-group">
      <div class="col-md-8"></div>
      <div class="col-md-2">
        <button type="button" class="btn btn-default">
          <a href="<?php echo site_url('belanja/index3/'.$belanja['kode_giat']);?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
        </button>
      </div>
      <div class="col-md-2">
        <input type="hidden" name="kode_giat" value="<?php echo $belanja['kode_giat']; ?>">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-check"></i> Simpan
        </button>
       </div>
    </div>


        <?php echo form_close(); ?>
    </div>
</div>
