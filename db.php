<?php
$servername = "localhost";
$username = "root";     
$password = "";         
$dbname = "tedbir_bazasi"; 

// MySQL bağlantısı yaradırıq
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantını yoxlayırıq
if ($conn->connect_error) {
    die("Bağlantı xətası: " . $conn->connect_error);
}
?>