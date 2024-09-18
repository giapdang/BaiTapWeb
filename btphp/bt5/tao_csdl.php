<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo cơ sở dữ liệu</title>
</head>
<body>
<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37102022";
$password = "GhYybBSbQZj";

try {
    // Kết nối đến MySQL server
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tạo cơ sở dữ liệu
    $sql = "CREATE DATABASE IF NOT EXISTS if0_37102022_b5_mydb";
    $conn->exec($sql);
    echo "Database created successfully<br>";

    // Kết nối đến cơ sở dữ liệu myDBPDO
    $conn->exec("USE if0_37102022_b5_mydb");

    // Tạo bảng
    $sql = "CREATE TABLE IF NOT EXISTS MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) UNIQUE,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "Table MyGuests created successfully<br>";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
<a href="themDuLieu.php"> Vào trang thêm dữ liệu nhân viên</a>
</body>
</html>