<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Content-Type: application/json; charset=UTF-8");
    include 'koneksi.php';

    $email = $_POST['email'] ?? '';

    if (!$email) {
        echo json_encode(["success" => false, "message" => "Email tidak dikirim"]);
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM note WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
?>
