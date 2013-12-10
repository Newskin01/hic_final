<?php

   function getDatabaseConnection()
   {
	//Get servers name.
	$server = "SERVER_NAME [{$_SERVER['SERVER_NAME']}]"; 
	//Check what server we are using.
	if($server == 'SERVER_NAME [moxie.cs.oswego.edu]') {
			//USE REMOTE
			define ('DB_HOST', 'moxie.cs.oswego.edu');
			define ('DB_PORT', '4499');
			define ('DB_NAME', 'hic_final');
			define ('DB_USERNAME', 'root');
			define ('DB_PASSWORD', 'jghb123jghb123A');
			
			try {
			
			$dbh = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				return $dbh; 
				
			} catch (Exception $e) {
				die("The connection was not established(1)."); 
			}
		} else {
			//USE LOCAL
			define ('DB_HOST', 'localhost');
			define ('DB_PORT', '3306');
			define ('DB_NAME', 'hic_final');
			define ('DB_USERNAME', 'root');
			define ('DB_PASSWORD', 'jghb123jghb123A');
			
			try { 
			
			$dbh = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				return $dbh;
				
			} catch (Exception $e) {
				die("The connection was not established(2).");
			}
		}
	}
	
   
//SECURE SESSION START FUNCTION
function sec_session_start() {
        $session_name = 'hic_secure'; // Set a custom session name
        $secure = false; // Set to true if using https.
        $httponly = true; // This stops javascript being able to access the session id. 
 
        ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
        $cookieParams = session_get_cookie_params(); // Gets current cookies params.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name); // Sets the session name to the one set above.
        session_start(); // Start the php session
        session_regenerate_id(true); // regenerated the session, delete the old one.     
}

//SECURE LOGIN FUNCTION
function login($email, $password) {

	$dbh=getDatabaseConnection();
	
	if($dbh) {
		$sql = 'SELECT id, username, password, salt FROM members WHERE email = :email LIMIT 1';
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);  
		$stmt->execute();
		//Save data from qry.
		$userData = $stmt->fetch(); 
		$user_id = $userData['id'];
		$username = $userData['username'];
		$db_password = $userData['password'];
		$salt = $userData['salt'];
		$password = $password;
		//Hash password of user supplied password.  
		$password = hash('sha512', $password.$salt); 
		$count = $stmt->rowCount(); 
			if($count ==1) { //if the user exists
				
				if(checkbrute($user_id,$dbh) == true) {
					//Account locked!
					return false;
				} else {
				
					if($db_password == $password) {
					$ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
					$user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
 
					$user_id = preg_replace("/[^0-9]+/", "", $user_id); // XSS protection as we might print this value
					$_SESSION['user_id'] = $user_id; 
					$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // XSS protection as we might print this value
					$_SESSION['username'] = $username;
					$_SESSION['login_string'] = hash('sha512', $password.$ip_address.$user_browser);
					// Login successful.
					$dbh = null; 
					return true;    
					} else {
						$now = time();
						$dbh->query("INSERT INTO login_attempts (user_id, time) VALUES ('$user_id', '$now')");
						$dbh = null;
						return false;
				}
			}
	} else {
		$dbh = null; 
		return false;
	}
}
$dbh = null; 
}

//CREATE LOGIN CHECK FUNCTION - BRUTE FORCE

function checkbrute($user_id, $dbh) {
   // Get timestamp of current time
   $now = time();
   // All login attempts are counted from the past 2 hours. 
   $valid_attempts = $now - (2 * 60 * 60); 
   $sql = 'SELECT time FROM login_attempts WHERE user_id = ? AND time > $valid_attempts';
   $stmt= $dbh->prepare($sql);
   $stmt->bindParam(':i', $user_id, PDO::PARAM_STR); 
   
   $count = $stmt->rowCount();
   if ($count > 5) { 
		return true;
		} else {
		return false;
		}
}

//CREATE LOGIN CHECK FUNCTION - Logged Status
function login_check() {
	$dbh = getDatabaseConnection();
	
   // Check if all session variables are set
  if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
     $user_id = $_SESSION['user_id'];
	 
     $login_string = $_SESSION['login_string'];
     $username = $_SESSION['username'];
     $ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
	 
	 $sql = "SELECT password FROM members WHERE id = :id LIMIT 1"; 
	 $stmt = $dbh->prepare($sql);
	 $stmt->bindParam(':id', $user_id);  
	 $stmt->execute();
	 $count = $stmt->rowCount();
			if($count == 1) {
				$userData = $stmt->fetch(); 
				$password = $userData['password'];
				$login_check = hash('sha512', $password.$ip_address.$user_browser);
					if($login_check == $login_string) {
						return true;
					} else {
						return false;
				}
			} else {
				return true;
			}
	} else {
		return false;
	}
}

;?>