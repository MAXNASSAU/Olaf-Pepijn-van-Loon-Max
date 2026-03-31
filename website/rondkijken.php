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
    <meta charset="UTF-8">
    <title>Advertenties | MTB Oosterhout</title>
    <link href='https://fonts.googleapis.com/css?family=Squada+One' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="rondkijken.css">
	<link rel="stylesheet" href="header.css">
</head>
	<body>
		<header>
			<div id="logo">
				<a href="startpagina.php"><img src="Logo MTB-Oosterhout eind.png"></a>
			</div>
			<div id="header_content">
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
			<p>advertenties</p>		
			<div class="grid" id="grid"></div>
			<script>
				fetch("advertenties.php")
					.then(res => res.json())
					.then(data => {
						console.log(data);

						let html = "";

						data.forEach(item => {
						html += `
							<div class="card">
								<h1>${item.titel}<h1>
								<h2>${item.beschrijving}</h2>
								<h3>${item.email}</h3>
								<h3>${item.nummer}</h3>
							</div>
						`;
					});

				document.getElementById("grid").innerHTML = html;
			})
			.catch(err => {
				console.error("Fout:", err);
			});
			</script>
		</main>
	</body>
</html>