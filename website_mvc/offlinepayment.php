<?php 
	include 'inc/header.php';
	
?>
<?php
	
     if(isset($_GET['orderid']) AND $_GET['orderid']=='order')
    {
       $customer_id=Session::get('customer_id');
       $insertOrder=$ct->insertOrder($customer_id);
       	$del_cart=$ct->del_all_cart();
       	header('Location:success.php');
    }
?>
<style type="text/css" media="screen">
	.box_left{
		width: 50%;
		border: 1px solid #666;
		float: left;
		padding: 10px;
	}	
	.box_right{
		width: 45%;
		border: 1px solid #666;
		float: right;
		padding: 10px;
	}	
	a.submitorder{
		background: red;
		padding: 7px 20px;
		color: #fff;
		font-size: 25px;
		
	}
	
</style>
<form action="" method="POST" accept-charset="utf-8">
	
	

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="heading">
    		<h3>Offline Payment</h3>
    		</div>
    		<div class="clear"></div>
    		<div class="box_left">
				<div class="cartpage">
			    	
			    	<?php
			    		if(isset($update_quantity)){
			    			echo $update_quantity;
			    		}
			    	?>
			    		<?php
			    		if(isset($delcart)){
			    			echo $delcart;
			    		}
			    	?>
						<table class="tblone">
							<tr>
								<th width="5%">$id</th>
								<th width="15%">Product Name</th>
								
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								
							</tr>
							<?php
	      						$getproduct_cart=$ct->get_product_cart();
	      						if($getproduct_cart)
	      							{
	      								$subTotal=0;
	      								$qty=0;
	      								$i=0;
	      							while ($result=$getproduct_cart->fetch_assoc()) {
	      			
	      							$i++;
	      						?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								</td>
								<td>
									<?php echo $result['price']; ?>
								</td>
								<td>
									<?php echo $result['quantity']; ?>
								</td>
								<td><?php
									$total=$result['price']*$result['quantity'];
									$qty+=$result['quantity'];
									echo $total." "."VNĐ";
								?></td>
							
							</tr>
							<?php
							$subTotal+=$total;

								}
							}
							?>
							
							
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th> Total : </th>
								<td>
									<?php echo $subTotal." "."VND"; 
									Session::set('sum',$subTotal);
									Session::set('qty',$qty);	
									?></td>
							</tr>
							
					   </table>
					</div>
			</div>
			<div class="box_right">
			<table class="tblone">
    			
    		<?php
    			$id=Session::get('customer_id');
	      		$get_customers=$cs->show_customers($id);
	      		if($get_customers)
	      		{
	      			while ($result=$get_customers->fetch_assoc()) {	
	      	?>
    			<tr>
    				<td>Name</td>
    				<td>:</td>
    				<td><?php echo $result['Name']; ?></td>
    			</tr>
    			<tr>
    				<td>Phone</td>
    				<td>:</td>
    				<td><?php echo $result['phone']; ?></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td>:</td>
    				<td><?php echo $result['email']; ?></td>
    			</tr>
    			<tr>
    				<td>Address</td>
    				<td>:</td>
    				<td><?php echo $result['Address']; ?></td>
    			</tr>
    			<tr>
    				<td colspan="3"><a href="editprofile.php">Update Profile</a></td>
    			</tr>
    			
    			<?php
    				}
    			}
    			?>
    		</table>
			</div>
 		</div>
 	</div>
 	<center><a href="?orderid=order" class="submitorder">Order</a></center><<br>
 </div>
 </form>
	<?php 
	include 'inc/footer.php';
	
?>

