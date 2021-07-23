<?php 
// TASK WEEK 4.

// start a session.
session_start();

// include database connection.
include("db_connect.php");

// get the email of the user.
$email = $_SESSION["email"];
$username = $_SESSION["username"];

// sql select code.
$sql = "SELECT * FROM products_table";
$result = mysqli_query($conn, $sql);

?>




<!DOCTYPE html>
<html>
   <head>
      <title>My Dashboard</title>
      <meta charset="utf-8">
     <meta name="viewport" content="width = device-width initial-scale = 1.0">
     <!-- css code --->
      <style type="text/css">
      *{
         list-style-type: none;
         text-decoration: none;
         box-sizing: border-box;
         outline:none ;
         font-family: "vollkorn", serif;
         color:purple;
      }

      html{
         font-size: 80%;
      }

      #nav{
         display: flex;
         flex-flow: row wrap;
         justify-content: space-around;
      }

      a{
         padding:1rem;
         background-color:purple;
         color:white;
         border-radius:0.5rem;
      }

      #welcome_msg{
         padding: 2rem;
         color:purple;
         margin:1rem;
         font-size:2rem;
      }

      p,h2{
         color:purple;
         padding: 0.5rem;
         text-align: center;
      }

      #image{
         text-align: center;
      }
      img{
         width:25rem;
         max-height: 60%;
         margin: 1rem;
         border-radius: 5%;
         padding: 1rem;
         box-shadow: 1rem 1rem 3rem grey;
      }

      #buy{
         padding:1rem;
         margin:1rem;
      }
      
      </style>
   </head>
   <body>
   <nav>
   <div id= "nav">
      <a href="dashboard.php">Home</a>
      <a href="profile.php">My Profile</a>
      <a href="addProduct.php">Add Product</a>
   
      <a href="login.php">Logout</a>
   </div>
   </nav>
   <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
   <div id="welcome_msg">
   <h4><?php  echo "Hi ".$username. ", Welcome to the Market Place..."; ?></h4>
   </div>
   <div id="header">
   <h2>PRODUCTS ON SALE </h2>
   <div id="image">
   <img src="shirts.jpeg" alt="shirts">
   <p>stock shirts at the price of <strong>$10 </strong>.</p>
   <div id="buy"><a href="">BUY</a></div>

   <img src="trouser.jpeg" alt="trousers">
   <p>stock jeans and canvas shoe at the price of <strong>$15</strong>.</p>
   <div id="buy"><a href="">BUY</a></div>

   <img src="generator.jpeg" alt="generator">
   <p>Generators at affordable prices.</p>
   <div id="buy"><a href="">BUY</a></div>

   <img src="television.jpeg" alt="television">
   <p>Smart flatscreen television at the price of <strong>$150</strong>.</p>
   <div id="buy"><a href="">BUY</a></div>

   <?php 
   // a while loop that gets the result(images in the database) as an array.
    while($row = mysqli_fetch_array($result)):?>
    <img src="<?php  echo $row['image']?>"><br>
    <?php echo $row["item"]." at the price of "  ."$".$row['price'];?><br>
    <div id="buy"><a href="">BUY</a></div>
    <?php endwhile?>
   </div>
   </div>

   </form>
   </body>

</html>