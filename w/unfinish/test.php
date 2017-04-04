<?php
# include functions
include "includes/functions.php";
?>

define('MAX_FILE_SIZE', '1048576');

$errors = [];

#rand number
		$rand = rand(0000, 9990);

#upload directory ...
	$upload_dir = 'upload_dir';


if (array_key_exists('upload', $_POST)) {
	#allowed extensions
	$ext = ["image/jpg", "image/jpeg", "image/png"];
	
	if(!empty($_FILES['pic']['name'])){



		#check file size ..
		if($_FILES['pic']['size'] > MAX_FILE_SIZE){
		$errors['pic'] = "file size exceeds maimum. maximum: ".MAX_FILE_SIZE;
		}

		#check extension...
		if(!in_array($_FILES['pic']['type'], $ext)){
		$errors['pic'] = "invalid file type";
		}
	}else{
		$errors['pic'] = "file size";

	}

	if (empty($errors)) {
	$file_name = $_FILES['pic']['name'].$rand;

	#upload the file...
	move_uploaded_file($file_name, $upload_dir);
		
	}
}
?>

<form method="POST" enctype="multipart/form-data">
	<input type="file" name="pic">

	<br/>
	<input type="submint" name="upload" value="upload">
</form>
<?php
$name = array("mohammed" => 
			array("biology"=>1,
			"chemistry"=>2,
			"english"=>3),
		"aliyu" => array("library"=>1,
			"computer" => 2,
			"math" => 3)
		);
	echo $name['mohammed']['aliyu'];
?>
