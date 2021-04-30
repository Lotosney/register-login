<?php 
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {

	require '../includes/database.php';


if (isset($_SESSION['phone']) && isset($_POST['np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = $_SESSION['phone'];

    // $on = validate($_POST['on']);
    $np = validate($_POST['np']);

  if(empty($np)){
      header("Location: change-phone.php?error=Nowy Numer jest wymagany");
	  exit();
    }else {
        $id = $_SESSION['user_id'];
		$stmt = $conn->prepare("SELECT phone FROM users WHERE phone=? AND user_id= ?");
		$stmt->bind_param("si", $op ,$id);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		if($result->num_rows === 1){
			$stmt = $conn->prepare("UPDATE users SET phone = ? WHERE user_id =?");
			$stmt->bind_param("si",$np, $id);
			$stmt->execute();
        	header("Location: change-phone.php?success=Zaktualizowano Nazwisko");
			$stmt->close();
	        exit();

        }else {
        	header("Location: change-phone.php?error=Coś poszło nie tak");
	        exit();
        }

    }

    
}else{
	header("Location: change-phone.php");
	exit();
}

}else{
     header("Location: ../login/login.php");
     exit();
}