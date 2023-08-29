<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box box-solid">

            <div class="box-header">
                <h4 class="box-title">Daftar Target Belanja Tidak Langsung</h4>
                <div class="box-tools">
                    <a href="<?php echo site_url('targetbtl/edit'); ?>" class="btn btn-success btn-sm">Edit Target</a>
                </div>                
            </div>

            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th width="100px">No.</th>
                        <th width="400px">Bulan</th>
                        <th>Target Fisik</th>
                        <th>Target Keuangan</th>
                    </tr>
                    <?php $no=0 ; ?>

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Januari</b></font></td>                       
                        <td align="right">
                            <?php echo $pd['btl_tf_1']." %"; ?>
                        </td>
                        <td align="right">                            
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_1'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_1']/$total_anggaran_btl)*100,2)." %)";
                                } 
                            ?>
                        </td>                          
                    </tr>

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Februari</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_tf_2']." %"; ?>
                        </td>
                        <td align="right">
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_2'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_2']/$total_anggaran_btl)*100,2)." %)";
                                } 
                            ?>
                        </td>                        
                    </tr>                    

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Maret</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_tf_3']." %"; ?>
                        </td>
                        <td align="right">
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_3'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_3']/$total_anggaran_btl)*100,2)." %)";
                                } 
                            ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>April</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_tf_4']." %"; ?>
                        </td>
                        <td align="right">
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_4'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_4']/$total_anggaran_btl)*100,2)." %)";
                                } 
                            ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Mei</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_tf_5']." %"; ?>
                        </td>
                        <td align="right">
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_5'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_5']/$total_anggaran_btl)*100,2)." %)";
                                } 
                            ?>
                        </td>                        
                    </tr>                      

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Juni</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_tf_6']." %"; ?>
                        </td>
                        <td align="right">
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_6'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_6']/$total_anggaran_btl)*100,2)." %)";
                                } 
                            ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Juli</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_tf_7']." %"; ?>
                        </td>
                        <td align="right">
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_7'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_7']/$total_anggaran_btl)*100,2)." %)";
                                } 
                            ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Agustus</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_tf_8']." %"; ?>
                        </td>
                        <td align="right">
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_8'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_8']/$total_anggaran_btl)*100,2)." %)";
                                } 
                            ?>
                        </td>                        
                    </tr>  


                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>September</b></font></td>                                              
                        <td align="right">
                            <?php echo $pd['btl_tf_9']." %"; ?>
                        </td>
                        <td align="right">
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_9'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_9']/$total_anggaran_btl)*100,2)." %)";
                                } 
                            ?>
                        </td>                        
                    </tr>               

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Oktober</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_tf_10']." %"; ?>
                        </td>
                        <td align="right">
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_10'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_10']/$total_anggaran_btl)*100,2)." %)";
                                } 
                            ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>November</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_tf_11']." %"; ?>
                        </td>
                        <td align="right">
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_11'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_11']/$total_anggaran_btl)*100,2)." %)";
                                } 
                            ?>
                        </td>                        
                    </tr>  

                    <tr>
                        <?php $no++; ?>
                        <td align="center">
                            <?php echo $no; ?>
                        </td>
                        <td align="center"><font size="5"><b>Desember</b></font></td>                                               
                        <td align="right">
                            <?php echo $pd['btl_tf_12']." %"; ?>
                        </td>
                        <td align="right">
                            <?php 
                                echo "Rp. ".number_format($pd['btl_tk_12'])."<br>";
                                if ($total_anggaran_btl > 0){
                                    echo "(".number_format(($pd['btl_tk_12']/$total_anggaran_btl)*100,2)." %)"; 
                                }
                            ?>
                                
                        </td>                        
                    </tr>                      

                </table>
            </div>
        </div>
      </div>
    </div>
</div>
