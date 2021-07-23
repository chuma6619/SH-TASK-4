
<?php
// TASK WEEK 4.

// start a session.
session_start();

//include database connection.
include("db_connect.php");

// login page validation:
if(isset($_POST["login"])){
    // getting the values of email and password.
    $email2 = mysqli_real_escape_string($conn, $_POST["email"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password"]);

    if($password2 !="" && $email2 !=""){
        // sql select query.
        $sql="SELECT email, password, username FROM marketPlace_table ORDER BY id";
        $result = mysqli_query($conn,$sql);
        
        // fetch the resulting row as an array.
        $inputs = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        // looping through the array.
        foreach($inputs as $input){
            $email = $input['email'];
            $password = $input['password'];
            $username = $input['username'];

        // checking if the email in the database is equal to the login email.
            if( $email == $email2 && $password == $password2){
                // saving it as session.
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                $_SESSION["username"] = $username;
                header("location: dashboard.php");
            }else{
                echo "<script>
                alert('INVALID EMAIL OR PASSWORD.')
                </script>";
            }
        }

    }
}

?>


<!DOCTYPE html>
<html>
  <head>
     <title> Login Page</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width = device-width initial-scale = 1.0">
     <!-- css code--->
     <style type="text/css">

       *{
           text-decoration:none;
       }

       h1{
           text-align: center;
           color:purple;
       }

    #content{
        padding: 2rem;
        border-radius: 2rem;
        background-color: white;
        color:purple;
        max-width:50%;
        margin-left:18rem;
        box-shadow: 0.5rem 0.5rem 1rem grey;
        text-align: center;
       }

       #login{
           padding: 0.6rem;
           text-align: center;
           background-color: purple;
           border-radius:0.5rem;
           color:white;
       }

     input{
        margin-bottom: 1rem;
       }

     label{
        margin-right:5rem;
        color:purple;
     }

     #email-label{
        margin-right:7rem;
        color:purple;
     }

     a{
        color:white;
        background-color: purple;
        padding:0.2rem;
        border-radius:0.5rem
     }

/* Responsiveness to all screen sizes */

     @media (max-width: 1000px) {
         h1{
             margin-left:7rem;
         }

         #content{
             margin-left:15rem;
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

         h1{
             margin-left:0rem;
         }

         #content{
            margin-left:7rem;
         }

         h1,#content{
            font-size:1rem;
        }


     @media (max-width:535px) {

        #content{
            margin-left:5rem;
        }

        a{
       display:block;
       max-width:50%;
       margin-left:4rem;
     }
     }
     </style>
  </head>
  <body>
     <h1> LOGIN PAGE</h1> 
     <br>
     <div id="content">
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <label id="email-label" for="email">Email: </label><br>
     <input type="email" name="email" required> <br><br>
     <label id="label" for="password">Password: </label><br>
     <input type="password" name="password" required> <br><br>
     <input id="login" type="submit" name="login" value = "Login"> 
     <p>Don't have an account? <a href="index.php" >click to register</a><p><br>
     <p>Forgot Password? <a href="reset.php" >click to reset</a></p>
     </form>
     </div>
  </body>
</html>