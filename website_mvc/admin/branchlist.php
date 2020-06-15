<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/branch.php';?>
<?php 
    $cat =new branch();
    if(isset($_GET['branchid']))
    {
    
         $id=$_GET['branchid'];
          $delBranch =$cat->del_branch($id);
    }
    
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block"> 
                 <?php 
                if(isset($delBranch))
                {
                    echo $delBranch;
                }
                ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_branch = $cat->show_branch();
							if($show_branch)
							{
								$i=0;
								while($result=$show_branch->fetch_assoc())
								{
									$i++;
							
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['branchName'] ?></td>
							<td><a href="branchedit.php?branchid=<?php echo $result['branchId'] ?>">Edit</a> ||
								<a onclick="return confirm('Bạn có thực sự muốn xóa không')" href="?branchid=<?php echo $result['branchId'] ?>">Delete</a></td>
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

