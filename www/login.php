<?php
	session_start();

	# import db connection
	include 'config/db.php';

	# import functions
	include 'includes/functions.php';

	# import header..
	include 'includes/header.php';

	# cache the form errors
	$errors = [];

	if(array_key_exists('login', $_POST)) {
		# validate email
		if(empty($_POST['email'])) {
			$errors['email'] = "Please enter an email address";
		} 

		# validate password
		if(empty($_POST['password'])) {
			$errors['password'] = "Please enter a password";
		}

		

		if(empty($errors)) {

			# attempt to log user in ...
			$chk = authenticateAdmin($dbcon, $_POST['email'], $_POST['password']);

			# if valid user / password combination
			// if($chk[0]) {
				# set user id in session
				// $_SESSION['admin_id'] = $chk[1]['admin_id'];

				# login user to add product page /dashboard
				// header('location: add_product.php');

			// }

			$errors['password'] = "Email and Password do not match";
		}
	}
?>
	<div class="wrapper">
		<h1 id="login-label">Admin Login</h1>
		<hr>
		<form id="login" method="POST" action="login.php">
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
			<input type="submit" name="login" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
	</div>

<?php 
	# include footer
	include 'includes/footer.php'; 
?>
