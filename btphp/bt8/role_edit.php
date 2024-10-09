<?php
require 'role.php';

if (isset($_GET['role_id'])) {
    $role_id = $_GET['role_id'];
    $role = get_role($role_id);

    if (!$role) {
        die("Vai trò không tồn tại.");
    }
} else {
    die("ID vai trò không hợp lệ.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role_name = $_POST['role_name'];
    edit_role($role_id, $role_name);
    header("Location: role_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa vai trò</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
            color: #555;
        }
        input[type="text"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #333;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sửa vai trò</h1>
        <form action="role_edit.php?role_id=<?php echo htmlspecialchars($role_id); ?>" method="post">
            <label for="role_name">Role name:</label>
            <input type="text" id="role_name" name="role_name" value="<?php echo htmlspecialchars($role['role_name']); ?>"><br>
            <button type="submit">Lưu</button>
        </form>
        <a href="role_list.php" class="back-link">Quay lại danh sách vai trò</a> <br>
    </div>
</body>
</html>