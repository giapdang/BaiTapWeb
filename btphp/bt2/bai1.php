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
        <form action="bai1.php" method="post">
            <fieldset>
                <legend>Nhập số lượng phần tử</legend>
                <input type="text" name="n" placeholder="Nhập n" value="<?php echo isset($_POST['n']) ? $_POST['n'] : ''; ?>">
                <input type="submit" value="Nhập">
            </fieldset>
        </form>

        <?php
        if (isset($_POST['n'])) {
            $n = $_POST['n'];
            echo '<form action="bai1.php" method="post">';
            echo '<fieldset>';
            echo '<legend>Nhập các phần tử của mảng</legend>';
            echo '<input type="hidden" name="n" value="' . htmlspecialchars($n) . '">';
            for ($i = 0; $i < $n; $i++) {
                echo '<input type="text" name="arr[]" placeholder="Nhập giá trị phần tử ' . ($i + 1) . '"><br>';
            }
            echo '<input type="submit" value="Sắp xếp và tìm kết quả">';
            echo '</fieldset>';
            echo '</form>';
        }

        if (isset($_POST['arr'])) {
            $arr = $_POST['arr'];
            echo '<div class="result">';
            echo '<p>Mảng số nguyên: ';
            foreach ($arr as $value) {
                echo htmlspecialchars($value) . " ";
            }
            echo '</p>';

            sort($arr);
            echo '<p>Mảng sau khi sắp xếp: ';
            foreach ($arr as $value) {
                echo htmlspecialchars($value) . " ";
            }
            echo '</p>';

            $min = $arr[0];
            $max = max($arr);
            $sum = array_sum($arr);
            echo '<p>Giá trị nhỏ nhất: ' . htmlspecialchars($min) . '</p>';
            echo '<p>Giá trị lớn nhất: ' . htmlspecialchars($max) . '</p>';
            echo '<p>Tổng các phần tử trong mảng: ' . htmlspecialchars($sum) . '</p>';

            // Tìm 1 số trong mảng nhập từ bàn phím
            echo '<form action="bai1.php" method="post">';
            echo '<fieldset>';
            echo '<legend>Tìm số trong mảng</legend>';
            echo '<input type="hidden" name="n" value="' . htmlspecialchars(count($arr)) . '">'; // truyền n để hiển thị mảng
            foreach ($arr as $value) {
                echo '<input type="hidden" name="arr[]" value="' . htmlspecialchars($value) . '">'; // truyền mảng để hiển thị
            }
            echo '<input type="text" name="find" placeholder="Nhập số cần tìm">';
            echo '<input type="submit" value="Tìm số">';
            echo '</fieldset>';
            echo '</form>';
            echo '</div>';
            echo '<div class="result">';

            if (isset($_POST['find'])) {
                $find = $_POST['find'];
                $index = array_search($find, $arr);
                if ($index !== false) {
                    echo '<p>Số ' . htmlspecialchars($find) . ' có xuất hiện trong mảng</p>';
                } else {
                    echo '<p>Số ' . htmlspecialchars($find) . ' không xuất hiện trong mảng</p>';
                }
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>