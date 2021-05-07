<?php
session_start();
require '../includes/database.php';

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    $id =  $_SESSION['user_id'];
    $car_id=$_GET['car_id'];
    $stmt = $conn->prepare("SELECT * FROM services WHERE car_id=? AND user_id= ?");
    $stmt->bind_param("ii",$car_id, $id);
    $stmt->execute();
    $result = $stmt->get_result();



?>

<!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="car-servicelist.css">
        <title>Lista Napraw</title>
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
                            <th>Data</th>
                            <th>Nazwa</th>
                            <th class="description">Opis</th>


                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                        <tr>
                            <td hidden><?php echo $row['service_id']; ?></td>
                            <td><?php echo $row['service_date']; ?></td>
                            <td><?php echo $row['service_name']; ?></td>
                            <td class="description" id="description"><div style="height: 50px; overflow-y:scroll;"><?php echo $row['service_description']; ?></div></td>
                        </tr>
                    <?php
                            }
                    ?>
                    </table>
                </div>
        </main>
    </body>
    </html>

<?php
} else {
	header("Location: ../login/login.php");
	exit();
}
?>