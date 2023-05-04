<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}

	// Connect to database
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'itemdb';
  $conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
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
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="bg-div">
        <div class="logo">
            <img src="looogoo.jpeg">
        </div>


<div class="navbar">
  <a href="logout.php">LOGOUT
  </a>
  <a href="datainfo.php">DATA INFO
  </a>
 
  <div class="dropdown">
    <button class="dropbtn"> MENU 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        <a href="add_item.php">Add item</a>
        <a href="ad_editmenu.php">Edit menu</a>
        <a href="ad_deletemenu.php">Delete item</a>
        <a href="ad_viewmenu.php">View items</a>
      </div>
  </div> 
</div>
</div>




 
  <section class="home-section">
    

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number">5</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number">450</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number">180</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
</div>
        
<br><br>
      <div class="sales-boxes">
        <br><br>
        <div class="recent-sales box">
       
	<table>
		<tr>
			<th>USER ID</th>
			<th>PAYMENT</th>
			<th>TIME</th>
      
		</tr>
		<?php
		
    
			// Retrieve data
			$result = mysqli_query($conn, "SELECT * FROM payment");

			// Output data in table format
			while ($row = mysqli_fetch_assoc($result)) {
        
				echo "<tr>";
				echo "<td>" . $row['user_id'] . "</td>";
				echo "<td>" . $row['total'] . "</td>";
				echo "<td>" . $row['date'] . "</td>";

				echo "</tr>";
        }
			
		?>
	</table>

        </div>

        <div class="top-sales box">
          <div class="title">Top Seling Product</div>
          <ul class="top-sales-details">
            <li>
            <a href="#">
              
              <span class="product">Vada Pav</span>
            </a>
            <span class="price">20 rs</span>
          </li>
          <li>
            <a href="#">
               
              <span class="product">Fried rice</span>
            </a>
            <span class="price">89 rs</span>
          </li>
          <li>
            <a href="#">
             <!-- <img src="images/nike.jpg" alt="">-->
              <span class="product">Mango Milkshake </span>
            </a>
            <span class="price">60 rs</span>
          </li>
          </ul>
        </div>
      </div>
    </div>
</div>
  </section>


  
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>



</body>
</html>



