<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php'; ?>
<?php
$pd=new product();
$fm=new Format();
	if(isset($_GET['productID']))
		{
			
			$id=$_GET['productID'];
			$delpro=$pd->del_product($id);
		}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block"> 
			<?php
			if(isset($delpro)){
				echo $delpro;
			}
			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Product ID</th>
					<th>Product name</th>
					<th>category</th>
					<th>price</th>
					<th>Image</th>
					<th>Mota</th>
					<th>Size </th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					
					$pdlist=$pd->show_product();
					if($pdlist){
						$i=0;
						while($result=$pdlist->fetch_assoc()){
							$i++;		
					
				?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['productName']?></td>
					<td><?php echo $result['catName']?></td>
					<td><?php echo $result['price']?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
					<td><?php echo $fm->textShorten($result['mota'],20) ?></td>
					<td><?php
						if($result['size']==1){
							echo 'S';
						}else if($result['size']==2)
						{
							echo 'M';
						}else{
							echo 'L';
						}
					

					?></td>
					<td><a href="productedit.php?productID=<?php echo $result['productID'] ?>">Edit</a> || <a href="?productID=<?php echo $result['productID'] ?>">Delete</a></td>
				</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
