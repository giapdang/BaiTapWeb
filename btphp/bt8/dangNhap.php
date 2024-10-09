<?php
require_once 'connect_db.php';

session_start();

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra đầu vào
    if (empty($username) || empty($password)) {
        $error_message = "Vui lòng nhập tên đăng nhập và mật khẩu.";
    } else {
        $conn = connect_db();
        $sql = "SELECT user.*, role.role_name FROM user 
                JOIN role ON user.role_id = role.role_id WHERE user.username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Kiểm tra kết quả
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy thông tin người dùng
            if (password_verify($password, $row['password'])) {
                // Lưu thông tin người dùng vào session
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role_name'];

                if ($row['role_name'] == 'ADMIN') {
                    header('Location: trang_quan_tri.php');
                    exit();
                } else {
                    $error_message = "Bạn không có quyền truy cập vào trang này.";
                }
            } else {
                $error_message = "Mật khẩu không đúng.";
            }
        } else {
            $error_message = "Tên đăng nhập không tồn tại.";
        }
        disconnect_db($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
        .credentials {
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Đăng nhập</h1>
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
    <div class="credentials">
        <p>username admin: admin</p>
        <p>password admin: admin</p>
    </div>
</body>

</html>