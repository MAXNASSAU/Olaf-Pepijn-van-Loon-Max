<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli("localhost", "groep2", "PLBQYESU", "groep2");

if ($conn->connect_error) {
    die("Database connectie mislukt: " . $conn->connect_error);
}
?>