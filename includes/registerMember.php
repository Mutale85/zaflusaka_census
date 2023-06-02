<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../PHPMailer/src/Exception.php';
	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';
	include 'db.php';
	if (isset($_POST['user_name'])) {
		$user_name 			= filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
		$service_number 	= filter_var($_POST['service_number'], FILTER_SANITIZE_STRING);
		$generatedPassword 	= $_POST['password'];
	    $unit   	= filter_var($_POST['unit'], FILTER_SANITIZE_STRING);
		$check_list = $connect->prepare("SELECT * FROM users WHERE service_number = ? AND unit = ?");
		$check_list->execute(array($service_number, $unit));
		$count = $check_list->rowCount();
		if ($count > 0) {
			echo "This service number ".$service_number . " is already registered";
			exit();
		}
		
		$password = password_hash($generatedPassword, PASSWORD_DEFAULT);
	    
	    $QUERY = $connect->prepare("INSERT INTO `users`(`service_number`, `password`, `user_name`, `unit`) VALUES (?, ?, ?, ?) ");
	    $execute = $QUERY->execute(array($service_number, $password, $user_name, $unit));
	    $parent_id = $connect->lastInsertId();
	    if($execute){ 
	        $update = $connect->prepare("UPDATE users SET parent_id = ? WHERE service_number = ? ");
	        $update->execute(array($parent_id, $service_number));
			
			// Send an Email
			echo "Account Created For ".$user_name;
	    	
		}  
    }
?>