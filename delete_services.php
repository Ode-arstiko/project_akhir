<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    include 'koneksi.php';

    $id_note = $_POST['id_note'];

    $data = mysqli_query($conn, "DELETE FROM note WHERE id_note='$id_note'");
    if ($data){
        echo json_encode([
            'pesan'=>'Sukses '
        ]);
    } else{
        echo json_encode([
            'pesan'=>'Gagal '
        ]);
    }
?>
