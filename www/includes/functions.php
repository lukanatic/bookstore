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

	function authenticateAdmin($dbon, $e, $p, $err){
		$res = true;

		$stmt = $dbcon->prepare("SELECT email, hash FROM admin WHERE email =:e");
		$stmt->execute([":e"=> $e]);

		#fetch
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$result = $stmt->rowCount();

		#if there was no match
		if ($result <=0) {
			$err['email'] = "either email or password is incorrect";
		}
		#if(!password_verify($p, $row['hash'])){
		#if(password_verify($p, $row['hash']) == 1){

		if(!password_verify($p, $row['hash'])){
			$err['password'] = "either email or password is incorrect";
		}

		return [$res, $row]
	}
	// function doesEmailExist($dbconn, $email){
	// 	$result = false;
	// 	$stms = $dbcon_>prepare("SELECT eamil FROM admin WHERE email=:e");

	// 	#bind params
	// 	$stmt->bindParam(":e", $eamil);
	// 	$stmt->execute();

	// 	#get number of rows returned
	// 	$count = $stmt->rowCount();

	// 	if($count > 0){
	// 		$result = true;
	// 	}
	// }
