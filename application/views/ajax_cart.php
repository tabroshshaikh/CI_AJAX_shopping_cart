<?php if(isset($data) && !empty($data)){?>
<table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th> Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php $cnt=1; $total=0;
            foreach ($data as $value) {?>
            <tr id="cart<?php echo $value->mcid?>">
                <?php $total= ($value->qty * $value->price)+ $total;?>
               <td><?php echo $cnt?></td> 
               <td><?php echo $value->pname?></td> 
               <td><?php echo $value->qty?></td> 
               <td><?php echo $value->price?></td>
               
               <td> <button id="<?php echo $value->mcid?>" class="btn btn-danger remove_cart btn-sm"> Remove </button></td> 
            </tr>
            <?php $cnt++; }?>
            <tr>
                <td></td>
                <td></td> 
               <td></td>
               <td><?php echo "Total"?></td> 
               <td><?php echo $total;?></td>
                
                </tr>
        </tbody>
    </table>
<?php } else{?>
<h2> Cart is empty!</h2>
<?php }?>
<script>
    $('.remove_cart').on('click',function(e){
         var id=((this).id);
         $('#cart'+id).hide();
        $.ajax({
            url :base_url+'Welcome/remove_cart',
            type :'POST',
            dataType:'json',
            data:{id:id},
            success:function(response){
                  if(response.data=='error'){
                       swal({
                    title: " Error",
                    text: "",
                    type: "error",
                    showConfirmButton: false,
                    timer:1500
                  });
                  } 
                  if(response.data=='delete'){
                       swal({
                    title: "Removed",
                    text: "",
                    type: "success",
                    showConfirmButton: false,
                    timer:1500
                  });
                     show_cart();
                  }  
            }
        });
    });
    </script>