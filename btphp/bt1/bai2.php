<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bai2.css">
    <title>bai 2</title>
</head>
<body>
<table>
    <tr>
        <th>STT</th>
        <th>Tên sách</th>
        <th>Nội dung</th>
    </tr>
    <?php
    for ($i = 1; $i <= 100; $i++) {
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>Tensach$i</td>";
        echo "<td>Noidung$i</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
<script src="bai2.js"></script>
</html>