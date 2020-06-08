<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<?php
			      	$login_check=Session::get('customer_login');
			      	if($login_check)
			      	{
			      		header('Location:order.php');
			      	}
 ?>
<?php 
   
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
   
  
    $insertCustomer =$cs->insert_customer($_POST);
}
?>
<?php 
   
    if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['login'])) {
   
  
    $loginCustomer = $cs->login_customer($_POST);
}
?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	 <?php 
                if(isset($loginCustomer))
                {
                    echo $loginCustomer;
                }
                ?>
        	<form action="" method="POST">
                	<input type="text" name="Username" placeholder="Username..">
                    <input  type="password" name="Password" placeholder="Password.." >
               
                 
                    <div class="buttons"><div><input type="submit" name="login" value="Sign in" class="grey"></div></div>
                    </div>
                      </form>
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		 <?php 
                if(isset($insertCustomer))
                {
                    echo $insertCustomer;
                }
                ?>
    		<form action="" method="POST">
		   	 <table>
		   			<tbody>
					<tr>
					<td style="padding-right: 10px;">
						<div>
							<input type="text" name="Name" placeholder="Nhập tên của bạn..." >
						</div>

						<div>
							<input type="text" name="email" placeholder="Nhập email...">
						</div>
						 <div>
			          		<input type="text" name="Address" placeholder="Nhập địa chỉ...">
			          	</div>
			    	</td>
		    		<td>
				
		    		        
	
		           <div>
		         		<input type="text" name="phone" placeholder="Nhập số điện thoại...">
		          </div>
				   <div>
		          		<input type="text" name="Username" placeholder="Nhập username...">
		          </div>
				  <div>
					<input type="password" name="Password" placeholder="Nhập password...">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" value="Create Accout" class="grey"></div></div>
		   
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php 
	include 'inc/footer.php';
	
?>
