<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/branch.php';?>
<?php 
    $cat =new branch();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $branchName=$_POST['branchName'];
  
    $insertbranch =$cat->insert_branch($branchName);
}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Danh Mục Sản Phẩm</h2>
                <?php 
                if(isset($insertbranch))
                {
                    echo $insertbranch;
                }
                ?>
               <div class="block copyblock"> 
                 <form action="branchadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="branchName" placeholder="nhập danh mục thương hiệu cần thêm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>