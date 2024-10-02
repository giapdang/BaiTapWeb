<?php
require 'role.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['role_id'])) {
        $role_id = $_POST['role_id'];
        delete_role($role_id);
        header("Location: role_list.php");
        exit();
    } else {
        die("ID vai trò không hợp lệ.");
    }
} else {
    die("Phương thức yêu cầu không hợp lệ.");
}
?>