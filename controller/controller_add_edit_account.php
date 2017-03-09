<?php
	class controller_add_edit_account extends controller{
		function __construct(){
			parent:: __construct();
			$act=isset($_GET['act'])?$_GET['act']:"";
			switch($act){
				case 'add':{
					date_default_timezone_set('Asia/Ho_Chi_Minh');
					$j_day=date("Y/m/d");
					// echo $j_day;
					// echo $error;
					$username=isset($_POST['username'])?$_POST['username']:'';
					$pass1=isset($_POST['password1'])?$_POST['password1']:'';
					$pass1=md5($pass1);
					$email=isset($_POST['email'])?$_POST['email']:'';
					$phone=isset($_POST['phone'])?$_POST['phone']:'';
					$img=" ";
					if($_FILES['img']['name']){
						// echo $_FILES['img']['tmp_name'];
							$img="public/upload/img_profile/".time().$_FILES['img']['name'];
							move_uploaded_file($_FILES['img']['tmp_name'], "public/upload/img_profile/".time().$_FILES['img']['name']);
						}
					$fullname=isset($_POST['fullname'])?$_POST['fullname']:'';
					$refer=isset($_POST['refer'])?$_POST['refer']:'';
					$this->model->execute("INSERT into tbl_acc (username,id_acc,fullname,email,phone,img,pass,j_day,refer) values ('$username',3,'$fullname','$email','$phone','$img','$pass1','$j_day','$refer')");
					echo "<script>alert('Sign up completed')</script>";
					// $arr=$this->model->fetch_one("SELECT * from tbl_acc where username='$username'");
					echo "<meta http-equiv='refresh' content='0;url=index.php?controller=sign_in'>";
					break;
				}
				case 'edit': {
					$id=isset($_GET['id'])&&is_numeric($_GET['id'])?$_GET['id']:'';
					$user=$this->model->fetch_one("SELECT * from tbl_acc where id=$id");
					include "view/view_edit_acc.php";
					break;
				}
				case 'do_edit': {
					$id=isset($_GET['id'])&&is_numeric($_GET['id'])?$_GET['id']:'';
					// echo $id;
					$user=$this->model->fetch_one("SELECT * from tbl_acc where id=$id");
					$pass=$_POST['password1'];
					if($user['pass']==$pass){
						$pass=$user['pass'];
					}
					else $pass=md5($pass);
					$phone=$_POST['phone'];
					$img=$_POST['old_img'];
					if($_FILES['img']['name']){
						$img="public/upload/img_profile/".time().$_FILES['img']['name'];
						move_uploaded_file($_FILES['img']['tmp_name'], 'public/upload/img_profile/'.time().$_FILES['img']['name']);
					}
					$fullname=$_POST['fullname'];
					$intro=isset($_POST['intro'])?$_POST['intro']:'';
					$gender=$_POST['gender'];
					$birthday=$_POST['birthday'];
					$this->model->execute("UPDATE tbl_acc set fullname='$fullname',pass='$pass',phone='$phone',img='$img',intro='$intro',gender='$gender',birthday='$birthday' where id=$id");
					echo "<meta http-equiv='refresh' content='0;url=index.php?controller=user_pr&id=$id'>";
					break;
				}
			}
		}
	}
	new controller_add_edit_account();
?>