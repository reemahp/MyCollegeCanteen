<?php  

session_start();
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}

require_once ('php/CreateDb.php');
require_once ('./php/component.php');



$database = new CreateDb("itemdb", "itemtb");

if (isset($_POST['add'])){
   
   
            
            $servername = "localhost";
            $username = "root";
            $password = "";

            
            $conn = new mysqli($servername, $username, $password, "itemdb");

            
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            

            $stmt = $conn->prepare("SELECT * FROM cart WHERE item_id = ? AND user_id = ?");
            $stmt->bind_param("ii", $_POST['item_id'], $_SESSION['user_id']);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
    // Item already exists in cart
                echo "<div class=\"alert alert-danger\">
                <strong>Alert!</strong> This item is already present in the cart.
                </div>";

} else {
    // Item does not exist in cart, insert new record
    $query = "insert into cart (user_id, item_id, quantity) values(". $_SESSION['user_id'] .", " .$_POST['item_id'].", 1)";

            mysqli_query($conn , $query);
}
           
        }


?>

<html>

<head>
    <link rel="stylesheet" href="mystyle.css">
    <meta charset="UTF-8" name="viewport" content="width=device-width"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <title>
        My College Canteen
    </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            width: 100%;
            background-image: url("restaurant.webp");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
           
        }

       
        .search img {
  width: 200px;
  height: 200px;
  
}

        .search h3{
  padding: 5px;
  text-align: center;
  font-family: sans-serif bold;
  color: rgb(68, 70, 69);
}
        </style>
        </head>
        
        <body>
        <div class="bg-div">
        <div class="logo">
        <img src="looogoo.jpeg">
        </div>
        <ul>
        <li style="float:right"><a href="logout.php">Logout</a></li>
        <li style="float:right"><a href="cart.php">cart
        
        </a></li>
        
        <li style="float:right"><a class="active" href="menu.php">Menu</a></li>
        <li style="float:right"><a href="CollegeCanteen.php">Home</a></li>
        
        </ul>
        </div>

      
    <section class="item">
        <div class="items">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['item_name'], $row['item_price'], $row['item_img'], $row['id']);
                }
            ?>
            
        </div> </section>

        <div class="col-md-3"></div>
	<div class="col-md-6 well" >
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-10">
			
			<form class="form-inline" method="POST" action="menu.php">
				<div class="input-group col-md-12">
					<input type="text" class="form-control" placeholder="Search here..." name="keyword" required="required" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
					<span class="input-group-btn">
						<button class="btn btn-primary" name="search" style="position:sticky;"><span class="glyphicon glyphicon-search"></span></button>
					</span>
				</div>
			</form>
			
			<?php if(ISSET($_POST['search'])){
		$keyword = $_POST['keyword'];
		
?>


<div>
	<h2>Result</h2>
	<hr style="border-top:2px dotted #ccc;"/>
	<?php
	
 $host = 'localhost';
 $username = 'root';
 $password = '';
 $database = 'itemdb';
 $con = mysqli_connect($host, $username, $password, $database);

		$query = mysqli_query($con, "SELECT * FROM itemtb WHERE item_name LIKE '%$keyword%' ORDER BY item_name") or die(mysqli_error($con));

	
			while($fetch = mysqli_fetch_array($query)){

	?>
    <div style="word-wrap:break-word;">
    <section class="item">
        <div class="items">
            <div class = "search">
    <?php
     component($fetch['item_name'], $fetch['item_price'], $fetch['item_img'], $fetch['id']);
    ?></div></div> </section> 
    </div>
	
	
 
                             
	<hr style="border-bottom:1px solid #ccc;"/>
	<?php
		}
	?>
</div>
<?php
	}?>
		</div>
	</div>


	

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
                
    </body>
            
            </html>
