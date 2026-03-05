<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"> <title>Velvet Bean | Admin</title>
</head>
<body style="background-color: #121212;">
    <header>
        <div class="logo">VELVET BEAN</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
        </nav>
    </header>

    <div style="margin-top: 100px; padding: 20px;">
        <h2 style="text-align: center; color: #d4a373;">Live Order Queue</h2>
        <table style="width: 80%; margin: 20px auto; border-collapse: collapse; color: white;">
            <thead style="background-color: #d4a373; color: black;">
                <tr>
                    <th style="padding: 12px;">ID</th>
                    <th style="padding: 12px;">Customer Name</th>
                    <th style="padding: 12px;">Time</th>
                    <th style="padding: 12px;">Action</th>
                </tr>
            </thead>
            <tbody id="order-rows" style="text-align: center;">
                </tbody>
        </table>
    </div>

<div style="text-align:right; padding: 20px;">
    <a href="logout.php" style="color: #ff4444; text-decoration: none; font-weight: bold; border: 1px solid #ff4444; padding: 5px 10px; border-radius: 5px;">
        Logout 🔒
    </a>
</div>

    <div style="text-align:center; margin-bottom:20px;">
    <button id="soundBtn" style="background:#d4a373; border:none; padding:10px 20px; cursor:pointer; font-weight:bold;">
        Click to Enable Sound Notifications 🔔
    </button>
</div>

<div class="order-actions">
    <button onclick="printReceipt('<?php echo $row['customer_name']; ?>', '<?php echo $row['drink_name']; ?>', '<?php echo $row['price']; ?>')" class="print-btn">
        Print Receipt 🖨️
    </button>
</div>
   <script>
    let lastOrderCount = 0;
    let audioEnabled = false;
    const pingSound = new Audio('https://notificationsounds.com/storage/sounds/file-sounds-1150-pristine.mp3');

    // UNLOCK AUDIO: Browser requires a click to play sound
    document.getElementById('soundBtn').addEventListener('click', function() {
        audioEnabled = true;
        this.style.background = "#28a745"; // Changes to green
        this.innerHTML = "Sound Notifications Active ✅";
        pingSound.play().catch(() => {}); // Play short silent test
    });

    function fetchOrders() {
        fetch('get_orders.php')
            .then(res => res.json())
            .then(data => {
                const tableBody = document.getElementById('order-rows');
                
                // PING LOGIC: Only play if new orders arrive and sound is enabled
                if (data.length > lastOrderCount && lastOrderCount !== 0 && audioEnabled) {
                    pingSound.play().catch(e => console.log("Click the button to enable audio!"));
                }
                lastOrderCount = data.length;

                // RENDER TABLE: Ensuring it matches your gold/dark theme
                tableBody.innerHTML = data.map(order => `
                    <tr style="border-bottom: 1px solid #333; color: white;">
                        <td style="padding: 15px;">${order.id}</td>
                        <td>${order.name}</td>
                        <td>${order.order_time}</td>
                        <td><a href="delete_order.php?id=${order.id}" style="color: #ff4444; text-decoration: none; font-weight: bold;">Complete</a></td>
                    </tr>
                `).join('') || '<tr><td colspan="4" style="padding:20px; color:#666;">Waiting for new orders...</td></tr>';
            });
    }

    // Refresh every 3 seconds for that "Live" feel
    setInterval(fetchOrders, 3000);
    fetchOrders();
</script>
<?php
// Example loop fetching your orders
while($row = mysqli_fetch_assoc($result)) {
    echo "
    <div class='order-row'>
        <span>Order #" . $row['id'] . " - " . $row['customer_name'] . "</span>
        
        <button onclick=\"printReceipt('" . addslashes($row['customer_name']) . "', '" . addslashes($row['drink_name']) . "', '" . $row['price'] . "')\" class='print-btn'>
            Print Receipt 🖨️
        </button>
    </div>";
}
?>

<script>
function printReceipt(name, drink, price) {
    const printWindow = window.open('', '_blank', 'width=300,height=400');
    printWindow.document.write(`
        <html>
        <head>
            <title>Velvet Bean Receipt</title>
            <style>
                body { font-family: 'Courier New', Courier, monospace; text-align: center; padding: 20px; color: #000; }
                .logo { font-weight: bold; font-size: 1.2rem; border-bottom: 1px dashed #000; margin-bottom: 10px; }
                .details { text-align: left; margin: 15px 0; }
                .footer { font-size: 0.8rem; margin-top: 20px; border-top: 1px dashed #000; padding-top: 10px; }
            </style>
        </head>
        <body>
            <div class="logo">VELVET BEAN COFFEE</div>
            <p>Order for: <strong>\${name}</strong></p>
            <div class="details">
                <p>Item: \${drink}</p>
                <p>Total: \${price}</p>
            </div>
            <div class="footer">
                Thank you for brewing with us!<br>
                \${new Date().toLocaleString()}
            </div>
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}
</script>

</body>
</html>