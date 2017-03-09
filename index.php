<?php
	session_start();

	if(isset($_GET['act'])&&$_GET['act']=='sign_out'){
		unset($_SESSION['user']);
		unset($_SESSION['id']);
		unset($_SESSION['id_acc']);
		
		echo "<meta http-equiv='refresh' content='0;url=index.php?record=10&p=1'>";
	}
	if(isset($_GET['act'])&&$_GET['act']=='sign_in_other'){
		unset($_SESSION['user']);
		unset($_SESSION['id']);
		unset($_SESSION['id_acc']);
		echo "<meta http-equiv='refresh' content='0;url=index.php?controller=sign_in'>";
	}
	include "config.php";
	include "application/model.php";
	include "application/controller.php";
	$controller="";
	$controller=isset($_GET['controller'])?'controller/controller_'.$_GET['controller'].'.php':'controller/controller_main.php';
	include "view/view_layout.php";
?>