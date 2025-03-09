<?php  
$koneksi = new mysqli ( "localhost","root","","db_pramuka");
// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
$assets="http://localhost/pramuka/";
?>