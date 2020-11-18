<?php 
include('conn.php');
session_start();
    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password =$_POST['password'];

        $query = "SELECT * FROM users WHERE email = '$email' AND password ='".md5($password)."'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_num_rows($result);
        if($row == 1){  
            echo "<h1><center> Login successful </center></h1>";
            $rs=mysqli_fetch_assoc($result);
           
            $id= $rs['id'];
            $_SESSION['id'] = $id;
            
            header('location: dashboard.php');  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }       

    }
?>
<h1>Login</h1>
<div>
<form method="POST" action="">
    <label>Email Id</label>
    <input type="text" required name="email" id="email"></br>  
    <label>Password</label>
    <input type="password" required name="password" id="password"> </br>  
    <button type="submit" name="login">Log In</button>
   
    
</form>
<p>Not registered yet? <a href='register.php'>Register Here</a></p>
</div>