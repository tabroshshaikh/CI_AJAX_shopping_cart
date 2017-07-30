<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('main');
    }

    public function index()
	{       if($this->session->userdata('user_id'))
                redirect(base_url().'Welcome/login');
             else
		$this->load->view('login');
	}
        public function checkemail()
        {
            
            $data =array('email_id'=>$_POST['emailid'],
                        'password'=>$_POST['password']
                );
            $res=$this->main->checkmail_model($data); 
            echo json_encode($res);
            if($res['result']=='match'){
                 $value=$res['data'][0];
                
                  $session_data= array(
                      'user_id'=>$value->user_id,
                      'fname'=>$value->fname,
                      'email_id'=>$value->email_id
                  );
                  $this->session->set_userdata($session_data);
                  //redirect(base_url().'Welcome/login');
            }
            
        }
        public function login() {
           if(!$this->session->userdata('user_id')){
              redirect(base_url());
           }
          // print_r($this->session->userdata());
          $this->load->view('home');
        }
        public function signup() {
            $data =array(
                'fname'=>$_POST['fname'],
                'lname'=>$_POST['lname'],
                'email_id'=>$_POST['emailid'],
                'password'=> md5($_POST['password'])
                );
                $res=$this->main->create_new($data);
                echo json_encode($res);
                if($res>0){
                    $session_data= array(
                      'user_id'=>$res,
                      'fname'=>$_POST['fname'],
                      'email_id'=>$_POST['emailid']
                  );
                  $this->session->set_userdata($session_data);
                }
        }
        public function email_avalibility(){
            if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
            echo '<span style="padding-left:56px"><i class="fa fa-times-circle" style="font-size:20px;color:red"></i>&nbsp;Invalid email</span><script>$("#alreadyemail").val("0");</script>';    
            }
            else{
                if($this->main->new_email($_POST['email'])){
                     echo '<span style="padding-left:56px"><i class="fa fa-times-circle" style="font-size:20px;color:red"></i>&nbsp;Email already register</span><script>$("#alreadyemail").val("0");</script>';
                } else{
                echo '<span style="padding-left:56px"><i class="fa fa-check-circle" style="font-size:20px;color:green"></i>&nbsp;Email Available</span><script>$("#alreadyemail").val("1");</script>';     
            }
            }
        }
        public function upload_data() {
            //print_r($_POST);
            if(isset($_FILES['image']['name']))
            {   $res['data']='';
                $config['upload_path']='./uploads/';
                $config['allowed_types']='jpg|png|jpeg|gif';
                $this->load->library('upload',$config);
                
                if(!$this->upload->do_upload('image')){
                     $res['data']='image';
                    //echo $this->upload->display_errors();
                }else{
                    $file= $this->upload->data();
                    $data=array(
                        'pname'=>$_POST['pname'],
                        'des'=>$_POST['des'],
                        'price'=>$_POST['price'],
                        'file_name'=>$file['file_name'],
                        'full_path'=>$file['full_path']
                    );
                    $this->main->upload_product($data);
                     $res['data']='ok';
                }
                
                
            }else{
                $res['data']='error';
            }
            echo json_encode($res);
        }
        public function fetch_all() {
            $result['data']= $this->main->fetch_product();
            $this->load->view('fetch_product',$result);
            
        }
        public function add_cart() {
           // echo $_POST['id'];
           $res['data']= $this->main->add_cart($_POST['id'],$_POST['qty']);
           echo json_encode($res);
            
        }
        public function show_cart() {
           $id=$this->session->userdata('user_id');
           $res['data']=$this->main->fetch_cart($id);
          
          $this->load->view('ajax_cart',$res);
            
        }
        public function remove_cart() {
            $res['data']= $this->main->delete_cart($_POST['id']);
            echo json_encode($res); 
        }
        public function logout() {
            $this->session->sess_destroy();
            
        }
}
    
