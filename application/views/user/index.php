<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Pengguna</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-sm">Tambah</a>
                </div>
            </div>

            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
                        <th>No.</th>
                        <th>UserID</th>
                        <th>Nama</th>
                        <th>Perangkat Daerah</th>
                        <th>Peranan</th>
                        <th>Status</th>
                        <th width="120px">Login terakhir</th>
                        <th width="120px">Aksi</th>
                    </tr>
                    <?php $no=0 ; ?>
                    <?php foreach($user as $p){ ?>
                    <tr>
                        <?php $no++; ?>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?php echo $p[ 'user_id']; ?>
                        </td>
                        <td>
                            <?php echo '<a href="'.site_url( 'user/view/'.$p[ 'user_id']). '">'.$p[ 'user_name']. '</a>'; ?>
                        </td>
                        <td>
                            <?php echo $p[ 'nama_pd']; ?>
                        </td>
                        <td>
                            <?php echo $p[ 'user_role']; ?>
                        </td>
                        <td>
                            <?php echo $p[ 'user_status']; ?>
                        </td>
                        <td>
                            <?php
                            echo date ("d M Y, H:i",strtotime($p['last_login']));
                            //echo date("Y-M-d",strtotime($p['last_login']));
                            //$datestring = '%d/%m/%Y %h:%i';
                            //echo unix_to_human(mysql_to_unix(strtotime($p['last_login'])));
                            //echo $p[ 'last_login'];
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('user/edit/'.$p['user_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="<?php echo site_url('user/remove/'.$p['user_id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
