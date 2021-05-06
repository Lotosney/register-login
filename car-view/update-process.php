<?php
session_start();
require '../includes/database.php';
error_reporting(0);
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    $id = $_SESSION['user_id'];
    $cid = $_GET['car_id'];
    $stmt = $conn->prepare("SELECT * FROM cars WHERE user_id= ? AND car_id=?");
    $stmt->bind_param("ii", $id, $cid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_array($result);
    if (count($_POST) > 0) {
        $stmt = $conn->prepare("UPDATE cars SET car_id = ?, brand = ?, model = ?, production_year = ?, vin_number = ? WHERE car_id = ?");
        $stmt->bind_param("issssi", $_POST['car_id'], $_POST['brand'], $_POST['model'], $_POST['production_year'], $_POST["vin_number"], $_POST['car_id']);
        $stmt->execute();
        header("Location: car-list.php?success=Zaktualizowano Dane");
        $stmt->close();
    }

?>
    <!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="update-process.css">
        <title>Edycja dancyh samochodu</title>
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
            <form name="update-car" method="post" action="update-process.php">
            
            <input type="hidden" name="car_id" class="txtField" value="<?php echo $row['car_id']; ?>">
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
                <input type="text" name="model" placeholder="Model" value="<?php echo $row['model']; ?>">
            </div>
            <div class="input-group">
                <label>Rok Produkcji</label>
                <input type="text" name="production_year" placeholder="Rok produkcji" value="<?php echo $row['production_year']; ?>">
            </div>
            <div class="input-group">
                <label>Numer Vin</label>
                <input type="text" name="vin_number" placeholder="Numer VIN" value="<?php echo $row['vin_number']; ?>">
            </div>

            <div class="input-group">
                <button type="submit" class="btn">Zmień dane</button>
            </div>

        </form>
            </div>
        </div>

        
    </body>

    </html>



<?php
} else {
    header("Location: ./login/login.php");
    exit();
}
?>