<?php 
class main extends CI_Model
{
     public $table='user';
    public function checkmail_model($data) {
         $password= md5($data['password']);
         $res= array();
         $email=$data['email_id'];
         //echo "select * from user where email_id='$email' AND password='$password'";
          $query = $this->db->query("select * from user where email_id='$email'");
        
          if($query->result()){
              
              $query1 = $this->db->query("select user_id, fname, email_id from user where email_id='$email' and password='$password'");
              if($query1->result()) {
                  $res['result']='match';
                  $res['data']=$query1->result();
              }else{
                 $res['result']='password';
                 
          }}
            else{
                  $res['result']='email';
                  
              }          
              return $res;
          
              
// return $this->db->where('email_id', $data['email_id'] AND 'password',$password)->get($this->table)->row();
    }
    function create_new($data) {
       $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    function new_email($email){
        $this->db->where('email_id',$email);
        $res= $this->db->get('user');
        if($res->num_rows() > 0){
            return true;
        } else{
            return FALSE;
        }
    }
    function upload_product($data) {
       $this->db->insert('product', $data);
        //return $this->db->insert_id(); 
    }
    function fetch_product() {
       //return $this->db->get('product')->result(); 
        $this->db->from('product');
        $this->db->order_by("id", "desc");
        $query = $this->db->get(); 
        return $query->result();
    }
    
    function add_cart($id,$qty){
        $data=array(
            'pid'=>$id,
            'user_id'=>$this->session->userdata('user_id'),
            'qty'=>$qty
        );
        $this->db->from('mycart');
        $this->db->where("pid",$id );
        $this->db->where("user_id",$data['user_id']);
        $res='';
        $query = $this->db->get();
        if($query->num_rows() > 0){
          $res='error';  
        }else {
        $this->db->insert('mycart', $data);
       // return $this->db->insert_id(); 
        $res='add';  
        }
        return $res;
    }
    function fetch_cart($id) {
        $sql="SELECT mc.id as mcid, mc.qty, mc.pid, pr.pname,pr.price FROM mycart as mc INNER JOIN product as pr ON mc.pid = pr.id where mc.user_id ='$id'";
        $query1 = $this->db->query($sql);
        return $query1->result();
    }
    function delete_cart($id) {
        $del='';
       $this->db->where('id', $id)->delete('mycart');
        if($this->db->affected_rows()){
            $del='delete';
        }else{
            $del='error';
        }
        return $del;
    }
}

?>

