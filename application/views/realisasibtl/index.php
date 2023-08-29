<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box box-solid">

            <div class="box-header">
                <h4 class="box-title">Daftar Realisasi Belanja Tidak Langsung</h4>
                <div class="box-tools">
                    <a href="<?php echo site_url('realisasibtl/edit'); ?>" class="btn btn-success btn-sm">Edit Realisasi</a>
                </div>                
            </div>

            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th width="100px">No.</th>
                        <th width="400px">Bulan</th>
                        <th>Realisasi Fisik</th>
                        <th>Realisasi Keuangan</th>
                    </tr>
                    <?php $no=0 ; ?>

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Januari</b></font></td>                       
                        <td align="right">
                            <?php echo $pd['btl_rf_1']." %"; ?>
                        </td>
                        <td align="right">                            
                            <?php echo "Rp. ".number_format($pd['btl_rk_1']); ?>
                        </td>                        
                    </tr>

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Februari</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_rf_2']." %"; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp. ".number_format($pd['btl_rk_2']); ?>
                        </td>                        
                    </tr>                    

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Maret</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_rf_3']." %"; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp. ".number_format($pd['btl_rk_3']); ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>April</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_rf_4']." %"; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp. ".number_format($pd['btl_rk_4']); ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Mei</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_rf_5']." %"; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp. ".number_format($pd['btl_rk_5']); ?>
                        </td>                        
                    </tr>                      

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Juni</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_rf_6']." %"; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp. ".number_format($pd['btl_rk_6']); ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Juli</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_rf_7']." %"; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp. ".number_format($pd['btl_rk_7']); ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Agustus</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_rf_8']." %"; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp. ".number_format($pd['btl_rk_8']); ?>
                        </td>                        
                    </tr>  


                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>September</b></font></td>                                              
                        <td align="right">
                            <?php echo $pd['btl_rf_9']." %"; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp. ".number_format($pd['btl_rk_9']); ?>
                        </td>                        
                    </tr>               

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Oktober</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_rf_10']." %"; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp. ".number_format($pd['btl_rk_10']); ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>November</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_rf_11']." %"; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp. ".number_format($pd['btl_rk_11']); ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Desember</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_rf_12']." %"; ?>
                        </td>
                        <td align="right">
                            <?php echo "Rp. ".number_format($pd['btl_rk_12']); ?>
                        </td>                        
                    </tr>                      

                </table>
            </div>
        </div>
      </div>
    </div>
</div>
