<?php
include 'includes/dashboard_header.php';
?>

#cache errors ..
$errors = [];

if(array_key_exists('add_cat', $_POST)){
#valideate category

if(empty($_POST['category'])){
	$errors['category'] = "Please enter a category";
}

	if(empty($errors)){
	#add the category
	addCatergory($dcon, $_POST['category']);

	header("Location: add_product.php");
	}
}
?>
	<div class="wrapper">
		<div id="stream">
			<h1 id="register-label">Add Category</h1>
			<hr>

			<form id="register" method="POST">
			<div>
				<?php display_errors('category', $errors); ?>
				<label>Add Category:</label>
				<input type="text" name="category" placeholder="category name">
			</div>
			
			<input type="submit" name="add_cat" value="add">

			</form>
		</div>
	</div>
<?php include 'includes/dashboard_footer.php';
?>
