<?php 
	
	include '../lib/database.php';
	include '../helpers/format.php';
?>

<?php 
	/**
	 * 
	 */
	class product
	{
	
		private $db;
		private $fm;
		function __construct()
		{
			$this->db=new Database();
			$this->fm=new Format();
		}
		function insert_product($data,$files)
		{
			
			

			$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
			$category = mysqli_real_escape_string($this->db->link,$data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
			$price = mysqli_real_escape_string($this->db->link,$data['price']);
		
			$type = mysqli_real_escape_string($this->db->link,$data['type']);

			$permited=arrat('jpg','jpeg','png','gif');
			$file_name=$_FILE['image']['name'];
			$file_size=$_FILE['image']['size'];
			$file_temp=$_FILE['image']['tmp_name'];

			$div=explode('.',$file_name);
			$file_ext=strtolower(end($div));
			$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
			$uploaded_image="uploads/".$unique_image;

			if($productName=="" ||$category==""||$product_desc==""||$price==""||$type==""||$file_name=="" )
			{
				$arlert="không được bỏ trống";
				return $arlert;
			}
			else
			{
				move_uploaded_file($file_temp, $uploaded_image);
				$query ="INSERT INTO tbl_product(productName,catId,product_desc,price,type,image) 
					VALUES('$productName','$category','$product_desc','$price','$type','$unique_image')";
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

		// function show_category()
		// {
			
		// 		$query="SELECT * FROM tbl_category order by catId desc";
		// 		$result=$this->db->select($query);
				
			
		// 		return $result;
			
		// }

		// function update_category($catName,$id)
		// {
		// 	$catName= $this->fm->validation($catName);
			

		// 	$catName = mysqli_real_escape_string($this->db->link,$catName);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);
		// 	if(empty($catName))
		// 	{
		// 		$arlert="không được bỏ trống";
		// 		return $arlert;
		// 	}
		// 	else
		// 	{
		// 		$query="UPDATE tbl_category SET catName ='$catName' WHERE catId='$id'";
		// 		$result=$this->db->update($query);
		// 		if($result){
		// 			$arlert= "<span class= 'success' > thành công </span> ";
		// 		return $arlert;
		// 		}
		// 		else{
		// 			$arlert= "<span class= 'error' >không thành công</span> ";
		// 		return $arlert;
		// 		}

		// 	}
		// }
		// function del_category($id){
		// 	$query="DELETE FROM tbl_category WHERE catId= '$id'";
		// 	$result=$this->db->delete($query);
			
		// 	if($result){
		// 			$arlert= "<span class= 'success' > thành công </span> ";
		// 			return $arlert;
		// 		}
		// 		else{
		// 			$arlert= "<span class= 'error' >không thành công</span> ";
		// 			return $arlert;
		// 		}
			
				
		// }

		// function getcatbyId($id)
		// {
			
		// 		$query="SELECT * FROM tbl_category WHERE catId= '$id'";
		// 		$result=$this->db->select($query);
				
			
		// 		return $result;
			
		// }
	}

?>