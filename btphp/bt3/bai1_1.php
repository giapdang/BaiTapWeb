<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $tenSach = htmlspecialchars($_GET['tenSach']);
    $tacGia = htmlspecialchars($_GET['tacGia']);
    $nhaXuatBan = htmlspecialchars($_GET['nhaXuatBan']);
    $namXuatBan = htmlspecialchars($_GET['namXuatBan']);

    echo "<h2>Thông Tin Sách</h2>";
    echo "<p><strong>Tên Sách:</strong> $tenSach</p>";
    echo "<p><strong>Tác Giả:</strong> $tacGia</p>";
    echo "<p><strong>Nhà Xuất Bản:</strong> $nhaXuatBan</p>";
    echo "<p><strong>Năm Xuất Bản:</strong> $namXuatBan</p>";
}
?>