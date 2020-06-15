<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/branch.php';?>
<?php 
    $cat =new branch();
    if(!isset($_GET['branchid']) || $_GET['branchid']==NULL)
    {
       echo "<script>window.location='branchlist.php'</script>";
    }else
    {
         $id=$_GET['branchid'];
    }
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $branchName=$_POST['branchName'];
  
         $updateBranch =$cat->update_branch($branchName,$id);
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục Sản Phẩm</h2>
                <?php 
                if(isset($updateBranch))
                {
                    echo $updateBranch;
                }
                ?>
               <div class="block copyblock"> 

                <?php 
                    $get_branch_name=$cat->getcatbyId($id);
                    if($get_branch_name){
                        while ($result=$get_branch_name->fetch_assoc()) {
                     
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['branchName'] ?>" name="branchName" placeholder="sửa danh mục thương hiệu ..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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