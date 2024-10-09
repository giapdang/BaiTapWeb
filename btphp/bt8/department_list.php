<?php 
require 'department.php';

// đăng nhập mới có thể xem danh sách phòng ban
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: dangNhap.php');
    exit();
}

$departments = get_all_department();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách phòng ban</title>
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
    <h1>Danh sách phòng ban</h1>
    <a href="department_add.php">Thêm phòng ban mới</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Department name</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departments as $department): ?>
                <tr>
                    <td><?php echo htmlspecialchars($department['department_id']); ?></td>
                    <td><?php echo htmlspecialchars($department['department_name']); ?></td>
                    <td class="action-buttons">
                        <form action="department_edit.php" method="get" style="display:inline;">
                            <input type="hidden" name="department_id" value="<?php echo htmlspecialchars($department['department_id']); ?>">
                            <button type="submit" class="edit">Sửa</button>
                        </form>
                        <form action="department_delete.php" method="post" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa phòng ban này không?');">
                            <input type="hidden" name="department_id" value="<?php echo htmlspecialchars($department['department_id']); ?>">
                            <button type="submit" class="delete">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="employee_list.php">Quay lại sách nhân viên</a>
</body>
</html>