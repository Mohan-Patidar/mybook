
<?php
  if(!isset($name)){
    $name = "";
  }
  include "conn.php";
    if (isset($_POST['submit']) ){
        $name = filter_input(INPUT_POST,'name');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');
        
        if(empty($name)){
            $name_error = "Please enter name";
        }elseif(!preg_match("/^[a-zA-Z ]*$/",$name)){
            $name_error = "Only letters and white space allowed";
        }
      
        if(empty($email)){
            $email_error = "Please enter email id";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_error = "Your email is invalid";
        }
        if(empty($password)){
            $password_error = "Please enter password";
        }
 
        $sql_u = "SELECT * FROM users WHERE name='$name'";
        $sql_e = "SELECT * FROM users WHERE email='$email'";
        $res_u = mysqli_query($conn, $sql_u);
        $res_e = mysqli_query($conn, $sql_e);
  
        if (mysqli_num_rows($res_u) > 0) {
          $name_error = "Sorry... username already taken"; 	
        }else if(mysqli_num_rows($res_e) > 0){
          $email_error = "Sorry... email already taken"; 	
        }else{
             $query = "INSERT INTO users (name, email,password) 
                      VALUES ('$name', '$email','".md5($password)."')";
             $results = mysqli_query($conn, $query);
           

             if($results){
              echo "Registeration success <br/><a href='index.php'> Login</a>.";
              // header("Location: login.php");
               exit();
             }
            
        }
 
    }
?>  


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    
</head>
<body>
<div class="container">
    <div class="login">
    <form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <h1>Register</h1>
        <?php if (isset($err)){?>
        <p class="form-text text-muted"><?php echo $err?><p>
        <?php }?>
        <div class="form-group">
        <label > Name</label>
        <input class="form-control"  type="text"  name="name" placeholder="Username"   />
        <?php if (isset($name_error)){?>
        <p class="form-text text-muted"><?php echo $name_error?><p>
        <?php }?>
        </div>
        
        <div class="form-group">
        <label >  Email Id</label>
        <input class="form-control" type="email"  name="email" placeholder="Email Adress">
        <?php if (isset($email_error)){?>
            <p class="form-text text-muted"><?php echo $email_error?><p>
        <?php }?>
        </div>
       
        <div class="form-group">
        <label >  Password</label>
        <input class="form-control" type="password"  name="password" placeholder="Password">
        </div>
        
        <div class="form-group text-center" >
        <input   class="btn btn-primary btn-lg " type="submit" name="submit" value="Register" >
        </div>
        </div>
        <p class="text-center">Already a user ?<a href="index.php">login </a></p>
    </div>

        
       
    </form>


<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>

</body>
</html>

