<?php
require_once 'connect_db.php';

// Hàm thêm người dùng
function add_user($username, $password, $role_id) {
    $conn = connect_db();
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (username, password, role_id) VALUES (:username, :password, :role_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password_hash);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->execute();
    disconnect_db($conn);
}

// Hàm lấy thông tin người dùng theo ID
function get_user($id) {
    $conn = connect_db();
    $sql = "SELECT * FROM user WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch();
    disconnect_db($conn);
    return $result;
}

// Hàm cập nhật người dùng
function update_user($id, $username, $password, $role_id) {
    $conn = connect_db();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Mã hóa mật khẩu
    $sql = "UPDATE user SET username = :username, password = :password, role_id = :role_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password); // Sử dụng mật khẩu đã mã hóa
    $stmt->bindParam(':role_id', $role_id);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    disconnect_db($conn);
}

// Hàm xóa người dùng
function delete_user($id) {
    $conn = connect_db();
    $sql = "DELETE FROM user WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    disconnect_db($conn);
}

// Hàm lấy tất cả người dùng
function get_all_user() {
    $conn = connect_db();
    $sql = "SELECT user.*, role.role_name FROM user JOIN role ON user.role_id = role.role_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    disconnect_db($conn);
    return $result;
}

// Trả về JSON danh sách người dùng
if (isset($_GET['get_all_user'])) {
    $result = get_all_user();
    echo json_encode($result);
}
?>