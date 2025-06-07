<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Content-Type: application/json; charset=UTF-8");

    $servername = "sql12.freesqldatabase.com";
    $username = "sql12783285";
    $password = "zfzP9skHps";
    $dbname = "sql12783285";
    $port = 3306;
    
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    $query = mysqli_query($conn,'SELECT * FROM note');
    $data = mysqli_fetch_all ($query, MYSQLI_ASSOC);
    echo json_encode($data);
?>
