<?php
    session_start();
    require_once './includes/database.php';
    require_once './registration/register-back.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="index.js"></script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li class="profile-button" onclick="toggleProfile()">Profil</li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>
</header>
<body>
<div class="profile-wrapper" id="profile-wrapper">
			<div class="profile">
				<h3>Imię: <?php echo $_SESSION['firstname']; ?></h3>
				<h3>Nazwisko: <?php echo $_SESSION['lastname']; ?></h3>
				<div class="input-group">
					<button type='button' class='prof-btn' onclick="toProfilePage()">Edytuj dane</button>
				</div>
			</div>
		</div>
        <div class="header">
			<h2>Strona główna</h2>
		</div>
		<div class="content">
			<div class="upper-tiles">
				<button class="btn" name="help" onclick="toHelpPage()"></button>
				<button class="btn" name="profile" onclick="toProfilePage()">Profil</button>
				<button class="btn" name="tools" onclick="toCarViewPage()">Dane </button>
			</div>
			<div class="lower-tiles">
				<button class="btn" name="psychology" onclick="toCarRegisterPage()">Dodaj Samochód</button>
				<button class="btn" name="teambuilding" onclick="toCarViewPage()">Przejrzyj Samochód</button>
				<button class="btn" name="psychotests" onclick="toCarViewPage()">>Warsztaty</button>
			</div>

		</div>
        
</body>


<?php
require_once 'includes/footer.php';
?>