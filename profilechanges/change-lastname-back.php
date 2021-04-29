<?php 
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {

	require '../includes/database.php';


if (isset($_SESSION['lastname']) && isset($_POST['nl'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$ol = $_SESSION['lastname'];

    // $on = validate($_POST['on']);
    $nl = validate($_POST['nl']);

  if(empty($nl)){
      header("Location: change-lastname.php?error=Nowe Nazwisko jest wymagane");
	  exit();
    }else {
        $id = $_SESSION['user_id'];
		$stmt = $conn->prepare("SELECT lastname FROM users WHERE lastname=? AND user_id= ?");
		$stmt->bind_param("si", $ol ,$id);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		if($result->num_rows === 1){
			$stmt = $conn->prepare("UPDATE users SET lastname = ? WHERE user_id =?");
			$stmt->bind_param("si",$nl, $id);
			$stmt->execute();
        	header("Location: change-lastname.php?success=Zaktualizowano Nazwisko");
			$stmt->close();
	        exit();

        }else {
        	header("Location: change-lastname.php?error=Coś poszło nie tak");
	        exit();
        }

    }

    
}else{
	header("Location: change-lastname.php");
	exit();
}

}else{
     header("Location: ../login/login.php");
     exit();
}