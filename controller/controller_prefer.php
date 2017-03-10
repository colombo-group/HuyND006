<?php
if(isset($_SESSION['id_acc'])&&$_SESSION['id_acc']<=2){
	class controller_prefer extends controller{
		function __construct(){
			parent:: __construct();
			$id=isset($_GET['id'])?$_GET['id']:'';
			$user=$this->model->fetch_one("SELECT * from tbl_acc where id=$id");
			if($user['id_acc']==2) $id_acc=2;
			else if($user['id_acc']==1) $id_acc=1;
			else $id_acc=$user['id_acc']-1;
			$this->model->execute("UPDATE tbl_acc set id_acc=$id_acc where id=$id");
			echo "<meta http-equiv='refresh' content='0;url=index.php?controller=user_info&id=$id'>";
		}
	}
	new controller_prefer();
}
else{
	echo "You arent allow to access this url";
}
?>