<?php
	session_start();

	# title...
	$title = "add products";

	# import db connection
	include 'config/db.php';

	# import functions
	include 'includes/functions.php';

	# import header..
	include 'includes/dashboard_header.php';


	$error = [];

	if (array_key_exists('submit', $_POST)) {
	
		if (empty($_POST['pname'])) {
			$error['pname'] = "Insert Product Name";
			}	
		
		if (empty($_POST['pauth'])) {
			$error['pauth'] = "Insert Product Name";
			}	

		if (empty($_POST['category'])) {
			$error['category'] = "Insert Product Name";
			}	

		if (empty($_POST['desc'])) {
			$error['desc'] = "Insert Product Name";
			}	

		if (empty($_POST['price'])) {
			$error['price'] = "Insert Product Name";
			}	


		if (empty($_POST['pic'])) {
			$error['pic'] = "upload jpeg/png/jpg format only";
			}	

		if (empty($error)) {
			
			// retrieveCategories($dbcon, $_POST['category']);
			// $data = array_map('trim', $_POST);
			// addCategory($dbcon, $data);

			// retrieveCategories($dbcon, $catt);
		}
	}
?>

	<div class="wrapper">
		<div id="stream">
			<h1 id="register-label">Add Product</h1>
			<hr>

			<form id="register" method="POST" enctype="multipart/form-data">
			<div>
				<?php display_errors('pname', $error); ?>

				<label>Name</label>
				<input type="text" name="pname" placeholder="product name">
			</div>
			<div>
				<?php display_errors('pauth', $error); ?>

				<label>Author</label>
				<input type="text" name="pauth" placeholder="product author">
			</div>
			<div>
				<?php display_errors('category', $error); ?>

				<label>select category</label>
				<select name="category">
					<?php
						$categoryList = retrieveCategories($dbcon, $catt);
						echo $categoryList;
					?>
				</select>
			</div>
			<div>
				<?php display_errors('desc', $error); ?>

				<label>Description:</label>
				<textarea placeholder="content" name="desc" class="post-box"></textarea>
			</div>
			<div>
				<?php display_errors('price', $error); ?>

				<label>Price</label>
				<input type="text" name="price" placeholder="price">
			</div>

			<div>
				<?php display_errors('pic', $error); ?>

				<label>image</label>
				<input type="file" name="pic">
			</div>

			<input type="submit" name="submit" value="Add"/>

			</form>
		</div>
	</div>

<?php include 'includes/footer.php'; ?>
