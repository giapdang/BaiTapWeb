<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm dữ liệu</title>
</head>
<body>
<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37102022";
$password = "GhYybBSbQZj";
$dbname = "if0_37102022_b5_mydb";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT IGNORE INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com'),
         ('Jane', 'Smith', 'jane@example.com'),
         ('James', 'Johnson', 'james@example.com'),
         ('Emily', 'Brown', 'emily@example.com'),
         ('Michael', 'Davis', 'michael@example.com')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
<a href="hienThiDanhSach.php"> Vào trang hiển thị dữ liệu nhân viên</a>
</body>
</html>