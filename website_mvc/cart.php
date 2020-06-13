<?php 
	include 'inc/header.php';

?>

<?php 

  if(isset($_GET['cartid']))
    {
    
         $cartid=$_GET['cartid'];
          $delcart =$ct->del_cart($cartid);
    }
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
   $cartId= $_POST['cartId'];
   $quantity= $_POST['quantity'];
   $update_quantity= $ct->update_quantity_cart($quantity,$cartId);
}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
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
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
	      						$getproduct_cart=$ct->get_product_cart();
	      						if($getproduct_cart)
	      							{
	      								$subTotal=0;
	      								$qty=0;
	      							while ($result=$getproduct_cart->fetch_assoc()) {
	      			
	      		
	      						?>
							<tr>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/uploads/<?php echo $result['image']; ?>" alt=""/></td>
								<td>
									<?php echo $result['price']; ?>
								</td>
								<td>
									<form action="" method="post">
										<input type="hidden"  name="cartId" value="<?php echo $result['cartId']; ?>"/>
										<input type="number" name="quantity" min="1" value="<?php echo $result['quantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
									$total=$result['price']*$result['quantity'];
									$qty+=$result['quantity'];
									echo $total." "."VNĐ";
								?></td>
								<td><a href="?cartid=<?php echo $result['cartId']; ?>">X</a></td>
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
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
	include 'inc/footer.php';
	
?>

