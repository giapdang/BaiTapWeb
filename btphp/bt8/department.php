<?php
require_once 'connect_db.php';

// Hàm lấy tất cả phòng ban
function get_all_department() {
    $conn = connect_db();
    $sql = "SELECT * FROM departments";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    disconnect_db($conn);
    return $result;
}

// Hàm lấy phòng ban theo id
function get_department($department_id) {
    $conn = connect_db();
    $sql = "SELECT * FROM departments WHERE department_id = :department_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    $result = $stmt->fetch();
    disconnect_db($conn);
    return $result;
}

// Hàm thêm phòng ban

function add_department($department_name) {
    $conn = connect_db();
    $sql = "INSERT INTO departments (department_name) VALUES (:department_name)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':department_name', $department_name);
    $stmt->execute();
    disconnect_db($conn);
}

// Hàm sửa phòng ban
function edit_department($department_id, $department_name) {
    $conn = connect_db();
    $sql = "UPDATE departments SET department_name = :department_name WHERE department_id = :department_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':department_name', $department_name);
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    disconnect_db($conn);
}

// Hàm xóa phòng ban
function delete_department($department_id) {
    $conn = connect_db();
    $sql = "DELETE FROM departments WHERE department_id = :department_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    disconnect_db($conn);
}

?>