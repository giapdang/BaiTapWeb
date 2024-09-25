<?php
require 'connectDatabase.php';
require 'funcionsinhvien.php';

try {
    // Kết nối đến cơ sở dữ liệu
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lấy dữ liệu sinh viên
    $results = hienthiSinhVien($conn);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .add-button {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <button class='add-button' onclick="window.location.href='themsinhvien.php'">Thêm sinh viên</button>
    <table>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['hoten']); ?></td>
                <td><?php echo htmlspecialchars($row['gioitinh']); ?></td>
                <td><?php echo htmlspecialchars($row['ngaysinh']); ?></td>
                <td class='actions'>
                    <button onclick="window.location.href='suasinhvien.php?id=<?php echo $row['id']; ?>'">Sửa</button>
                    <button onclick="window.location.href='xoasinhvien.php?id=<?php echo $row['id']; ?>'">Xóa</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>