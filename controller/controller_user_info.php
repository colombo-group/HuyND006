<?php
	class controller_user_infor extends controller{
		function __construct(){
			parent:: __construct();
			$id= isset($_GET['id'])?$_GET['id']:0;
			$user=$this->model->fetch_one("SELECT * from tbl_acc where id=$id");
			 // $user['refer'];
			$refer=$this->model->fetch("SELECT * from tbl_acc where username='".$user['refer']."' or email='".$user['refer']."'");
			// echo $refer['fullname'];
			include "view/view_user_infor.php";
		}
	}
	new controller_user_infor();
?>