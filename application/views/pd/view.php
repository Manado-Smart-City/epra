<div class="row">
    <div class="col-md-12">
        <?php echo form_open_multipart( 'pd/edit/'.$pd[ 'kode_pd'],array( "class"=>"form-horizontal")); ?>
        <div class="box">
            <div class='box-header with-border'>
                <h4 class="box-title">Perangkat Daerah</h4>
            </div>
            <!-- /.box-header -->
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
                        <input type="text" name="nama_pd" value="<?php echo ($this->input->post('nama_pd') ? $this->input->post('nama_pd') : $pd['nama_pd']); ?>" class="form-control" id="nama_pd" placeholder="Wajib diisi" disabled/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat_pd" class="col-md-2 control-label">Alamat PD.</label>
                    <div class="col-md-10">
                        <input type="text" name="alamat_pd" value="<?php echo ($this->input->post('alamat_pd') ? $this->input->post('alamat_pd') : $pd['alamat_pd']); ?>" class="form-control" id="alamat_pd" placeholder="" disabled/>
                    </div>
                </div>                
                <div class="form-group">
                    <label for="alamat_pd" class="col-md-2 control-label">Alamat PD.</label>
                    <div class="col-md-10">
                        <input type="text" name="alamat_pd" value="<?php echo ($this->input->post('alamat_pd') ? $this->input->post('alamat_pd') : $pd['alamat_pd']); ?>" class="form-control" id="alamat_pd" placeholder="Wajib diisi" disabled/>
                    </div>
                </div>                
                <div class="form-group">
                    <label for="kode_up" class="col-md-2 control-label">Kode Urusan</label>
                    <div class="col-md-5">
                        <input type="text" name="kode_up" value="<?php echo ($this->input->post('kode_up') ? $this->input->post('kode_up') : $pd['kode_up']); ?>" class="form-control" id="kode_up" placeholder="Wajib diisi" disabled/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nip_kepala" class="col-md-2 control-label">NIP Kepala</label>
                    <div class="col-md-5">
                        <input type="text" name="nip_kepala" value="<?php echo ($this->input->post('nip_kepala') ? $this->input->post('nip_kepala') : $pd['nip_kepala']); ?>" class="form-control" id="nip_kepala" placeholder="Wajib diisi" disabled/>
                    </div>
                </div>                
                <div class="form-group">
                    <label for="kode_prog_btl" class="col-md-2 control-label">Kode Program BTL</label>
                    <div class="col-md-5">
                        <input type="text" name="kode_prog_btl" value="<?php echo ($this->input->post('kode_prog_btl') ? $this->input->post('kode_prog_btl') : $pd['kode_prog_btl']); ?>" class="form-control" id="kode_prog_btl" placeholder="Wajib diisi" disabled/>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="kode_giat_btl" class="col-md-2 control-label">Kode Kegiatan BTL</label>
                    <div class="col-md-5">
                        <input type="text" name="kode_giat_btl" value="<?php echo ($this->input->post('kode_giat_btl') ? $this->input->post('kode_giat_btl') : $pd['kode_giat_btl']); ?>" class="form-control" id="kode_giat_btl" placeholder="Wajib diisi" disabled/>
                    </div>
                </div> 

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        
        <div class="form-group">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <button class="btn btn-default">
                    <a href="<?php echo site_url('pd');?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
                </button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
