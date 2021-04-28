<?php

if (isset($_POST['submit'])) {
    //Add database connection
    require '../includes/database.php';

    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];

    if (empty($email) ||(empty($firstname) || empty($lastname) || empty($phone)) ||empty($password) || empty($confirmPass)) {
        header("Location: ./register.php?error=pola są puste&email=".$email);
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ./register.php?error=Zły format emaila&email=".$email);
        exit();
    } elseif($password !== $confirmPass) {
        header("Location: ./register.php?error=hasła nie pasują do siebie&email=".$email);
        exit();
    }

    else {
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ./register.php?error=Błąd bazy danych");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount > 0) {
                header("Location: ./register.php?error=ten email już istnieje");
                exit();
            } else {
                $sql = "INSERT INTO users (email, firstname, lastname, phone, password) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ./register.php?error=błąd sql");
                    exit();
                } else {
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $email, $firstname, $lastname,$phone, $hashedPass);
                    mysqli_stmt_execute($stmt);
                        header("Location: ./register.php?succes=Zarejestrowano");
                        exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>