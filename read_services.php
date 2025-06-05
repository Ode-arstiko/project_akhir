<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Content-Type: application/json; charset=UTF-8");

    $koneksi = new mysqli('localhost', 'root','','flutter_project_akhir');
    $query = mysqli_query($koneksi,'SELECT * FROM note');
    $data = mysqli_fetch_all ($query, MYSQLI_ASSOC);
    echo json_encode($data);
?>