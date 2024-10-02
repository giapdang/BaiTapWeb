<?php
require 'employee.php';

$errors = [];
$first_name = '';
$last_name = '';
$department_id = '';
$role_id = '';

// Lấy danh sách phòng ban và vai trò từ CSDL
$departments = get_all_department();
$roles = get_all_role();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $department_id = trim($_POST['department_id']);
    $role_id = trim($_POST['role_id']);

    // Validate form
    if (empty($first_name)) {
        $errors[] = 'Họ không được để trống';
    }
    if (empty($last_name)) {
        $errors[] = 'Tên không được để trống';
    }
    if (empty($department_id)) {
        $errors[] = 'Phòng ban không được để trống';
    }
    if (empty($role_id)) {
        $errors[] = 'Vai trò không được để trống';
    }

    // Nếu không có lỗi, thêm nhân viên vào CSDL
    if (empty($errors)) {
        add_employee($first_name, $last_name, $department_id, $role_id);
        header('Location: employee_list.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm nhân viên mới</title>
    <style>
        .error { color: red; }
        form {
            width: 50%;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }

        fieldset {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 4px;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Thêm nhân viên mới</h1>
    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="employee_add.php" method="post">
        <fieldset>
        <label for="first_name">First name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>"><br>
        <label for="last_name">Last name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>"><br>
        <label for="role_id">Role:</label>
        <select id="role_id" name="role_id">
            <?php foreach ($roles as $role): ?>
                <option value="<?php echo htmlspecialchars($role['role_id']); ?>" <?php if ($role_id == $role['role_id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($role['role_name']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <label for="department_id">Department:</label>
        <select id="department_id" name="department_id">
            <?php foreach ($departments as $department): ?>
                <option value="<?php echo htmlspecialchars($department['department_id']); ?>" <?php if ($department_id == $department['department_id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($department['department_name']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit" class="button">Lưu</button>
        <a href="employee_list.php" class="button">Quay lại danh sách nhân viên</a>
        </fieldset>
    </form>
</body>
</html>