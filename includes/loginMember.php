<?php

	include("db.php");
	if (isset($_POST['service_number'])) {
		$service_number = trim(filter_var($_POST['service_number'], FILTER_SANITIZE_EMAIL));
		$password 	= trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
		// $user_ip 	= getUserIpAddr();
		// $ip_address = getUserIpAddr();
	  	// $geo = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip_address) );
		// $user_country = $geo["geoplugin_countryName"];
		if ($service_number == "") {
			echo "service_number is empty";
			exit();
		}
		if ($password == "") {
			echo "password are empty";
			exit();
		}

		$query = $connect->prepare("SELECT * FROM users WHERE service_number = ? ");
		$query->execute(array($service_number));
		if ($query->rowCount() > 0) {
			foreach ($query->fetchAll() as $row) {
				if($row['active'] == 1){
					if (password_verify($password, $row['password'])) {
						$_SESSION['service_number'] = $row['service_number'];
					    $_SESSION['user_id'] 		= $row['id'];
					    $_SESSION['user_name'] 		= $row['user_name'];
					    $_SESSION['parent_id'] 		= $row['parent_id'];
					    $password 					= $row['password'];
					    $parent_id 					= $row['parent_id'];
					    $_SESSION['unit']  = $row['unit'];
					   
					    setcookie("userLoggedIn", base64_encode($_SESSION['service_number']. password_hash($_SESSION['service_number'], PASSWORD_DEFAULT)), time()+60*60*24*30, '/');
					    
					    echo "Redirecting you in 1 Second";

					}else{
						echo "Incorrect password or user-name";
						exit();
					}
				}else{
					echo " Your not allowed to log in";
					exit();
				}
			}
		}else{
			echo 'User not found';
			exit();
		}

	}
?>