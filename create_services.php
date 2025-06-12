<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

// Koneksi ke database
include 'koneksi.php';

// Ambil data dari request
$judul_note = $_POST['judul_note'] ?? '';
$deskripsi = $_POST['deskripsi'] ?? '';
$email = $_POST['email'] ?? '';

// Validasi input (tidak boleh kosong)
if (empty($judul_note) || empty($deskripsi)) {
    die(json_encode(["pesan" => "Data tidak boleh kosong!"]));
}

// Menggunakan Prepared Statement untuk mencegah SQL Injection
$stmt = $conn->prepare("INSERT INTO note (judul_note, deskripsi) VALUES ( ?, ?, ?)");
$stmt->bind_param("sss",  $judul_note, $deskripsi, $email);
$data = $stmt->execute();

// Cek hasil query
if ($data) {
    echo json_encode(["pesan" => "Sukses Tambah"]);
} else {
    echo json_encode(["pesan" => "Gagal Tambah: " . $stmt->error]);
}

// Tutup statement dan koneksi
$stmt->close();
?>
