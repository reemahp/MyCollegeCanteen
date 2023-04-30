<?php
session_start();
if(!ISSET($_SESSION['user_id'])){
    header('location:login.php');
}
// Check if form is submitted
if(isset($_POST['submit'])) {
    $itemName = $_POST['item_name'];
    $itemPrice = $_POST['item_price'];
   
    // Process image file upload
    $imageDir = './img/'; // directory to store uploaded images
    $imageName = $_FILES['item_image']['name'];
    $imageTmpName = $_FILES['item_image']['tmp_name'];
    $imagePath = $imageDir . $imageName;
    move_uploaded_file($imageTmpName, $imagePath);
   
    // Connect to MySQL database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'itemdb';
    $conn = mysqli_connect($host, $username, $password, $database);
   if((!empty($itemName) && !empty($itemPrice) && !empty($imagePath) ))
   {

    // Insert item information into menu table
    $sql = "INSERT INTO itemtb (item_name, item_price, item_img) VALUES ('$itemName', '$itemPrice', '$imagePath')";
    mysqli_query($conn, $sql);
    header("Location:adm.php");
    die;
   }
}
else if(isset($_POST['cancel'])){
    header("Location:adm.php");
    die;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Menu Item Form</title>
  
 <style> body {
    width: 100%;
    background-color : black;
 }

 .image-upload {
  text-align: center;
}

.image-upload label {
  display: inline-block;
  cursor: pointer;
  border: 2px solid #ccc;
  border-radius: 5px;
  padding: 5px;
  margin-bottom: 20px;
}

.image-upload label img {
  width: 200px;
  height: 200px;
  object-fit: cover;
  border-radius: 5px;
}

#file-input {
  display: none;
}
h3 {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}
 .footer{
        width: 80%;
        height: 100px;
        margin-left: auto;
        margin-right: auto;
        background-color: white;
        position: relative;
        
    }

   

  
    .btn{
        position: relative;
        top: 20px;
    }
    .cardcontainer{
       
        height: 500px;
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        transition: 0.3s;
        display:flex;
  justify-content: space-evenly;
  flex-wrap:wrap;
    }
    .cardcontainer:hover{
        box-shadow: 0 0 60px gray;
    }
 </style>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
  <br><br>

  <div class="cardcontainer" style="width: 500px;">
  <div class="card-header text-center"><h3>Menu Item Form</h3></div>
  <form method="post" action="add_item.php" enctype="multipart/form-data" >

  <div class="card-body">
   
  <input id="fileinput" type="file" name="item_image">
<br>
<label for="name">Food item name:</label><br>

<input type="text" id="name" name="item_name"><br>
    <label for="price">Price:</label><br>
<input type="number" id="price" name="item_price"><br>

<div class="footer">
    <br><br>
    <input class="waves-effect waves-light btn" type="submit" value="Submit" name="submit">
      <input class="waves-effect waves-light btn" type="submit" value="Cancel" name="cancel">
    </div>
</form>
  </div>
</div>



</body>
</html>
