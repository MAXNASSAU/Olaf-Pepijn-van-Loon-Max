<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli("localhost", "groep2", "PLBQYESU", "test");

if ($conn->connect_error) {
    die("❌ Connectie mislukt: " . $conn->connect_error);
}

echo "✅ Database connectie werkt!";