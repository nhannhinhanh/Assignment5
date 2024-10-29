<?php
session_start();

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chính</title>
</head>
<body>
    <h2>Chào mừng đến với trang EmDepLam123!</h2>
    <?php if (isset($_SESSION['username'])): ?>
        <p>Xin chào, <?php echo $_SESSION['username']; ?>!</p>
        <a href="logout.php">Đăng xuất</a>
    <?php else: ?>
        <p><a href="login.php">Đăng nhập</a> hoặc <a href="register.php">Đăng ký</a></p>
    <?php endif; ?>
</body>
</html>

