<?php 
	include 'inc/header.php';
	
?>
<?php 
  

     if(!isset($_GET['proid']) || $_GET['proid']==NULL)
    {
       echo "<script>window.location='404.php'</script>";
    }else
    {
         $id=$_GET['proid'];
    }
	$customer_id = Session::get('customer_id');
	
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
    
        $productid = $_POST['productid'];
        $insertCompare = $product->insertCompare($productid, $customer_id); 
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])){
     
        $productid = $_POST['productid'];
        $insertWishlist = $product->insertWishlist($productid, $customer_id); 
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
   
  $quantity=$_POST['quantity'];
    $AddtoCart =$ct->add_to_cart($quantity,$id);
}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php
	      		$detail=$product->get_details($id);
	      		if($detail)
	      		{
	      			while ($result=$detail->fetch_assoc()) {
	      			
	      			
	      	?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']; ?> </h2>
					<p><?php echo $fm->textShorten($result['product_desc'],100); ?></p>					
					<div class="price">
						<p>Price: <span><?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>	
						<?php 
							if(isset($insertCompare)) {
								echo $insertCompare;
							}
							 ?>
					 <?php 
						if (isset($AddtoCart)) {
							echo '<span style="color:red; font-size:18px;">Sản phẩm đã được bạn thêm vào giỏ hàng</span>';
						}
					 ?>	 
					 <?php 
						if (isset($insertCart)) {
							echo $insertCart;
						}
					 ?>	 
				</div>
				<div class="add-cart">
					<div class="button_details">
					<form action="" method="POST">
					
					<input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>

					
					<?php
	
					$login_check = Session::get('customer_login'); 
						if($login_check){
							echo '<input type="submit" class="buysubmit" name="compare" value="So sánh sản phẩm"/>'.'  ';
							
						}else{
							echo '';
						}
							
					?>
					
					
					</form>

					<form action="" method="POST">
					
					<input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>

					
					<?php
	
					$login_check = Session::get('customer_login'); 
						if($login_check){
							
							echo '<input type="submit" class="buysubmit" name="wishlist" value="Lưu vào yêu thích" />';
						}else{
							echo '';
						}
							
					?>
					<?php 
						if(isset($insertWishlist)) {
							echo $insertWishlist;
						}
						 ?>
					
					</form>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	      
	    </div>
				
	</div>
	<?php
		}
	}
	?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<?php
					$get_category=$cat->show_category_fontend();
						if($get_category){

							while ($result_all_cat=$get_category->fetch_assoc()) {
							
					?>
					<ul>
				      <li><a href="productbycat.php?catid=<?php echo $result_all_cat['catId']; ?>"><?php echo $result_all_cat['catName']; ?></a></li>
				     
    				</ul>
    				<?php
    			}
    			}
    				?>
 				</div>
 		</div>
 	</div>
 </div>
	<?php 
	include 'inc/footer.php';
	
?>

