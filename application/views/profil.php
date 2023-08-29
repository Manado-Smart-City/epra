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
        <!-- AKUN PENGGUNA --> 
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Akun Pengguna</h3>
            </div>
            <div class="box-body">
              <!-- form start -->
                <form action="<?php echo base_url('profil/change_akun_user'); ?>" method="post">
                    <div class="form-group">
                      <label>User ID</label>
                      <input name="user_id" type="text" class="form-control" value="<?php echo $this->session->userdata['logged_in']['user_id']; ?>" readonly="readonly">
                    </div>

                    <div class="form-group">
                      <label>Nama</label><span class="label label-danger pull-right"><?php echo form_error('user_name'); ?></span>
                      <input name="user_name" type="text" class="form-control" value="<?php echo $this->session->userdata['logged_in']['user_name']; ?>">
                    </div>

                    <div class="form-group">
                      <label>Email</label><span class="label label-danger pull-right"><?php echo form_error('user_email'); ?></span>
                      <input name="user_email" type="text" class="form-control" value="<?php echo $this->session->userdata['logged_in']['user_email']; ?>">
                    </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  </div>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box --> 


        <!-- RUBAH PASSWORD --> 
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Rubah Password</h3>
            </div>
          <div class="box-body">
            <!-- form start -->
              <form action="<?php echo base_url('profil/change_password'); ?>" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label>Password lama</label><span class="label label-danger pull-right"><?php echo form_error('password_lama'); ?></span>
                    <input name="password_lama" type="password" class="form-control" placeholder="Ketik Password lama">
                  </div>
                  <div class="form-group">
                    <label>Password baru</label><span class="label label-danger pull-right"><?php echo form_error('password_baru'); ?></span>
                    <input name="password_baru" type="password" class="form-control" placeholder="Ketik Password baru">
                  </div>
                  <div class="form-group">
                    <label>Konfirmasi Password baru</label><span class="label label-danger pull-right"><?php echo form_error('password_baru2'); ?></span>
                    <input name="password_baru2" type="password" class="form-control" placeholder="Ketik lagi Password baru">
                  </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->


        <!-- UNGGAH FOTO-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Unggah Foto</h3>
            </div>

          <div class="box-body">
            <!-- form start -->
              <form action="<?php echo base_url('profil/upload_photo'); ?>" method="post" enctype="multipart/form-data">
                <div class="box-body">

                  <div class="form-group">
                    <?php
                      if (!empty($this->session->userdata['logged_in']['user_photo'])){
                        echo '<p><img src="'.base_url('resources/img/user_photos/')."/".$this->session->userdata['logged_in']['user_photo'].'" width="100px" class="img-thumbnail" alt="Foto User" ></p>';
                      } else {
                        echo '<label>Belum ada foto</label>';
                      }
                    ?>
                    
                    <input name="user_photo" type="file">
                    <p class="help-block">File foto harus dalam format gambar (JPG, PNG, atau GIF) dengan ukuran file < 500 KB.</p>
                  </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Unggah foto</button>
                </div>
              </form>
          </div><!-- /.box-body -->

        </div><!-- /.box -->

    </div>
</div>