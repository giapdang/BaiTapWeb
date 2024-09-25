<?php
require 'connectDatabase.php';
require 'funcionsinhvien.php';

try {
    // Kết nối đến cơ sở dữ liệu
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $hoten = $_POST['hoten'];
        $gioitinh = $_POST['gioitinh'];
        $ngaysinh = $_POST['ngaysinh'];

        // Cập nhật thông tin sinh viên
        suaSinhVien($conn, $id, $hoten, $gioitinh, $ngaysinh);

        echo "Cập nhật sinh viên thành công!";
        header("Location: hienthisinhvien.php");
        exit;
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sinhvien = laySinhVienTheoId($conn, $id);
    } else {
        echo "Không tìm thấy sinh viên!";
        exit;
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
    </style>
</head>
<body>
    <h1>Sửa sinh viên</h1>
    <form method="post" action="">
        <label for="hoten">Họ tên:</label>
        <input type="text" id="hoten" name="hoten" value="<?php echo htmlspecialchars($sinhvien['hoten']); ?>" required><br><br>
        <label for="gioitinh">Giới tính:</label>
        <input type="text" id="gioitinh" name="gioitinh" value="<?php echo htmlspecialchars($sinhvien['gioitinh']); ?>" required><br><br>
        <label for="ngaysinh">Ngày sinh:</label>
        <input type="date" id="ngaysinh" name="ngaysinh" value="<?php echo htmlspecialchars($sinhvien['ngaysinh']); ?>" required><br><br>
        <button type="submit">Cập nhật sinh viên</button>
    </form>
</body>
</html>