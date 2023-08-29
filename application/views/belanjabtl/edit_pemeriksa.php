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
    <?php echo form_open_multipart('belanja/edit_pemeriksa/'.$belanja['kode_rek_belanja'],array("class"=>"form-horizontal")); ?>
    <div class="box">
        <div class='box-header with-border'>
            <h4 class="box-title">Edit Pemeriksa</h4>
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
                 <label for="nomor_pphp" class="col-md-2 control-label">Nomor PPHP/PHO</label>
                 <div class="col-md-5">
                     <input type="text" name="nomor_pphp" value="<?php echo ($this->input->post('nomor_pphp') ? $this->input->post('nomor_pphp') : $belanja['nomor_pphp']); ?>" class="form-control" id="nomor_pphp" placeholder="" />
                     <?php echo form_error('nomor_pphp'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="tanggal_pphp" class="col-md-2 control-label">Tanggal PPHP/PHO</label>
                 <div class="col-md-3">
                    <div class="input-group">
                     <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                     <input type="text" name="tanggal_pphp" value="<?php echo ($this->input->post('tanggal_pphp') ? $this->input->post('tanggal_pphp') : $belanja['tanggal_pphp']); ?>" class="form-control" id="tanggal_pphp" placeholder="dd/mm/yyy" />
                     <?php echo form_error('tanggal_pphp'); ?>
                    </div>
                 </div>
            </div>


            <div class="box-body no-padding col-md-8">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Perangkat Daerah</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no=0 ; ?>
                    <?php foreach($pphp as $p){ ?>
                    <tr>
                        <?php $no++; ?>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?php echo $p['nip_pphp']; ?>
                        </td>
                        <td>
                            <?php echo $p['nama_pphp']; ?>
                        </td>
                        <td>
                            <?php echo $p['nama_pd']; ?>
                        </td>                                               
                        <td>
                        </td>
                    </tr>
                    <?php } ?>
                </table><br>
            </div>

            <div class="col-md-4"></div>
            <div class="col-md-12">
                <div class="form-group">
                     <label for="nip_pphp" class="col-md-2 control-label">NIP PPHP/PHO</label>
                     <div class="col-md-3">
                         <input type="text" name="nip_pphp" class="form-control" placeholder=""> 
                      </div>       
                      <div class="col-md-4">
                          <button type="submit" class="btn">
                              Tambahkan
                          </button>                         
                     </div>
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
