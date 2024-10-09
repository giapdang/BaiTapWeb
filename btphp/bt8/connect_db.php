<?php 
// ham ket noi database
function connect_db()
{
    $servername = "sql110.infinityfree.com";
    $username = "if0_37102022";
    $password = "GhYybBSbQZj";
    $database = "if0_37102022_qlinhanvien";
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "quanlinhanvien";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// ham disconnect database
function disconnect_db($conn)
{
    $conn = null;
}
?>