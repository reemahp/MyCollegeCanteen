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
require_once('php/CreateDb.php');
require_once('./php/component.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['pay'])){
        
        $query = "INSERT INTO payment (user_id, total) values (".$_SESSION['user_id'].",". $_POST['total'].")";
        $result = mysqli_query($conn, $query);

        
    }
}

?>


<html lang="en">

<head>
    

    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="pay.css">
    <title>
        My College Canteen
    </title>
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
    </style>
</head>

<body>

    <br>
   
      <div class="price">
        <br>
          <h1>Awesome, that's <?php echo $_POST['total']; ?>rs !</h1>
      </div>

      <div class="card mt-50 mb-50">
            <div class="nav">
                <ul class="mx-auto">
                    <li><a href="#">Account</a></li>
                    
                </ul>
            </div>
            <form>
                <span id="card-header">Saved cards:</span>
                <div class="row row-1">
                    <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/></div>
                    <div class="col-7">
                        <input type="text" placeholder="**** **** **** 3193">
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        <a href="#">Remove card</a>
                    </div>
                </div>
                <div class="row row-1">
                    <div class="col-2"><img  class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png"/></div>
                    <div class="col-7">
                        <input type="text" placeholder="**** **** **** 4296">
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        <a href="#">Remove card</a>
                    </div>
                </div>
                <span id="card-header">Add new card:</span>
                <div class="row-1">
                    <div class="row row-2">
                        <span id="card-inner">Card holder name</span>
                    </div>
                    <div class="row row-2">
                        <input type="text" placeholder="Bojan Viner">
                    </div>
                </div>
                <div class="row three">
                    <div class="col-7">
                        <div class="row-1">
                            <div class="row row-2">
                                <span id="card-inner">Card number</span>
                            </div>
                            <div class="row row-2">
                                <input type="text" placeholder="5134-5264-4">
                            </div>
                        </div>
                    </div>
                    <div class="col-1 row-2">
                        <input type="text" placeholder="Exp. date">
                    </div>
                    
                    <div class="row-2">
                        <input type="text" placeholder="CVV">
                    </div>
                </div>
                <br>
               <button ><b>Add card</b></button>
            </form>
        </div>
     
 
<br>
</body>

</html>