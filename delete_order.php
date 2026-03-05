<?php
$conn = new mysqli("localhost", "root", "", "velvet_bean_db");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Deletes the specific row from the table in phpMyAdmin
    $conn->query("DELETE FROM orders WHERE id = $id");
}
header("Location: dashboard.php");
exit();
?>