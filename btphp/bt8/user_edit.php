<?php
require_once 'user.php';
require_once 'role.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];

    update_user($id, $username, $password, $role_id);
    header('Location: user_list.php');
    exit();
}

$id = $_GET['id'];
$user = get_user($id);
$roles = get_all_role();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 400px;
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
        input[type="text"], input[type="password"], select {
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Sửa người dùng</h1>
        <form method="POST" action="user_edit.php">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
            <label for="role_id">Vai trò:</label>
            <select id="role_id" name="role_id" required>
                <?php foreach ($roles as $role): ?>
                    <option value="<?php echo $role['role_id']; ?>" <?php if ($role['role_id'] == $user['role_id']) echo 'selected'; ?>>
                        <?php echo $role['role_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Lưu</button>
        </form>
    </div>
</body>
</html>