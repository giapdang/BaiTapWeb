<?php
$host = "sql110.infinityfree.com";
$username = "if0_37102022";
$password = "GhYybBSbQZj";
$database = "if0_37102022_qlsinhvien";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    // Thiết lập chế độ lỗi PDO thành ngoại lệ
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>