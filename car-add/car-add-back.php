<?php
session_start();
require '../includes/database.php';
if (isset($_POST['brand']) && isset($_POST['model'])
&& isset($_POST['production_year'])  && isset($_POST['vin_number'])&&  isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id'];

    $brand = $_POST['brand'];

    $model = $_POST['model'];

    $production_year = $_POST['production_year'];

    $vin_number = $_POST['vin_number'];



    if (empty($brand)) {
        header("Location: car-add.php?error=pole 'Marka' jest puste");
        exit();
    } elseif (empty($model)) {
        header("Location: car-add.php?error=pole 'Model' jest puste");
        exit();
    } elseif (empty($production_year)) {
        header("Location: car-add.php?error=pole 'Rok Produkcji' jest puste");
        exit();
    } elseif (empty($vin_number)) {
        header("Location: car-add.php?error=pole 'Numer Vin' jest puste");
        exit();
    }

    else {
        $sql = "SELECT vin_number FROM cars WHERE vin_number = ? AND user_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: car-add.php?error=Błąd bazy danych");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "si", $vin_number, $user_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount > 0) {
                header("Location: car-add.php?error=ten ten samochód już istnieje");
                exit();
            } else {
                $sql = "INSERT INTO cars (brand, model, production_year, vin_number, user_id) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: car-add.php?error=błąd sql");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ssssi", $brand, $model, $production_year, $vin_number, $user_id);
                    mysqli_stmt_execute($stmt);
                        header("Location: car-add.php?success=Dodano samochód");
                        exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
}

