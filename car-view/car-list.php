<?php
session_start();
require '../includes/database.php';

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    $id =  $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT * FROM cars WHERE user_id= ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();



?>

    <!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="car-list.css">
        <title>Lista Samochodów</title>
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
                    <h2>Przegląd Samochodów</h2>
                </div>
                <div class="content">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <table>
                        <tr>
                            <th>Marka</th>
                            <th>Model</th>
                            <th>Rocznik</th>
                            <th>Vin</th>

                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                        <tr>
                            <td hidden><?php echo $row['car_id']; ?></td>
                            <td><?php echo $row['brand']; ?></td>
                            <td><?php echo $row['model']; ?></td>
                            <td><?php echo $row['production_year']; ?></td>
                            <td><?php echo $row['vin_number']; ?></td>
                            <td><a class="btn" href="update-process.php?car_id=<?php echo $row["car_id"]; ?>">Update</a></td>
                        </tr>
                    <?php
                            }
                    ?>
                    </table>
                </div>
        </main>
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