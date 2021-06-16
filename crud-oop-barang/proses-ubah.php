 <!-- Aplikasi CRUD
 -->
 
<?php
// memanggil file siswa.php
require_once 'siswa.php';
    
if (isset($_POST['simpan'])) {
	if (isset($_POST['kode'])) {

		// membuat objek siswa
    	$siswa = new siswa();

    	// ambil data hasil submit dari form
		$kode           = $_POST['kode'];
		$nama          = trim($_POST['nama']);
		$harga  = trim($_POST['harga']);

		$tanggal       = $_POST['tanggalbuat'];
		$tgl           = explode('-',$tanggal);
		$tanggalbuat = $tgl[2]."-".$tgl[1]."-".$tgl[0];
		$tanggal       = $_POST['tanggalexpired'];
		$tgl           = explode('-',$tanggal);
		$tanggalexpired = $tgl[2]."-".$tgl[1]."-".$tgl[0];

		
		// update data siswa
    	$siswa->update($nama,$harga,$tanggalbuat,$tanggalexpired,$kode);		
	}
}					
?>