<?php
require_once 'user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    delete_user($id);
    header('Location: user_list.php');
    exit();
}
?>