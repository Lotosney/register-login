<?php 
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {

	require '../includes/database.php';


if (isset($_SESSION['firstname']) && isset($_POST['nn'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$on = $_SESSION['firstname'];

    // $on = validate($_POST['on']);
    $nn = validate($_POST['nn']);

    if(empty($on)){
      header("Location: change-firstname.php?error=Stare Imię jest wymagane");
	  exit();
    }else if(empty($nn)){
      header("Location: change-firstname.php?error=Nowe Imię jest wymagane");
	  exit();
    }else {
        $id = $_SESSION['user_id'];
		$stmt = $conn->prepare("SELECT firstname FROM users WHERE firstname=? AND user_id= ?");
		$stmt->bind_param("si", $on ,$id);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		if($result->num_rows === 1){
			$stmt = $conn->prepare("UPDATE users SET firstname = ? WHERE user_id =?");
			$stmt->bind_param("si",$nn, $id);
			$stmt->execute();
        	header("Location: change-firstname.php?success=Zaktualizowano Imię");
			$stmt->close();
	        exit();

        }else {
        	header("Location: change-firstname.php?error=Coś poszło nie tak");
	        exit();
        }

    }

    
}else{
	header("Location: change-firstname.php");
	exit();
}

}else{
     header("Location: ../login/login.php");
     exit();
}