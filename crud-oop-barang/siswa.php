 <!-- Aplikasi CRUD
 -->

<?php
        
/* class siswa */
class barang {

    /* method untuk menampilkan data siswa */
    function view() {
        // memanggil file database.php
        require_once "config/database.php";

        // membuat objek db dengan nama $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk mengambil semua data siswa
        $sql = "SELECT * FROM ic_barang ORDER BY kode DESC";

        $result = $mysqli->query($sql);

        while ($data = $result->fetch_assoc()) {
            $hasil[] = $data;
        }

        // menutup koneksi database
        $mysqli->close();

        // nilai kembalian dalam bentuk array
        return $hasil;
    }

    /* Method untuk menyimpan data ke tabel siswa */
    function insert($kode, $nama, $harga, $tanggalbuat, $tanggalexpired) {
        // memanggil file database.php
        require_once "config/database.php";

        // membuat objek db dengan nama $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        $kode          = $mysqli->real_escape_string($kode);
        $nama         = $mysqli->real_escape_string($nama);
        $harga = $mysqli->real_escape_string($harga);
        $tanggalbuat       = $mysqli->real_escape_string($tanggalbuat);
        $tanggalexpired       = $mysqli->real_escape_string($tanggalexpired);

        // sql statement untuk insert data siswa
        $sql = "INSERT INTO ic_siswa (kode,nama,harga,tanggalbuat,tanggalexpired) 
                VALUES ('$kode','$nama','$harga','$tanggalbuat','$tanggalexpired')";

        $result = $mysqli->query($sql);

        // cek hasil query
        if($result){
            /* jika data berhasil disimpan alihkan ke halaman siswa dan tampilkan pesan = 2 */
            header("Location: index.php?alert=2");
        }
        else{
            /* jika data gagal disimpan alihkan ke halaman siswa dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }

        // menutup koneksi database
        $mysqli->close();
    }

    /* Method untuk menampilkan data siswa berdasarkan nis */
    function get_barang($kode) {
        // memanggil file database.php
        require_once "config/database.php";

        // membuat objek db dengan nama $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk mengambil data siswa berdasarkan nis
        $sql = "SELECT * FROM ic_barang WHERE kode='$kode'";

        $result = $mysqli->query($sql);
        $data   = $result->fetch_assoc();

        // menutup koneksi database
        $mysqli->close();
        
        // nilai kembalian dalam bentuk array
        return $data;
    }
    
    /* Method untuk mengubah data pada tabel siswa */
    function update($nama, $harga, $tanggalbuat, $tanggalexpired, $kode) {
        // memanggil file database.php
        require_once "config/database.php";

        // membuat objek db dengan nama $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        $nama         = $mysqli->real_escape_string($nama);
        $harga = $mysqli->real_escape_string($harga);
        $tanggalbuat       = $mysqli->real_escape_string($tanggalbuat);
        $tanggalexpired       = $mysqli->real_escape_string($tanggalexpired);

        // sql statement untuk update data siswa
        $sql = "UPDATE ic_barang SET nama            = '$nama',
                                    harga    = '$harga',
                                    tanggalbuat   = '$tanggalbuat',
                                    tanggalexpired   = '$tanggalexpired',
                              WHERE kode             = '$kode'"; 

        $result = $mysqli->query($sql);

        // cek hasil query
        if($result){
            /* jika data berhasil disimpan alihkan ke halaman siswa dan tampilkan pesan = 3 */
            header("Location: index.php?alert=3");
        }
        else{
            /* jika data gagal disimpan alihkan ke halaman siswa dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }

        // menutup koneksi database
        $mysqli->close();
    }
    
    /* Method untuk menghapus data pada tabel siswa */
    function delete($kode) {
        // memanggil file database.php
        require_once "config/database.php";

        // membuat objek db dengan nama $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk delete data siswa
        $sql = "DELETE FROM ic_barang WHERE kode = '$kode'";

        $result = $mysqli->query($sql);

        // cek hasil query
        if($result){
            /* jika data berhasil disimpan alihkan ke halaman siswa dan tampilkan pesan = 4 */
            header("Location: index.php?alert=4");
        }
        else{
            /* jika data gagal disimpan alihkan ke halaman siswa dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }

        // menutup koneksi database
        $mysqli->close();
    }
}
?>
