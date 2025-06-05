<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

// Koneksi ke database
$servername = "sql12.freesqldatabase.com";
$username = "sql12783285";
$password = "zfzP9skHps";
$dbname = "sql12783285";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($koneksi->connect_error) {
    die(json_encode(["pesan" => "Koneksi gagal: " . $koneksi->connect_error]));
}

// Ambil data dari request
$judul_note = $_POST['judul_note'] ?? '';
$deskripsi = $_POST['deskripsi'] ?? '';

// Validasi input (tidak boleh kosong)
if (empty($judul_note) || empty($deskripsi)) {
    die(json_encode(["pesan" => "Data tidak boleh kosong!"]));
}

// Menggunakan Prepared Statement untuk mencegah SQL Injection
$stmt = $koneksi->prepare("INSERT INTO note (judul_note, deskripsi) VALUES ( ?, ?)");
$stmt->bind_param("ss",  $judul_note, $deskripsi);
$data = $stmt->execute();

// Cek hasil query
if ($data) {
    echo json_encode(["pesan" => "Sukses Tambah"]);
} else {
    echo json_encode(["pesan" => "Gagal Tambah: " . $stmt->error]);
}

// Tutup statement dan koneksi
$stmt->close();
$koneksi->close();
?>
