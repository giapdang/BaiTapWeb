<?php
require 'connect_db.php';
// ham lay tat ca nhan vien
function get_all_employee()
{
    $conn = connect_db();
    $sql = "SELECT employees.employees_id, employees.first_name,employees.last_name,role.role_name,departments.department_name
            FROM employees
            LEFT JOIN role 
            ON employees.role_id = role.role_id
            LEFT JOIN departments 
            ON employees.department_id = departments.department_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    disconnect_db($conn);
    return $result;
}

// ham tra ve thong tin nhan vien theo id
function get_employees($employee_id)
{
    $conn = connect_db();
    $sql = "SELECT employees.employees_id,employees.first_name,employees.last_name,role.role_name,departments.department_name
            FROM employees
            LEFT JOIN role 
            ON employees.role_id = role.role_id
            LEFT JOIN departments 
            ON employees.department_id = departments.department_id
            WHERE employees.employees_id = :employee_id";
    $stmt = $conn->prepare($sql); 
    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->execute();//
    $result = $stmt->fetch();
    disconnect_db($conn);
    return $result;
}

// Hàm thêm nhân viên
function add_employee($employee_firstname, $employee_lastname, $employee_dep, $employee_role) {
    $conn = connect_db();
    $sql = "INSERT INTO employees (first_name, last_name, department_id, role_id) 
            VALUES (:first_name, :last_name, :department_id, :role_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':first_name', $employee_firstname);
    $stmt->bindParam(':last_name', $employee_lastname);
    $stmt->bindParam(':department_id', $employee_dep);
    $stmt->bindParam(':role_id', $employee_role);
    $stmt->execute();
    disconnect_db($conn);
}

// Hàm sửa thông tin nhân viên
function edit_employee($employee_id, $employee_firstname, $employee_lastname, $employee_dep, $employee_role) {
    $conn = connect_db();
    $sql = "UPDATE employees 
            SET first_name = :first_name, last_name = :last_name, department_id = :department_id, role_id = :role_id 
            WHERE employees_id = :employee_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':first_name', $employee_firstname);
    $stmt->bindParam(':last_name', $employee_lastname);
    $stmt->bindParam(':department_id', $employee_dep);
    $stmt->bindParam(':role_id', $employee_role);
    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->execute();
    disconnect_db($conn);
}

// Hàm xóa nhân viên
function delete_employee($employee_id) {
    $conn = connect_db();
    $sql = "DELETE FROM employees WHERE employees_id = :employee_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->execute();
    disconnect_db($conn);
}

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
?>
