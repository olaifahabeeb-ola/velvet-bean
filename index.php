<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Velvet Bean | Local Coffee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">VELVET BEAN</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="#menu">Menu</a>
            <a href="#about">About Us</a>
            <a href="#contact">Contact</a>
            <a href="dashboard.php" class="admin-link">Admin</a>
        </nav>
    </header>

    <div class="hero">
    <h1>Brewed for You.</h1>
    <p>Experience the finest local beans in a cozy atmosphere.</p>
    <form action="submit.php" method="POST" autocomplete="off">
        <input type="text" name="customer_name" placeholder="Enter Your Name" required>
        <button type="submit" class="btn">Place Order</button>
    </form>
</div>

<section id="menu" class="info-section" style="background: #000; padding: 60px 20px;">
    <div class="container">
        <h2 style="color: #d4a373; text-align: center; margin-bottom: 40px;">Our Signature Brews</h2>
        
        <div class="menu-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            
            <div class="menu-card" style="border: 1px solid #333; padding: 20px; border-radius: 10px; transition: 0.3s;">
                <h3 style="color: #d4a373;">Velvet Latte</h3>
                <p style="color: #ccc; font-size: 0.9rem;">Smooth espresso with steamed milk and gold caramel.</p>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                    <span style="color: white; font-weight: bold;">₦3,500</span>
                    <button onclick="selectDrink('Velvet Latte')" class="menu-order-btn">Order</button>
                </div>
            </div>

            <div class="menu-card" style="border: 1px solid #333; padding: 20px; border-radius: 10px;">
                <h3 style="color: #d4a373;">Midnight Mocha</h3>
                <p style="color: #ccc; font-size: 0.9rem;">Dark chocolate infusion with a double shot of espresso.</p>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                    <span style="color: white; font-weight: bold;">₦4,000</span>
                    <button onclick="selectDrink('Midnight Mocha')" class="menu-order-btn">Order</button>
                </div>
            </div>

            <div class="menu-card" style="border: 1px solid #333; padding: 20px; border-radius: 10px;">
                <h3 style="color: #d4a373;">Vanilla Bean Cold Brew</h3>
                <p style="color: #ccc; font-size: 0.9rem;">24-hour steep topped with handcrafted vanilla cream.</p>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                    <span style="color: white; font-weight: bold;">₦3,800</span>
                    <button onclick="selectDrink('Vanilla Bean Cold Brew')" class="menu-order-btn">Order</button>
                </div>
            </div>

        </div>
    </div>

    <div class="menu-card" style="...">
    <div class="special-badge">Special</div> <h3 style="color: #d4a373;">Midnight Mocha</h3>
    <p style="...">Dark chocolate infusion with a double shot of espresso.</p>
    <div style="...">
        <span style="...">₦4,000</span>
        <button onclick="selectDrink('Midnight Mocha')" class="menu-order-btn">Order</button>
    </div>
</div>
</section>

<script>
function validateForm() {
    let name = document.getElementById("custName").value.trim();
    if (name === "") {
        alert("Please enter your name before ordering!");
        return false; // Stops the submission
    }
    return true; // Allows the submission
}
</script>
    </div>
</body>
</html>
<section id="about" style="padding: 100px 20px; text-align: center; background: #111; color: white;">
    <h2 style="color: #d4a373;">Our Story</h2>
    <p style="max-width: 600px; margin: 0 auto; line-height: 1.6;">
        At Velvet Bean, we source the finest local beans to create a cozy atmosphere for every coffee lover.
    </p>
</section>

<section id="contact" style="padding: 100px 20px; text-align: center; background: #000; color: white; border-top: 1px solid #d4a373;">
    <h2 style="color: #d4a373;">Get in Touch</h2>
    <p>Email: <strong>www.olaifahabeeb@gmail.com</strong></p>
    <p>Phone: <strong>+234 816 797 8432</strong></p>
</section>

<script>
function selectDrink(drinkName) {
    // 1. Find the name input field
    const nameInput = document.querySelector('input[name="customer_name"]');
    
    // 2. Scroll smoothly back to the top Hero section
    window.scrollTo({ top: 0, behavior: 'smooth' });
    
    // 3. Put a little hint in the placeholder so they know we remember their choice
    nameInput.placeholder = "Ordering: " + drinkName + "... Enter Name";
    nameInput.focus();
}
</script>