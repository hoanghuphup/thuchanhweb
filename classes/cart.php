<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

class cart 
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function add_to_cart($getsize,$solg,$id){
        $getsize=mysqli_real_escape_string($this->db->link,$getsize);
        $solg=$this->fm->validation($solg);
        $solg=mysqli_real_escape_string($this->db->link,$solg);
        $id=mysqli_real_escape_string($this->db->link,$id);
        $sId=session_id();
        
        $query="select * from product where productID='$id'";
        $result=$this->db->select($query)->fetch_assoc();
        


        $image=$result["image"];
        $productName=$result["productName"];
        $price=$result["price"];
        //$check_cart="select * from cart where productID='$id' and sld='$sId'";
        
            $query_insert="insert into cart(productID,sld,productName,price,solg,image,getsize) values('$id','$sId','$productName','$price','$solg','$image','$getsize')";
            
            $insert_cart=$this->db->insert($query_insert);
           if($insert_cart){
               header('Location:cart.php');
               
           }else{
            header('Location:404.php');
        
        
            
        }   
    }
    public function getproductcart(){
        $sId=session_id();
        $query="select * from cart where sld='$sId'";
        $result=$this->db->select($query);
        return $result;
    }
    public function update_to_solg($solg,$cartID){
        
        $solg=mysqli_real_escape_string($this->db->link,$solg);
        $cartID=mysqli_real_escape_string($this->db->link,$cartID);
        $query="update cart set solg='$solg' where cartID='$cartID'";
    
        $result=$this->db->update($query);
        if($result){
            $msg="<span style='color:green;font-size:18px'>Quantity update thanh cong</span>";
            return $msg;
        }else{
            $msg="<span style='color:red;font-size:18px'>Quantity update k thanh cong</span>";
            return $msg;
        }
    }
    public function del_cart($cartid){
        $cartid=mysqli_real_escape_string($this->db->link,$cartid);
        $query="delete from cart where cartID='$cartid'";
        $result=$this->db->delete($query);
        return $result;
        if($result){
            header('Location:cart.php');
            
        }else{
            $msg="<span style='color:red;font-size:18px'>xoa k thanh cong</span>";
            return $msg;
        }
    }
    public function check_cart(){
        $sId=session_id();
        $query="select * from cart where sld='$sId'";
        $result=$this->db->select($query);
        return $result;
    }
    
}
?>