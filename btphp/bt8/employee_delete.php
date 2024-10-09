<?php
require 'employee.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = trim($_POST['employee_id']);

    // Xóa nhân viên khỏi CSDL
    delete_employee($employee_id);
    header('Location: employee_list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xóa nhân viên</title>
</head>
<body>
        <form action="employee_delete.php" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa nhân viên này không?');">
            <input type="hidden" name="employee_id" value="<?php echo htmlspecialchars($employee_id); ?>">
            <button type="submit" class="button">Xóa</button>
        </form>
    <br>
    <a href="employee_list.php" class="button">Quay lại danh sách nhân viên</a>
</body>
</html>