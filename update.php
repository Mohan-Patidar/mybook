<?php 
include('header.php');
    $result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
?>
<h1>update</h1>
<div>
<form method="POST" action="updatedb.php">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
    <label>Username</label>
    <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
    <input required type="text" name="name" id="name" value="<?php echo $row['name']?>"></br>  
    <label>Email Id</label>
    <input required type="text" name="email" id="email" value="<?php echo $row['email']?>"></br>  
    
    <button type="submit" name="update">Update</button></br>
    
</form>
</div>