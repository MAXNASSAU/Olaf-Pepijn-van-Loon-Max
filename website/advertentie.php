<?php
session_start();

if (!isset($_SESSION['naam'])) {
    header("Location: index.html");
    exit();
}
?>
	<!DOCTYPE html>
<html lang="nl">
 <head>
    <title>Advertentie maken | MTB Oosterhout</title>
    <meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Squada One' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="advertentiestyle.css">
</head>
	<body>
		<header>
			<div id="logo">
				<a href="startpagina.php"><img src="Logo MTB-Oosterhout eind.png"><a>
			</div>
			<div id="header_content" class="nav">
				<ul class="items">
					<li><a href="https://www.mtboosterhout.nl/">home</a></li>
					<li><a href="rondkijken.php">rondkijken</a></li>
					<li><a href="advertentie.php">advertentie maken</a></li>
					<li><a href="https://www.mtboosterhout.nl/contact/"> contact</a></li>
					<li>
						<div class="dropdown">
						<a class="dropbtn"><?php echo $_SESSION['naam']; ?></a>
							<div class="dropdown-content">
								<a href=""><?php echo $_SESSION['naam']; ?></a>
								<a href="uitloggen.php">uitloggen</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</header>
		<main>
			<p>advertentie maken</p><br>
			<form action="maken.php" method="POST">
				<input id="naam" type="text" name="titel" placeholder="Titel" required><br><br>
				<textarea rows="5" id="beschrijving" type="text" name="beschrijving" placeholder="Beschrijving" required></textarea><br><br>
				<input id="email" type="text" name="email" placeholder="E-mail" required><br><br>
				<input id="nummer" type="text" name="nummer" placeholder="Telefoonnummer" required><br><br>
				<button type="submit" value="Submit">Opslaan</button>
			</form>
		</main>
	</body>
</html>