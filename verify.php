<?php
session_start();
if ($_GET['pass'] == 'velvet_admin') {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['last_login'] = date("Y-m-d H:i:s");
    header('Location: dashboard.php');
} else {
    header('Location: login.php');
}
?>