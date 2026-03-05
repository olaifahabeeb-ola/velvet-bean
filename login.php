<?php
session_start();
$error_class = ""; // This variable stays empty unless the password is wrong

if (isset($_POST['login'])) {
    // Your password check
    if ($_POST['password'] == 'velvet_admin') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['last_login'] = date("Y-m-d H:i:s"); // Saves your "Last Login" timestamp
        header('Location: dashboard.php');
        exit;
    } else {
        $error_class = "shake"; // Triggers the CSS animation if the password is wrong
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Velvet Bean | Admin Login</title>
    <link rel="stylesheet" href="style.css"> </head>
<body style="background: #000; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">

    <div id="loginCard" class="login-card" style="background: #111; padding: 40px; border: 1px solid #d4a373; border-radius: 10px; max-width: 400px; text-align: center;">
        <h2 style="color: #d4a373;">Staff Entrance</h2>
        
        <div style="position: relative; margin: 15px 0;">
            <input type="password" id="passwordField" placeholder="Enter Admin Password" 
                   style="width: 100%; padding: 12px; background: #222; border: 1px solid #444; color: white; border-radius: 5px; box-sizing: border-box;">
            <span onclick="togglePassword()" style="position: absolute; right: 10px; top: 12px; cursor: pointer; color: #d4a373;">👁️</span>
        </div>

        <button onclick="checkPassword()" style="width: 100%; padding: 12px; background: #d4a373; border: none; color: black; font-weight: bold; cursor: pointer; border-radius: 5px;">
            Enter Dashboard
        </button>

        <div style="margin-top: 15px;">
            <button onclick="showHint()" style="background: none; border: none; color: #666; font-size: 0.8rem; cursor: pointer; text-decoration: underline;">
                Forgot Password?
            </button>
        </div>

        <div id="hintBox" style="display: none; margin-top: 15px; padding: 10px; border: 1px dashed #d4a373; color: #d4a373; font-size: 0.85rem;">
            <strong>Hint:</strong> The brand is "Velvet" and the role is "admin".
        </div>
        
        <a href="index.php" style="color: #666; display: block; margin-top: 20px; text-decoration: none;">← Back to Home</a>
    </div>

    <script>
    function togglePassword() {
        const field = document.getElementById('passwordField');
        field.type = field.type === 'password' ? 'text' : 'password';
    }

    function showHint() {
        const hint = document.getElementById('hintBox');
        hint.style.display = hint.style.display === "none" ? "block" : "none";
    }

    function checkPassword() {
        const pass = document.getElementById('passwordField').value;
        const card = document.getElementById('loginCard');

        if (pass === 'velvet_admin') {
            window.location.href = "verify.php?pass=" + pass;
        } else {
            card.classList.remove('shake');
            void card.offsetWidth; // This line triggers the "re-shake"
            card.classList.add('shake');
            document.getElementById('passwordField').value = ''; // Clears the box
        }
    }
    </script>
</body>
</html>