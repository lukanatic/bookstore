<?php
	# import functions
	include 'includes/functions.php';

	define('MAX_FILE_SIZE', '1048576');

	$errors = [];

	if(array_key_exists('upload', $_POST)) {
		# allowed extensions
		$ext = ["image/jpg", "image/jpeg", "image/png"];

		# extra random numbers for file name
		$rand = rand(0000, 9999);

		# upload directory....
		$upload_dir = 'upload_dir/';

		if(!empty($_FILES['pic']['name'])) {

			# check file size...
			if($_FILES['pic']['size'] > MAX_FILE_SIZE) {
				$errors['pic'] = "file size exceeds maximum. maximum: ". MAX_FILE_SIZE;
			}

			# check extension...
			if(!in_array($_FILES['pic']['type'], $ext)) {
				$errors['pic'] = "invalid file type";
			}

		} else {
			$errors['pic'] = "please select a file";
		}


		if(empty($errors)) {
			
		}
		}
	}
?>


<form method="POST" enctype="multipart/form-data">
	<?php display_errors('pic', $errors); ?>
	<input type="file" name="pic">

	<br/>
	<input type="submit" name="upload" value="upload">
</form>
