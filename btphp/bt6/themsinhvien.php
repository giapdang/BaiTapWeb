<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
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
    <h1>Thêm sinh viên</h1>
    <form method="post" action="">
        <label for="hoten">Họ tên:</label>
        <input type="text" id="hoten" name="hoten" required><br><br>
        <label for="gioitinh">Giới tính:</label>
        <input type="text" id="gioitinh" name="gioitinh" required><br><br>
        <label for="ngaysinh">Ngày sinh:</label>
        <input type="date" id="ngaysinh" name="ngaysinh" required><br><br>
        <button type="submit">Thêm sinh viên</button>
    </form>

    <?php
    require 'connectDatabase.php';
    require 'funcionsinhvien.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hoten = $_POST['hoten'];
        $gioitinh = $_POST['gioitinh'];
        $ngaysinh = $_POST['ngaysinh'];

        try {
            // Kết nối đến cơ sở dữ liệu
            $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Thêm sinh viên
            themSinhVien($conn, $hoten, $gioitinh, $ngaysinh);

            echo "Thêm sinh viên thành công!";
            header("Location: hienthisinhvien.php");
            exit;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    }
    ?>
</body>
</html>