<?php
	class controller_welcome extends controller{
		function __construct(){
			parent:: __construct();
			if($_SERVER['REQUEST_METHOD']=="POST"){
				$username=$_POST['username'];
				$pass=$_POST['password'];
				$pass=md5($pass);
				$count=isset($_GET['count'])?$_GET['count']:1;
				$acc=$this->model->fetch_one("SELECT * from tbl_acc where username='$username' or email='$username'");
				if($username==$acc['username']||$username==$acc['email']&&$pass==$acc['pass']){
					// session_destroy();
					if(isset($_SESSION['erro'])){
						//bo cac session cua cac lan dang nhap sai
						unset($_SESSION['erro']);
					}
					$_SESSION['user']=$acc['fullname'];
					$_SESSION['id']=$acc['id'];
					$_SESSION['id_acc']=$acc['id_acc'];
					echo "<meta http-equiv='refresh' content='0;url=index.php?controller=user_pr&id=".$acc['id']."'>";
				}
				else {					
					$_SESSION['erro']=isset($_SESSION['erro'])?$_SESSION['erro']:1;
					
					if($_SESSION['erro']==1){
						//lay thoi gian dang nhap sai lan 1
						$_SESSION['time1']=time();
					}
					if($_SESSION['erro']==3){
						//lay thoi gian dang nhap sai lan 3
						$_SESSION['time3']=time();
						// tinh khoang tg giua lan dang nhap sai 1 vs 3
						$_SESSION['time_sub']=$_SESSION['time3']-$_SESSION['time1'];
					}
					if($_SESSION['erro']==3) $_SESSION['erro']=1;
					if(isset($_SESSION['time_sub'])&&$_SESSION['time_sub']<60){
						setcookie('ban_user','ban',time()+7200);
						//huy tat ca cac session hien co
						session_destroy();
						//dua ra thong bao
						echo "You cannot sign in. Please, Come back after 2 hours";
						
					}
					else{
						$erro="Your information is incorrect";
						echo "<meta http-equiv='refresh' content='0;url=index.php?controller=sign_in&erro=$erro'>";
					}
				}
			}
		}
	}
	new controller_welcome();
?>