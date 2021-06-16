 <!-- Aplikasi CRUD
 -->

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Data Siswa
          
          <a class="btn btn-success pull-right" href="?page=tambah">
            <i class="glyphicon glyphicon-plus"></i> Tambah
          </a>
        </h4>
      </div>

  <?php  
  if (empty($_GET['alert'])) {
    echo "";
  } elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
  } elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil diubah.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil dihapus.
          </div>";
  }
  ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Data Siswa</h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Tanggal Buat</th>
                <th>Tanggal Expired</th>
              </tr>
            </thead>   

            <tbody>
            <?php
            // memanggil file siswa.php
            require_once 'siswa.php';
            
            // membuat objek siswa
            $siswa = new barang();
            
            // mengambil seluruh data siswa
            $result = $siswa->view();

            $no = 1;

            if (!empty($result)) { 
              foreach($result as $data) {

                $tanggal        = $data['tanggalbuat'];
                $tgl            = explode('-',$tanggal);
                $tanggalbuat  = $tgl[2]."-".$tgl[1]."-".$tgl[0];
                $tanggal        = $data['tanggalexpired'];
                $tgl            = explode('-',$tanggal);
                $tanggalexpired  = $tgl[2]."-".$tgl[1]."-".$tgl[0];


                echo "  <tr>
                      <td width='50' class='center'>$no</td>
                      <td width='60'>$data[kode]</td>
                      <td width='150'>$data[nama]</td>
                      <td width='180'>$data[harga], $harga</td>
                      <td width='120'>$data[tanggalbuat], $tanggalbuat</td>
                      <td width='120'>$data[tanggalexpired], $tanggalexpired</td>
                      
                      <td width='100'>
                        <div class=''>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-success btn-sm' href='?page=ubah&id=$data[nis]'>
                            <i class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="proses-hapus.php?id=<?php echo $data['kode'];?>" onclick="return confirm('Anda yakin ingin menghapus barang? <?php echo $data['nama']; ?>?');">
                            <i class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
                echo "
                        </div>
                      </td>
                    </tr>";
                $no++;
              }
            }
            ?>
            </tbody>           
          </table>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->