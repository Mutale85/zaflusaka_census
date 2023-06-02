<?php 
	include("includes/db.php");
	if (isset($_SESSION['service_number'])) {

		header("location:admins");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("support/header.php")?>
</head>
<body>
	<?php include ("support/nav.php"); ?>
	<div class="container mt-5">
		<div class="main_section">
			<div class="DivLogin">
				<form id="loginForm" method="post">
					<div class=" text-center">
						<h1>Welcome Back</h1>
					</div>
		       		<div class="form-group mb-3">
		       			<label class="mb-2" for="service_number">Service Number</label><br>
		   				<input type="text" name="service_number" id="service_number" class="form-control" required placeholder="Service Number" autocomplete="off">
		       		</div>
		       	
		       		<div class="form-group mb-3">
		       			<label class="mb-2" for="password">Password </label><br>
		       			<div class="input-group">
		       				<input type="password" name="password" id="password" class="form-control" required  autocomplete="off" placeholder="Password">
		       				<span class="input-group-text" id="showpass_text" onclick="passReveal()"><i class="bi bi-eye"></i></span>
		       			</div>
		       		</div>
		       	
		       		<div class="d-flex justify-content-between">
		       			<div><button id="loginBtn" type="submit" class="button-34 w-100">Login</button></div>
		       			<div><a href="forgot-password" title="password" class="text-secondary text-decoration-none">Forgot Password</a></div>
		       			<div><a href="register" title="password" class="text-secondary text-decoration-none">Create user</a></div>
		       		</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
	        $(".hamburger").click(function(){
	            $(this).toggleClass("is-active");
	        });
	    });

	    var showpass = document.getElementById('showpass_text');
		var password = document.getElementById('password');
		function passReveal(){
			var password = document.getElementById('password');
		    if(password.type == 'password') {
		        password.type = 'text';
		        showpass.innerHTML = '<i class="bi bi-eye-slash"></i>';
		    }else {
		        password.type = 'password';
		        showpass.innerHTML = '<i class="bi bi-eye"></i>';
		    }
		}

		var sign_in = document.getElementById('loginBtn');
		var LoginFormNow = document.getElementById('loginForm');
		var service_number = document.getElementById('service_number');
		var password = document.getElementById('password');
		
		var url = 'includes/loginMember';
		var xhr = new XMLHttpRequest();
		
		LoginFormNow.addEventListener('submit', (event) => {
			event.preventDefault();
			if(service_number.value == ""){
				errorNow("service number is required");
				service_number.focus();
				return false;
			}
			if(password.value == ""){
				errorNow("password is required");
				password.focus();
				return false;
			}
			
			var data = new FormData(LoginFormNow);
			xhr.open('POST', url, true);
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200) {
					r = xhr.responseText;
					
                    	errorNow(r);
                    	setTimeout(function(){
							location.reload();
						}, 1000);
					sign_in.innerHTML = 'Sign In';
				}else{

				}
			}
			sign_in.innerHTML = 'Processing...';
			xhr.send(data);
		})
		function loginsuccessNow(msg){
	        toastr.warning(msg);
	        toastr.options.progressBar = false;
	        toastr.options.positionClass = "toast-top-right";
	    }
	    function errorNow(msg){
		    toastr.error(msg);
	        toastr.options.progressBar = true;
	        toastr.options.positionClass = "toast-top-center";
	        toastr.options.showDuration = 1000;
		}
	</script>
</body>
</html>