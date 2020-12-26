<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

class product 
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function insert_product($data,$files)
    {
        
        
        $productName=mysqli_real_escape_string($this->db->link,$data['productName']);
        $category=mysqli_real_escape_string($this->db->link,$data['category']);
        $mota=mysqli_real_escape_string($this->db->link,$data['mota']);
        $price=mysqli_real_escape_string($this->db->link,$data['price']);
        $size=mysqli_real_escape_string($this->db->link,$data['size']);
        $permited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_temp=$_FILES['image']['tmp_name'];
        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $unique_image=substr((md5(time())),0,10).'.'.$file_ext;
        $uploaded_image="uploads/".$unique_image;
        
        
        if($productName==""||$category==""||$mota==""||$price==""||$file_name==""||$size=="")
        {
            $alert="<span class='error'>files must be not empty</span>";
            return $alert;
        } 
        else
        {
            move_uploaded_file($file_temp,$uploaded_image);
            $query="insert into product(productName,catID,mota,price,image,size) values('$productName','$category','$mota','$price','$unique_image','$size')";
            
            $result=$this->db->insert($query);
           if($result){
               $alert="<span class='success'>Them san pham thanh cong</span>";
               return $alert;
           }else{
            $alert="<span class='error'>Them san pham ko thanh cong</span>";
            return $alert;
           }
            
        }

    }
    public function show_product(){
        $query="select p.*,c.catName
        from product as p,category as c where p.catID=c.catID order by p.productID asc";
            
         $result=$this->db->select($query);
         return $result;
    }
    public function getproductbyID($id){
        $query="select * from product where productID='$id' order by productID asc";
            
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
    public function update_product($data,$files,$id){
        
        
        $productName=mysqli_real_escape_string($this->db->link,$data['productName']);
        $category=mysqli_real_escape_string($this->db->link,$data['category']);
        $mota=mysqli_real_escape_string($this->db->link,$data['mota']);
        $price=mysqli_real_escape_string($this->db->link,$data['price']);
        $size=mysqli_real_escape_string($this->db->link,$data['size']);
        $permited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_temp=$_FILES['image']['tmp_name'];
        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $unique_image=substr((md5(time())),0,10).'.'.$file_ext;
        $uploaded_image="uploads/".$unique_image;

        if($productName==""||$category==""||$mota==""||$price==""||$size=="")
        {
            $alert="<span class='error'>files must be not empty</span>";
            return $alert;
        }
        else{
            if(!empty($file_name))
            {
                
                if(in_array($file_ext,$permited)===false){
                    //echo "<span class='error'>you can upload only:-".implode(',',$permited)."</span>";
                    $alert="<span class='error'>you can upload only:-".implode(',',$permited)."</span>";
                    return $alert;
                }
                
                move_uploaded_file($file_temp,$uploaded_image);
                $query="update product set 
                productName='$productName',catID='$category',mota='$mota',image='$unique_image',price='$price',size='$size' where productID='$id'";
                $result=$this->db->update($query);
                if($result){
                    $alert="<span class='success'>Update san pham thanh cong </span>";
                    return $alert;
                }else{
                 $alert="<span class='error'>Update san pham ko thanh cong</span>";
                 return $alert;
                }
            }else{
                $query="update product set 
                productName='$productName',
                catID='$category',
                mota='$mota',
                
                price='$price',
                size='$size'
                
                where productID='$id'";
            
                $result=$this->db->update($query);
           if($result){
               $alert="<span class='success'>Update san pham thanh cong</span>";
               return $alert;
           }else{
            $alert="<span class='error'>Update san pham ko thanh cong</span>";
            return $alert;
           }
        }
    }
    

        

        
        
       /* else
        {
            
            
            $result=$this->db->insert($query);
           if($result){
               $alert="<span class='success'>Update san pham thanh cong thanh cong</span>";
               return $alert;
           }else{
            $alert="<span class='error'>Update san pham ko thanh cong</span>";
            return $alert;
           }
            
        }*/
    }
    public function del_product($id)
    {
        $query="delete from product where productID='$id' ";
            
         $result=$this->db->delete($query);
         if($result){
            $alert="<span class='success'>Xoa san pham thanh cong</span>";
            return $alert;
        }else{
         $alert="<span class='error'>Xoa san pham ko thanh cong</span>";
         return $alert;
        }
        
    }
    public function del_category($id)
    {
        $query="delete from category where catID='$id' ";
            
         $result=$this->db->delete($query);
         if($result){
            $alert="<span class='success'>Xoa danh muc thanh cong</span>";
            return $alert;
        }else{
         $alert="<span class='error'>Xoa ko thanh cong</span>";
         return $alert;
        }
        
    }
    
    public function getproduct_feathered(){
        $query="select * from product where size ='3'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getproduct_new(){
        $query="select * from product order by productID desc limit 4";
        $result=$this->db->select($query);
        return $result;
    }
    public function getpro(){
        $query="select * from product ";
        $result=$this->db->select($query);
        return $result;
    }
    public function get_details($id){
        $query="select product.* , category.catName from product inner join category on product.catID=category.catID where product.productID = '$id'";
        $result=$this->db->select($query);
        return $result;
    }
}
?>