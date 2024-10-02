<?php
require 'employee.php';

// Lấy danh sách tất cả nhân viên
$employees = get_all_employee();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách nhân viên</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Danh sách nhân viên</h1><br>
    <a href="employee_add.php" class="button">Thêm nhân viên mới</a><br><br>
    <a href="department_list.php" class="button">Danh sách phòng ban</a><br><br>
    <a href="role_list.php" class="button">Danh sách vai trò</a><br><br>
    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Role</th>
            <th>Department </th>
            <th>Chọn thao tác</th>
        </tr>
        <?php foreach ($employees as $employee) { ?>
        <tr>
            <td><?php echo htmlspecialchars($employee['first_name']); ?></td>
            <td><?php echo htmlspecialchars($employee['last_name']); ?></td>
            <td><?php echo htmlspecialchars($employee['role_name']); ?></td>
            <td><?php echo htmlspecialchars($employee['department_name']); ?></td>
            <td>
                <form action="employee_edit.php" method="get" style="display:inline;">
                    <input type="hidden" name="employee_id" value="<?php echo htmlspecialchars($employee['employees_id']); ?>">
                    <button type="submit" class="button">Sửa</button>
                </form>
                <form action="employee_delete.php" method="post" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa nhân viên này không?');">
                    <input type="hidden" name="employee_id" value="<?php echo htmlspecialchars($employee['employees_id']); ?>">
                    <button type="submit" class="button button-delete">Xóa</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>