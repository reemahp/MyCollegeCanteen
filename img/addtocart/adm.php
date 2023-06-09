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
  padding: 14x 16px;
  text-decoration: none;
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
  <a href="logout.php">Logout
  </a>
 
 
  <div class="dropdown">
    <button class="dropbtn">Dropdown 
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
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">admin_name</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number">###</div>
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
            <div class="number">###</div>
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
            <div class="number">###</div>
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
          
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Date</li>
              <li><a href="#">02 April 2023</a></li>
              <li><a href="#">02 April 2023</a></li>
              <li><a href="#">02 April 2023</a></li>
              
            </ul>
            <ul class="details">
            <li class="topic">Customer</li>
            <li><a href="#">user 1</a></li>
            <li><a href="#">user 2</a></li>
            <li><a href="#">user 3</a></li>
           
</ul>
          <ul class="details">
            <li class="topic">Total</li>
            <li><a href="#">##rs</a></li>
            <li><a href="#">##rs</a></li>
            <li><a href="#">##rs</a></li>
           
             
          </ul>
          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
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


  <BR><BR><BR>
<h3> LIST OF VENDORS</h3>
<BR><BR><BR>
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Phone Number</th>
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
				echo "<td>" . $row['city'] . "</td>";
				echo "</tr>";
			}
		?>
	</table>
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



