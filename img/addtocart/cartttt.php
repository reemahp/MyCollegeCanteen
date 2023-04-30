<?php

session_start();
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}
require_once ("php/CreateDb.php");
require_once ("php/component.php");

$db = new CreateDb("itemdb", "itemtb");
$user = $_SESSION['user_id'];

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["item_id"] == $_GET['id']){
           
            $_SESSION['cart'][$count] = $item_array;
            $servername = "localhost";
            $username = "root";
            $password = "";

            // Create connection
            $conn = new mysqli($servername, $username, $password, "itemdb");

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $query = "DELETE FROM  cart where item_id = $value["item_id"]; ";

            mysqli_query($conn , $query);

              unset($_SESSION['cart'][$key]);
              echo "<div class=\"alert alert-success\">
              <strong>Success!</strong> Your item is successfully removed.
            </div>";
          }
      }
  }
}

if (isset($_POST['plus'])){
    if ($_GET['action'] == 'plus'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["item_id"] == $_GET['id']){
               
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
            background-image: url("./img/background.png");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            backdrop-filter:blur(16px);
        }
        

.price-details h6{
  padding: 3% 2%;
}

.cartstyle{
   background-color:white;
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
        <li style="float:right"><a href="cart.php" class="active">cart
       
        </a></li>
        
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
                    if (isset($_SESSION['cart'])){
                        $item_id = array_column($_SESSION['cart'], 'item_id');


                        
 $host = 'localhost';
 $username = 'root';
 $password = '';
 $database = 'itemdb';
 $con = mysqli_connect($host, $username, $password, $database);

		$query = mysqli_query($con, "SELECT * FROM cart WHERE user_id = '$user'") or die(mysqli_error($con));

	
			while($fetch = mysqli_fetch_array($query)){
                

                        
                       
                                    cartElement($fetch['item_img'], $fetch['item_name'],$fetch['item_price'], $fetch['id']);
                                    $total = $total + (int)$fetch['item_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
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
                               
                                echo "<h6>Price </h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        
                        <hr>
                        <h6 style="color:white">Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>Rs<?php echo $total; ?></h6>
                        <hr>
                        <h6 style="color:white">Rs<?php
                            echo $total;
                            ?></h6>
                            <br>
                          <button style="padding: 5px 30px; border: none;cursor: pointer;  width: 100%; "><a href="payment.html">Payment</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>