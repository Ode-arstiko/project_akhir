<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

$servername = "sql12.freesqldatabase.com";
$username = "sql12783285";
$password = "zfzP9skHps";
$dbname = "sql12783285";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $address = $_POST['address'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "Email sudah terdaftar"]);
    }else{
        $stmt = $conn->prepare("INSERT INTO users (username, address, telp, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $address, $telp, $email, $password);

            if ($stmt->execute()) {
                echo json_encode(["success" => true, "message" => "Registrasi berhasil"]);
            }else{
                echo json_encode(["success" => false, "message" => "Registrasi gagal"]);
            }
    }
}

?>
