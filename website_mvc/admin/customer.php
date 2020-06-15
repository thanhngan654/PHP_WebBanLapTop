<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
 ?>
<?php
    $cs = new customer(); 
    if(!isset($_GET['customerid']) || $_GET['customerid'] == NULL){
        echo "<script> window.location = 'inbox.php' </script>";
        
    }else {
        $id = $_GET['customerid']; // Lấy catid trên host
    }
    
    
    
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thông tin khách hàng</h2>      
               <div class="block copyblock"> 
                
                 <?php 
                    $get_customer = $cs->show_customers($id);
                    if($get_customer){
                        while ($result = $get_customer->fetch_assoc()) {
                            
                        
                  ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['Name']; ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['phone']; ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                    
                            <td>Address</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['Address']; ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                       
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email']; ?>" name="catName" class="medium" />
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
<?php include 'inc/footer.php';?>