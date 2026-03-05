<?php
// get_orders.php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "velvet_bean_db");

$sql = "SELECT id, name, order_time FROM orders ORDER BY id DESC";
$result = $conn->query($sql);

$orders = [];
while($row = $result->fetch_assoc()) {
    $orders[] = $row;
}
echo json_encode($orders);
$conn->close();
?>