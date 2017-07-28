  function login(){
      var emailid =$('.email').val();
      var password =$('.password').val();
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var validate =0;
    if (!filter.test(emailid)) {
    validate =1;
    $('#email-error').html('Please enter valid email id');
  }
   if (password==''){
       validate =2;
       $('#pass-error').html('Please enter password');
   }
   if (password.length <4){
       validate =2;
       $('#pass-error').html('Password should be 6 character');
   }
    if(validate){
        return false;
    }else{
       // alert(base_url);
        var json = 'data:[{"emailid":'+emailid+', "password":'+password+'}]';
        //alert(json); 
        
        $.ajax({
            url : base_url+"Welcome/checkemail",
            type :'POST',
            data:{emailid:emailid,password:password},
            dataType:'json',
            
            success :function(response){
                if(response.result=='match'){
                    window.location.href=base_url+'home';
                }
                
                if(response.result=='email'){
                    $('#email-error').html('Email Id not registered!!');
                }
                 else if(response.result=='password'){
                 $('#pass-error').html('Incorrect password!!');
                } 
                //alert(response);
            }
        });
return false;
    }
  }
  
  function  signup()
  {
      var fname =$('.fname').val();
      var lname =$('.lname').val();
      var email_id=$('.email-signup').val();
      var password=$('.password-signup').val();
      var alreadyemail=$('#alreadyemail').val();
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var validate=0;
      if(fname==''){
          validate=1;
          $('#signup-fname-error').html('Please enter Firstname');
      }
      if(lname==''){
          validate=2;
           $('#signup-lname-error').html('Please enter Lasttname');
      }
        if (!filter.test(email_id)) {
        validate =3;
        $('#signup-email-error').html('Please enter valid email id');
      }    
      
       if (password==''){
           validate =4;
           $('#signup-pass-error').html('Please enter password');
       }
       if (password.length < 4){
           validate =5;
           $('#signup-pass-error').html('Password at least 6 character');
       }
       if(alreadyemail==0){
         validate =6;
 
       }
      if(validate){
          return false;
      }else{
        $.ajax({
            url : base_url+"Welcome/signup",
            type :'POST',
            data:{fname:fname,lname:lname,emailid:email_id,password:password},
            dataType:'json',
            
            success :function(response){
               if(response){
                   window.location.href=base_url+'home';
                }
                
                 
                //alert(response);
            }
        });  
          return false;
          
      }
  }
  $(document).ready(function(){
      $(".email-signup").change(function(){
          //alert('ass');
          var email=$('.email-signup').val();
          $.ajax({
            url : base_url+"Welcome/email_avalibility",
            type :'POST',
    //        contentType: 'application/json; charset=utf-8',
            data:{email:email},
           // dataType:'json',
            success :function(response){
               //alert(response);
              $('#email-result').html(response);
            }
        });
      });
      $(".password-signup").keyup(function(){
         var password =$('.password-signup').val();
         var len=password.length;
         var per =(len/16)*100;
         var color='';
         
         if(per > 33 && per < 66){
            
             color ='progress-bar progress-bar-warning';
         }else if(per > 65){
             color ='progress-bar progress-bar-info';
         }else{
             color ='progress-bar progress-bar-danger';
         }
         $("#progress-bar").attr('class', '');
         $("#progress-bar").addClass(color);
         $('#progress-bar ').css('width',+per+'%');
      });
      
  });