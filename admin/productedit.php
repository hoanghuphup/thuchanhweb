<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php
$pd=new product();
if(!isset($_GET['productID']) || $_GET['productID']== NULL)
{
    echo "<script>window.location ='productlist.php' </script> ";
}else
{
    $id=$_GET['productID'];
}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']) ){
   
   $updateProduct=$pd->update_product($_POST,$_FILES,$id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sua san pham</h2>
        <div class="block">
        <?php
                    if(isset($updateProduct)){
                        echo $updateProduct;
                    }
                ?>
        <?php
            $get_product_by_id=$pd->getproductbyID($id);
            if($get_product_by_id){
                    while($result_product=$get_product_by_id->fetch_assoc())
                    {

                  
            
        ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $result_product['productName'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category" >
                            <option>---Select Category---</option>
                            <?php
                                $cat=new category();
                                $catlist=$cat->show_category();
                                if($catlist){
                                    while($result=$catlist->fetch_assoc()){

                                   
                            ?>
                            <option 
                            <?php
                                if($result['catID']==$result_product['catID']){ echo 'selected';   }
                            ?>
                            value="<?php echo $result['catID']?>"><?php echo $result['catName']?></option>
                            <?php
                                 }
                                }
                            ?>
                            
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="select">
                            <option>Select Brand</option>
                            <option value="1">Brand One</option>
                            <option value="2">Brand Two</option>
                            <option value="3">Brand Three</option>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="mota"><?php echo $result_product['mota']?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $result_product['price']?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_product['image'] ?>" width="100"><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Size</label>
                    </td>
                    <td>
                        <select id="select" name="size">

                            <option>Select Size</option>
                            <?php if($result_product['size']==1){

                             ?>
                            <option selected value="1">S</option>
                            <option value="2">M</option>
                            <option value="3">L</option>
                            <?php
                            }else if($result_product['size']==2)
                            {
                                
                            
                            ?>
                            <option  value="1">S</option>
                            <option selected value="2">M</option>
                            <option value="3">L</option>
                             <?php
                            }else{
                             ?>

                            <option  value="1">S</option>
                            <option  value="2">M</option>
                            <option selected value="3">L</option>

                            <?php 
                            }
                            ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
                   }
                }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


