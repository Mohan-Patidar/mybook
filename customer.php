
<?php 
include('header.php');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<div class="container">
 <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer name</th> 
                    </tr>
                <thead>
                <tbody>
                <?php
                $sql = "SELECT id, name FROM customers";
                $result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
                ?>
                
                    <tr>  
                        <td><?php echo $row['id'];?></td>
                        <td><a href="c_show.php?id=<?php echo $row['id'];?>"><?php echo $row['name']; ?></td>
                    </tr>
                
                <?php
				}
                ?>
                </tbody>   
            </table>
</div>
<button onclick="goBack()">Go Back</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(function() {
        $('#example').DataTable();
    });

    function goBack(){
        window.history.back();
    }
</script>