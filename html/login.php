<?php
session_start();

$mysqli = new mysqli("db", "root", "", "mydatabase"); // Sử dụng thông tin kết nối đúng

if ($mysqli->connect_error) {
    die("Kết nối thất bại: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['login_time'] = time();
        header("Location: index.php");
        exit();
    } else {
        $error = "Thông tin đăng nhập không chính xác!";
    }
}
?>