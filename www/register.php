<?php
		# import db connection
		include 'includes/db.php';

		# import functions
		include 'includes/functions.php';

		# import header..
		include 'includes/header.php';

			# cache the form errors
		$errors = [];

		# be sure user clicked the submit button
		if(array_key_exists('register', $_POST)) 
		{

		# validate first name
		if(!empty($_POST['fname']))
		{
			$fn = $_POST['fname'];
		}else{
			$errors[] = "Please enter a first name";
		}

		# validate last name
		if(!empty($_POST['lname']))
		{
			$ln = $_POST['lname']));
			}else{
			$errors[] = "Please enter a last name";
		}
	
		# email address
		if(!empty($_POST['email']))
		{
		 	$em = $_POST['email']));
		 	}else{
		 	$errors[] = "Please enter an email";
		}
		
		# Password Checking
		if(!empty($_POST['password']))
		{
		
			$pwd = $_POST['password'];
			}else{
			$errors[] = "Please Enter your password";
			}
		}

		# Password Confirmation
		if(!empty($_POST['pword']))
		{
		$password = $_POST['pword'];
		if($pwd != $password)
		{
		$errors[] = "Wrong password";
		}

		#validate confirm password mismatch
				}

		if(empty($errors))
		{
			#save to db...
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
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
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
