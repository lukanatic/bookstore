<?php
		# import db connection
		include 'includes/db.php';

		# import functions
		include 'includes/functions.php';

		# import header..
		include 'includes/header.php';

		# import db connection
	include "config/db.php";

	# include functions
	include "includes/functions.php";

	# import header
	include "includes/header.php";


		# cache the form errors
		$errors = [];

		# be sure user clicked the submit button
		if(key_exists('register', $_POST)) 
		{

		# validate first name
		if(!empty($_POST['fname']))
		{
			$fname = $_POST['fname'];
		}else{
			$errors['fname'] = "Please enter a first name";
		}

		# validate last name
		if(!empty($_POST['lname']))
		{
			$lname = $_POST['lname'];
			}else{
			$errors['lname'] = "Please enter a last name";
		}
	
		# email address
		if(!empty($_POST['email']))
		{
		 	$email = $_POST['email'];
		 	}else{
		 	$errors['email'] = "Please enter an email";
		}
		
		# Password Checking
		if(!empty($_POST['password']))
		{
		
			$password = $_POST['password'];
			}else{
			$errors['password'] = "Please Enter your password";
			}

		# Password Confirmation
		if(!empty($_POST['pword']))
		{
		$pword = $_POST['pword'];

		# validate confirm password mismatch
		if($password != $pword)
		{
		$errors['pword'] = "Mismatch password";
		}
		}else{
			$errors['pword'] = "Please Retype password";
		}
	
		if(empty($errors))
		{
			#save to db...
			registerAdmin($dbcon,$fname,$lname,$email, $password);
		

		#redirected to login page
		header('Location: login.php');
		}

		}
?>	
	<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
				<?php
					display_errors('fname', $errors);
				?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
				<?php
					display_errors('lname', $errors);
				?>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
				<?php
					display_errors('email', $errors);
				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<?php
					display_errors('password', $errors);
				?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
				<?php
					display_errors('pword', $errors);
				?>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

<?php

		# import footer..
		include 'includes/footer.php';
?>
