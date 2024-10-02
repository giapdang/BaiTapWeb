<?php
require 'connect_db.php';

// Hàm lấy tất cả vai trò
function get_all_role() {
    $conn = connect_db();
    $sql = "SELECT * FROM role";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    disconnect_db($conn);
    return $result;
}

// Hàm lấy vai trò theo id
function get_role($role_id) {
    $conn = connect_db();
    $sql = "SELECT * FROM role WHERE role_id = :role_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->execute();
    $result = $stmt->fetch();
    disconnect_db($conn);
    return $result;
}

// Hàm thêm vai trò
function add_role($role_name) {
    $conn = connect_db();
    $sql = "INSERT INTO role (role_name) VALUES (:role_name)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':role_name', $role_name);
    $stmt->execute();
    disconnect_db($conn);
}

// Hàm sửa vai trò
function edit_role($role_id, $role_name) {
    $conn = connect_db();
    $sql = "UPDATE role SET role_name = :role_name WHERE role_id = :role_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':role_name', $role_name);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->execute();
    disconnect_db($conn);
}

// Hàm xóa vai trò
function delete_role($role_id) {
    $conn = connect_db();
    $sql = "DELETE FROM role WHERE role_id = :role_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->execute();
    disconnect_db($conn);
}
?>