
<?php
// TASK WEEK 4.

// include the database connection
include("db_connect.php");

if(isset($_POST["register"])){

  // getting the data:
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$email1 = mysqli_real_escape_string($conn, $_POST["email"]);
$password1 = mysqli_real_escape_string($conn, $_POST["password"]);

// Registration page validation.
  if($username !="" && $email1 !="" && $password1 !=""){
    if(strlen($password1)<4 || strlen($username)<4){
      echo "<script>
      alert('The length of password or username is less than 4 characters.')
      </script>";
      //header("location: index.php");
    }else{
      // sql insert query
      $sql = "INSERT INTO marketPlace_table(username, email, password)  VALUES('$username', '$email1', '$password1')";
      // check sql insert query.
      if(mysqli_query($conn, $sql)){
        header("location: login.php");
      }else{
        echo "Query error".mysqli_error($conn);
      }

    }
      
      
  }
  // error message:
  else{
    echo "<script>
    alert('Fill in the Required Fields, Thank You.')
    </script>";
  }

  
}

?>



<!DOCTYPE html>
<html>
  <head>
     <title>Registration Page</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width = device-width initial-scale = 1.0">
    <!-- css code --->
     <style type="text/css">
       
       *{
        text-decoration:none;
       }
       h1{
           text-align: center;
           color:purple;
       }

       #register{
           padding: 0.5rem;
           text-align: center;
           color:white;
          background-color: purple;
          border-radius:0.5rem;
       }

     input{
        margin-bottom: 1rem;
        padding: 0.5rem;
        max-width:100%;
       }

     #content{
       padding:3rem;
        margin-left:16rem;
        box-shadow: 0.5rem 0.5rem 1rem grey;
        max-width:50%;
        text-align:center;
        border-radius: 1rem;
        background-color: white;
        color:purple;
     }


     label{
       color:purple;
       margin-right: 7.2rem;
     }

     #label-pass{
      margin-right: 6rem;
     }

     #a{
        color:white;
        background-color: purple;
        padding:0.4rem;
        border-radius:0.5rem
     }

     /* Responsiveness to all screen sizes */
     
     @media (max-width: 1000px) {
         h1{
             margin-left:7rem;
         }

         #content{
           margin-left: 14rem;
         }
     }

     @media (max-width: 800px) {
         h1{
             margin-left:1rem;
         }

         #content{
           margin-left: 10rem;
         }
     }

     @media (max-width: 650px) {
      h1{
             margin-left:0rem;
         }

         #content{
           margin-left: 7rem;
         }
         h1,#content{
            font-size:1rem;
        }

        a{
       max-width:50%;
     }

     @media (max-width: 550px) {

     #content{
           margin-left: 5rem;
         }
     }
     </style>

  </head>
  <body>
     <h1> REGISTRATION PAGE</h1> 
     <br>
     <div id="content">
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
     <label id="label" for="username">Name: </label><br>
     <input type="text" name="username" placeholder="Enter your Name in Full"> <br><br>
     <label id="label" for="email">Email: </label><br>
     <input type="email" name="email" placeholder="example@gmail.com"> <br><br>
     <label id="label-pass" for="password">Password: </label><br>
     <input type="password" name="password" placeholder="enter upto 4 characters"> <br><br>
     <input id="register" type="submit" name="register" value = "Register"> 
     <p>Already Registered? <a id="a" href="login.php" >click to login</a></p><br>
     </div>
     </form>
    


  </body>
</html>