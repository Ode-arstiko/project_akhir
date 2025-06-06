<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo json_encode(["success" => false, "message" => "Email dan password wajib diisi"]);
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == $user['password']) {
            echo json_encode([
                "success" => true,
                "message" => "Login berhasil",
                "data" => [
                    "id" => $user['id'],
                    "username" => $user['username'],
                    "email" => $user['email'],
                    "address" => $user['address'],
                    "telp" => $user['telp']
                ]
            ]);
        }else{
            echo json_encode(["success" => false, "message" => "Password salah"]);
        }
    }else{
        echo json_encode(["success" => false, "message" => "Email tidak ditemukan"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Metode tidak di izinkan"]);
}
?>
