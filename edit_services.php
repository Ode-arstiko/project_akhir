<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include 'koneksi.php';

$id_note = $_POST['id_note'];
$judul_note = $_POST['judul_note'];
$deskripsi = $_POST['deskripsi'];

$data = mysqli_query($koneksi, "update note set judul_note='$judul_note', deskripsi='$deskripsi' where id_note='$id_note'");
if ($data){
    echo json_encode([
        'pesan'=>'Sukses Update'
    ]);
} else{
    echo json_encode([
        'pesan'=>'Gagal Update'
    ]);
}
