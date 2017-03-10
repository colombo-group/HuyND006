<?php
if(isset($_SESSION['user'])){
	// header('index.php');
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
else{
	class controller_sign_up extends controller{
		function __construct(){
				parent:: __construct();
				include "view/view_sign_up.php";
		}
	}
	new controller_sign_up();
}
?>