<?php 
$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin();
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../helpers/format.php');
?>

<?php 
	/**
	 * 
	 */
	class adminlogin 
	{
	
		private $db;
		private $fm;
		function __construct()
		{
			$this->db=new Database();
			$this->fm=new Format();
		}
		function login_admin($adminUser,$adminPass)
		{
			$adminUser= $this->fm->validation($adminUser);
			$adminPass= $this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);
		

			if(empty($adminUser)||empty($adminPass) )
			{
				$arlert="User Name hoặc Password không đúng";
				return $arlert;
			}
			else
			{
				$query="SELECT * FROM tbl_admin WHERE adminUser='$adminUser'AND adminPass='$adminPass' ";
				$result=$this->db->select($query);
				if($result!=false)
				{
					$value=$result->fetch_assoc();
					Session::set('adminlogin',true);/*adminlogin ket noi voi session checkSession*/
					Session::set('adminId',$value['adminId']);
					Session::set('adminUser',$value['adminUser']);
					Session::set('adminPass',$value['adminPass']);
					Session::set('adminName',$value['adminName']);
					header('Location:index.php');
				}
				else{
					$arlert="user and pass not match ";
				return $arlert;
				}

			}
		}
	}

?>