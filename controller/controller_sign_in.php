<?php
if(isset($_COOKIE['ban_user'])){
	session_destroy();
	echo "You cannot sign in. Please, Come back after 2 hours";
}
else{
	if(isset($_SESSION['user'])){
		// header('index.php');
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
	else {
		class controller_sign_in extends controller{
			function __construct(){
				include "view/view_sign_in.php";
			}
		}
		new controller_sign_in();
	}
}
?>