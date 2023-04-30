<?php  

session_start();
if(!ISSET($_SESSION['user_id'])){
    header('location:login.php');
}
require_once ('php/CreateDb.php');
$database = new CreateDb("itemdb", "itemtb");
function component($itemname, $itemprice, $itemimg, $itemid){
  $element = "
              <form action=\"ad_deletemenu.php\" method=\"post\">
               <div>
                          <img src=\"$itemimg\" class=\"img-rounded\" alt=\"Image1\">
                          <h3>$itemname</h3>
                          <h3>$itemprice rs</h3>
                          <button type=\"submit\" name=\"Delete\">Delete this item </button>
                           <input type='hidden' name='item_id' value='$itemid'>
                         
              </form>
         </div>
  ";
  echo $element;
}

if (isset($_POST['Delete'])){
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'itemdb';
  $conn = mysqli_connect($host, $username, $password, $database);

  $itemid = $_POST['item_id'];

  $sql = "DELETE FROM itemtb WHERE id = $itemid;";
  mysqli_query($conn, $sql);

  header("Location:adm.php");
  die;
    }
    else if(isset($_POST['cancel'])){
      header("Location:adm.php");
      die;
  }

?>

<html>

<head>
    <link rel="stylesheet" href="mystyle.css">
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
    background-color : black;
 }

        input[value="Cancel"] {
    background-color: #f80f0f;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
  }
  
  input[value="Cancel"]:hover {
    background-color:  #f80f0f;
  }
        </style>
        </head>
        
        <body>
        <br>
        <form method="post">
        <input type="submit" value="Cancel" name="cancel">
</form>
<section class="item">
        <div class="items">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['item_name'], $row['item_price'], $row['item_img'], $row['id']);
                }
            ?>
            
        </div> </section>    
        </body>
            
            </html>
          
          
          
          
          


