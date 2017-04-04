<?php
	session_start();

	#include header
	include "includes/header.php";

	#include database
	include "config/db.php";

	# include functions
	include "includes/functions.php";

	# handle form errors
	$errors = [];

	$message = '';


	# Check whether the email and password can retrieved
#	if (!empty($_POST['email']) && !empty($_POST['password'])) 
#	{
// #		$records = $dbcon->prepare("SELECT admin_id, email, hash FROM admin WHERE email = :email");
// 		$data = [':email' => $_POST['email']];
// 		$records->execute($data);
// 		$results = $records->fetch(PDO::FETCH_ASSOC);

		#$message = '';

	# Proper verifying the password.
	// if(count($results) > 0 && password_verify($_POST['password'], $results['hash']))
		// {
		// 	$_SESSION['user_id'] = $results['user_id'];
		// 	header("Location: index.php");
		// }

	// $message = 'Sorry, do not match';
	// }

	if (array_key_exists('submit', $_POST)) {
		#validate email
		if (empty($_POST['email'])) {
			$errors['email'] = "Please enter a email";
		}
	
	if (empty($_POST['password'])) {
		$errors['password'] = "Please Enter a password";
		}

	$chk = authenticateAdmin($dcon, $_POST['email'], $_POST['password'], $errors);

	if (!$chk[0]) {
		$errors['password'] = "Please Enter a password";
		
	}
			
	if(empty($errors)){
		$data = $chk[1];
		$_SESSION['admin_id'] = $data['admin_id'];

		#redirect ..
		header("Location: add_product.php");
		}
		
		}
	}
?>
<div class="wrapper">
	<h1 id="login-label">Admin Login</h1>
	<hr>
	<form id="login" method="POST">
		<div>
			#<?php 
				if (!empty($message)) 
					{
						echo '<p>'.$message.'</p>';
					} 
			?>
 
			<label>email:</label>
			<input type="text" name="email" placeholder="email">
		</div>
		<div>
			<?php 
				if (!empty($message)) 
				{
					echo '<p>'.$message.'</p>';
				}
			?>
			<label>password:</label>
			<input type="password" name="password" placeholder="password">
		</div>
		<input type="submit" name="submit" value="login">
	</form>

	<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
</div>
<?php
	#include footer
	include "includes/footer.php";
?>
