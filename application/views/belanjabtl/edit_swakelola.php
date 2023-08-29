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
    <?php echo form_open_multipart('belanja/edit_swakelola/'.$belanja['kode_rek_belanja'],array("class"=>"form-horizontal")); ?>
    <div class="box">

        <div class="box-header with-border">
            <label class="control-label"><i class="fa fa-cube"></i> Program: <i><?php echo $program['nama_prog']; ?></i></label>
            <div class="box-tools">
                <a href="<?php echo site_url('program/index');?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Program</a>
            </div>
        </div>
        <div class="box-header with-border">
            <label class="control-label"><i class="fa fa-cubes"></i> Kegiatan: <i><?php echo $kegiatan['nama_giat']; ?></i></label>
            <div class="box-tools">
                <a href="<?php echo site_url('kegiatan/index/'.$program['kode_prog']);?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Kegiatan</a>
            </div>
        </div><br>



        <div class='box-header with-border'>
            <h4 class="box-title">Edit Kegiatan Swakelola</h4>
            <div class="box-tools">
                <a href="<?php echo site_url('belanja/index/'.$belanja['kode_giat']);?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Belanja</a>
            </div>             
        </div><!-- /.box-header -->
        <div class='box-body'>

            <div class="form-group">
                 <label for="kode_rek_belanja" class="col-md-2 control-label">Kode Rekening Belanja</label>
                 <div class="col-md-4">
                     <input type="text" name="kode_rek_belanja" value="<?php echo ($this->input->post('kode_rek_belanja') ? $this->input->post('kode_rek_belanja') : $belanja['kode_rek_belanja']); ?>" class="form-control" id="kode_rek_belanja" placeholder="" readonly/>
                     <?php echo form_error('kode_rek_belanja'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="nama_giat_swa" class="col-md-2 control-label">Nama Kegiatan Swakelola</label>
                 <div class="col-md-10">
                     <input type="text" name="nama_giat_swa" value="<?php echo ($this->input->post('nama_giat_swa') ? $this->input->post('nama_giat_swa') : $belanja['nama_giat_swa']); ?>" class="form-control" id="nama_giat_swa" placeholder="Wajib diisi"/>
                     <?php echo form_error('nama_giat_swa'); ?>
                 </div>
            </div>

            <div class="nav-tabs-custom">

               <ul class="nav nav-tabs">                  
                  <li <?php echo (isset($tab_menu) && $tab_menu == "umum" ? ' class="active">' : '>'); ?> 
                  <a href="#tab_1" data-toggle="tab">Data Umum</a></li>
                  <li <?php echo (isset($tab_menu) && $tab_menu == "realisasi" ? ' class="active">' : '>'); ?> 
                  <a href="#tab_2" data-toggle="tab">Realisasi</a></li>
               </ul>

               <div class="tab-content">
                  <div <?php echo (isset($tab_menu) && $tab_menu == "umum" ? 'class="tab-pane active"' : 'class="tab-pane" '); ?>" id="tab_1">
                    <br>  
                    <div class="form-group">
                         <label for="pagu_giat" class="col-md-2 control-label">Pagu</label>
                         <div class="col-md-3">
                            <div class="input-group">
                               <span class="input-group-addon">Rp.</span>                   
                               <input type="text" name="pagu_giat" value="<?php echo ($this->input->post('pagu_giat') ? $this->input->post('pagu_giat') : $belanja['pagu_giat']); ?>" class="form-control integer" id="pagu_giat" placeholder="" />
                               <?php echo form_error('pagu_giat'); ?>
                            </div>
                         </div>
                    </div>

                    <div class="form-group">
                         <label for="lokasi_giat" class="col-md-2 control-label">Lokasi</label>
                         <div class="col-md-10">
                             <input type="text" name="lokasi_giat" value="<?php echo ($this->input->post('lokasi_giat') ? $this->input->post('lokasi_giat') : $belanja['lokasi_giat']); ?>" class="form-control" id="lokasi_giat" placeholder="" />
                             <?php echo form_error('lokasi_giat'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                         <label for="lokasi_spesifik" class="col-md-2 control-label">Lokasi Spesifik</label>
                         <div class="col-md-10">
                             <input type="text" name="lokasi_spesifik" value="<?php echo ($this->input->post('lokasi_spesifik') ? $this->input->post('lokasi_spesifik') : $belanja['lokasi_spesifik']); ?>" class="form-control" id="lokasi_spesifik" placeholder="" />
                             <?php echo form_error('lokasi_spesifik'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                      <label for="jenis_belanja" class="col-md-2 control-label">Jenis Belanja</label>
                      <div class="col-md-3">
                        <?php 
                            $pilihan_jenis_belanja = array('Belanja Barang/Jasa' => 'Belanja Barang/Jasa', 
                                                         'Belanja Pegawai' => 'Belanja Pegawai', 
                                                         'Belanja Modal' => 'Belanja Modal', );
                            echo form_dropdown('jenis_belanja', $pilihan_jenis_belanja,($this->input->post('jenis_belanja') ? $this->input->post('jenis_belanja') : $belanja['jenis_belanja']),'class="form-control"'); 
                        ?>
                      </div>
                    </div>           

                    <div class="form-group">
                         <label for="volume_belanja" class="col-md-2 control-label">Volume Belanja</label>
                         <div class="col-md-3">
                             <input type="text" name="volume_belanja" value="<?php echo ($this->input->post('volume_belanja') ? $this->input->post('volume_belanja') : $belanja['volume_belanja']); ?>" class="form-control" id="volume_belanja" placeholder="" />
                             <?php echo form_error('volume_belanja'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                         <label for="deskripsi_belanja" class="col-md-2 control-label">Deskripsi Belanja</label>
                         <div class="col-md-10">
                             <input type="text" name="deskripsi_belanja" value="<?php echo ($this->input->post('deskripsi_belanja') ? $this->input->post('deskripsi_belanja') : $belanja['deskripsi_belanja']); ?>" class="form-control" id="deskripsi_belanja" placeholder="" />
                             <?php echo form_error('deskripsi_belanja'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                      <label for="file_dokumen_kak" class="col-md-2 control-label">Dokumen KAK/TOR</label>
                      <div class="col-md-5">                
                        <input type="file" name="file_dokumen_kak" value="<?php echo ($this->input->post('file_dokumen_kak') ? $this->input->post('file_dokumen_kak') : $belanja['file_dokumen_kak']); ?>" class="form-control" id="file_dokumen_kak" />                
                        <p class="help-block">File dokumen harus dalam format DOC atau PDF</p> 
                        <?php
                          if(!$belanja['file_dokumen_kak']=='') {
                            echo 'File yang telah terunggah: <a href="'.site_url('uploads/belanja/swakelola/'.$belanja['file_dokumen_kak']).'" class="view-pdf">'.$belanja['file_dokumen_kak'].'</a>'; 
                          }                              
                        ?>  
                      </div>
                    </div>            

                    <div class="form-group">
                      <label for="usulan_dari" class="col-md-2 control-label">Usulan Kegiatan dari</label>
                      <div class="col-md-3">
                        <?php 
                            $pilihan_usulan_dari = array('Musrenbang' => 'Musrenbang', 
                                                         'DPRD' => 'DPRD', 
                                                         'Provinsi' => 'Provinsi', 
                                                         'Pemkot' => 'Pemkot', 
                                                         'PD ybs' => 'PD ybs', 
                                                         'Lain-lain' => 'Lain-lain', );
                            echo form_dropdown('usulan_dari', $pilihan_usulan_dari,($this->input->post('usulan_dari') ? $this->input->post('usulan_dari') : $belanja['usulan_dari']),'class="form-control"'); 
                        ?>
                      </div>
                    </div>
                  </div> <!-- /.tab-pane -->  

                  <div <?php echo (isset($tab_menu) && $tab_menu == "realisasi" ? 'class="tab-pane active"' : 'class="tab-pane" '); ?>" id="tab_2">
                    <br>  

                    <div class="box-body">

                        <table class="table table-bordered table-striped">
                          <tr>                          
                            <th width="150px">Bulan</th>
                            <th width="250px">Realisasi</th>
                            <th>Foto</th>
                          </tr>                       

                          <tr>
                            <td align="center"><font size="5"><b>Januari</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_1" value="<?php echo ($this->input->post('kf_1') ? $this->input->post('kf_1') : $belanja['kf_1']); ?>" class="form-control integer" id="kf_1" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_1" value="<?php echo ($this->input->post('kk_1') ? $this->input->post('kk_1') : $belanja['kk_1']); ?>" class="form-control integer" id="kk_1" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_1" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==1) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_1" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>

                          <tr>
                            <td align="center"><font size="5"><b>Februari</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_2" value="<?php echo ($this->input->post('kf_2') ? $this->input->post('kf_2') : $belanja['kf_2']); ?>" class="form-control integer" id="kf_2" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_2" value="<?php echo ($this->input->post('kk_2') ? $this->input->post('kk_2') : $belanja['kk_2']); ?>" class="form-control integer" id="kk_2" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_2" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==2) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_2" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>                        

                          <tr>
                            <td align="center"><font size="5"><b>Maret</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_3" value="<?php echo ($this->input->post('kf_3') ? $this->input->post('kf_3') : $belanja['kf_3']); ?>" class="form-control integer" id="kf_3" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_3" value="<?php echo ($this->input->post('kk_3') ? $this->input->post('kk_3') : $belanja['kk_3']); ?>" class="form-control integer" id="kk_3" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_3" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==3) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_3" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>  

                          <tr>
                            <td align="center"><font size="5"><b>April</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_4" value="<?php echo ($this->input->post('kf_4') ? $this->input->post('kf_4') : $belanja['kf_4']); ?>" class="form-control integer" id="kf_4" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_4" value="<?php echo ($this->input->post('kk_4') ? $this->input->post('kk_4') : $belanja['kk_4']); ?>" class="form-control integer" id="kk_4" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_4" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==4) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_4" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>  

                          <tr>
                            <td align="center"><font size="5"><b>Mei</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_5" value="<?php echo ($this->input->post('kf_5') ? $this->input->post('kf_5') : $belanja['kf_5']); ?>" class="form-control integer" id="kf_5" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_5" value="<?php echo ($this->input->post('kk_5') ? $this->input->post('kk_5') : $belanja['kk_5']); ?>" class="form-control integer" id="kk_5" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_5" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==5) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_5" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>

                          <tr>
                            <td align="center"><font size="5"><b>Juni</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_6" value="<?php echo ($this->input->post('kf_6') ? $this->input->post('kf_6') : $belanja['kf_6']); ?>" class="form-control integer" id="kf_6" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_6" value="<?php echo ($this->input->post('kk_6') ? $this->input->post('kk_6') : $belanja['kk_6']); ?>" class="form-control integer" id="kk_6" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_6" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==6) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_6" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>   

                          <tr>
                            <td align="center"><font size="5"><b>Juli</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_7" value="<?php echo ($this->input->post('kf_7') ? $this->input->post('kf_7') : $belanja['kf_7']); ?>" class="form-control integer" id="kf_7" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_7" value="<?php echo ($this->input->post('kk_7') ? $this->input->post('kk_7') : $belanja['kk_7']); ?>" class="form-control integer" id="kk_7" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_7" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==7) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_7" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>

                          <tr>
                            <td align="center"><font size="5"><b>Agustus</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_8" value="<?php echo ($this->input->post('kf_8') ? $this->input->post('kf_8') : $belanja['kf_8']); ?>" class="form-control integer" id="kf_8" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_8" value="<?php echo ($this->input->post('kk_8') ? $this->input->post('kk_8') : $belanja['kk_8']); ?>" class="form-control integer" id="kk_8" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_8" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==8) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_8" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>     

                          <tr>
                            <td align="center"><font size="5"><b>September</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_9" value="<?php echo ($this->input->post('kf_9') ? $this->input->post('kf_9') : $belanja['kf_9']); ?>" class="form-control integer" id="kf_9" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_9" value="<?php echo ($this->input->post('kk_9') ? $this->input->post('kk_9') : $belanja['kk_9']); ?>" class="form-control integer" id="kk_9" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_9" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==9) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_9" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>

                          <tr>
                            <td align="center"><font size="5"><b>Oktober</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_10" value="<?php echo ($this->input->post('kf_10') ? $this->input->post('kf_10') : $belanja['kf_10']); ?>" class="form-control integer" id="kf_10" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_10" value="<?php echo ($this->input->post('kk_10') ? $this->input->post('kk_10') : $belanja['kk_10']); ?>" class="form-control integer" id="kk_10" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_10" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==10) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_10" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>   

                          <tr>
                            <td align="center"><font size="5"><b>November</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_11" value="<?php echo ($this->input->post('kf_11') ? $this->input->post('kf_11') : $belanja['kf_11']); ?>" class="form-control integer" id="kf_11" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_11" value="<?php echo ($this->input->post('kk_11') ? $this->input->post('kk_11') : $belanja['kk_11']); ?>" class="form-control integer" id="kk_11" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_11" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==11) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_11" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>

                          <tr>
                            <td align="center"><font size="5"><b>Desember</b></font></td>
                            <td>
                              <div class="col-md-4">
                                Fisik:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kf_12" value="<?php echo ($this->input->post('kf_12') ? $this->input->post('kf_12') : $belanja['kf_12']); ?>" class="form-control integer" id="kf_12" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-4">
                                Keuangan:
                              </div>
                              <div class="col-md-8" align="left">
                                  <input type="text" name="kk_12" value="<?php echo ($this->input->post('kk_12') ? $this->input->post('kk_12') : $belanja['kk_12']); ?>" class="form-control integer" id="kk_12" placeholder="Rp."/>
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_12" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==12) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_12" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>     

                        </table>
                      </div><!-- /.box-body -->
                  </div>  <!-- /.tab-pane -->  
               </div> <!-- /.tab-content -->  

            </div> <!-- /.nav-tabs-custom -->  
          
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="form-group">
      <div class="col-md-8"></div>
      <div class="col-md-2">
        <button type="button" class="btn btn-default">
          <a href="<?php echo site_url('belanja/index/'.$belanja['kode_giat']);?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
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
