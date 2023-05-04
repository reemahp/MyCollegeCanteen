<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}
$host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'itemdb';

    $connection = mysqli_connect($host, $username, $password, $database);
    $conn = mysqli_connect($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$user_id = $_SESSION['user_id'];
$queryy = "SELECT * FROM cart WHERE user_id = $user_id";

$resultt = mysqli_query($connection, $queryy);

require_once('php/CreateDb.php');
require_once('./php/component.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['pay'])){
        
        $query = "INSERT INTO payment (user_id, total) values (".$_SESSION['user_id'].",". $_POST['total'].")";
        $result = mysqli_query($conn, $query);

       $query1 = "DELETE FROM cart WHERE  user_id = ".$_SESSION['user_id']."";
        $result = mysqli_query($conn, $query1);

        
    }
    

}

function pay($itemname, $itemprice, $itemid) {
    $element = "
        <form action=\"cart.php?action=remove&id=$itemid\" method=\"post\" class=\"cart-items\">
        <span class='price'>$itemprice rs</span>
        <p class='item-name'>$itemname</p>
        </form>
    ";
    echo $element;
}




?>


<html lang="en">

<head>
<title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  
   
    <link rel="stylesheet" href="payy.css">
    <style>
      
      body {
          width: 100%;
          background-image: url("restaurant.webp");
          background-attachment: fixed;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          
      }
      </style>
  
</head>

<body>
                <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Payment</h2>
      
        </div>
        <form action="/addtocart/payment.php" method = "POST">
          <div class="products">
            <h3 class="title">Checkout</h3>
            <div class="item">
            <?php


if (mysqli_num_rows($resultt) > 0) {
  while ($row = mysqli_fetch_assoc($resultt)) {
      $item_id = $row['item_id'];
      $item_query = "SELECT * FROM itemtb WHERE id = $item_id";
      $item_result = mysqli_query($conn, $item_query);
      $item = mysqli_fetch_assoc($item_result);
      echo pay($item['item_name'], $item['item_price']*$row['quantity'] , $item['id']);   
  }
} else {
  echo "no items!";
}

?>
            </div>
            <br>
            <div class="total">Total<span class="price"> <?php echo $_POST['total']; ?>rs</span></div>
          </div>
          <div class="card-details">
            <h3 class="title">Credit Card Details</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Card Holder</label>
                <input id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-5">
                <label for="">Expiration Date</label>
                <div class="input-group expiration-date">
                  <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                  <span class="date-separator">/</span>
                  <input type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">Card Number</label>
                <input id="card-number" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-4">
                <label for="cvc">CVC</label>
                <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-12">
                
                <input type="submit" class="btn btn-primary btn-block" name="proceed" value="proceed" />
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>     
     
 

</body>

</html>

  
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
