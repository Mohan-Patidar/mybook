<?php
include'conn.php';
        $date  =$_POST['sdate'];
        $sdetail = $_POST['sdetail'];
        $new = $_POST['sprice'];
        $old = $_POST['old_price'];
        $id  =$_POST['id'];
        $result = $old - $new;

        $sql = "UPDATE `customers` SET `price`= $result WHERE `id`= $id";
        $results = mysqli_query($conn,$sql);
        
        echo $results?"Price Substract Successfully!":"failed to substract failed.";
        
        $query  ="INSERT INTO `customer_detail`(`customer_id`, `current_price`,`given_status`,`taken_status` ,`detail`,`date`) VALUES ('$id','$new',0,1,'$sdetail','$date')";
        $results = mysqli_query($conn,$query);
   

?>

