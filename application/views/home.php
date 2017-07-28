<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CI_AJAX_shopping_cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    
    <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
    <meta property="og:title" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">
    
    <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet">
    
    <!-- Bootstrap CSS File -->
    <link href="<?php echo base_url()?>css_js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Libraries CSS Files -->
    <link href="<?php echo base_url()?>css_js/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css_js/sweetalert.css" rel="stylesheet">
     <link href="<?php echo base_url()?>css_js/style.css" rel="stylesheet">
    <!--Your custom colour override - predefined colours are: colour-blue.css, colour-green.css, colour-lavander.css, orange is default-->
    <link href="#" id="colour-scheme" rel="stylesheet">
    
    <!-- =======================================================
      Theme Name: Flexor
      Theme URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
      Author: BootstrapMade.com
      Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <style>
     .webname{   
      font-weight: 100;
      font-size: 30px;
     }
     .loab{
         padding-top:7px;font-weight: 300;font-size: 20px;
     }
     @media only screen and (max-width: 500px) {
     .webname{   
      
      font-size: 20px;
     }
     .loab{
         font-size: 15px;
     }
     }
  </style>
  
  <body class="page-index has-hero">
      
      <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
  
    <div >
        <div  style="padding: 7px">
        <span class="webname"> Shopping cart </span>
        <a href="javascript:void(0)" class="pull-right loab " id="logout">Log out</a>
        <a href="javascript:void(0)"  data-toggle="modal" data-target="#aboutModal"  class="pull-right loab">About Us &nbsp;&nbsp; &nbsp;</a>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

   
    <div id="content">
     
      
     <div class="block-contained">
                     <div id="spinner">
            <center>
                <i class="fa fa-spinner fa-spin" style="font-size:70px;color:#38d368;"></i>

          </center>
                  </div>
         <div class="col-lg-12"> 
             <a class="btn btn-primary btn-md" target="_blank" href="https://github.com/tabroshshaikh/CI_AJAX_shopping_cart.git">Download code from Github
             </a>
         </div>
         <div class="col-lg-9 m-t-lg">
              <h2 class="block-title">
            Our Product &nbsp;&nbsp;<button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-primary btn-sm">Add Product</button>
        </h2>

           <div class="row" id="all_product">
           
          </div>
        </div>
         <div class="col-lg-3">
              <h2 class="block-title">
            My cart 
        </h2>

           <div class="row" id="mycart">
          
          </div>
        </div>
      </div>
      
      
      
      
    </div>
    <!-- /content -->
    
    <!-- ======== @Region: #footer ======== -->
    
    
    <script>
    var base_url='<?php echo site_url()?>';
    </script>
    <!-- Required JavaScript Libraries -->
    <script src="<?php echo base_url()?>css_js/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>css_js/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>css_js/custom.js"></script>
  
    
    
  
  </body>
</html>

<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close md" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product</h4>
        </div>
        <div class="modal-body">
            <form id="upload" method="POST" class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-3" >Product Name:</label>
      <div class="col-sm-9">
          <input type="text" class="form-control" maxlength="10" name="pname" required/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Description:</label>
      <div class="col-sm-9">          
          <input type="text" class="form-control" name="des" maxlength="50">
      </div>
    </div>
              <div class="form-group">
      <label class="control-label col-sm-3" >Product Price:</label>
      <div class="col-sm-9">
          <input type="number" class="form-control" name="price" required/>
      </div>
    </div>
              <div class="form-group">
      <label class="control-label col-sm-3" >Upload Image:</label>
      <div class="col-sm-9">
          <input type="file"  name="image" required/>
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-info">Add</button>
      </div>
    </div>
  </form>
        </div>
        
      </div>
      
    </div>
  </div>
<div class="modal fade" id="aboutModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">About Us</h4>
        </div>
        <div class="modal-body">
            <div class="panel-body"><div class="col-lg-4">
                <img class="img-responsive img-circle" style="height:200px;"src="<?php echo base_url();?>uploads/tabrosh.jpg">
                
                </div><div class="col-lg-7"><h2>Features</h2> 
                    <ul class="list-dotted" style="padding-left: 10px;">
                  <li> All Operations Done In AJAX</li>
                  <li>Custom Password Meter</li>
                  <li>Email Availability</li>
                  <li>Responsive UI</li>
                </ul>
                    Contact for source code &nbsp;<a>shaikhtabrosh@gmail.com</a>
                </div>
              </div>
        </div>
        
      </div>
      
    </div>
  </div>
<script src="<?php echo base_url()?>css_js/sweetalert.min.js"></script>
<script>
    fetch_all();
    show_cart();
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
            dataType:'json',
            success:function(response){
                if(response.data=='ok'){
               $('#upload').find('input:file').val('');
               $('#upload').find("input,textarea,select") .val('');
               
                
                swal({
                    title: "Product added successfully!",
                    text: "",
                    type: "success",
                    showConfirmButton: false,
                    timer:1500
                  });
                  $('.md').trigger('click'); 
               fetch_all();           
                }
                else if(response.data=='image'){
                   swal({
                    title: "Please select image",
                    text: "",
                    type: "error",
                    showConfirmButton: false,
                    timer:1500
                  });
                 }
               else{
                   swal({
                    title: "Oops...",
                    text: "Something went wrong!",
                    type: "error",
                    showConfirmButton: false,
                    timer:1500
                  });
                 }
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
    $('#logout').on('click',function(){
       $.ajax({
            url :base_url+'Welcome/logout',
            success:function(response){
            window.location.href=base_url+'home';
            }
        }); 
    });
    
    </script>