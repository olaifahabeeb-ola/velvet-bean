<?php
$conn = new mysqli("localhost", "root", "", "velvet_bean_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['customer_name'];
    $sql = "INSERT INTO orders (name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        // We start the HTML here to apply the design
        echo "<!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='style.css'>
            <title>Order Confirmed</title>
        </head>
        <body>
            <div class='hero' style='height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;'>
                <h1 style='color: #d4a373;'>Order Confirmed!</h1>
                <p style='color: white;'>Thanks, $name. We're brewing your coffee.</p>
                <a href='index.php' class='btn' style='text-decoration: none; margin-top: 20px;'>Back to Shop</a>
            </div>
        </body>
        </html>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>