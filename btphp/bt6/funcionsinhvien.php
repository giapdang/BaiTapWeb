<?php
require 'connectDatabase.php';

// funcion hienthiSinhVien
function hienthiSinhVien($conn) {
    try {
        $stmt = $conn->prepare("SELECT id, hoten, gioitinh, ngaysinh FROM sinhvien");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// funcion themSinhVien
function themSinhVien($conn, $hoten, $gioitinh, $ngaysinh) {
    try {
        $stmt = $conn->prepare("INSERT INTO sinhvien (hoten, gioitinh, ngaysinh) VALUES (:hoten, :gioitinh, :ngaysinh)");
        $stmt->bindParam(':hoten', $hoten); 
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':ngaysinh', $ngaysinh);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// funcion suaSinhVien
function suaSinhVien($conn, $id, $hoten, $gioitinh, $ngaysinh) {
    try {
        $stmt = $conn->prepare("UPDATE sinhvien SET hoten = :hoten, gioitinh = :gioitinh, ngaysinh = :ngaysinh WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':ngaysinh', $ngaysinh);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// funcion xoaSinhVien
function xoaSinhVien($conn, $id) {
    try {
        $stmt = $conn->prepare("DELETE FROM sinhvien WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// funcion laySinhVien theo id
function laySinhVienTheoId($conn, $id) {
    try {
        $stmt = $conn->prepare("SELECT id, hoten, gioitinh, ngaysinh FROM sinhvien WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
 ?>