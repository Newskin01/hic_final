 <?php
include 'secure/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
if(login_check() == true) { ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>Side Menu &ndash; Layout Examples &ndash; Pure</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
<link rel="stylesheet" href="css/layouts/side-menu.css">
<link rel="stylesheet" href="css/style_forms.css">
<script src="js/jquery-1.9.1.js"></script>
<script src="js/ui.js"></script>
<script>
  $(function() {
    $( document ).tooltip();
  });
  </script>
</head>
<body>

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="pure-menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="http://purecss.io/">HIC</a>

            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="patient_details.php">Patient Details</a></li>
                <li><a href="billing.php">Billing</a></li>
                <li><a href="add_patient.php">Add Patient</a></li>
                <li title="Logout to login page."><a href="logout.php">Logout</a></li>
                

                <li class="pure-menu-selected menu-item-divided">
                    <a href="main.php">Home</a>
                </li>
            </ul>
			<p>
            <ul>
            	<li style="font-size: small">
                	<span style="font-size: x-small"><a href="staff.php">Logged in as:  <font color=blue><?PHP print $_SESSION['username'];?></font></a>
                </span></li>
			</p>
        </div>
    </div>

    <div id="main">
        <div class="header">
            <h1>HIC Medical</h1>
            <h2>A Simple Solution</h2>
        </div>
        <div class="holder">
        <div class="content">
          <h2 class="content-subhead">General Patient Request</h2>
          
          <form class="pure-form pure-form-stacked" id="gen_patient">
		    <fieldset>
		      		<legend></legend>

			  		<label for="Patient_ID">Patient ID:</label>
			  		<input id="Patient_ID" type="id" placeholder="Patient ID #" title="Unique to patient.">
       			<p>
        			<label for="Bill_ID">Bill ID:</label>
        			<input id="Bill_ID" type="id" placeholder="Or Billing ID #" title="Unique to patient.">
			    </p>
                <p>
					<button type="submit" id="search" class="pure-button pure-button-primary">Search</button>
					<button type="submit" id"clear" class="pure-button pure-button-secondary" title="To Refresh Forms.">Clear</button>
				</p>
            		<legend></legend>
                <br/>
				<h3>Patient Info:</h3>
			  		<legend></legend>
                    
				
		    </fieldset>
          </form>
 
         <form class="pure-form pure-g" id="patient_info">
    		<div class="pure-u-2-5">
        		<input class="pure-input-1" type="text" placeholder="First Name" readonly value="" title="Patients First Name.">
    		</div>
    		<div class="pure-u-1-5">
    			<input class="pure-input-1" type="text" placeholder="Middle Name" readonly value="" title="Patients Middle Name.">
    		</div>
    		<div class="pure-u-2-5">
        		<input class="pure-input-1" type="text" placeholder="Last Name"	readonly value="" title="Patients Last Name.">
    		</div>
    		<div class="pure-u-1-2">
        		<input class="pure-input-1" type="text" placeholder="Date Of Birth" readonly value="" title="Patients Date Of Birth.">
    		</div>
    		<div class="pure-u-1-2">
        		<input class="pure-input-1" type="text" placeholder="Gender" readonly value="" title="Patients Gender.">
    		</div>
		</form>
        
        <br/>
        <br/>
        	<legend>Visit Info:</legend>
            <div id="visit_info">
            <table class="pure-table">
    <thead>
        <tr>
            <th>Dates</th>
            <th>Conditions</th>
            <th>Medications</th>
            <th>Comments</th>
        </tr>
    </thead>

    <tbody>
        <tr class="pure-table-odd">
            <td>1</td>
            <td>Honda</td>
            <td>Accord</td>
            <td>2009</td>
        </tr>
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>
</div>





<script src="js/ui.js"></script>

<!--Scripts-->
<script src="js/jquery-1.8.2.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="secure/sha512.js"></script>
<script src="secure/forms.js"></script>

     
<?php } else {
   echo 'You are not authorized to access this page, please login. <br/>';
}

;?>

</body>
</html>

