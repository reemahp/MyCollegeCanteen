<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}

require_once('php/CreateDb.php');
require_once('./php/component.php');


$host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'itemdb';

    $connection = mysqli_connect($host, $username, $password, $database);
    $conn = mysqli_connect($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


// Create instance of Createdb class
$database1 = new CreateDb("itemdb", "itemtb");
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM cart WHERE user_id = $user_id";

$result = mysqli_query($connection, $query);

if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        while ($row = mysqli_fetch_assoc($result)){
            if($row["item_id"] == $_GET['id']){
                
                $query1 = "DELETE FROM cart WHERE item_id = ".$row["item_id"]." and user_id = ".$_SESSION['user_id']."";

            mysqli_query($conn , $query1);
            echo "<script>window.location = 'cart.php'</script>";
            echo "<div class=\"alert alert-success\">
            <strong>Success!</strong> Your item is successfully removed.
          </div>";
            }
        }
    }
}

if (isset($_POST['plus'])){
    if ($_GET['action'] == 'remove'){
        while ($row = mysqli_fetch_assoc($result)){
            if($row["item_id"] == $_GET['id']){
                $query1 = "UPDATE cart SET quantity = quantity +1 WHERE item_id = ".$row["item_id"]." and user_id = ".$_SESSION['user_id'].""; 
            mysqli_query($conn , $query1);
            echo "<script>window.location = 'cart.php'</script>";
            echo "<div class=\"alert alert-success\">
            <strong>Success!</strong> Your item quantity is increased.
          </div>";
            }
        }
    }
}

if (isset($_POST['minus'])){
    if ($_GET['action'] == 'remove'){
        while ($row = mysqli_fetch_assoc($result)){
            if($row["item_id"] == $_GET['id']){
                $query1 = "UPDATE cart SET quantity = quantity -1 WHERE item_id = ".$row["item_id"]." and user_id = ".$_SESSION['user_id'].""; 
            mysqli_query($conn , $query1);
            $update = "SELECT * FROM cart WHERE item_id = ".$row["item_id"]." and user_id = ".$_SESSION['user_id'].""; 
            $result_update = mysqli_query($conn , $update);
            $row_update = mysqli_fetch_assoc($result_update);

            if ($row_update['quantity'] == 0)
            {
                $query1 = "DELETE FROM cart WHERE item_id = ".$row["item_id"]." and user_id = ".$_SESSION['user_id']."";

                mysqli_query($conn , $query1);
                echo "<script>window.location = 'cart.php'</script>";
            }
            echo "<script>window.location = 'cart.php'</script>";
            

            }
        }
    }
}



 
    

?>


<!doctype html>
<html lang="en">
<head>
    
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   

    <link rel="stylesheet" href="mystyle.css">
    <style>
      
        body {
            width: 100%;
            background-image: url("restaurant.webp");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        

.price-details h6{
  padding: 3% 2%;
}

.cartstyle{
   background-color:white;
}



    </style>

<script>
function increaseValue() {
  var input = document.getElementById('quantity');
  var currentValue = parseInt(input.value);
  input.value = currentValue + 1;
}

function decreaseValue() {
  var input = document.getElementById('quantity');
  var currentValue = parseInt(input.value);
  if (currentValue > 1) {
    input.value = currentValue - 1;
  }
}
</script>
</head>
<body>

<div class="bg-div">
        <div class="logo">
        <img src="looogoo.jpeg">
        </div>
        <ul>
        <li style="float:right"><a href="logout.php">Logout</a></li>
        <li style="float:right"><a href="cart.php" class="active">cart</a></li>
        
        <li style="float:right"><a  href="menu.php">Menu</a></li>
        <li style="float:right"><a href="CollegeCanteen.php">Home</a></li>
        
        </ul>
        </div>


<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="cartstyle shopping-cart" >
                <hr>

                <?php

                $total = 0;
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      $item_id = $row['item_id'];
                      $item_query = "SELECT * FROM itemtb WHERE id = $item_id";
              
                      $item_result = mysqli_query($conn, $item_query);
                      $item = mysqli_fetch_assoc($item_result);
                     
                      echo cartElement($item['item_img'],$item['item_name'], $item['item_price']*$row['quantity'],  $item['id'] , $row['quantity']);
                      $total = $total + (int)$item['item_price'] * $row['quantity'];
                      //echo $total;
                  }
              } else {
                  echo "<p>Your cart is empty.</p>";
              }
                


                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                    

                        <?php


if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $user_id = $_SESSION['user_id'];
    $cart_query = "SELECT * FROM cart WHERE user_id = $user_id";
    $cart_result = mysqli_query($conn, $cart_query);                
    echo "<h6>Price </h6>";
    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h6>" . $item['item_name'] . " : " . $item['quantity'] . "</h6>";
            echo "<h6>Price </h6>";
        }}
    
}else{
    echo "<h6>Price (0 items)</h6>";
}

                        ?>
                        
                        <hr>
                        
                    </div>

                    <div class="col-md-6">
                    <form action="/addtocart/payment.php" method = "POST">
                        <h6>Rs<?php echo $total; ?></h6>
                        <hr>
                        <h6 style="color:white">Rs<?php
                            echo $total;
                            ?></h6>
                            <br>
                            <input name="total" value="<?php echo $total;?>" hidden>
                          <!-- <button type="submit" style="padding: 5px 30px; border: none;cursor: pointer;  width: 100%;" name = "pay">
                          <a  href="payment.php">
                              Payment</a></button> --><input class="btn btn-primary btn-block" type="submit" name="pay" value="pay"/>
                              
                        </form>
                          
                    </div>
                </div>
            </div>

        </div>
        <form action="/addtocart/ratings.php" method = "POST">
            <br><br><br>
            <input class="btn btn-primary btn-block" type="submit" name="rate" value="rate your previous order"/>
                              
        </form>
        
    </div>
</div>
</body>
</html>