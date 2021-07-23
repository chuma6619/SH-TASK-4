<?php 
// TASK WEEK 4.

// start a session.
session_start();

//include database connection.
include("db_connect.php");

// get details as a session .
$email = $_SESSION["email"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];

// get and store the data in variables.
if(isset($_POST["update"])){
  $item = $_POST["item"];
  $price = $_POST["price"];
  $_SESSION["item"] =  $item ;
  $_SESSION["price"] = $price;

  // image uploading
  if(isset($_FILES['image']['name'])){
    move_uploaded_file($_FILES['image']['tmp_name'],"image/".$_FILES['image']['name']);
    $image = "image/".$_FILES['image']['name'];
    $_SESSION["image"] = $image ;
  }

  // insert query
  $sql = "INSERT INTO products_table(username, email, password, item, price, image) VALUES('$username', '$email',
  '$password', '$item', '$price', '$image')";
  if(mysqli_query($conn,$sql)){
    echo "<script>
    alert('Inserted Successfully...')
    </script>";
  }
  
}

?>



<!DOCTYPE html>
<html>
  <head>
    <title>Add Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width initial-scale = 1.0">
    <!-- css code --->
    <style type="text/css">

    h1{
      text-align: center;
      color: purple;
      padding: 2rem;
    }

    #content{
      text-align: center;
      padding: 3rem;
      background-color:white;
      color:purple;
      max-width:50%;
      margin-left:20rem;
      border-radius: 1rem;
      box-shadow: 0.5rem 0.5rem 1rem grey;
    }

    input{
      padding: 0.5rem;
      border: 0.1rem solid grey;
      margin-bottom: 0.5rem;
      color:purple;
    }

    label{
      margin-right:4rem;
    }
    a{
      text-decoration:none;
      padding:0.5rem;
      color:white;
      background-color: purple;
      border-radius: 0.5rem;
    }

    #update{
      border-radius: 0.5rem;
      margin:1rem;
      background-color: purple;
      color:white;
    }

    #item{
      margin-right:7.9rem;
    }

         /* Responsiveness to all screen sizes */

         @media (max-width: 1000px) {
         h1{
             margin-left:7rem;
         }
         #content{
             margin-left:14rem;
         }
     }

     @media (max-width: 800px) {

         h1{
             margin-left:5rem;
         }

         #content{
             margin-left:10rem;
         }
     }

     @media (max-width: 680px) {
         h1{
             margin-left:1rem;
         }

         #content{
            text-align: left;
            padding:1.5rem;
            margin-left:8rem;
         }

         h1,#content{
            font-size:1rem;
        }

        #image{
       margin-left:0rem;
     }

     @media (max-width: 550px) {
      h1{
             margin-left:0rem;
         }

      #content{
        margin-left:6.5rem;
         }

        #file{
          max-width:80%;
        }
     }

    </style>
  </head>
  <body>

  <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
   <h1>ADD PRODUCTS</h1>
   <div id="content">
   <label id="item"for="item">Item:</label><br>
   <input type="text" name="item" placeholder="Enter an item for sale" required ><br><br>
   <label id="item" for="price">Price:</label><br>
   <input type="number" name="price" placeholder="Enter the price" required ><br><br>
   <label for="image">Select the image of the item:</label><br>
   <input id="file" type="file" name="image" required ><br><br>
   <input type="submit" name="update" value="Update" id="update">
   <span><a href="dashboard.php" id="back">Back</a></span>
  </div>
  </form>
  </body>
</html>