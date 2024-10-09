<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'ADMIN') {
    header('Location: dangNhap.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Trang Quản Trị</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .admin-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        a {
            display: block;
            margin: 10px 0;
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="admin-container">
        <h1>Đây là trang quản trị.</h1>
        <p>Chào mừng, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <a href="user_list.php">Danh sách người dùng</a>
        <a href="employee_list.php">Danh sách nhân viên</a>
        <a href="dangNhap.php">Đăng xuất</a>
    </div>
</body>

</html>