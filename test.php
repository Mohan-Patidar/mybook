<div class="text-center">
  <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Send Pdf
  </button>
  </div>
<div class="container">
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add amount</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="javascript:void(0)" method="Post" >
        <label>Enter Amount</label>
        <input type="number" name="add_amount" id="add_amount"></br>
        <label>Description</label>
        <input type="text" name="description" id="description">
        <input type="submit" id="send" class="open" value="Add" />
			  </form>
        </div>
      </div>
    </div>
  </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script>        
    $(function () {    
    $("#send").on('click',function (e) {
    e.preventDefault();
    $add_amount =$('#add_amount').val();
    $description =$('#description').val();
    $.ajax({
      type: "POST", 
      url: "addprice.php",
      data: {'add_amount':$add_amount,
             'description':$description },
      success:function(res){
        alert (res);
      }
    });
    });

    })
</script>