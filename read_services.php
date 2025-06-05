<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Content-Type: application/json; charset=UTF-8");

    $servername = "sql301.infinityfree.com";
    $username = "if0_39158864";
    $password = "nbVTynmrXl90RV";
    $dbname = "if0_39158864_flutter_project_akhir";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    $query = mysqli_query($koneksi,'SELECT * FROM note');
    $data = mysqli_fetch_all ($query, MYSQLI_ASSOC);
    echo json_encode($data);
?>
