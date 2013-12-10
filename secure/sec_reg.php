<?php
// Include database connection and functions here.
include 'functions.php';

// The hashed password from the form
$password = $_POST['p'];
// Create a random salt
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
// Create salted password (Careful with the chilli)
$password = hash('sha512', $password.$random_salt);
$username = $_POST['username'];
$email = $_POST['email'];

$errors = array();  
$isNull = false;  
if($username == ''){
	//echo 'invaild username';
	$error[] = 'Invalid username';
	$isNull = true;
}
if($password == '') {
	//echo 'invaild password
	$error[] = 'Invalid password';
	$isNull = true; 
}
if($email == '') {
	//echo 'invalid email';
	$error[] = 'invalid email'; 
	$isNull = true; 
}

if($isNull == false) {

$dbh = getDatabaseConnection();  

	if($dbh)
	{
	$sql = 'INSERT INTO members (username, email, password, salt) VALUES (:username, :email, :password, :salt)';
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(':username'=>$username,
									':email'=>$email,
									':password'=>$password,
									':salt'=>$random_salt));
	$dbh = null;
	
	header("Location: '..\..\..\?success=1'");
	} else {
	$dbh = null; 
	header("Location: '..\..\..\?registrationfailed=1'");
	}
	} else {
	header("Location: '..\..\..\?registrationfailed=1?'");
	}
?>


