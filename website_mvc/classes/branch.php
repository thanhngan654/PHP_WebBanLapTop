<?php 
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
	/**
	 * 
	 */
	class branch
	{
	
		private $db;
		private $fm;
		function __construct()
		{
			$this->db=new Database();
			$this->fm=new Format();
		}
		function insert_branch($branchName)
		{
			$branchName= $this->fm->validation($branchName);
			

			$branchName = mysqli_real_escape_string($this->db->link,$branchName);

		

			if(empty($branchName) )
			{
				$arlert="không được bỏ trống";
				return $arlert;
			}
			else
			{
				$query="INSERT INTO tbl_branch(branchName) VALUES('$branchName')";
				$result=$this->db->insert($query);
				if($result){
					$arlert= "<span class= 'success' > thành công </span> ";
				return $arlert;
				}
				else{
					$arlert= "<span class= 'error' >không thành công</span> ";
				return $arlert;
				}

			}
		}

		function show_branch()
		{
			
				$query="SELECT * FROM tbl_branch order by branchId desc";
				$result=$this->db->select($query);
				
			
				return $result;
			
		}

		function update_branch($branchName,$id)
		{
			$branchName= $this->fm->validation($branchName);
			

			$branchName = mysqli_real_escape_string($this->db->link,$branchName);
			$id = mysqli_real_escape_string($this->db->link,$id);
			if(empty($branchName))
			{
				$arlert="không được bỏ trống";
				return $arlert;
			}
			else
			{
				$query="UPDATE tbl_branch SET branchName ='$branchName' WHERE branchId='$id'";
				$result=$this->db->update($query);
				if($result){
					$arlert= "<span class= 'success' > thành công </span> ";
				return $arlert;
				}
				else{
					$arlert= "<span class= 'error' >không thành công</span> ";
				return $arlert;
				}

			}
		}
		function del_branch($id){
			$query="DELETE FROM tbl_branch WHERE branchId= '$id'";
			$result=$this->db->delete($query);
			
			if($result){
					$arlert= "<span class= 'success' > thành công </span> ";
					return $arlert;
				}
				else{
					$arlert= "<span class= 'error' >không thành công</span> ";
					return $arlert;
				}
			
				
		}

		function getcatbyId($id)
		{
			
				$query="SELECT * FROM tbl_branch WHERE branchId= '$id'";
				$result=$this->db->select($query);
				
			
				return $result;
			
		}
	}

?>