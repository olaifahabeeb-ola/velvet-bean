<?php
session_start();
session_destroy(); // Clears your login session so the dashboard is locked again
header("Location: index.php"); // This sends you back to the "Brewed for You" homepage
exit;
?>