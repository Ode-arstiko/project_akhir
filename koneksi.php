<?php
// konfigurasi koneksi database
$servername = "sql12.freesqldatabase.com";
$username = "sql12783285";
$password = "zfzP9skHps";
$dbname = "sql12783285";
$port = 3306;

// buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// kalau berhasil, $conn siap dipakai di file lain
?>
