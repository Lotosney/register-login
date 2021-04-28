<html>
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<header>
    <nav>
        <ul>

            <li><a href="../registration/register.php">Rejestracja</a></li>
        </ul>
    </nav>
</header>
<main>
    <h1>Zaloguj się</h1>
    <p> Nie masz konta? <a href="../registration/register.php">Zarejestruj się!</a></p>

    <form action="login-back.php" method="post">
    <?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Hasło">
        <button type="submit" name="submit">Zaloguj się</button>
    </form>

</main>
<?php
require_once '../includes/footer.php';

?>