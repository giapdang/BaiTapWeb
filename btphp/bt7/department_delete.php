<?php
require 'department.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['department_id'])) {
        $department_id = $_POST['department_id'];
        delete_department($department_id);
        header("Location: department_list.php");
        exit();
    } else {
        die("ID phòng ban không hợp lệ.");
    }
} else {
    die("Phương thức yêu cầu không hợp lệ.");
}
?>