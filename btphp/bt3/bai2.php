<?php
session_start();

// Kiểm tra thời gian hết hạn của session
if (isset($_SESSION['expire_time']) && time() > $_SESSION['expire_time']) {
    // Xóa dữ liệu session nếu đã hết hạn
    session_unset();
    session_destroy();
}

// Lấy thông tin từ session hoặc cookies
$firstName = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : (isset($_COOKIE['first_name']) ? json_decode($_COOKIE['first_name']) : '');
$lastName = isset($_SESSION['last_name']) ? $_SESSION['last_name'] : (isset($_COOKIE['last_name']) ? json_decode($_COOKIE['last_name']) : '');
$email = isset($_SESSION['email']) ? $_SESSION['email'] : (isset($_COOKIE['email']) ? json_decode($_COOKIE['email']) : '');
$invoidID = isset($_SESSION['invoidID']) ? $_SESSION['invoidID'] : (isset($_COOKIE['invoidID']) ? json_decode($_COOKIE['invoidID']) : '');
$payFor = isset($_SESSION['pay_for']) ? $_SESSION['pay_for'] : (isset($_COOKIE['pay_for']) ? json_decode($_COOKIE['pay_for']) : []);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bai2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Payment Form</title>
</head>
<body>
    <form id="paymentForm" action="bai2form.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <h1>Payment Receipt Upload Form</h1>
            <table>
                <tr>
                    <td>
                        <label for="first_name">Name</label><br>
                        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($firstName); ?>">
                        <div class="placeholder">First Name</div>
                    </td>
                    <td>
                        <label for="last_name">&nbsp;</label><br>
                        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($lastName); ?>">
                        <div class="placeholder">Last Name</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email</label><br>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                        <div class="placeholder">example@example.com</div>
                    </td>
                    <td>
                        <label for="invoidID">InvoidID</label><br>
                        <input type="text" id="invoidID" name="invoidID" value="<?php echo htmlspecialchars($invoidID); ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="pay">Pay For</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="checkbox-label">
                            <input type="checkbox" id="option1" name="pay_for[]" value="15K Category" <?php echo in_array('15K Category', $payFor) ? 'checked' : ''; ?>>
                            <label for="option1">15K Category</label>
                        </div>
                        <div class="checkbox-label">
                            <input type="checkbox" id="option2" name="pay_for[]" value="30K Category" <?php echo in_array('30K Category', $payFor) ? 'checked' : ''; ?>>
                            <label for="option2">30K Category</label>
                        </div>
                        <div class="checkbox-label">
                            <input type="checkbox" id="option3" name="pay_for[]" value="45K Category" <?php echo in_array('45K Category', $payFor) ? 'checked' : ''; ?>>
                            <label for="option3">45K Category</label>
                        </div>
                        <div class="checkbox-label">
                            <input type="checkbox" id="option4" name="pay_for[]" value="60K Category" <?php echo in_array('60K Category', $payFor) ? 'checked' : ''; ?>>
                            <label for="option4">60K Category</label>
                        </div>
                        <div class="checkbox-label">
                            <input type="checkbox" id="option5" name="pay_for[]" value="75K Category" <?php echo in_array('75K Category', $payFor) ? 'checked' : ''; ?>>
                            <label for="option5">75K Category</label>
                        </div>
                        <div class="checkbox-label">
                            <input type="checkbox" id="option6" name="pay_for[]" value="90K Category" <?php echo in_array('90K Category', $payFor) ? 'checked' : ''; ?>>
                            <label for="option6">90K Category</label>
                        </div>
                    </td>
                    <td>
                        <div class="checkbox-label">
                            <input type="checkbox" id="option7" name="pay_for[]" value="35K Category" <?php echo in_array('35K Category', $payFor) ? 'checked' : ''; ?>>
                            <label for="option7">35K Category</label>
                        </div>
                        <div class="checkbox-label">
                            <input type="checkbox" id="option8" name="pay_for[]" value="75K Category" <?php echo in_array('75K Category', $payFor) ? 'checked' : ''; ?>>
                            <label for="option8">75K Category</label>
                        </div>
                        <div class="checkbox-label">
                            <input type="checkbox" id="option9" name="pay_for[]" value="Shuttle One Way" <?php echo in_array('Shuttle One Way', $payFor) ? 'checked' : ''; ?>>
                            <label for="option9">Shuttle One Way</label>
                        </div>
                        <div class="checkbox-label">
                            <input type="checkbox" id="option10" name="pay_for[]" value="Tranning Cap Merchandise" <?php echo in_array('Tranning Cap Merchandise', $payFor) ? 'checked' : ''; ?>>
                            <label for="option10">Tranning Cap Merchandise</label>
                        </div>
                        <div class="checkbox-label">
                            <input type="checkbox" id="option11" name="pay_for[]" value="Buf Merchandise" <?php echo in_array('Buf Merchandise', $payFor) ? 'checked' : ''; ?>>
                            <label for="option11">Buf Merchandise</label>
                        </div>
                    </td>
                </tr>
            </table>

            <label for="receipt">Please Upload</label><br>
            <div class="upload" id="uploadDiv">
                <input type="file" id="receipt" name="receipt" accept="image/*">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <span style="font-weight: bold; color: black;">Browse file</span>
                <span style="color: rgb(151, 151, 151); font-size: 15px;">or drag and drop here</span>
            </div>

            <button type="submit">Submit</button>
        </fieldset>
    </form>

    <div id="result"></div>
</body>
</html>