<?php
	class controller_user_pr extends controller{
		function __construct(){
			parent:: __construct();
			$id=isset($_GET['id'])&&is_numeric($_GET['id'])?$_GET['id']:'';

			if($id==$_SESSION['id']){
				$user=$this->model->fetch_one("SELECT * from tbl_acc where id=$id");
				include "view/view_user_pr.php";
			}
			else if($id!=$_SESSION['id']){
				// echo "ok";
				$erro="You aren't allowed to access this url";
				echo "<script>alert('".$erro."')</script>";
				echo "<meta http-equiv='refresh' content='0;url=index.php'>";
			}
			
			
		}
	}
	new controller_user_pr();
?>