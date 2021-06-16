 <!-- Aplikasi CRUD
 -->

<?php
// memanggil file siswa.php
require_once 'siswa.php';

if (isset($_POST['simpan'])) {
    // membuat objek siswa
    $siswa = new barang();
    
    // ambil data hasil submit dari form
    $kode           = trim($_POST['kode']);
	$nama          = trim($_POST['nama']);
	$harga  = trim($_POST['harga']);

	$tanggal       = $_POST['tanggalbuat'];
	$tgl           = explode('-',$tanggal);
	$tanggalbuat = $tgl[2]."-".$tgl[1]."-".$tgl[0];

	$tanggal       = $_POST['tanggalexpired'];
	$tgl           = explode('-',$tanggal);
	$tanggalexpired = $tgl[2]."-".$tgl[1]."-".$tgl[0];

    // insert data siswa
    $siswa->insert($kode,$nama,$harga,$tanggalbuat,$tanggalexpired);
}			
?>