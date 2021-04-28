<?php
session_start();
require_once '../includes/database.php';
require_once '../registration/register-back.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Profil</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="profile.css">
    <script src="profile.js"></script>

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
    <main>
    <div class=wrapper>
        <div class="header">
            <h1>Profil</h1>
        </div>
        <div class="content">

            <body>
                <h2>Imię: <?php echo $_SESSION['firstname']; ?></h2>
                <h2>Nazwisko: <?php echo $_SESSION['lastname']; ?></h2>
                <h2>Telefon: <?php echo $_SESSION['phone']; ?></h2>
                <h2>Mail: <?php echo $_SESSION['sessionUser']; ?></h2>
                <div class="input-group">
                    <button type='button' class='btn' onclick="toFirstNamePage()">Zmień Imię</button>
                </div>
                <div class="input-group">
                    <button type='button' class='btn' onclick="toLastNamePage()">Zmień Nazwisko</button>
                </div>
                <div class="input-group">
                    <button type='button' class='btn' onclick="toPhonePage()">Zmień Numer</button>
                </div>
                <div class="input-group">
                    <button type='button' class='btn' onclick="toEmailPage()">Zmień Email</button>
                </div>
                <div class="input-group">
                    <button type='button' class='btn' onclick="toPasswordPage()">Zmień Hasło</button>
                </div>

        </div>
</div>
</main>
</body>
<?php
require_once '../includes/footer.php';
?>



