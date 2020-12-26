<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

class customer
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function insert_customer($data){
        
        $Name=mysqli_real_escape_string($this->db->link,$data['name']);
        $City=mysqli_real_escape_string($this->db->link,$data['city']);
        $AccountName=mysqli_real_escape_string($this->db->link,$data['accountname']);
        $Address=mysqli_real_escape_string($this->db->link,$data['address']);
        $Email=mysqli_real_escape_string($this->db->link,$data['email']);
        $Phone=mysqli_real_escape_string($this->db->link,$data['phone']);
        $Pass=mysqli_real_escape_string($this->db->link,$data['password']);
        $Country=mysqli_real_escape_string($this->db->link,$data['country']);
        if($Name==""||$City==""||$AccountName==""||$Address==""||$Country==""||$Email==""||$Phone==""||$Pass=="")
        {
            $alert="<span style='color:red;font-size:18px'>Empty</span>";
            return $alert;
        }else{
            $check_mail="select * from customer where email='$Email' limit 1";
            $result_check=$this->db->select($check_mail);
            if($result_check){
                $alert="<span class='error'>Mail da ton tai</span>";
                return $alert;  
            }else{
                $query="insert into customer(name,address,city,accountname,country,phone,email,password) values('$Name','$Address','$City','$AccountName','$Country','$Phone','$Email','$Pass')";
            
            $result=$this->db->insert($query);
           if($result){
               $alert="<span style='color:green;font-size:18px'>Dang ki thanh cong</span>";
               return $alert;
           }else{
            $alert="<span class='error'>Dang ki ko thanh cong</span>";
            return $alert;
           }
            
        }

        }

    
    }
    public function login_customer($data){
        $Pass=mysqli_real_escape_string($this->db->link,$data['password']);
        $Account=mysqli_real_escape_string($this->db->link,$data['account']);
        if($Account==""||$Pass=="")
        {
            $alert="<span style='color:red;font-size:18px'>Empty</span>";
            return $alert;
        }else{
            $check_login="select * from customer where accountname='$Account' and password='$Pass' ";
            $result_check=$this->db->select($check_login);
            if($result_check != false){
                $value=$result_check->fetch_assoc();
                Session::set('customer_login',true);
                Session::set('customer_id',$value['id']);
                Session::set('customer_name',$value['name']);
                header('Location:pay.php');
                
            }else{
                $alert="<span class='error'>Mail hoac pass sai! </span>";
                return $alert; 
            
            }
        
        }
    }
}
?>