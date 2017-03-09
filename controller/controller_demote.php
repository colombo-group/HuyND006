<?php
	class controller_demote extends controller{
		function __construct(){
			parent:: __construct();
			$id=isset($_GET['id'])?$_GET['id']:'';
			$user=$this->model->fetch_one("SELECT * from tbl_acc where id=$id");
			$id_acc=$user['id_acc']+1;
			$this->model->execute("UPDATE tbl_acc set id_acc=$id_acc where id=$id");
			echo "<meta http-equiv='refresh' content='0;url=index.php?controller=user_info&id=$id'>";
		}
	}
	new controller_demote();
?>