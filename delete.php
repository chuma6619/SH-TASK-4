<?php 

//include database connection.
include("db_connect.php");

// get the id the delete GET METHOD.
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    // delete query.
    $sql = "DELETE FROM products_table WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        header("location: profile.php");
    }else{
        echo "Query error".mysqli_error($conn);
    }
}
?>