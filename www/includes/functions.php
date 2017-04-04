<?php

	# display errors inline
	function display_errors($key, $arr) {

		if(key_exists($key,$arr)){
			echo '<span class="err">'.$arr[$key].'</span>';
		}
	}

	# register admin into the admin table 
	# $f = fname, $l = lname, $e = email, $p = password
	function registerAdmin($dbcon,$f,$l,$e,$p){
		# prepare statement...
		$statement = $dbcon->prepare("INSERT INTO admin(firstname,lastname,email,hash) VALUES (:fn, :ln, :em, :hs)");


	// function loginAdmin($dbcon, $e,$p){

	// }
	// 	# hash password
		$hash = password_hash($p, PASSWORD_BCRYPT);
		
		# bind params...
		$data = [
			':fn' => $f,
			':ln' => $l,
			':em' => $e,
			':hs' => $hash
		];

		$statement->execute($data);
	}

	function authenticateAdmin($dbcon, $e, $p){
		$res = false;

		$stmt = $dbcon->prepare("SELECT admin_id, hash FROM admin WHERE email =:e");
		$stmt->execute([":e"=> $e]);

		#fetch
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();

		# test if email is a valid admin user
		if ($count == 1) {

			# test if password matches
			$temp = password_verify($p, $row['hash']);

			if($temp == true) {
				# password is correct
				$res = true;
				$_SESSION['admin_id'] = $temp[1]['admin_id'];

				# login user to add product page /dashboard
				header('location: add_product.php');
		}
			}
			
		return [$res, $row];
	}

	function doesEmailExist($dbcon, $e){
		$result = false;
		$stmt = $dbcon->prepare("SELECT email FROM admin WHERE email=:e");

		#bind params
		$stmt->execute([':e'=> $e]);
		
		#get number of rows returned
		$count = $stmt->rowCount();

		if($count > 0){
			$result = true;
		}
		return $result;
	}

	function addCategory($dbcon, $cname){
		
		$stmt = $dbcon->prepare("INSERT INTO category(category_name) Values (:cat)");
		$stmt->execute([':cat' => $cname]);
	}

	function retrieveCategories($dbcon, $catt){
		// $template = true;

		$stmt = $dbcon->prepare("SELECT category_id, category_name FROM category WHERE category_name = :cat");
		
		$stmt->bindParam(':cat', $catt['category_name'], PDO::PARAM_STR);
		$stmt->execute();

		//extract ($row); to fill all form
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$template .= "<option value='.$row[0].'>".$row[1]."</option>";
		}

		return $template;
	}

	function doFileupload($file, $uploadDir){
		$result = false;

		#generate random number to append
		$rnd =rand(0000000000, 9999999999);

		#strip filename for space
		$strip_name = str_replace(" ", "_", $file['pic']['name']);

		$filename = $rnd.$strip_name;
		$dest = $uploadDir.$filename;

		$bool = 
	}
		function doFileupload($file, $uploadDir){
			# generate file name...
			$file_name = $rand.$_FILES['pic']['name'];

			$dest = $upload_dir.$file_name;

			# upload the file...
			$bool = move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
			if($bool){ echo "true"; 
		}

	function insertProduct($dbcon, $data){
		#prepare statement
		$stmt = $dbcon->prepare("INSERT INTO product(category_id, product_name, description, product_author, img_loc, price) VALUES(:cat, :pn, :des, :pauth, :img_loc, :price)");

		#bind params
		$val = [
			':cat' => $data['cat'],
			':pn' => $data['pname'],
			':desc' => $data['desc'],
			':pauth' => $data['pauth'],
			':img_loc' => $data['loc'],
			':price' => $data['price']
			];

			$stmt->execute($val);
	}

	function displayProducts($dbcon){
		$template = "";

		$stmt = $dbcon->prepare("SELECT * FROM product");
		$stmt = execute();

		while($row = $stmt->fetch(PDO::FETCH_BOTH)) {
			$template .= '<tr><td>'.
						$row['product'].'</td><td>'.
						$row['product_author'].'</td><td>'.
						$row['price'].'</td><td><a href="edit_product.php?pid='.
						$row['product_id'].'">edit</a></td><td><a href='.
						$row['product_id'].'">delete</a></td></tr>';
		}
		return $template;

	}

function getProductByID($dbcon, $ID){
	$stmt = false;
	$stmt = $dbcon->prepare("SELECT * FROM product WHERE product_id = :pid");
	$stmt->execute([':pid' => $ID]);

	$stmt->fetchAll(PDO::FETCH_BOTH);
	if ($stmt->rowCount() > 1) {
		$stmt = true;
	}
	return $stmt[0];		
}
