<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
	/**
	 * 
	 */
	class category
	{
	
		private $db;
		private $fm;
		function __construct()
		{
			$this->db=new Database();
			$this->fm=new Format();
		}
		function insert_category($catName)
		{
			$catName= $this->fm->validation($catName);
			

			$catName = mysqli_real_escape_string($this->db->link,$catName);

		

			if(empty($catName) )
			{
				$arlert="không được bỏ trống";
				return $arlert;
			}
			else
			{
				$query="INSERT INTO tbl_category(catName) VALUES('$catName')";
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

		function show_category()
		{
			
				$query="SELECT * FROM tbl_category order by catId desc";
				$result=$this->db->select($query);
				
			
				return $result;
			
		}

		function update_category($catName,$id)
		{
			$catName= $this->fm->validation($catName);
			

			$catName = mysqli_real_escape_string($this->db->link,$catName);
			$id = mysqli_real_escape_string($this->db->link,$id);
			if(empty($catName))
			{
				$arlert="không được bỏ trống";
				return $arlert;
			}
			else
			{
				$query="UPDATE tbl_category SET catName ='$catName' WHERE catId='$id'";
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
		function del_category($id){
			$query="DELETE FROM tbl_category WHERE catId= '$id'";
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
			
				$query="SELECT * FROM tbl_category WHERE catId= '$id'";
				$result=$this->db->select($query);
				
			
				return $result;
			
		}

		function show_category_fontend()
		{
			
				$query="SELECT * FROM tbl_category order by catId desc";
				$result=$this->db->select($query);
				
			
				return $result;
			
		}

		function get_product_by_cat($id)
		{
			$query="SELECT * FROM tbl_product WHERE catId='$id' order by catId desc LIMIT 8";
				$result=$this->db->select($query);
				
			
				return $result;
		}
		function get_name_by_cat($id)
		{
			$query="SELECT tbl_product.*, tbl_category.catId,tbl_category.catName FROM tbl_category,tbl_product WHERE tbl_product.catId=tbl_category.catId AND tbl_product.catId='$id' LIMIT 1";
				$result=$this->db->select($query);
				
			
				return $result;
		}


	}

?>