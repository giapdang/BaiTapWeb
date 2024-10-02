<?php 
require 'role.php';

$roles = get_all_role();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách vai trò</title>
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
    <h1>Danh sách vai trò</h1>
    <a href="role_add.php">Thêm vai trò mới</a><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Role name</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?php echo htmlspecialchars($role['role_id']); ?></td>
                    <td><?php echo htmlspecialchars($role['role_name']); ?></td>
                    <td class="action-buttons">
                        <form action="role_edit.php" method="get" style="display:inline;">
                            <input type="hidden" name="role_id" value="<?php echo htmlspecialchars($role['role_id']); ?>">
                            <button type="submit" class="edit">Sửa</button>
                        </form>
                        <form action="role_delete.php" method="post" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa vai trò này không?');">
                            <input type="hidden" name="role_id" value="<?php echo htmlspecialchars($role['role_id']); ?>">
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