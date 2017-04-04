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


?>
	<div class="wrapper">
		<div id="stream">
			<h1 id="register-label">Edit Product</h1>
			<hr>

			<form id="register" method="POST" enctype="multipart/form-data">
			<div>
				<label>Name</label>
				<input type="text" name="pname" placeholder="product name">
			</div>
			<div>
				<label>Author</label>
				<input type="text" name="pauth" placeholder="product author">
			</div>
			<div>
				<label>select category</label>
				<select name="category">
					<?php
						$categoryList = addCategory($dbcon, $cname);
						echo $categoryList;
					?>
				</select>
			</div>
			<div>
				<label>Description:</label>
				<textarea placeholder="content" name="desc" class="post-box"></textarea>
			</div>
			<div>
				<label>Price</label>
				<input type="text" name="price" placeholder="price">
			</div>

			<input type="submit" name="submit" value="Add"/>

			</form>
		</div>
	</div>
