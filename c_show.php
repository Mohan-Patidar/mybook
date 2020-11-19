<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>

 

<div class="container">
<?php
include ('header.php');
$id = $_GET['id'];
$sql = "Select * from customers  WHERE id='" . $_GET['id'] . "'";
$result = mysqli_query($conn, $sql);
$query= "SELECT * FROM `customer_detail` WHERE customer_id= $id";
$results = mysqli_query($conn, $query);


echo '<table  class="display" style="width:100%">
<thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Net Balance</th>
        <th>Action</th> 
    </tr>
</thead>';
$count = 0;


$row = mysqli_fetch_assoc($result);

  
?>
       
        <tbody>
            
            <tr>
              <td><?php echo $row['id'] ?> </td>
              <td><?php echo $row['name'] ?> </td>
              <td><?php echo $row['price'] ?></td>
              
              <td>
                <span  data-toggle="modal" data-target="#myModal<?php echo $count; ?>">You Gave</span>
                <div class="modal" id="myModal<?php echo $count; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">You Gave</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      
                      <!-- Modal body -->
                      <div class="modal-body">
                      <input type="hidden" id="old_price" value="<?php echo $row['price'] ?>" >
                      <input type="hidden" id="id" value="<?php echo $row['id'] ?>" >
                    
                      <form action="javascript:void(0)" method="Post" >
                      <label>Enter Amount</label>
                      <input type="number" name="price" id="price" class="add" autocomplete="off" required>
                      <div style="display: none;" class="pop">
                          <label>Enter Details (Item Name, Bill No, Quantity…)</label>
                          <input type="text" name="detail" id="detail" autocomplete="off" required></br>
                          <label>When did you give?</label>
                          <input type="date" name="date" id="date" required></br>
                          <!-- <input accept="image/x-png,image/jpeg,image/png" type="file" autocomplete="off"> -->
                          <input type="submit" id="send" class="open" value="Add" />
                      </div>
                      </form>
                     
                      </div>
                    </div>
                  </div>
                </div>

                
                <span  data-toggle="modal" data-target="#mModal<?php echo $count; ?>">You Got</span>
                <div class="modal" id="mModal<?php echo $count; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">You Got</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>  
                    <!-- Modal body -->
                    <div class="modal-body">
                      <input type="hidden" id="old_price" value="<?php echo $row['price'] ?>" >
                      <input type="hidden" id="id" value="<?php echo $row['id'] ?>" >
                      <form action="javascript:void(0)" method="Post" >
                        <label>Enter Amount</label>
                        <input type="number" name="sprice" id="sprice" class="add" autocomplete="off" required>
                        <div style="display: none;" class="pop">
                          <label>Enter Details (Item Name, Bill No, Quantity…)</label>
                          <input type="text" name="sdetail" id="sdetail" required></br>
                          <label>When did you got?</label>
                          <input type="date" name="date" id="sdate" required></br>
                          <input type="submit" id="sub" class="open" value="Add" />
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
         
              </td>
        </tbody>
        <?php
    
echo "</table>";

?>
<a href="details.php?id=<?php echo $row['id'];?>&name=<?php echo $row['name'] ?> ">view more</a>
 

<button onclick="goBack()">Go Back</button>

</div>

<!-- scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>

$(function (){    
  $("#send").on('click',function (e) {
    e.preventDefault();
    $new =$('#price').val();
    $old = $('#old_price').val();
    $id = $('#id').val();
    $detail =$('#detail').val();
    $date = $('#date').val();
    $.ajax({
      type: "POST", 
      url: "addprice.php",
      data: {'price':$new,
            'old_price':$old,
                'id':$id,
             'detail':$detail,
             'date':$date},
      success:function(){
        location.reload();
        
       
      }
    });
    });

    $("#sub").on('click',function (e) {
    e.preventDefault();
    $new =$('#sprice').val();
    $old = $('#old_price').val();
    $id = $('#id').val();
    $sdetail =$('#sdetail').val();
    $date = $('#sdate').val();
    $.ajax({
      type: "POST", 
      url: "subprice.php",
      data: {'sprice':$new,
            'old_price':$old,
                'id':$id,
             'sdetail':$sdetail,
             'sdate':$date},
      success:function(){
        location.reload();
      }
    });
    });
    })


   
    $('.add').keyup(function(){
      $('.pop').css('display','block');
    });

    
    function goBack() {
    window.history.back();
  }

</script>
