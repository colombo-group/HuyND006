<?php
	class controller_user_pr extends controller{
		function __construct(){
			parent:: __construct();
			$id=isset($_GET['id'])&&is_numeric($_GET['id'])?$_GET['id']:'';
			$user=$this->model->fetch_one("SELECT * from tbl_acc where id=$id ");
			include "view/view_user_pr.php";
		}
	}
	new controller_user_pr();
?>