<?php
function hienThiFormNhapSoLuong($n) {
    echo '<form action="bai1.php" method="post">';
    echo '<fieldset>';
    echo '<legend>Nhập số lượng phần tử</legend>';
    echo '<input type="text" name="n" placeholder="Nhập n" value="' . htmlspecialchars($n) . '">';
    echo '<input type="submit" value="Nhập">';
    echo '</fieldset>';
    echo '</form>';
}

function hienThiFormNhapPhanTu($n) {
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

function xuLyMang($arr) {
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

    echo '<form action="bai1.php" method="post">';
    echo '<fieldset>';
    echo '<legend>Tìm số trong mảng</legend>';
    echo '<input type="hidden" name="n" value="' . htmlspecialchars(count($arr)) . '">';
    foreach ($arr as $value) {
        echo '<input type="hidden" name="arr[]" value="' . htmlspecialchars($value) . '">';
    }
    echo '<input type="text" name="find" placeholder="Nhập số cần tìm">';
    echo '<input type="submit" value="Tìm số">';
    echo '</fieldset>';
    echo '</form>';
    echo '</div>';
}

function timSoTrongMang($arr, $find) {
    echo '<div class="result">';
    $index = array_search($find, $arr);
    if ($index !== false) {
        echo '<p>Số ' . htmlspecialchars($find) . ' có xuất hiện trong mảng</p>';
    } else {
        echo '<p>Số ' . htmlspecialchars($find) . ' không xuất hiện trong mảng</p>';
    }
    echo '</div>';
}
?>