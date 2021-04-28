<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="../login/login.php">Login</a></li>
        </ul>
    </nav>
</header>
<main>
    <h1>Rejestracja</h1>
    <p> Masz już konto? <a href="../login/login.php">Zaloguj Się!!</a></p>

    <form action="./register-back.php" method="post">
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>
        <input type="text" name="firstname" placeholder="Imię">
        <input type="text" name="lastname" placeholder="Nazwisko">
        <input type="email" name="email" placeholder="Adres Email">
        <input type="tekst" name="phone" placeholder="Telefon">
        <input type="password" name="password" placeholder="Hasło">
        <input type="password" name="confirmPassword" placeholder="Potwierdź hasło">
        <button type="submit" name="submit">Zarejestruj się</button>
    </form>
</main>

<?php
require_once '../includes/footer.php';
?>