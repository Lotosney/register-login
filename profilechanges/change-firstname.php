<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Zmiana Imienia</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="changes.css">
		<script src="changes.js"></script>

	</head>

	<body>
		<header>
			<nav>
				<ul>
					<li><a href="../index.php">Strona Główna</a></li>
					<li><a class="logout-button" href="../logout.php">Wyloguj</a></li>
				</ul>
			</nav>
		</header>
		<div class=wrapper>
			<div class="header">
				<h2>Zmień Imię</h2>
			</div>
			<div class="content">
				<form action="change-firstname-back.php" method="post">

					<?php if (isset($_GET['error'])) { ?>
						<p class="error"><?php echo $_GET['error']; ?></p>
					<?php } ?>

					<?php if (isset($_GET['success'])) { ?>
						<p class="success"><?php echo $_GET['success']; ?></p>
					<?php } ?>
					<!-- <div class="input-group">
						<label>Stare Imię</label>
						<input type="text" name="on" placeholder="Stare Imię">
					</div> -->
					<div class="input-group">
						<label>Nowe Imię</label>
						<input type="text" name="nn" placeholder="<?php echo $_SESSION['firstname']; ?>">
					</div>


					<button class="btn" type="submit">Zmień</button>
					<button type='button' class='btn' onclick="toProfile()">Profil</button>

				</form>
			</div>
		</div>
	</body>
	<?php
	require_once '../includes/footer.php';
	?>

	</html>
<?php
} else {
	header("Location: ./login/login.php");
	exit();
}


?>