<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include "account2.php";

if (!isset($_POST['naam']) || !isset($_POST['wachtwoord'])) {
    die("Geen login data ontvangen");
}

$naam = $_POST['naam'];
$wachtwoord = $_POST['wachtwoord'];


$stmt = $conn->prepare("SELECT id, wachtwoord FROM gebruikers WHERE naam = ?");
$stmt->bind_param("s", $naam);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if ($wachtwoord === $user['wachtwoord']) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['naam'] = $naam;

        header("Location: startpagina.php");
        exit();

    } else {
        echo "Verkeerd wachtwoord";
    }
} else {
    echo "Gebruiker niet gevonden";
}

$stmt->close();
$conn->close();
?>