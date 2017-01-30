<?php

	#displays errors inline
	function display_errors($key, $err)
	{
		# prepare statement...
		if(array_key_exists($key, $err)){
		 echo '<span class="err">'.$err['$key'].'</span>';
		}
	}

# This function register an admin into the 
# admin table.
function registerAdmin($dbconn, $fname, $lname, $email, $pass){
	$stmt = $dbconn->prepare("INSERT INTO admin(firstname, lastname, email, hast) VALUES (:fn, ln, :e, :h)");

# bind params ..
	$data = [
		':fn' => $fname,
		':ln' => $lname,
		':e' => $email,
		':h' => $hash
	]

	$stmt->execute($data);
}
