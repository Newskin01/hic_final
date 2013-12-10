<?php
include 'functions.php';

	if(isset($_POST['first_name'],
	$_POST['last_name'],
	$_POST['middle_name'],
	$_POST['DOB_m'],
	$_POST['DOB_d'],
	$_POST['DOB_y'],
	$_POST['gender'],
	$_POST['policy_num'],
	$_POST['insurance_name']
	)) {
	
	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$middle_name = $_POST['middle_name'];
	$DOB_m = $_POST['DOB_m'];
	$DOB_d = $_POST['DOB_d'];
	$DOB_y = $_POST['DOB_y'];
	$gender = $_POST['gender'];
	$policy_num = $_POST['policy_num'];
	$insurance_name = $_POST['insurance_name'];
	$DOB = $DOB_y."-".$DOB_m."-".$DOB_d;
	$dbh = getDatabaseConnection();

try {
		$sql = 'INSERT INTO patient (gender, birthDate, middleName, lastName, firstName)
					VALUES (:gender, :DOB, :middle_name, :last_name, :first_name);';
					
		$stmt=$dbh->prepare($sql);
		$stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
		$stmt->bindParam(':DOB', $DOB, PDO::PARAM_STR);
		$stmt->bindParam(':middle_name', $middle_name, PDO::PARAM_STR);
		$stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
		$stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
		$stmt->execute();
		$sql="null";
		$id = $dbh->lastInsertId();
		$stmt=null;
		$sql ="INSERT INTO bill (patientNo, policyNo, insurenceName) VALUES (:patientNo, :policy_num, :insurance_name);";
		$stmt=$dbh->prepare($sql);		
		$stmt->bindParam(':patientNo', $id, PDO::PARAM_STR);
		$stmt->bindParam(':policy_num', $policy_num, PDO::PARAM_STR);
		$stmt->bindParam(':insurance_name', $insurance_name, PDO::PARAM_STR);
		$stmt->execute();
		$dbh = null; 
		report($first_name, $last_name, $dbh, $id);
	} catch (Exception $e) {
						$e->getMessage();
				echo ("The connection was not established(1). $e"); 
			}
	
	}

		function report($fname, $lname, $dbh, $id) {
		$user = $_SESSION['username'];
		echo "
			<!doctype html>
			<html lang='en'>
			<!doctype html>
			<html lang='en'>
<head>
    <meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta name='description' content='A layout example with a side menu that hides on mobile, just like the Pure website.'>

    <title>Add Patient</title>
<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.3.0/pure-min.css'>
<link rel='stylesheet' href='../css/layouts/side-menu.css'>
<link rel='stylesheet' href='../css/style_forms.css'>
<script src='../js/jquery-1.8.2.js'></script>
<script src='../js/ui.js'></script>
<script>
  $(function() {
    $( document ).tooltip();
  });
  </script>
</head>
  <body>
<div id='layout'>
<!-- Menu toggle -->
    <a href='#menu' id='menuLink' class='pure-menu-link'>
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id='menu'>
        <div class='pure-menu pure-menu-open'>
            <a class='pure-menu-heading' href='#'>HIC</a>

            <ul>
                <li><a href='../main.php'>Home</a></li>
                <li><a href='../patient_details.php'>Patient Details</a></li>
                <li><a href='../billing.php'>Billing</a></li>
                <li><a href='../add_patient.php'>Add Patient</a></li>
                <li title='Logout to login page.'><a href='../logout.php'>Logout</a></li>
                

                <li class='pure-menu-selected menu-item-divided'>
                    <a href='../main.php'>Home</a>
                </li>
            </ul>
			<p>
            <ul>
            	<li style='font-size: small'>
                	<span style='font-size: x-small'><a href='../staff.php'>Logged in as:  <font color=blue> $user</font></a>
                </span></li>
			</p>
        </div>
    </div>

<div id='main'>
    <div class='header'>
    <h1>HIC Medical</h1>
    <h2>A Simple Solution</h2>
  </div>
    <div class='holder'>
    <div class='content'>
        <h2 class='content-subhead'>Patient Added $fname $lname with ID#$id</h2>
		<button type='submit' href='../add_patient' class='pure-button pure-button-primary'>Create Patient</button>
      </div>
	</div>
  </div>
  </div>
</div>
</div>
</body>
</html>
";
	}
?>