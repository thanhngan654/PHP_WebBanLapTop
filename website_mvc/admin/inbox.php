﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$filepath = realpath(dirname(__FILE__));
	
	include_once($filepath.'/../classes/cart.php');
	include_once($filepath.'/../helpers/format.php');
?>
 <?php
    $ct = new cart();
    if(isset($_GET['shiftid'])){
    	$id = $_GET['shiftid'];
    	$proid = $_GET['proid'];
    	$qty = $_GET['qty'];
    	$time = $_GET['time'];
    	$price = $_GET['price'];
    	$shifted = $ct->shifted($id,$proid,$qty,$time,$price);
    }

    if(isset($_GET['delid'])){
    	$id = $_GET['delid'];

    	$time = $_GET['time'];
    	$price = $_GET['price'];
    	$del_shifted = $ct->del_shifted($id,$time,$price);
    }
 
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">  
                <?php
                if(isset($shifted))
                {
                	echo $shifted;
                }
                ?>      
                 <?php
                if(isset($shifted))
                {
                	echo $shifted;
                }
                ?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Order Time</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>customerid</th>
							<th>Customer</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$fm=new format();
							$ct=new cart();
							$get_inbox_cart=$ct->get_inbox_cart();
							if($get_inbox_cart)
							{
								$i=0;
								while ($result=$get_inbox_cart->fetch_assoc()) {
									$i++
							
						?>
						<tr class="odd gradeX"> 
							<td><?php echo $i; ?></td>
							<td><?php echo $fm->formatDate($result['dateOrder'])  ?></td>
							<td><?php echo $result['productName']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td><?php echo $result['price']." ".'VND'; ?></td>
								<td><?php echo $result['customerid']; ?></td>
							<td>
							<a href="customer.php?customerid=<?php echo $result['customerid'] ?>">
								View Customer
								</a>
							</td>

							<td>
								<?php 
								if($result['status']==0){
								 ?>

								<a href="?shiftid=<?php echo $result['Id'] ?>&qty=<?php echo $result['quantity'] ?>&proid=<?php echo $result['productId'] ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['dateOrder'] ?>">Giao Hàng
								<?php 
								}elseif($result['status']==1) {
								 ?>

								<?php 
								echo 'Đang giao hàng...';
								 ?>
								 
								<?php 
								}elseif($result['status']==2) {

								 ?>
								<a href="?delid=<?php echo $result['Id'] ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['dateOrder'] ?>">Xóa</a>
								 <?php 
								}
								 ?>
							</td>
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
