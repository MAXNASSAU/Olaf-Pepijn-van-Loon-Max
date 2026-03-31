<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "account2.php";

if (!isset($_POST['naam'])) {
    die("Geen formulier data ontvangen");
}

$naam = $_POST['naam'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

$check = $conn->prepare("SELECT id FROM gebruikers WHERE naam = ?");
$check->bind_param("s", $naam);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    die("Gebruikersnaam al in gebruik");
}

$check->close();

$stmt = $conn->prepare("INSERT INTO gebruikers (naam, email, wachtwoord) VALUES (?, ?, ?)");

if (!$stmt) {
    die("❌ Prepare fout: " . $conn->error);
}

$stmt->bind_param("sss", $naam, $email, $wachtwoord);

if ($stmt->execute()) {
    echo "Opgeslagen!";
	$url = "http://157.97.196.156/groep2/startpagina.html"; header('Location: '. $url); die(); 
} else {
    echo "Fout" . $stmt->error;
}

$stmt->close();
$conn->close();

$url = "http://157.97.196.156/groep2/startpagina.html"; header('Location: '. $url); die(); 
?>