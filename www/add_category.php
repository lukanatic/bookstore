<?php
	session_start();
	
	# title...
	$title = "add category";

	# import db connection
	include 'config/db.php';

	# import functions
	include 'includes/functions.php';

	# import header..
	include 'includes/dashboard_header.php';

	# cache errors...
// <?php
// 	$error = [];

// 	if(array_key_exists('add_cat', $_POST)){

// 	if(empty($_POST['category'])){
// 		$error[] = "Wrong Email Address";
// 	}

// 	if(empty($error)){

// 	}
// }

	$errors = [];

	if(array_key_exists('add_cat', $_POST)) {
		# validate category
		if(empty($_POST['category'])) {
			$errors['category'] = "Please enter a category address";
		} 

		if(empty($errors)) {
			# add the category
			addCategory($dbcon, $_POST['category']);

			insertProduct($dbcon, $data);
			

			header("Location: view_product.php");
		}
	}
?>

	<div class="wrapper">
		<div id="stream">
			<h1 id="register-label">Add Category</h1>
			<hr>

			<form id="register" method="POST">
			<div>
				<?php $read = display_errors('category', $errors); echo $read; ?>
				<label>category name:</label>
				<input type="text" name="category" placeholder="category name">
			</div>

			<input type="submit" name="add_cat" value="add">

			</form>
		</div>
	</div>

<?php include 'includes/footer.php'; ?>
