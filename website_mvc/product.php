<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
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

			$permited=array('jpg','jpeg','png','gif');
			$file_name=$_FILES['image']['name'];
			$file_size=$_FILES['image']['size'];
			$file_temp=$_FILES['image']['tmp_name'];

			$div=explode('.',$file_name);
			$file_ext=strtolower(end($div));
			$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
			$uploaded_image="uploads/".$unique_image;

			if($productName=="" ||$category==""||$product_desc==""||$price==""||$type==""||$file_name=="" )
			{
				$arlert="<span class= 'error' >không được bỏ trống</span>";
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

		function show_product()
		{
			$query="SELECT tbl_product.* , tbl_category.catName

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId =tbl_category.catId
			order by tbl_product.productId desc";
				// $query="SELECT * FROM tbl_product order by productId desc";
				$result=$this->db->select($query);
				
			
				return $result;
			
		}

		function update_product($data,$files,$id)
		{
			
			$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
			$category = mysqli_real_escape_string($this->db->link,$data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
			$price = mysqli_real_escape_string($this->db->link,$data['price']);
		
			$type = mysqli_real_escape_string($this->db->link,$data['type']);

			$permited=array('jpg','jpeg','png','gif');
			$file_name=$_FILES['image']['name'];
			$file_size=$_FILES['image']['size'];
			$file_temp=$_FILES['image']['tmp_name'];

			$div=explode('.',$file_name);
			$file_ext=strtolower(end($div));
			$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
			$uploaded_image="uploads/".$unique_image;

			if($productName=="" ||$category==""||$product_desc==""||$price==""||$type=="")
			{
				$arlert="<span class= 'error' >không được bỏ trống</span>";
				return $arlert;
			}
			else
			{
				if(!empty($file_name))
				{
					if($file_size>2000000480){

						$arlert="<span class= 'error' >file không được quá 2 MB</span>";
						return $arlert;
					}
					elseif (in_array($file_ext, $permited)===false) {
						$arlert="<span class= 'error' >Chỉ được upload :".implode(',', $permited). "</span>";
						return $arlert;
						
					}
					move_uploaded_file($file_temp, $uploaded_image);
					$query="UPDATE tbl_product SET
					productName='$productName',
					catId='$category',
					type='$type',
					price='$price',
					image='$unique_image',
					product_desc='$product_desc'
					WHERE productId='$id'";					
				}
				else{
					$query="UPDATE tbl_product SET
					productName='$productName',
					catId='$category',
					type='$type',
					price='$price',
					
					product_desc='$product_desc'
					WHERE productId='$id'";		
				}


				
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
		function del_product($id){
			$query="DELETE FROM tbl_product WHERE productId= '$id'";
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

		function getproductbyId($id)
		{
			
				$query="SELECT * FROM tbl_product WHERE productId= '$id'";
				$result=$this->db->select($query);
				
			
				return $result;
			
		}

		function getproduct_feathered()
		{
			
				$query="SELECT * FROM tbl_product WHERE type= '1'";
				$result=$this->db->select($query);
				
			
				return $result;
			
		}
		function getproduct_new()
		{
			
				$query="SELECT * FROM tbl_product order by productId desc LIMIT 4";
				$result=$this->db->select($query);
				
			
				return $result;
			
		}

		function get_details($id)
		{
			$query="SELECT tbl_product.* , tbl_category.catName

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId =tbl_category.catId
			WHERE  tbl_product.productId='$id'";
			$result=$this->db->select($query);
			return $result;
		}


		public function get_wishlist($customer_id)
		{
			$query = "SELECT * FROM tbl_wishlist where customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		
		public function insertWishlist($productid, $customer_id)
		{
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			
			$result = $mysqli->$query("SELECT productName FROM tbl_product WHERE productId= '$productid'");

		while ($rows = $result->fetch_object()) { 
            printf('<img src="%s" />', $rows->productName); 
         }
			
			$productName=$result["productName"];

			
			
			$query_insert = "INSERT INTO tbl_wishlist(productId,customer_id,productName) VALUES('$productid','$price','$productName')";
			$insert_wlist = $this->db->insert($query_insert);

			if($insert_wlist){
						$alert = "<span class='success'>Thêm sản phẩm vào wishlist thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm sản phẩm vào wishlist thất bại</span>";
						return $alert;
					}
			
		}


	}

?>