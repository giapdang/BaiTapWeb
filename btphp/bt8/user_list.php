<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a.add-user {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.add-user:hover {
            background-color: #45a049;
        }
        .action-buttons form {
            display: inline;
        }
        .action-buttons button {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .edit {
            background-color: #FFC107;
            color: white;
        }
        .edit:hover {
            background-color: #FFB300;
        }
        .delete {
            background-color: #F44336;
            color: white;
        }
        .delete:hover {
            background-color: #E53935;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadUsers() {
                $.ajax({
                    url: 'user.php?get_all_user=true', // Đảm bảo đường dẫn này là chính xác
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var tableBody = $('#userTable tbody');
                        tableBody.empty();
                        data.forEach(function(user) {
                            var row = '<tr>' +
                                '<td>' + user.id + '</td>' +
                                '<td>' + user.username + '</td>' +
                                '<td>'+ user.password + '</td>'+
                                '<td>' + user.role_name + '</td>' +
                                '<td class="action-buttons">' +
                                '<form action="user_edit.php" method="get" style="display:inline;">' +
                                '<input type="hidden" name="id" value="' + user.id + '">' +
                                '<button type="submit" class="edit">Sửa</button>' +
                                '</form>' +
                                '<form action="user_delete.php" method="post" style="display:inline;" onsubmit="return confirm(\'Bạn có chắc chắn muốn xóa người dùng này không?\');">' +
                                '<input type="hidden" name="id" value="' + user.id + '">' +
                                '<button type="submit" class="delete">Xóa</button>' +
                                '</form>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + status + ' ' + error);
                    }
                });
            }

            loadUsers();
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>Danh sách người dùng</h1>
        <a href="user_add.php" class="add-user">Thêm người dùng mới</a>
        <table id="userTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên người dùng</th>
                    <th>Mật khẩu</th> <!-- Không nên hiển thị mật khẩu -->
                    <th>Vai trò</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dữ liệu sẽ được tải ở đây -->
            </tbody>
        </table>
        <a href="trang_quan_tri.php" class="back-link">Quay lại trang quản trị</a>
    </div>
</body>
</html>