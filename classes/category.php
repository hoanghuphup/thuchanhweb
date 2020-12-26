<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');


class category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function insert_category($catName)
    {
        $catName=$this->fm->validation($catName);
        
        $catName=mysqli_real_escape_string($this->db->link,$catName);
        
        if(empty($catName))
        {
            $alert="<span class='error'>Category must be not empty</span>";
            return $alert;
        } 
        else
        {
            $query="insert into category(catName) values('$catName')";
            
            $result=$this->db->insert($query);
           if($result){
               $alert="<span class='success'>Them danh muc thanh cong</span>";
               return $alert;
           }else{
            $alert="<span class='error'>Them ko thanh cong</span>";
            return $alert;
           }
            
        }

    }
    public function show_category(){
        $query="select * from category order by catID asc";
            
         $result=$this->db->select($query);
         return $result;
    }
    public function getcatbyID($id){
        $query="select * from category where catID='$id' order by catID asc";
            
         $result=$this->db->select($query);
         return $result;
    }
    public function update_category($catName,$id){
        $catName=$this->fm->validation($catName);
        $id=mysqli_real_escape_string($this->db->link,$id);
        $catName=mysqli_real_escape_string($this->db->link,$catName);
        if(empty($catName))
        {
            $alert="<span class='error'>Category must be not empty</span>";
            return $alert;
        } 
        else
        {
            $query="update category set catName='$catName'where catID='$id'";
            
            $result=$this->db->insert($query);
           if($result){
               $alert="<span class='success'>Update thanh cong</span>";
               return $alert;
           }else{
            $alert="<span class='error'>Update ko thanh cong</span>";
            return $alert;
           }
            
        }
    }
    public function del_cate2($id)
    {
        $query="select product.* , category.catID from product inner join category on product.catID=category.catID where category.catID = '$id'" ;
        $result=$this->db->select($query);
        if($result){
            $alert="<span class='error'>khong the xoa vi co product</span>";
            return $alert;
        }else{
            
            $query2="delete from category where catID='$id'";
            $result2=$this->db->delete($query2);
            if($result2){
                $alert="<span class='success'>xoa thanh cong</span>";
            return $alert;
            }
        
        }
    }
    public function del_category($id)
    {
        $query="delete from category where catID='$id' ";
        
            
         $result=$this->db->delete($query);
         if($result){
            $alert="<span class='success'>Xoa thanh cong</span>";
            return $alert;
        }else{
         $alert="<span class='error'>Xoa ko thanh cong</span>";
         return $alert;
        }
        
    }
    // public function del_cate($id){
    //     $query="select product.* , category.catID from product inner join category on product.catID=category.catID where category.catID = '$id'";
    //     $result=$this->db->select($query);
    //     if($result){
    //         $alert="<span class='success'>khong the xoa123</span>";
    //         return $alert;
    //     }else{
    //         $query2="delete from category where catID='$id' ";
    //         $result2=$this->db->delete($query2);
    //         return $result2;
    //         //$alert="<span class='success'>khong the xoa nhe cmm</span>";
    //         //return $alert;
    //     }
    // }
    
}
?>