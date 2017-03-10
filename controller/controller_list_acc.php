<?php
	class controller_list_acc extends controller{
		function __construct(){
			parent:: __construct();
			$total_record=$this->model->count("SELECT * from tbl_acc where id_acc=3 or id_acc=2");
			$record_per_page=isset($_GET['record'])?$_GET['record']:10;
			$num_page=ceil($total_record/$record_per_page);
			$page=isset($_GET['p'])&&$_GET['p']>0?$_GET['p']:1;
			$from=($page-1)*$record_per_page;
			$act=isset($_GET['act'])?$_GET['act']:'';
			$count=$this->model->count("SELECT * from tbl_acc where id_acc=3 or id_acc=2");
			// echo $count;
			switch($act){
				case 'asc_fullname':{
					$arr= $this->model->fetch("SELECT * from tbl_acc where id_acc=3 or id_acc=2  ORDER BY fullname ASC limit $from,$record_per_page");
					break;
				}
				case 'desc_fullname':{
					$arr= $this->model->fetch("SELECT * from tbl_acc where id_acc=3 or id_acc=2 ORDER BY fullname DESC  limit $from,$record_per_page");
					break;
				}
				case 'asc_date':{
					$arr= $this->model->fetch("SELECT * from tbl_acc where id_acc=3 or id_acc=2  ORDER BY j_day ASC limit $from,$record_per_page");
					break;
				}
				case 'desc_date':{
					$arr= $this->model->fetch("SELECT * from tbl_acc where id_acc=3 or id_acc=2  ORDER BY j_day DESC limit $from,$record_per_page");
					break;
				}
				case '':{
					$arr= $this->model->fetch("SELECT * from tbl_acc where id_acc=3 or id_acc=2 limit $from,$record_per_page");
					break;
				}
			}
			
			include "view/view_list_acc.php";
		}
	}
	new controller_list_acc();
?>