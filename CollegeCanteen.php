<?php

session_start();
if(!ISSET($_SESSION['user_id'])){
    header('location:login.php');
}
include("login/connection.php");
include("login/functions.php");
require_once ("php/CreateDb.php");
require_once ("php/component.php");
$user_id = $_SESSION['user_id'];

if(isset($_POST['submit'])) {
    $review = $_POST['review'];
    
    // Connect to MySQL database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'itemdb';
    $conn = mysqli_connect($host, $username, $password, $database);
   if((!empty($review) && !empty($user_id)  ))
   {

    // Insert item information into menu table
    $sql = "INSERT INTO feedback (userid , review) VALUES ('$user_id', '$review')";
    mysqli_query($conn, $sql);
   
    
   }
}



?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>
        My College Canteen
    </title>
    <style>
        body {
            width: 100%;
            background-image: url("restaurant.webp");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        .container {
            backdrop-filter:blur(16px);
            display: flex;
            color : white;
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
            <li style="float:right"><a href="menu.php">Menu</a></li>
            <li style="float:right"><a class="active" href="CollegeCanteen.php">Home</a></li>

        </ul>
    </div>
    
    <section class="section-intro">
        <header>
            <h1>Welcome To Somaiya Canteen</h1>
        </header>


    </section>

    <section class="about-section">
        <article>
            <h3>
            <br>
            hello 

                Grab ur order!!!!
            </h3>


            <p> We want you to experience a wholesome Food without long line waiting!
                Go back to those good old days where you can place your order in a minute n collect it !

            </p>

        </article>
    </section>
    <br><br>
    <div class="row">
        <div class="column">
            <img src="./img/website (1).jpg" alt="food" style="width:100%">
        </div>
        <div class="column">
            <img src="./img/image (2).png" alt="Food" style="width:100%">
        </div>
        <div class="column">
            <img src="./img/image (3).png" alt="Food" style="width:100%">
        </div>
    </div>


    </a>
    </div>
<br><br>
    <div class="container">
        <div class="row-flex">
        <div class="flex-column-form">
                <h4>
                    Hello ! Enter your reviews here .
                </h4>
                <form method="POST" action="CollegeCanteen.php" enctype="multipart/form-data">
                
                <input type="text" id="name" name="review"><br>
                       <br><br>
                       
    <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                    
                </form>
            </div>
            <div class="opening-time">
                <h3>
                    Opening times
                </h3>

                <p>
                    <span>Monday—Friday: 08:00 — 06:00</span>
                    <span>Saturday: 09:00 — 3.00</span>

                </p>

            </div>
            <div class="contact-address">
                <h3>
                    Contact
                </h3>

                <p>
                    <span>9998752696</span>
                    <span>Aryabhatta building,somaiya canteen!!</span>
                    <span>kJ somaiya college of Engineering , vidyavihar east-400077.</span>

                </p>

            </div>
        </div>
    </div>
    <br><br>

</body>

</html>