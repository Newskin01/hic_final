<?php
include 'secure/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
if(login_check() == true) { ?>

<!doctype html>
<html lang="en">
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
<script src="js/jquery-1.8.2.js"></script>
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
        <h2 class="content-subhead">Add A Patient</h2>
		
		
		<!--form start-->
        <form  class="pure-form pure-form-stacked" id="addpatientform" action="secure/add_patient.php" method="post">
        <fieldset>
			<!-- -->
            <div class="pure-r-1">
                <label for="first_name">First</label>
                <input id="first_name" type="text" name="first_name">
              </div>
			<!-- -->
            <div class="pure-r-1-3">
                <label for="middle_name">Middle</label>
                <input id="middle_name" type="text" name="middle_name" >
              </div>	  
			<!-- -->  
            <div class="pure-u-1-3">
                <label for="last_name">Last</label>
                <input id="last_name" type="text" name="last_name" >
              </div>
			<!-- -->  
            <div class="pure-u-1">
                <div class="pure-u-1-5">
                <label for="DOB_m">Month</label>
                <select id="DOB_m" type="text" name="DOB_m">
				<option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
                  </select>
              </div>
			<!-- -->  
                <div class="pure-u-1-6">
                <label for="DOB_d">Day</label>
                <select id="DOB_d" type="text" name="DOB_d">
				<option value="01">01</option>
    <option value="02">02</option>
    <option value="03">03</option>
    <option value="04">04</option>
    <option value="05">05</option>
    <option value="06">06</option>
    <option value="07">07</option>
    <option value="08">08</option>
    <option value="09">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
                  </select>
              </div>	  
			<!-- -->  
                <div class="pure-u-1-3">
                <label for="DOB_y">Year</label>
                <select id="DOB_y" type="text" name="DOB_y">
								<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
				<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
<option value="1909">1909</option>
				
                  </select>
              </div>
			<!-- -->
            <div class="pure-u-1-3">
                <label for="gender">Gender</label>
                <select id="gender" class="pure-input-1-2" name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
              </select>
              </div>
			<!-- --> 
            <div class="pure-u-1">
                <label for="policy_num" title="Patient's insurance policy number.">Policy#</label>
                <input id="policy_num" type="text" title="Patient's insurance policy number." name="policy_num">
              </div>
			<!-- --> 
            <div class="pure-u-1">
                <label for="insurance_name" title="Patient's insurance name.">Insurance#</label>
                <input id="insurance_name" type="text" title="Patient's insurance policy number." name="insurance_name">
              </div>
			<!-- --> 
            <br/>
			<br/>
			<div class="pure-u-1">
            <button type="submit" id="addpatient" class="pure-button pure-button-primary">Create Patient</button>
			</div>
			
          </fieldset>
      </form>
	  <?php } else {
   echo 'You are not authorized to access this page, please login. <br/>';
}

;?>
	  <!--from end--> 
      </div>
	</div>
  </div>
  </div>
</div>
</div>
</body>
</html>
