<?php
	class controller_main extends controller{
		function __construct(){
			parent:: __construct();
			$arr=$this->model->fetch('SELECT * from tbl_acc where id_acc=3');
			include "view/view_main.php";
		}
	}
	new controller_main();
?>