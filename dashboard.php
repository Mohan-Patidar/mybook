<?php 

include('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<p>Welcome </p>
    <!-- <a href="profile.php"> Profile </a><br> -->
    <a href="addcustomer.php"> add Customer </a><br>
    <a href="customer.php"> Customer list</a><br>
    <a class="btn btn-primary" href="logout.php" >Log out</a>
    

    <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th> 
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // $query="SELECT * FROM user";
                $sql = "SELECT id, name,email FROM users";
                $result = $conn->query($sql);
                // if ($result->num_rows > 0)
                // while($row = $result->fetch_assoc()) 
                    $i=1;
                    // $result = $conn->query($query);
				while($row = $result->fetch_assoc()){
                ?>
                <tr>  
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row["id"]; ?>">Edit</a>
						<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>	
                </tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
</body>
</html>