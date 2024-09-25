<?php
require 'connectDatabase.php';
require 'funcionsinhvien.php';

// Hiển thị thông báo lỗi chi tiết
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Kết nối đến cơ sở dữ liệu
        $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Xóa sinh viên
            xoaSinhVien($conn, $id);
            echo "<script>alert('Xóa sinh viên thành công!'); window.location.href = 'hienthisinhvien.php';</script>";
            exit;
        } else {
            // Lấy thông tin sinh viên
            $sinhvien = laySinhVienTheoId($conn, $id);
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }

    $conn = null;
} else {
    echo "Không tìm thấy sinh viên!";
    exit;
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Xóa sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        .info {
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .cancel-button {
            background-color: #f44336;
        }
        .cancel-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <h1>Xóa sinh viên</h1>
    <div class="container">
        <div class="info">
            <p>Bạn có chắc chắn muốn xóa sinh viên sau?</p>
            <p><strong>ID:</strong> <?php echo htmlspecialchars($sinhvien['id']); ?></p>
            <p><strong>Họ tên:</strong> <?php echo htmlspecialchars($sinhvien['hoten']); ?></p>
            <p><strong>Giới tính:</strong> <?php echo htmlspecialchars($sinhvien['gioitinh']); ?></p>
            <p><strong>Ngày sinh:</strong> <?php echo htmlspecialchars($sinhvien['ngaysinh']); ?></p>
        </div>
        <form method="post" action="">
            <div class="buttons">
                <button type="submit">Xóa</button>
                <button type="button" class="cancel-button" onclick="window.location.href='hienthisinhvien.php'">Hủy</button>
            </div>
        </form>
    </div>
</body>
</html>