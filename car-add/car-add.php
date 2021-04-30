<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {

?>
    <!DOCTYPE html>
    <html>

    <html lang="pl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="car-add.css">

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

        <div class="wrapper">
            <div class="header">
                <h2>Dodaj Samochód</h2>
            </div>
            <div class="content">
                <form method="post" action="car-add-back.php" name="carAddForm" novalidate>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <div class="input-group">
                    <label>Marka</label>
                    <input list="brands" type="text" name="brand" placeholder="Marka">
                    <datalist id="brands">
                        <option value="Abarth">
                        <option value="Alfa Romeo">
                        <option value="Aston Martin">
                        <option value="Audi">
                        <option value="Bentley">
                        <option value="BMW">
                        <option value="Bugatti">
                        <option value="Cadillac">
                        <option value="Chevrolet">
                        <option value="Chrysler">
                        <option value="Citroën">
                        <option value="Dacia">
                        <option value="Daewoo">
                        <option value="Daihatsu">
                        <option value="Dodge">
                        <option value="Donkervoort">
                        <option value="DS">
                        <option value="Ferrari">
                        <option value="Fiat">
                        <option value="Fisker">
                        <option value="Ford">
                        <option value="Honda">
                        <option value="Hummer">
                        <option value="Hyundai">
                        <option value="Infiniti">
                        <option value="Iveco">
                        <option value="Jaguar">
                        <option value="Jeep">
                        <option value="Kia">
                        <option value="KTM">
                        <option value="Lada">
                        <option value="Lamborghini">
                        <option value="Lancia">
                        <option value="Land Rover">
                        <option value="Landwind">
                        <option value="Lexus">
                        <option value="Lotus">
                        <option value="Maserati">
                        <option value="Maybach">
                        <option value="Mazda">
                        <option value="McLaren">
                        <option value="Mercedes-Benz">
                        <option value="MG">
                        <option value="Mini">
                        <option value="Mitsubishi">
                        <option value="Morgan">
                        <option value="Nissan">
                        <option value="Opel">
                        <option value="Peugeot">
                        <option value="Porsche">
                        <option value="Renault">
                        <option value="Rolls-Royce">
                        <option value="Rover">
                        <option value="Saab">
                        <option value="Seat">
                        <option value="Skoda">
                        <option value="Smart">
                        <option value="SsangYong">
                        <option value="Subaru">
                        <option value="Suzuki">
                        <option value="Tesla">
                        <option value="Toyota">
                        <option value="Volkswagen">
                        <option value="Volvo">
                    </datalist>
                    </div>
                    <div class="input-group">
                    <label>Model</label>
                    <input type="text" name="model" placeholder="Model">
                    </div>
                    <div class="input-group">
                    <label>Rok Produkcji</label>
                    <input type="text" name="production_year" placeholder="Rok produkcji">
                    </div>
                    <div class="input-group">
                    <label>Numer Vin</label>
                    <input type="text" name="vin_number" placeholder="Numer Vin">
                    </div>

                    <div class="input-group">
                        <button type="submit" class="btn">Dodaj samochód</button>
                    </div>
            </div>
            </form>
        </div>
    </body>
    <?php
require_once '../includes/footer.php';
?>
    </html>
<?php
} else {
    header("Location: ../login/login.php");
    exit();
}
?>