<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bai1.css">
    <title>Bài 1</title>
</head>
<body>
    <div class="container">
        <?php
        include 'bai1_function.php';

        $n = isset($_POST['n']) ? $_POST['n'] : '';
        hienThiFormNhapSoLuong($n);

        if (isset($_POST['n'])) {
            $n = $_POST['n'];
            hienThiFormNhapPhanTu($n);
        }

        if (isset($_POST['arr'])) {
            $arr = $_POST['arr'];
            xuLyMang($arr);

            if (isset($_POST['find'])) {
                $find = $_POST['find'];
                timSoTrongMang($arr, $find);
            }
        }
        ?>
    </div>
</body>
</html>