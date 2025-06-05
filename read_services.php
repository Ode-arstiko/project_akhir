<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Content-Type: application/json; charset=UTF-8");

    $servername = "mysql.railway.internal";
    $username = "root";
    $password = "skUAaQacyIAsvrmDjOgBctsJtqPeVzBZ";
    $dbname = "railway";
    $port = 3306;
    
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    $query = mysqli_query($koneksi,'SELECT * FROM note');
    $data = mysqli_fetch_all ($query, MYSQLI_ASSOC);
    echo json_encode($data);
?>
