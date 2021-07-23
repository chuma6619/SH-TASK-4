<?php 
// create a connection
$conn = mysqli_connect("localhost", "chuma", "chuma@1234", "marketPlace_db");

// check connection
if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}


?>