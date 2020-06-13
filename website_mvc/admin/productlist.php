<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once'../classes/category.php';?>
<?php include_once '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php 
    $pd =new product();
     $fm =new Format();
    if(isset($_GET['delid']))
    {
    
         $id=$_GET['delid'];
          $delproduct =$pd->del_product($id);
    }
    
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>product name</th>
					<th>price</th>
					<th>image</th>
					<th>category</th>
					<th>description</th>
					<th>type</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
				
						<?php 
							$show_product = $pd->show_product();
							if($show_product)
							{
								$i=0;
								while($result=$show_product->fetch_assoc())
								{
									$i++;
							
							
						?>
						
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['productName'] ?></td>
							<td><?php echo $result['price'] ?></td>
							<td><img style="width: 100px;height: auto;" src="uploads/<?php echo $result['image'] ?>" > </td>
							<td><?php echo $result['catName'] ?></td>
							<td><?php echo $fm->textShorten($result['product_desc'],20)  ?></td>
							<td><?php
							if($result['type']==1)
							{
								 echo "Feathered"; 
							}
							else{
								echo "Non-Feathered"; 
							}
							?></td>
							
							<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit</a> ||
								<a onclick="return confirm('Bạn có thực sự muốn xóa không')" href="?delid=<?php echo $result['productId'] ?>">Delete</a></td>
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
