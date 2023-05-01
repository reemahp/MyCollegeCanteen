<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  
}


.navbar a {
  float: right;
  font-size: 16px;
  color: white;
  text-align: center;
  text-decoration: none;
  display: block;
  padding: 0px 14px;
  font-family: sans-serif;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 10px 10px;
  background-color: inherit;
  font-family: inherit;
 
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: rgb(86, 71, 71);
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
 
  text-decoration: none;
  display: block;
  text-align: center;
}
table, td, th {
  border: 1px solid;
}

table {
  width: 100%;
  border-collapse: collapse;
}


.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>
<link rel="stylesheet" href="mystyle.css">
<meta charset="UTF-8">
    
    <link rel="stylesheet" href="style.css">
   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="bg-div">
        <div class="logo">
            <img src="looogoo.jpeg">
        </div>


<div class="navbar">
  
  <a href="adm.php">GO TO MAIN PAGE
  </a>
</div>
</div>


  <BR><BR>
<h3> LIST OF EMPLOYEES</h3>
<BR>
	<table class = "table table-dark table-striped">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Phone Number</th>
      <th>Age</th>
			<th>Duty</th>
      <th>Salary</th>
		</tr>
		<?php
			// Connect to database
      $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'itemdb';
    $conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    
			// Retrieve data
			$result = mysqli_query($conn, "SELECT * FROM employee");

			// Output data in table format
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['emp_id'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['phone_num'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
				echo "<td>" . $row['duty'] . "</td>";
        echo "<td>" . $row['salary'] . "</td>";
				echo "</tr>";
			}
		?>
	</table>

  <BR><BR>
<h3 > LIST OF VENDORS</h3>
<BR>
	<table class = "table table-dark table-striped">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Phone Number</th>
      <th>Email id</th>
			<th>City</th>
		</tr>
		<?php
			// Connect to database
      $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'itemdb';
    $conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    
			// Retrieve data
			$result = mysqli_query($conn, "SELECT * FROM vendors");

			// Output data in table format
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['vendor_id'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['Phone_num'] . "</td>";
        echo "<td>" . $row['email_id'] . "</td>";
				echo "<td>" . $row['city'] . "</td>";
				echo "</tr>";
			}
		?>
	</table>

 



</body>
</html>



