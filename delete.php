<?php
include('conn.php');
 $id = $_GET['id'];

$sql= "DELETE FROM users WHERE id=$id";

if (mysqli_query($conn, $sql)) {
   
    header('location: dashboard.php');
} 

?>
