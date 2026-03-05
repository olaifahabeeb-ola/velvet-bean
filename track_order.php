<div id="status-container" style="background: #111; color: white; padding: 50px; text-align: center; border: 1px solid #d4a373; border-radius: 15px; max-width: 500px; margin: 100px auto;">
    <h2 id="status-text" style="color: #d4a373;">Waiting for confirmation...</h2>
    <div id="status-icon" style="font-size: 3rem; margin: 20px 0;">⏳</div>
    <p>Order ID: #<?php echo $_GET['id']; ?></p>
</div>

<script>
function checkStatus() {
    const orderId = <?php echo $_GET['id']; ?>;
    fetch(`get_order_status.php?id=${orderId}`)
        .then(res => res.json())
        .then(data => {
            const text = document.getElementById('status-text');
            const icon = document.getElementById('status-icon');
            
            if(data.status === 'Preparing') {
                text.innerText = "Barista is Brewing...";
                icon.innerText = "☕";
            } else if(data.status === 'Ready') {
                text.innerText = "Ready for Pickup!";
                icon.innerText = "✨";
                text.style.color = "#28a745";
            }
        });
}
setInterval(checkStatus, 3000); // Check every 3 seconds
</script>