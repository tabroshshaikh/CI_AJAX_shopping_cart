<?php if(isset($data) && $data !=''){
//     echo '<pre>'; 
//    print_r($data);
    foreach ($data as $value){?>
<div class="col-md-3">
            <div class="panel panel-default panel-pricing text-center">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <?php echo $value->pname;?>
                </h4>
              </div> <div class="panel-body"><center>
                <img style="height:143px;" src="<?php echo base_url().'uploads/'.$value->file_name;?>" alt=" image" class="img-responsive underlay">
              </center>
                </div>
                <div class="panel-pricing-price"><span style="color:gold;font-weight:500;font-size:20px">$ <?php echo $value->price;?></span></div>
              <div class="panel-body">
                  <div>
                <?php echo $value->des;?>
                      </div>
                    <select class="form-control" id="qty<?php echo $value->id;?>">
                    <?php for($i=1;$i<=10;$i++){?>
                  <option><?php echo $i;?></option>
                  <?php }?>
                  </select>
                  <button id="<?php echo $value->id;?>" class="btn btn-primary btn-sm add_cart">Add to cart</button>

              </div>
            </div>
          </div>
<?php } }?>
<script>
     $('.add_cart').on('click',function(e){
        var id=((this).id);
        var qty =$('#qty'+id).val();
        $.ajax({
            url :base_url+'Welcome/add_cart',
            type :'POST',
            dataType:'json',
            data:{id:id,qty:qty},
            success:function(response){
                  if(response.data=='error'){
                      swal({
                    title: "Already added ",
                    text: "",
                    type: "error",
                    showConfirmButton: false,
                    timer:1500
                  });
                     
                  } 
                  if(response.data=='add'){
                      
                    swal({
                    title: "Added in to the cart ",
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