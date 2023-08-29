  <div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-solid">    
                <div class="box-header">
                    <h3 class="box-title">Daftar Perangkat Daerah</h3>
                </div>
                <div class="box-body">

                  <table id="" class="table table-bordered table-striped tabel-data"> 
                    <thead>
                        <tr>
                            <th width="10px">No.</th>                            
                            <th width="450px">Nama PD</th>
                            <th>Pagu Anggaran</th>
                            <th>Belanja Langsung</th>
                            <th>Belanja Tidak Langsung</th>
                        </tr>
                    </thead>    
                    <tbody>
                    <?php $no=0 ; ?>
                    <?php foreach($daftar_pd as $p){ ?>                  
                      <tr>
                          <?php $no++; ?>
                          <td align="center">
                              <?php echo $no; ?>
                          </td>
                          <td>
                              <?php 
                                  echo '<a href="'.site_url('laporan_pd/index/'.$tahun_anggaran.'/'.$p->kode_pd).'">'.$p->nama_pd.'</a>';
                              ?>   
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp. ".number_format($p->anggaran_total,0);                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp.".number_format($p->anggaran_bl,0);                               
                              ?>                               
                          </td>
                          <td align="center">
                              <?php 
                                  echo "Rp.".number_format($p->anggaran_btl,0);                      
                              ?>                               
                          </td>
                      </tr>
                    <?php } ?>
                    </tbody>                     
                  </table>

                </div>    
            </div>    
        </div>
    </div>
</div>
 