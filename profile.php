<?php 
// TASK WEEK 4.
// start a session.
session_start();

//include database connection.
include("db_connect.php");

// get the email of the user.
$email = $_SESSION["email"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];

// sql select query.
$sql = "SELECT * FROM products_table WHERE email = '$_SESSION[email]'";
$result = mysqli_query($conn, $sql);

?>





<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width = device-width initial-scale = 1.0">
        <!-- css code --->
        <style type="text/css">
        *{
            text-decoration: none;
        }

        #back{
            padding:0.5rem;
            border: 1rem;
            background-color:purple;
            color: white;
            border-radius:0.5rem;
        }

        
        #back-container{
            padding: 2rem
        }

        #detail-container{
            color: purple;
            padding:2rem;
            border-radius: 0.5rem;
            box-shadow: 0.5rem 0.5rem 1rem grey;
            max-width: 40%;
            margin-left:23rem;
            margin-bottom:5rem;
        }

        #h3{
            color:purple;
            text-align: center;
            padding:1rem;
        }
        #table-container{
            margin-left:32rem;
        }

        #table{
            border-collapse: collapse;
            text-align: center;
            color:purple;
            border-bottom:0.1rem solid grey;
        }
        
        th,td{
            padding:1rem;
            border:1rem;

        }

        #edit{
            padding:0.5rem;
            color:purple;
            box-shadow: 0.1rem 0.1rem 0.5rem grey;
            border: 0.5rem;
            border-radius:0.5rem;
        }

        
        #delete{
            padding:0.5rem;
            color:red;
            box-shadow: 0.1rem 0.1rem 0.5rem grey;
            margin-left: 0.5rem;
            border-radius:0.5rem;
        }

     /* Responsiveness to all screen sizes */

        @media (max-width: 1200px) {
            #table-container{
            margin-left:27rem;
        }
        }

        @media (max-width: 1000px) {
            #table-container{
            margin-left:20rem;
        }
        #detail-container{
            margin-left:18rem;
        }
        }

        @media (max-width: 800px) {
            #table-container{
            margin-left:13rem;
        }

        #detail-container{
            margin-left:12rem;
        }
        }

        @media (max-width: 650px) {
            #table-container{
            margin-left:10rem;
        }

        #detail-container{
            margin-left:9rem;
        }
        }

        @media (max-width: 580px) {
        #table-container{
            margin-left:1rem;
        }

        #detail-container{
            margin-left:1rem;
        }

        #h3{
            margin-right:15rem;
        }
        }

        </style>
    </head>
    <body>
        <div id="back-container"><a id="back" href="dashboard.php">Back</a></div>
        <div id="detail-container">
            <h4>Your Details:</h4>
            <p> <?php  echo "Name: ".$username; ?></p>
            <p> <?php  echo "Email: ".$email; ?></p>
            <p> <?php  echo "Password: ".$password; ?></p><br>
        </div>

        <div>
            <h3 id="h3">Products Added:</h4>
        </div>
        <!-- create a while loop and output the result as an array in a table. --->
        <?php while($row = mysqli_fetch_array($result)):?>
        <div id="table-container">
            <table id="table">
                <thead>
                
                <tr> 
                    <th>Item</th>
                    <th>Price($)</th>
                    <th>Image</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                
                <tbody>
                <tr>
                    <td><?php  echo $row['item']?></td>
                    <td><?php  echo $row['price']?></td>
                    <td><img src="<?php  echo $row['image']?>" width="50" height="50"></td>
                    <td>
                        <!--this code "?edit=<?php echo $row['id']?>", shows the id of this particular row as a get method-->
                        <a href="edit.php?edit=<?php echo $row['id']?>" id="edit">Edit</a>
                        <a href="delete.php?delete=<?php echo $row['id']?>" id="delete">Delete</a>
                    </td>
                </tr><br>
                </tbody>
            </table>
        </div>
    <?php endwhile?>
    </body>
</html>