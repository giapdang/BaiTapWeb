<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "b5_mydb";

try {
    // Kết nối đến cơ sở dữ liệu
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cập nhật thông tin nhân viên
    $sql = "UPDATE MyGuests SET firstname = 'Jane' WHERE firstname = 'James'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Truy vấn dữ liệu sau khi cập nhật
    $stmt = $conn->prepare("SELECT id, firstname, lastname, reg_date FROM MyGuests");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultsAfter = $stmt->fetchAll();


    // Hiển thị dữ liệu trong bảng HTML
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Danh sách nhân viên sửa</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }
            table {
                border: 1px solid black;
                width: 50%;
            }
            th, td {
                border: 1.5px solid black;
                padding: 5px;
                
            }
            td {
                font-weight: 500;
            }
        </style>
    </head>
    <body>
    <h1>Danh sách nhân viên sau khi sửa</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Reg_Date</th>
            </tr>";

    foreach ($resultsAfter as $row) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['firstname']) . "</td>
                <td>" . htmlspecialchars($row['lastname']) . "</td>
                <td>" . htmlspecialchars($row['reg_date']) . "</td>
              </tr>";
    }

    echo "</table>
    <a href='xoaNhanVien.php'>Vào trang xóa nhân viên</a>
    </body>
    </html>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
