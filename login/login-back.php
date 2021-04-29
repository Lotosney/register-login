<?php

if (isset($_POST['submit'])) {

    require '../includes/database.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: ../index.php?error=puste pola");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=Nie udało się połączyć z bazą danych");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['password']);
                if ($passCheck == false) {
                    header("Location: ../index.php?error=złe hasło");
                    exit();
                } elseif ($passCheck == true) {
                    session_start();
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['phone'] = $row['phone'];
                    header("Location: ../index.php?success=Zalogowano");
                    exit();
                } else {
                    header("Location: ../index.php?error=Złe hasło");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=Brak takiego użytkownika");
                exit();
            }
        }
    }   
    // else {
    //             header("Location: ../index.php?error=accessforbidden");
    //             exit();
    //         }


}
?>