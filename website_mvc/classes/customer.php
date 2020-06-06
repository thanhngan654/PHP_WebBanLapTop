<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	ob_start();
?>
<style type="text/css" media="screen">
	.error{
		color: red;
	}
	.success{
		color: green;
	}
</style>
<?php 
	/**
	 * 
	 */
	class customer
	{
	
		private $db;
		private $fm;
		function __construct()
		{
			$this->db=new Database();
			$this->fm=new Format();
		}
		
		function insert_customer($data)
		{
			$name = mysqli_real_escape_string($this->db->link,$data['Name']);
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$address = mysqli_real_escape_string($this->db->link,$data['Address']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
			$username = mysqli_real_escape_string($this->db->link,$data['Username']);
			$password = mysqli_real_escape_string($this->db->link,md5($data['Password']));
			if($name=="" ||$email==""||$address==""||$phone==""||$username==""||$password=="" )
			{
				$arlert="<span class= 'error' >không được bỏ trống</span>";
				return $arlert;
			}
			else
			{
				$check_email="SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result=$this->db->select($check_email);
				if($result){
					$arlert= "<span class= 'error' > Email đã tồn tại! vui lòng điền email khác </span> ";
				return $arlert;
				}else{
					$query ="INSERT INTO tbl_customer(Name,Address,phone,email,Password,Username) 
					VALUES('$name','$address','$phone','$email','$password','$username')";
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
		}

		function login_customer($data)
		{
			$username = mysqli_real_escape_string($this->db->link,$data['Username']);
			$password = mysqli_real_escape_string($this->db->link,md5($data['Password']));
			if(empty($username)||empty($password))
			{
				$arlert="<span class= 'error' >không được bỏ trống</span>";
				return $arlert;
			}
			else
			{
				$check_user_pass="SELECT * FROM tbl_customer WHERE Username='$username' AND Password='$password'";
				$result=$this->db->select($check_user_pass);
				if($result != false){
					$value=$result->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['Id']);
					Session::set('customer_name',$value['Name']);
					header('Location:order.php');
					ob_enf_flunch();
				}else{
					
				$arlert= "<span class= 'error' > User hoặc Password không đúng! </span> ";
				return $arlert;
				
				}
			}
		}

		function show_customers($id)
		{
			$query="SELECT * FROM tbl_customer WHERE Id='$id' LIMIT 1";
				$result=$this->db->select($query);
				return $result;
		}

		function update_customer($data,$id){
			$name = mysqli_real_escape_string($this->db->link,$data['Name']);
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$address = mysqli_real_escape_string($this->db->link,$data['Address']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
			
			if($name=="" ||$email==""||$address==""||$phone=="" )
			{
				$arlert="<span class= 'error' >không được bỏ trống</span>";
				return $arlert;
			}
			else
			{
				
			
					$query ="UPDATE tbl_customer SET Name='$name',Address='$address',phone='$phone',email='$email'
					WHERE Id='$id'";
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

	}

?>