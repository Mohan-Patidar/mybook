<?php
include('conn.php');
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE users set  name='" . $_POST['name'] . "', email='" . $_POST['email'] . "'  WHERE id='" . $_POST['id'] . "'");
header('location: index.php');
$message = "Record Modified Successfully";
}
?>