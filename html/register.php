<?php
session_start();

$mysqli = new mysqli("db", "root", "", "mydatabase"); // Sử dụng thông tin kết nối đúng

if ($mysqli->connect_error) {
    die("Kết nối thất bại: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra xem tên người dùng đã tồn tại chưa
    $checkQuery = "SELECT * FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($checkQuery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Thêm người dùng mới
        $insertQuery = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $mysqli->prepare($insertQuery);
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            header("Location: login.php"); // Chuyển hướng đến trang đăng nhập
            exit();
        } else {
            $error = "Đăng ký không thành công!";
        }
    } else {
        $error = "Tên người dùng đã tồn tại!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
</head>
<body>
    <h2>Đăng ký</h2>
    <form method="POST">
        Tên đăng nhập: <input type="text" name="username" required>
        Mật khẩu: <input type="password" name="password" required>
        <button type="submit">Đăng ký</button>
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
