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
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;700&display=swap');

		* {
		  	margin: 0;
		  	padding: 0;
		  	box-sizing: border-box;
		}
		img {
		  	max-width: 100%;
		  	display: block;
		}
		ul {
		  	list-style: none;
		}
		/* Utilities */
		.card_box::after,
		.card_box img {
		  	border-radius: 50%;
		}
		.card_box {
			padding: 2.5rem 2rem;
			border-radius: 10px;
			/*background-color: rgba(255, 255, 255, .5);*/
			/*background-color: green;*/
			background-color: #0e47d7;
			max-width: 500px;
			margin: 1rem;
			transform-style: preserve-3d;
			overflow: hidden;
		}
		.card_box::before,
		.card_box::after {
			content: '';
			position: absolute;
			z-index: -1;
		}
		.card_box::before {
			width: 100%;
			height: 100%;
			border: 4px solid #98d7fb;
			border-radius: 10px;
			top: -.7rem;
			left: -.7rem;
		}
		.card_box img {
		  	width: 16rem;
		  	min-width: 80px;
		  	margin: 1em auto;
		  	box-shadow: 0 0 0 5px #FFF;
		}

		.infos {
		  	margin-left: 1.5rem;
		}

		.name {
		  	margin-bottom: 1rem;
		  	color: #98d7fb;
		}
		.name h2 {
		  font-size: 1.3rem;
		}
		.name h4 {
		  	font-size: .8rem;
		}

		.text {
		  	font-size: .9rem;
		  	margin-bottom: 1rem;
		}

		.stats {
		  	margin-bottom: 1rem;
		}
		.stats li {
		  	min-width: 5rem;
		}
		.stats li h3 {
		  	font-size: .99rem;
		}
		.stats li h4 {
		  	font-size: .75rem;
		}

		

		@media screen and (max-width: 450px) {
		  	.card_box {
		    	display: block;
		  	}
		  	.infos {
		    	margin-left: 0;
		    	margin-top: 1.5rem;
		  	}
		  	.links button {
		    	min-width: 100px;
		  	}
		}

	</style>
</head>
<body>
	<?php include ("support/nav.php"); ?>
	<div class="container mt-5">
		<div class="main_section">
			<h1 class="text-center mb-5">Zambia Air Force Automation Project</h1>
			<div class="row">
				<div class="col-md-8">
					<div class="card_box">
					    <div class="img">
					      	<img src="images/ZAFLog2.png" class="img-fluid" width="200">
					    </div>
					    <div class="infos">
					      	<div class="name text-center">
					        	<h2 class="h4">ZAMBIA AIR FORCE</h2>
					        	<p class="text">
					        <!-- PST -->
					        	<!-- Psc Dip QFM -->
					      		</p>
					        	<h4 class="h5 bold"><strong> Zambia Air Force Lusaka Air Base </strong></h4>
					      	</div>
					    </div>
					</div>
				</div>
				<div class="col-md-4">
					
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Login In</h4>
						</div>
						<div class="card-body">
							<!-- <a href="login" class="text-dcoration-none">Login</a> -->
							<div class="">
								<form id="loginForm" method="post">
									
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
						       			<div><button id="loginBtn" type="submit" class="btn btn-secondary w-100">Login</button></div>
						       			<!-- <div><a href="forgot-password" title="password" class="text-secondary text-decoration-none">Forgot Password</a></div> -->
						       			<div><a href="register" title="password" class="text-secondary text-decoration-none">Create user</a></div>
						       		</div>
								</form>
							</div>
						</div>
					</div>
				</div>
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

		// Login ========================
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