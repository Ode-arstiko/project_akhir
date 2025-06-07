<?php
// konfigurasi koneksi database
$servername = "jmwac.h.filess.io";
$username = "FlutterProjectAkhir_sangstart";
$password = "dc35776ed35a45747c0f3ce8dcd7ff7bdabff761";
$dbname = "FlutterProjectAkhir_sangstart";
$port = 3307;

// buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// kalau berhasil, $conn siap dipakai di file lain
?>
