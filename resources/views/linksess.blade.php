<?php
session_start();

if (isset($_POST['shopnow'])) {
    $shopnow = $_POST['shopnow'];
    $_SESSION['shop_now'] = $shopnow;
}
?>

