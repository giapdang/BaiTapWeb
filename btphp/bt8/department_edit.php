<?php
require 'department.php';

if (isset($_GET['department_id'])) {
    $department_id = $_GET['department_id'];
    $department = get_department($department_id);

    if (!$department) {
        die("Phòng ban không tồn tại.");
    }
} else {
    die("ID phòng ban không hợp lệ.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_name = $_POST['department_name'];
    edit_department($department_id, $department_name);
    header("Location: department_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa phòng ban</title>
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
        <h1>Sửa phòng ban</h1>
        <form action="department_edit.php?department_id=<?php echo htmlspecialchars($department_id); ?>" method="post">
            <label for="department_name">Department name:</label>
            <input type="text" id="department_name" name="department_name" value="<?php echo htmlspecialchars($department['department_name']); ?>" required><br>
            <button type="submit">Lưu</button>
        </form>
        <a href="department_list.php" class="back-link">Quay lại danh sách phòng ban</a>
    </div>
</body>
</html>