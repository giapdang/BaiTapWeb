<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bai1.css">
    <title>Form Kết Quả</title>
</head>
<body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $invoidID = trim($_POST['invoidID']);
    $payFor = isset($_POST['pay_for']) ? $_POST['pay_for'] : [];
    $receipt = $_FILES['receipt'];

    // lưu dữ liệu vào session để hiển thị lại form
    $_SESSION['first_name'] = $firstName;
    $_SESSION['last_name'] = $lastName;
    $_SESSION['email'] = $email;
    $_SESSION['invoidID'] = $invoidID;
    $_SESSION['pay_for'] = $payFor;
    $_SESSION['receipt'] = $receipt;

    // lưu dữ liệu vào cookie để hiển thị lại form 1 ngày
    setcookie('first_name', json_encode($firstName), time() + 86400, "/");
    setcookie('last_name', json_encode($lastName), time() + 86400, "/");
    setcookie('email', json_encode($email), time() + 86400, "/");
    setcookie('invoidID', json_encode($invoidID), time() + 86400, "/");
    setcookie('pay_for', json_encode($payFor), time() + 86400, "/");

    $errors = [];

    
    if (empty($firstName)) {
        $errors[] = "Không được để trống First Name.";
    }

    
    if (empty($lastName)) {
        $errors[] = "Không được để trống Last Name.";
    }

    
    if (empty($email)) {
        $errors[] = "Không được để trống Email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không đúng định dạng.";
    }

    
    if (empty($invoidID)) {
        $errors[] = "Không được để trống Invoice ID.";
    } elseif (!is_numeric($invoidID)) {
        $errors[] = "Invoice ID phải là số.";
    }

    
    if (empty($payFor)) {
        $errors[] = "Vui lòng chọn ít nhất một tùy chọn cho Pay For.";
    }

    
    if ($receipt['error'] == UPLOAD_ERR_NO_FILE) {
        $errors[] = "Vui lòng tải lên một tệp.";
    } elseif ($receipt['error'] != UPLOAD_ERR_OK) {
        $errors[] = "Có lỗi xảy ra khi tải lên tệp.";
    } else {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($receipt['type'], $allowedTypes)) {
            $errors[] = "Chỉ chấp nhận các tệp hình ảnh (JPEG, PNG, GIF).";
        }
    }

    if (!empty($errors)) {
        echo "<div class='errors'><h2>Errors</h2><ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul></div>";
        echo "<button onclick='window.history.back()'>Go Back</button>";
    } else {
        
        $uploadDir = '../images/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $uploadFile = $uploadDir . basename($receipt['name']);
        if (move_uploaded_file($receipt['tmp_name'], $uploadFile)) {
            echo "<div class='result'><h2>Submitted Data</h2>";
            echo "<p><strong>First Name:</strong> " . htmlspecialchars($firstName) . "</p>";
            echo "<p><strong>Last Name:</strong> " . htmlspecialchars($lastName) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Invoice ID:</strong> " . htmlspecialchars($invoidID) . "</p>";
            echo "<p><strong>Pay For:</strong> " . htmlspecialchars(implode(', ', $payFor)) . "</p>";
            echo "<p><strong>Uploaded Receipt:</strong></p>";
            echo "<img src='" . htmlspecialchars($uploadFile) . "' alt='Uploaded Receipt' style='max-width: 50%; height: auto;'>";
            echo "</div>";
        } else {
            echo "<div class='errors'><h2>Errors</h2><ul>";
            echo "<li>Không thể lưu tệp đã tải lên.</li>";
            echo "</ul></div>";
            echo "<button onclick='window.history.back()'>Go Back</button>";
        }
    }
}
?>
</body>
</html>