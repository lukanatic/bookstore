<?php
include 'includes/header.php';

?>
	<div class="wrapper">
		<div id="stream">
			<h1 id="register-label">Add Product</h1>
			<hr>

			<form id="register" method="POST" enctype="multipart/form-data">
			<div>
				<label>Product Name:</label>
				<input type="text" name="pname" placeholder="product name">
			</div>
			
			<div>
				<label>Product Author:</label>
				<input type="text" name="pauth" placeholder="product Author">
				
			</div>

				<div>
				<label>Select category:</label>
				<select name="cat">
					
				</select>
				
			</div>


			<div>
				<label>Description:</label>
				<input type="text" name="desc" placeholder="Desc" class="post-box">>
				
			</div>
			<div>
				<label>Price:</label>
				<input type="text" name="price" placeholder="product price">
				
			</div>

			<div>
				<label>Image:</label>
				<input type="text" name="pic" placeholder="product Author">
				
			</div>

			<input type="submit" name="submit" value="add product">

			</form>
		</div>
	</div>

<?php
include 'includes/footer.php';
