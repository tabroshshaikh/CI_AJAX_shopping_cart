function fetch_all(){
        $('#spinner').show();
        $.ajax({
            url :base_url+'Welcome/fetch_all',
            success:function(response){
                $('#spinner').hide();
                $('#all_product').html(response);
            }
        });
    }
    $('#upload').on('submit',function(e){
        e.preventDefault();
        
        $.ajax({
            url :base_url+'Welcome/upload_data',
            type :'POST',
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(response){
               fetch_all();           
            }
        });
        
        
    });
    function  show_cart()
    {
        
       $.ajax({
            url :base_url+'Welcome/show_cart',
            success:function(response){
             $('#mycart').html(response);
            }
        });
 
       
    }
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
                      alert('error');
                  } 
                  if(response.data=='delete'){
                     show_cart();
                  }  
            }
        });
    });
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
                      alert('error');
                  } 
                  if(response.data=='add'){
                     show_cart();
                  }  
            }
        });
        
        
    });
