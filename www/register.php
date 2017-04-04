<?php
	# import db connection
	include 'config/db.php';

	# import functions
	include 'includes/functions.php';

	# import header..
	include 'includes/header.php';

	# cache the form errors
	$errors = [];

	# be sure user clicked the submit button
	if(array_key_exists('register', $_POST)) {
		
		# validate first name
		if(!empty($_POST['fname'])) {
			$fn = $_POST['fname'];
		} else {
			$errors['fname'] = "Please enter a first name";
		}

		# validate lname
		if(!empty($_POST['lname'])) {
			$ln = $_POST['lname'];
		} else {
			$errors['lname'] = "Please enter a last name";
		}

		# validate email
		if(!empty($_POST['email'])) {
			$e = $_POST['email'];

			# be sure email does not exist...
			$chk = doesEmailExist($dbcon, $e);

			if($chk) {
				$errors['email'] = "email already exist";
			}
		} else {
			$errors['email'] = "Please enter an email address";
		}

		# validate password
		if(!empty($_POST['password'])) {
			$p = $_POST['password'];
		} else {
			$errors['password'] = "Please enter a password";
		}

		# check if passwords match
		# validate first name
		if(!empty($_POST['pword'])) {
			$pw = $_POST['pword'];

			if($pw !== $p) {
				$errors['pword'] = "Passwords do not match";
			}
		} else {
			$errors['pword'] = "Please enter a password";
		}

		if(empty($errors)) {
			# save to db...
			registerAdmin($dbcon, $fn, $ln, $e, $p);

			# redirect admin...
			header("Location: login.php");
		} 
	}

?>
	
	<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
				<?php display_errors('fname', $errors); ?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
				<?php display_errors('lname', $errors); ?>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
				<?php display_errors('email', $errors); ?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<?php display_errors('password', $errors); ?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
				<?php display_errors('pword', $errors); ?>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

<?php 
	# include footer
	include 'includes/footer.php'; 
?>
