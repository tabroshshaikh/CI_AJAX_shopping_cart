<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login </title>
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

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="img/icons/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="">
    <link rel="apple-touch-icon-precomposed" href="">
  
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet">
    
    <!-- Bootstrap CSS File -->
    <link href="<?php echo base_url()?>css_js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Libraries CSS Files -->
    <link href="<?php echo base_url()?>css_js/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css_js/owlcarousel/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css_js/owlcarousel/owl.theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css_js/owlcarousel/owl.transitions.min.css" rel="stylesheet">
    <style>
        .benches {
  background-image: url(<?php echo base_url()?>css_js/benches.png);
}
.val {
    padding-left:56px;
    font-weight:300;
    color:red;
}
        
    </style>
    <!-- Main Stylesheet File -->
    <link href="<?php echo base_url()?>css_js/style.css" rel="stylesheet">
    
    <!--Your custom colour override - predefined colours are: colour-blue.css, colour-green.css, colour-lavander.css, orange is default-->
    <link href="#" id="colour-scheme" rel="stylesheet">
    
   
  </head>
  
  <!-- ======== @Region: body ======== -->
  <body class="fullscreen-centered page-login">
    <!--Change the background class to alter background image, options are: benches, boots, buildings, city, metro -->
    <div id="background-wrapper" class="benches" data-stellar-background-ratio="0.8">
      
      <!-- ======== @Region: #content ======== -->
      <div id="content">
        
        <div class="row">
           <div class="tab-content">
            <div id="login" class="tab-pane fade in active">  
          <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Login
                </h3>
              </div>
              <div class="panel-body">
                  <form accept-charset="UTF-8" role="form" onsubmit=" return login();">
                  <fieldset>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                        <input type="email" class="form-control email" placeholder="Email" required/>
                      </div>
                        <div class="val" id="email-error"></div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                        <input type="password" class="form-control password" placeholder="Password" required/>

                      </div>
                        <div class="val" id="pass-error"></div>
                   </div>
                    <div class="checkbox">
                      <label>
                        <input name="remember" type="checkbox" value="Remember Me">
                        Remember Me 
                      </label>
                    </div>
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
                  </fieldset>
                </form>
                <p class="m-b-0 m-t">Not signed up? <a data-toggle="tab" href="#register">Sign up here</a>.</p>
                
              </div>
              </div>
          </div>  
            </div>
               <div id="register" class="tab-pane fade">
               <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Sign Up
                </h3>
              </div>
              <div class="panel-body">
                  <form id="signup" onsubmit="return signup()">
                  <fieldset>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                        <input type="text" class="form-control fname" placeholder="First Name " required/>
                      </div>
                        <div class="val" id="signup-fname-error"></div>  
                    </div>
                      <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                        <input type="text" class="form-control lname" placeholder="Last Name" required/>
                      </div>
                         <div class="val" id="signup-lname-error"></div>  
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                        <input type="email" class="form-control email-signup" placeholder="Email" required/>
                      </div>
                         <div class="val" id="signup-email-error"></div>
                        <div id="email-result"></div>
                    </div>
                      <input type="hidden" id="alreadyemail" value="0">
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                        <input type="password" maxlength="16" class="form-control password-signup" placeholder="Password" required/>
                      </div>
                        <div class="progress" style="margin-left:56px;margin-top:5px;margin-bottom:5px;height:6px; ">
                            <div id="progress-bar" class="progress-bar" role="progressbar" style="width:0%">
                              
                            </div>
                          </div>
                        <div class="val" id="signup-pass-error"></div>
                    </div>
                    

                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Me Up">
                  </fieldset>
                </form>
                <p class="m-b-0 m-t">Already signed up? <a data-toggle="tab" href="#login">Login here</a>.</p>
                  
              </div>
            </div>
          </div>
          </div>
         </div>      
        </div>
        <!-- /row -->
      </div>
    </div>
    <script>
    var base_url='<?php echo site_url()?>';
    </script>
    <!-- Required JavaScript Libraries -->
    <script src="<?php echo base_url()?>css_js/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>css_js/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>css_js/custom.js"></script>
  </body>
</html>