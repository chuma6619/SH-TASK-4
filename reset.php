<?php 
// TASK WEEK 4.

// include database connection.
include("db_connect.php");

//Reset Validation
if(isset($_POST["reset"])){
    // getting the values email and newpaasword.
    $email3 = mysqli_real_escape_string($conn, $_POST["email3"]);
    $newpassword = mysqli_real_escape_string($conn, $_POST["newpassword"]);

    if($newpassword !="" && $email3 !=""){
        // sql select query.
        $sql="SELECT email  FROM marketPlace_table ORDER BY id";
        $result = mysqli_query($conn,$sql);

        // fetch the resulting row as an array.
        $inputs = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        // looping through the array.
        foreach($inputs as $input){
            $email = $input['email'];

            // checking if the inputed email is equal to the email in the database.
            if($email3 == $email ){
                // query to update the database.
                $reset = "UPDATE marketPlace_table SET password='$newpassword' WHERE email='$email3'";

                // check the query $reset.
                if(mysqli_query($conn, $reset)){
                    header("location: login.php");
                }else{
                      echo "query error: ".mysqli_error($conn);
                }

            }else{
                echo "<script>
                alert('INVALID EMAIL!!!, Use Your Registered Email.')
                </script>";
            }
        }
    }
}

?>



<!DOCTYPE html>
<html>
  <head>
     <title> Reset Page</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width = device-width initial-scale = 1.0">
     <!-- css code--->
     <style type="text/css">
       
       h1{
           text-align: center;
           color: purple;
       }

       #content{
        padding: 2rem;
        border-radius: 2rem;
        background-color: white;
        color:purple;
        max-width:50%;
        margin-left:20rem;
        box-shadow: 0.5rem 0.5rem 1rem grey;
        text-align:center;
       }

       #reset{
           padding: 0.6rem;
           text-align: center;
           color:white;
           background-color: purple;
           border-radius:0.5rem
       }

     input{
        margin-bottom: 1rem;
       }
     label{
        color:purple;
        margin-right:7rem;
     }
     #passlabel{
        margin-left:4rem;
     }

     /* Responsiveness to all screen sizes */

     @media (max-width: 1000px) {
         h1{
             margin-left:3rem;
         }
         #content{
             margin-left:13rem;
         }
     }

     @media (max-width: 800px) {
         h1{
             margin-left:1rem;
         }

         #content{
             margin-left:10rem;
         }
     }

     @media (max-width: 650px) {


         #content{
            margin-left:7rem;
         }

         h1{
            font-size:1.5rem;
        }

     }

     @media (max-width: 540px) {
     #passlabel{
         margin-left:3.5rem;
     }
     }


     </style>
  </head>
  <body>
     <h1>RESET PAGE</h1> 
     <br>
     <div id="content">
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <label id="label" for="email">Email: </label><br>
     <input type="email" name="email3" required> <br><br>
     <label id="passlabel" for="password">New Password: </label><br>
     <input  type="password" name="newpassword" required> <br><br>
     <input id="reset" type="submit" name="reset" value = "Reset"> 
     </form>
     </div>
  </body>
</html>