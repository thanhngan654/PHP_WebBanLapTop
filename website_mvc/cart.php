<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
	/**
	 * 
	 */
	class cart
	{
	
		private $db;
		private $fm;
		function __construct()
		{
			$this->db=new Database();
			$this->fm=new Format();
		}
		function add_to_cart($quantity,$id)
		{
			$quantity=$this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link,$quantity);
			$id = mysqli_real_escape_string($this->db->link,$id);
			$sId=session_id();

			$query="SELECT * FROM tbl_product WHERE productId= '$id'";
			$result=$this->db->select($query)->fetch_assoc();

			$image=$result["image"];
			$price=$result["price"];
			$productName=$result["productName"];

			
			$query_insert ="INSERT INTO tbl_cart(productId,quantity,sId,image,price,productName) 
					VALUES('$id','$quantity','$sId','$image','$price','$productName')";
				$insert_cart=$this->db->insert($query_insert);
				if($insert_cart){
					header("Location:cart.php");
				}
				else{
					header("Location:404.php");
				}
		}

		public function get_product_cart()
		{
			$sId=session_id();
			$query_cart= "SELECT * FROM tbl_cart WHERE sId='$sId'";

			$result_cart=$this->db->select($query_cart);
			return $result_cart;
		}

		public function update_quantity_cart($quantity, $cartId)
		{
			$quantity=$this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link,$quantity);
			$cartId = mysqli_real_escape_string($this->db->link,$cartId);
			$query="UPDATE tbl_cart SET
					quantity='$quantity'
					
					WHERE cartId='$cartId'";	
			$result=$this->db->update($query);
			if($result){
					$a="<span>update success!</span>";
				return $a;
				}
				else{
				$a="<span>update not success!</span>";
				return $a;
				}
		}

		public function del_cart($cartid)
		{
			$cartid = mysqli_real_escape_string($this->db->link,$cartid);
			$query_cart= "DELETE  FROM tbl_cart WHERE cartId='$cartid'";
			$result=$this->db->delete($query_cart);
			if($result){
					header("Location:cart.php");
				}
				else{
					header("Location:404.php");
				}
		}

		public function check_cart()
		{
			$sId=session_id();
			$query_cart= "SELECT * FROM tbl_cart WHERE sId='$sId'";

			$result_cart=$this->db->select($query_cart);
			return $result_cart;
		}

		public function check_order($customer_id)
		{
			
			$query_cart= "SELECT * FROM tbl_order WHERE customerid='$customer_id'";

			$result_cart=$this->db->select($query_cart);
			return $result_cart;
		}

		public function del_all_cart()
		{
			$sId=session_id();
			$query_cart= "DELETE FROM tbl_cart WHERE sId='$sId'";

			$result_cart=$this->db->select($query_cart);
			return $result_cart;
		}

		public function insertOrder($customer_id)
		{
			$sId=session_id();
			$query= "SELECT * FROM tbl_cart WHERE sId='$sId'";
			$get_product=$this->db->select($query);
			if($get_product){
				while ($result=$get_product->fetch_assoc()) {
					$productid=$result['productId'];
					$productName=$result['productName'];
					$quantity=$result['quantity'];
					$price=$result['price']*$quantity;
					$image=$result['image'];
					$customer_ID=$customer_id;
					$query_insert ="INSERT INTO tbl_order(productId,productName,customerid,quantity,price,image) 
					VALUES('$productid','$productName','$customer_ID','$quantity','$price','$image')";
				$insert_order=$this->db->insert($query_insert);

				}
			}
		}


		public function getAmoutPrice($customer_id)
		{
			$sId=session_id();
			$query= "SELECT price FROM tbl_order WHERE customerid='$customer_id' AND dateOrder=now()";
			$get_price=$this->db->select($query);
			return $get_price;
		}

		function get_cart_ordered($customer_id)
		{
			
			$query= "SELECT * FROM tbl_order WHERE customerid='$customer_id'";
			$get_cart_ordered=$this->db->select($query);
			return $get_cart_ordered;
		}

		function get_inbox_cart()
		{
			$query= "SELECT * FROM tbl_order order by dateOrder";
			$get_inbox_cart=$this->db->select($query);
			return $get_inbox_cart;
		}

		public function shifted($id,$proid,$qty,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$proid = mysqli_real_escape_string($this->db->link, $proid);
			$qty = mysqli_real_escape_string($this->db->link, $qty);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			
			$query = "UPDATE tbl_order SET

			status = '1'

			WHERE id = '$id' AND dateOrder = '$time' AND price = '$price' ";


			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> Update Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> Update Order NOT Succesfully</span> ";
				return $msg;
			}
		}

		public function del_shifted($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "DELETE FROM tbl_order 
					  WHERE id = '$id' AND dateOrder = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> DELETE Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> DELETE Order NOT Succesfully</span> ";
				return $msg;
			}
		}
		public function shifted_confirm($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "UPDATE tbl_order SET

			status = 2

			WHERE customerid = '$id' AND dateOrder = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			return $result;
		}

	}

?>