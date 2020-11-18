<?php
session_start();
include "conn.php";

if (!isset($_SESSION['id'])) {
    header("location:index.php");

    $query= "SELECT * FROM users WHERE id='" . $_SESSION['id'] . "'";
    $result= mysqli_query($conn,$query);
}

?>