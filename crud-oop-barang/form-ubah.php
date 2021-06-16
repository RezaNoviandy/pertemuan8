 <!-- Aplikasi CRUD
 -->
 
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i> 
          Ubah data siswa
        </h4>
      </div> <!-- /.page-header -->
      <?php
      $kode = $_GET['id'];

      if (isset($nis)) {
        // memanggil file siswa.php
        require_once 'siswa.php';
        
        // membuat objek siswa
        $siswa = new siswa();
        
        // mengambil data siswa
        $data = $siswa->get_siswa($kode);

        $kode           = $data['kode'];
        $nama          = $data['nama'];
        $harga  = $data['harga'];
        
        $tanggalbuat       = $data['tanggalbuat'];
        $tgl           = explode('-',$tanggal);
        $tanggalbuat = $tgl[2]."-".$tgl[1]."-".$tgl[0];
        $tanggalexpired       = $data['tanggalexpired'];
        $tgl           = explode('-',$tanggal);
        $tanggalexpired = $tgl[2]."-".$tgl[1]."-".$tgl[0];
        
      }
      ?>
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="proses-ubah.php">
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="kode" value="<?php echo $nis; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Barang</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $nama; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Harga</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="harga" autocomplete="off" value="<?php echo $tempat_lahir; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Buat</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggalbuat" autocomplete="off" value="<?php echo $tanggalbuat; ?>" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Expired</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggalexpired" autocomplete="off" value="<?php echo $tanggalexpired; ?>" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
            </div>
            
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->