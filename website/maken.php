<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "test.php";

if (!isset($_POST['titel'])) {
    die("❌ Geen formulier data ontvangen");
}

$titel = $_POST['titel'];
$beschrijving = $_POST['beschrijving'];
$email = $_POST['email'];
$nummer = $_POST['nummer'];

$stmt = $conn->prepare("INSERT INTO test (titel, beschrijving, email, nummer) VALUES (?, ?, ?, ?)");

if (!$stmt) {
    die("❌ Prepare fout: " . $conn->error);
}

$stmt->bind_param("ssss", $titel, $beschrijving, $email, $nummer);

if ($stmt->execute()) {
    echo "✅ Opgeslagen!";
} else {
    echo "❌ Fout: " . $stmt->error;
}

$stmt->close();
$conn->close();
$url = "http://157.97.196.156/groep2/rondkijken.html"; header('Location: '. $url); die(); 
?>