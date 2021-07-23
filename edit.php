<?php 
// TASK WEEK 4.

// start a session.
session_start();

//include database connection.
include("db_connect.php");

// setting the variables to empty string
 $item = "";
 $price = "";
 $image = "";
 $item1 = "";
 $image1 ="";
  
 // get the id value of the GET METHOD.
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $_SESSION['edit'] = $id;

    // sql select query.
    $sql = "SELECT * FROM  products_table WHERE id =$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $item1 = $row['item'];
    $price1 = $row['price'];
    $image1 = $row['image'];
}

// get the values of the POST METHOD.
if(isset($_POST['upload'])){
    $item = mysqli_real_escape_string($conn, $_POST['item']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $id = $_SESSION['edit'] ;

    // get the image value and save it in the image directory.
    if(isset($_FILES['image']['name'])){
        move_uploaded_file($_FILES['image']['tmp_name'],"image/".$_FILES['image']['name']);
        $image = "image/".$_FILES['image']['name'];
    }
    
    // update query.
    $update = "UPDATE products_table SET item='$item', price='$price', image='$image' WHERE id='$id'";
    if(mysqli_query($conn, $update)){
    header("location: profile.php");
    }else{
          echo "query error: ".mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Edit Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width = device-width initial-scale = 1.0">
        <!-- css code --->
        <style type="text/css">
        *{
            text-decoration:none;
        }
        
        h1{
            color:purple;
            text-align:center;
            padding:2rem;
            margin:0.5rem;
        }
        #content{
            background-color: white;
            color: purple;
            box-shadow: 0.5rem 0.5rem 1rem grey;
            max-width:50%;
            border-radius:0.5rem;
            padding:2rem;
            text-align:center;
            margin-left:18rem;
        }

        label{
            margin-right:7rem;
        }

        #image{
            margin-left:4rem;
        }

        #upload,#back{ 
            color:white;
            background-color:purple;
            padding:0.5rem;
            border-radius:0.5rem;
            margin:0.5rem;
        }

        
     /* Responsiveness to all screen sizes */

     @media (max-width: 1000px) {
         h1{
             margin-left:2rem;
         }
         #content{
            margin-left:13rem
         }
     }

     @media (max-width: 800px) {

         h1{
             margin-left:0rem;
         }

         #content{
            margin-left:9rem
         }
     }

     @media (max-width: 650px) {

         #content{
            margin-left:9rem
         }

         h1{
            font-size:1.5rem;
        }

        #image{
       margin-left:2.5rem;
     }

     @media (max-width: 580px) {
        #content{
            margin-left:6rem
         }

         #image{
       margin-left:1rem;
     }
    }
        </style>
    </head>
    <body>
        <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <divs>
            <h1>EDIT PRODUCTS</h1>
        </div>
        <div id="content">
            <input type="hidden" name="id" value="<php echo $id;?>">
            <label id="item"for="item">Item:</label><br>
            <input type="text" name="item" placeholder="Enter an item for sale" value="<?php  echo $item1; ?>" required ><br><br>
            <label id="item" for="price">Price:</label><br>
            <input type="number" name="price" placeholder="Enter the price" value="<?php  echo $price1; ?>" required ><br><br>
            <label id="image" for="image">Select the image of the item:</label><br>
            <input type="file" name="image" value="<?php  echo $image1; ?>" required ><br><br>
            <input type="submit" name="upload" value="Upload" id="upload">
            <span><a href="profile.php" id="back">Back</a></span>
        </div>

        </form>
    </body>
</html>