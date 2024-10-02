<?php
require 'employee.php';

$errors = [];
$employee_id = '';
$first_name = '';
$last_name = '';
$department_id = '';
$role_id = '';

// Kiểm tra xem có tham số employee_id trong URL không
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    $employee = get_employees($employee_id);

    if ($employee) {
        $first_name = $employee['first_name'];
        $last_name = $employee['last_name'];
        $department_id = isset($employee['department_id']) ? $employee['department_id'] : ''; 
        $role_id = isset($employee['role_id']) ? $employee['role_id'] : '';
    } else {
        $errors[] = 'Nhân viên không tồn tại';
    }
} else {
    $errors[] = 'Thiếu tham số employee_id';
}

// Lấy danh sách phòng ban và vai trò từ CSDL
$departments = get_all_department();
$roles = get_all_role();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['employee_id'])) {
    // Lấy employee_id từ URL
    $employee_id = $_GET['employee_id'];
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

    // Nếu không có lỗi, cập nhật thông tin nhân viên trong CSDL
    if (empty($errors)) {
        edit_employee($employee_id, $first_name, $last_name, $department_id, $role_id);
        header('Location: employee_list.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa nhân viên</title>
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
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Chỉnh sửa nhân viên</h1>
    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="employee_edit.php?employee_id=<?php echo htmlspecialchars($employee_id); ?>" method="post">
        <fieldset>
        <label for="first_name">Họ:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>"><br>
        <label for="last_name">Tên:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>"><br>
        <label for="role_id">Vai trò:</label>
        <select id="role_id" name="role_id">
            <?php foreach ($roles as $role): ?>
                <option value="<?php echo htmlspecialchars($role['role_id']); ?>" <?php if ($role_id == $role['role_id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($role['role_name']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <label for="department_id">Phòng ban:</label>
        <select id="department_id" name="department_id">
            <?php foreach ($departments as $department): ?>
                <option value="<?php echo htmlspecialchars($department['department_id']); ?>" <?php if ($department_id == $department['department_id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($department['department_name']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit" class="button">Lưu</button><br>
        <a href="employee_list.php" class="button">Quay lại danh sách nhân viên</a>
        </fieldset>
    </form>
</body>
</html>