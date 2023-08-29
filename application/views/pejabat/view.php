<div class="row">
    <div class="col-md-12">

    <?php echo form_open_multipart('pejabat/view/'.$pejabat["nip_p"],array("class"=>"form-horizontal")); ?>
    <div class="box">
        <div class='box-header with-border'>
            <h4 class="box-title">Tampil Pegawai</h4>
        </div><!-- /.box-header -->
        <div class='box-body'>

            <div class="form-group">
                 <label for="nip_p" class="col-md-2 control-label">NIP</label>
                 <div class="col-md-5">
                     <input readonly type="text" name="nip_p" value="<?php echo ($this->input->post('nip_p') ? $this->input->post('nip_p') : $pejabat['nip_p']); ?>" class="form-control" id="nip_p" placeholder="Wajib diisi dan kode harus unik" />
                     <?php echo form_error('nip_p'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="nama_p" class="col-md-2 control-label">Nama</label>
                 <div class="col-md-10">
                     <input readonly type="text" name="nama_p" value="<?php echo ($this->input->post('nama_p') ? $this->input->post('nama_p') : $pejabat['nama_p']); ?>" class="form-control" id="nama_p" placeholder="Wajib diisi"/>
                     <?php echo form_error('nama_p'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="jabat_p" class="col-md-2 control-label">Jabatan</label>
                 <div class="col-md-5">
                     <input readonly type="text" name="jabat_p" value="<?php echo ($this->input->post('jabat_p') ? $this->input->post('jabat_p') : $pejabat['jabat_p']); ?>" class="form-control" id="jabat_p" placeholder="Wajib diisi"/>
                     <?php echo form_error('jabat_p'); ?>
                 </div>
            </div>
            
            <div class="form-group">
              <label for="alamat_p" class="col-md-2 control-label">Alamat</label>
              <div class="col-md-10">
                <input readonly type="text" name="alamat_p" value="<?php echo ($this->input->post('alamat_p') ? $this->input->post('alamat_p') : $pejabat['alamat_p']); ?>" class="form-control" id="alamat_p" />
                <?php echo form_error('alamat_p'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="email_p" class="col-md-2 control-label">Email</label>
              <div class="col-md-5">
                <input readonly type="text" name="email_p" value="<?php echo ($this->input->post('email_p') ? $this->input->post('email_p') : $pejabat['email_p']); ?>" class="form-control" id="email_p" />
                <?php echo form_error('email_p'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="hp_p" class="col-md-2 control-label">HP</label>
              <div class="col-md-5">
                <input readonly type="text" name="hp_p" value="<?php echo ($this->input->post('hp_p') ? $this->input->post('hp_p') : $pejabat['hp_p']); ?>" class="form-control" id="hp_p" />
              </div>
            </div>

            <div class="form-group">
              <label for="kode_pd_asal" class="col-md-2 control-label">Instansi/PD asal</label>
              <div class="col-md-5">
                <?php echo form_dropdown('kode_pd_asal', $pd, ($this->input->post('kode_pd_asal') ? $this->input->post('kode_pd_asal') : $this->session->userdata['logged_in']['user_pd']),'disabled class="form-control"'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="foto_p" class="col-md-2 control-label">Foto</label>
              <div class="col-md-5">                
                <?php if (!$pejabat['foto_p'] == "") { echo '<br><img src="'; echo site_url('uploads/pd/pejabat/'.$pejabat['foto_p']); echo '" width="100px" class="img-thumbnail" alt="foto">'; } ?>
              </div>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="form-group">
      <div class="col-md-8"></div>
      <div class="col-md-4" align="right">
        <button type="button" class="btn btn-default">
          <a href="<?php echo base_url('pejabat/index/');?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
        </button>
      </div>
    </div>


        <?php echo form_close(); ?>
    </div>
</div>
